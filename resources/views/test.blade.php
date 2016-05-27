<?PHP
$response = \App\Http\Controllers\OneSignalController::sendMessage("Title", "message", array('data'=>'test'), "d57a6412-6fb4-48e4-a8d7-67dd35cedab1", 'DRIVER');
print_r($response);
