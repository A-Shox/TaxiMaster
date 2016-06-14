<?PHP
$response = \App\Http\Controllers\OneSignalController::sendMessage("Title", "message", array('data'=>'test'), "bd3b492c-59de-4d5f-9ed9-05c7790dc37b", 'DRIVER');
print_r($response);
