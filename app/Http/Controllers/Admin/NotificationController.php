<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function notification()
    {
        return view('notifications');
    }

    public function save_Token(Request $request)
    {
        $auth = Auth::id();
        $input = $request->all();
        $input['user_id'] = $auth;

        $notification = Notification::create($input);
        $Assign_user = User::find($input['user_id']);
        $device_token = $Assign_user->device_token;
        $url = 'https://fcm.googleapis.com/fcm/send';

        $fields = array(
            'registration_ids' => [$device_token],
            'data' => array(
                "title" => $input['title'],
                'body' => str_replace("&nbsp;", " ", trim(preg_replace('/\s\s+/', ' ', strip_tags($input['body'])))),

            )
        );
        $fields = json_encode($fields);
        $headers = array(
            'Authorization: key=' . "AAAALK4Vo8Q:APA91bGoFFO7KDGTqTz16_TDlL6jWg8GEy7nB8NOB-8Nwvy1uS-I5w-AMnMzp6gbVu3TfJQMBckBmvl8NtMAC3PucJ2xJ-1zgggrKr2NkoUB-9wHusI0yCSCk9oJSMDVgzeEgOpr5LhC",
            'Content-Type: application/json'
        );
//        dd($headers);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        $result = curl_exec($ch);
        echo $result;
        curl_close($ch);

        return redirect()->back()->withSuccess(__('Notificaton Created SuccessFully', ['name' => __('call-task.store')]));
    }
//        auth()->user()->update(['device_token'=>$request->token]);
//        return response()->json(['token saved successfully.']);
//    }


    public function saveToken(Request $request)
    {
        dd($request);
        auth()->user()->update(['device_token' => $request->token]);
        return response()->json(['token saved successfully.']);
    }

    public function sendNotification(Request $request)
    {
        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
        //dd($firebaseToken);

        $SERVER_API_KEY = 'AAAAGwdhDjE:APA91bEWMsr2cJECIoKPiFQ0W_5dLJOOoywFKX_F3Du3w7QT7S-JJNa3F5Fd7RjqRIFVx_WUYt4lxbeb9CsUutjjsQn-6aMC-WaOX5p8QdekCxyuo9dcqL4uAnDGze5wxwB5TpdCOTaa';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
            ]
        ];
        $user = Auth::user();
        $input = $request->all();
        $input['user_id'] = $user->id;
        Notification::create($input);
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
//        dd($ch);
        $response = curl_exec($ch);

        dd($response);
    }


    public function show_all_notification(Request $request)
    {
        $notifications = Notification::orderBy('id', 'DESC')->paginate(10);
        Notification::whereNull('read_at')->update(['read_at' => date('Y-m-d H:i:s')]);

        return view('admin.notification.show_all_notification', compact('notifications'));
    }
}

