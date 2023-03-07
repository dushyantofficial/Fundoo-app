<?php


use App\Models\Admin\Notification;
use App\Models\Admin\User_Rating;
use Illuminate\Support\Facades\Request;

function random_number()
{
    $rand_num = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
    return $rand_num;
}

function formatDateTime($dateTime, $format = "d/m/Y h:i A")
{
    return ($dateTime) ? date($format, strtotime($dateTime)) : $dateTime;
}

function date_formate($date)
{
    return \Carbon\Carbon::parse($date)->format('d-m-Y H:i:s A');
}

function hours_formate($date)
{
    return \Carbon\Carbon::parse($date)->format('H:i:s A');
}

function month_year_formate($date)
{
    return \Carbon\Carbon::parse($date)->format('F') . '-' . \Carbon\Carbon::parse($date)->format('Y');
}

function year_formate($year)
{
    return  \Carbon\Carbon::parse($year)->format('Y');
}

function birth_date_formate($birth_date)
{
    return \Carbon\Carbon::parse($birth_date)->format('d-m-Y');
}


function notification_date_formate($date)
{
    return \Carbon\Carbon::parse($date)->format('d-M-Y');
}


function get_currency($currency)
{
    return '$' . number_format($currency, 2, ".", ",");
}


function get_rupee_currency($rupee_currency)
{
    return '₹' . number_format($rupee_currency, 2, ".", ",");
}


function user_rating($user_rating)
{
    $ratings = User_Rating::where('rated_to', $user_rating->id)->get();
    return $ratings->avg('star');
}

function get_currency_count($currency_count)
{
    return number_format($currency_count, 2, ".", ",");
}

function number_formats($ratings)
{
    return number_format($ratings, 1, ".", ",");
}


if (!function_exists('notifications')) {

    function notifications()
    {
        $notifications = $notifications = Notification::where('read_at', null)->orderBy('id', 'DESC')->paginate(3);
        if ($notifications) {
            return $notifications;
        }

    }
}

if (!function_exists('notification_count')) {

    function notification_count()
    {
        $notifications = \App\Models\Admin\Notification::where('read_at', null)->count();
        if ($notifications) {
            return $notifications;
        }

    }
}

function multi_user_rating($user_rating)
{
    $ratings = User_Rating::where('rated_to', $user_rating->user_id)->get();
    return $ratings->avg('star');
}


function multi_customer_rating($user_rating)
{
    $ratings = User_Rating::where('rated_to', $user_rating->customer_id)->get();
    return $ratings->avg('star');
}

function formate_date($date)
{
    return \Carbon\Carbon::parse($date)->format('Y-m-d');
}


function getNavigatorUrl($start_latitude, $start_longitude, $dest_latitude, $dest_longitude)
{
//    $agent = new Jenssegers\Agent\Agent();
    $url = "https://www.google.com/maps/dir/?api=1&origin=$start_latitude,$start_longitude&destination=$dest_latitude,$dest_longitude";
//    $url = "https://www.google.com/maps/dir/?api=1&destination=$latitude,$longitude";
//    if($agent->isMobile() || $agent->isTablet()){
//        if($agent->isAndroidOS()){
//            $url = "google.navigation:q=$latitude,$longitude";
//        }elseif($agent->is('iPhone')){
//            $url = "http://maps.apple.com/?daddr=$latitude,$longitude";
//        }
//    }

    return $url;
}


