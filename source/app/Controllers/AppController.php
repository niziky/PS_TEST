<?php 
namespace App\Controllers;

class AppController
{
    public function __construct() {
    }

    public function response($status, $errorCode, $errorMsg, $data = null)
    {
        header("Content-Type: application/json");
        $result = [
            'status' => $status, 
            'error_code' => $errorCode,
            'error_msg' => $errorMsg,
            'data' => $data
            ];
        $output = json_encode($result);
        if ($output === false) {
            $output = json_encode(["jsonError" => json_last_error_msg()]);
            if ($output === false) {
                $output = '{"jsonError":"unknown"}';
            }
            http_response_code(500);
        }
        echo $output;die;
    }
}