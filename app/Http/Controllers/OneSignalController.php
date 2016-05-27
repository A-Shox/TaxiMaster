<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class OneSignalController extends Controller
{
    public static function sendMessage($title, $message, $data, $receiverId)
    {
        $fields = array(
            'app_id' => "ba174870-887c-4f28-bd92-f50cec6692f4",
            'include_player_ids' => array($receiverId),
        );

        if (!is_null($title))
            $fields['headings'] = array("en" => $title);

        if (!is_null($message))
            $fields['contents'] = array("en" => $message);

        if (!is_null($data))
            $fields['data'] = $data;

        $fields = json_encode($fields);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
            'Authorization: Basic Y2VhOTRlNDctNDIxYy00YWI4LTljYWEtM2M3NTUxODk0NzFk'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
