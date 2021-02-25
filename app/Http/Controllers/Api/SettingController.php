<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

class SettingController extends Controller
{
    use ApiResponse;

    public function index(){
        $data = [
            'rate_question' => \App\Setting::find(27)->value
        ];
        
        return $this->successResponse( $data ,null, 200);
    }
}
