<?php

namespace App\Firebase;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class Firebase
{
    /**
     * This function send firebase push notification
     * @param $title
     * @param $msgBody
     * @param $fcm_id
     */
    public static function send_push_notification($data)
    {


        $user = User::find($data['customer_id']);
        $firebaseToken = $user['device_token'];
        $data = [
            'to' => $firebaseToken,
            'notification' => [
                'title' => $data['title'],
                'body' => $data['msg'],
                'type' => $data['type'],
                'user_id' => $data['customer_id']
            ]
        ];

        $dataString = json_encode($data);
        $SERVER_API_KEY='AAAAMvp62dI:APA91bHlehYem8uFBLXcCTK12OaBGBXFJ_GTGMvIz37UJRdMVNwkdf4UyEehxgGUDahi_g6kRp3rqVHlrvjdxbT4_Cc-6qz_Gr9BZl5Dx_0TEDzBNvuvP570hSc1cMmY9jGd-aUklldc';
        $headers = array(
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);
        Log::debug($response);
        return back()->with('success', 'Notification send successfully.');
    }
    public static function send_push_notification_driver($data)
    {


        $user = User::find($data['driver_id']);
        $firebaseToken = $user['device_token'];
        $data = [
            'to' => $firebaseToken,
            'notification' => [
                'title' => $data['title'],
                'body' => $data['msg'],
                'type' => $data['type'],
                'user_id' => $data['driver_id']
            ]
        ];

        $dataString = json_encode($data);
        $SERVER_API_KEY='AAAAMvp62dI:APA91bHlehYem8uFBLXcCTK12OaBGBXFJ_GTGMvIz37UJRdMVNwkdf4UyEehxgGUDahi_g6kRp3rqVHlrvjdxbT4_Cc-6qz_Gr9BZl5Dx_0TEDzBNvuvP570hSc1cMmY9jGd-aUklldc';
        $headers = array(
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);
        Log::debug($response);
        return back()->with('success', 'Notification send successfully.');
    }
}
