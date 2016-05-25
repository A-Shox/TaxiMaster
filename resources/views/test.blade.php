<?PHP
function sendMessage(){
    $content = array(
            "en" => "This is message.\nHello"
    );

    $fields = array(
            'app_id' => "ba174870-887c-4f28-bd92-f50cec6692f4",
            'data' => array("foo" => "bar"),
            'include_player_ids' => array('1ddb4fa7-9c9d-4251-a35f-61b3bed73a6e'),
            'contents' => $content
    );

    $fields = json_encode($fields);
//    print("\nJSON sent:\n");
//    print($fields);

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

$response = sendMessage();
//    $return["allresponses"] = $response;
//$return = json_encode( $return);

//print("\n\nJSON received:\n");
//print($return);
//print("\n");

print_r($response)
?>