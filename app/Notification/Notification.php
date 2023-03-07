<?php

namespace App\Notification;

use App\Models\Notification as NotiModel;
use App\Models\User;

class Notification
{
    public static function notify($user_id, $title, $body)
    {
        dd('notify');
        $user = User::find($user_id);
        $data = [
            'user_id' => $user->id,
            'title' => $title,
            'body' => $body
        ];
        NotiModel::create($data);
    }

    public static function notify_with_push($data)
    {


        //$data = User::find($user_id);

        $data = [
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'body' => $data['msg'],
            'type' => $data['type'],
            'type_id' => $data['type_id'],
        ];
        \App\Models\Admin\Notification::create($data);

    }


}
