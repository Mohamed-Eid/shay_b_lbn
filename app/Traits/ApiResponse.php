<?php

namespace App\Traits;


trait ApiResponse{

    protected function successResponse($data, $msg = null, $code = 200){
        return response()->json([
            "success" => true,
            "message" => $msg,
            "data"    => $data
        ], $code);
    }
    
    protected function errorResponse($msg = null, $code = 200){
        return response()->json([
            "success" => false,
            "message" => $msg,
            "data"    => null
        ], $code);
    }
}

?>