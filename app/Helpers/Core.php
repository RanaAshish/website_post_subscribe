<?php

if (!function_exists('responseFormat')) {
    function responseFormat($message,$data,$status_code)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
            'status_code' => $status_code
        ], $status_code);
    }
}
