<?PHP
$response1 = \App\Http\Controllers\OneSignalController::sendMessage("Title", "message", array('data'=>'test'), "bd3b492c-59de-4d5f-9ed9-05c7790dc37b", 'DRIVER');
$response2 = \App\Http\Controllers\OneSignalController::sendMessage("Title", "message", array('data'=>'test'), "aac7990a-77ac-4b63-9ef3-664ef962e453", 'DRIVER');

print_r($response1);
print_r($response2);