function sendFCMNotificationToDriver($fcmToken,$title,$message)
{



    $curl = curl_init();


    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
    "to" : "' . $fcmToken . '",
    "content_available": true,
    "priority": "high",
    "sound":"https://www.computerhope.com/jargon/m/example.mp3",
    "apns":{
        "payload":{
            "aps":{
             "sound":"https://www.computerhope.com/jargon/m/example.mp3"
            }
        }
    },
    "data" : {
         "click_action": "FLUTTER_NOTIFICATION_CLICK",
         "sound": "https://www.computerhope.com/jargon/m/example.mp3",
         "page":"/second",
        "content": {
            "id": 100,
            "channelKey": "basic_channel",
            "channelGroupKey": "basic_channel_group",
            "title": "' . $title . '",
            "body": "' . $message . '"
        }
    }
}',
        CURLOPT_HTTPHEADER => array(
            'Authorization: key=AAAAMvp62dI:APA91bHlehYem8uFBLXcCTK12OaBGBXFJ_GTGMvIz37UJRdMVNwkdf4UyEehxgGUDahi_g6kRp3rqVHlrvjdxbT4_Cc-6qz_Gr9BZl5Dx_0TEDzBNvuvP570hSc1cMmY9jGd-aUklldc',
            'Content-Type: application/json'
        ),
    ));


    $response = curl_exec($curl);

    curl_close($curl);
//    \Log::channel('fcm')->info(($response));
    dd($response);
    return $response;

}


function sendFCMNotificationToCustomer($fcmToken,$title,$message)
{

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://fcm.googleapis.com/fcm/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
    "to" : "' . $fcmToken . '",
    "content_available": true,
    "priority": "high",
    "sound":"https://www.computerhope.com/jargon/m/example.mp3",
    "apns":{
        "payload":{
            "aps":{
             "sound":"https://www.computerhope.com/jargon/m/example.mp3"
            }
        }
    },
    "data" : {
         "click_action": "FLUTTER_NOTIFICATION_CLICK",
         "sound": "https://www.computerhope.com/jargon/m/example.mp3",
         "page":"/second",
        "content": {
            "id": 100,
            "channelKey": "basic_channel",
            "channelGroupKey": "basic_channel_group",
            "title": "' . $title . '",
            "body": "' . $message . '"
        }
    }
}',
        CURLOPT_HTTPHEADER => array(
            'Authorization: key=AAAAMvp62dI:APA91bHlehYem8uFBLXcCTK12OaBGBXFJ_GTGMvIz37UJRdMVNwkdf4UyEehxgGUDahi_g6kRp3rqVHlrvjdxbT4_Cc-6qz_Gr9BZl5Dx_0TEDzBNvuvP570hSc1cMmY9jGd-aUklldc',
            'Content-Type: application/json'
        ),
    ));


    $response = curl_exec($curl);

    curl_close($curl);
//    \Log::channel('fcm')->info(($response));

    return $response;

}
function customer_notification_store($data)
{

    $data = [
        'user_id' => $data['customer_id'],
        'title' => $data['title'],
        'body' => $data['msg'],
        'type' => $data['type'],
        'type_id' => $data['type_id'],
    ];
    \App\Models\Admin\Notification::create($data);

}
function driver_notification_store($data)
{

    $data = [
        'user_id' => $data['driver_id'],
        'title' => $data['title'],
        'body' => $data['msg'],
        'type' => $data['type'],
        'type_id' => $data['type_id'],
    ];
    \App\Models\Admin\Notification::create($data);

}
function sendSMS($mobile_no,$otp_number)
{

    $UserID='zroopotp';
    $UserPass='Zroop909@';
    $mobile= urlencode($mobile_no);
    $GSMID='ZroopD';
    $PEID=1701167205283751945;
    $Message =urlencode($otp_number.' is OTP for your Zroop Drive account verification. Never Share this code');
    $TEMPID=1707167324381820426;
    $UNICODE='TEXT';
    $url = 'https://onlysms.co.in/api/otp.aspx?UserID='.$UserID.'&UserPass='.$UserPass.'&MobileNo='.$mobile.'&GSMID='.$GSMID.'&PEID='.$PEID.'&Message='.$Message.'&TEMPID='.$TEMPID.'&UNICODE='.$UNICODE;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec ($ch);
    $err = curl_error($ch);  //if you need
    curl_close ($ch);

    return $response;


}



