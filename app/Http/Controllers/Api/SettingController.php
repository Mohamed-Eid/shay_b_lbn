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
            'rate_question'   => \App\Setting::find(27)->value,
            "whatsapp"        => "http://wa.me/201275262482",
            "facebook"        => "https://www.facebook.com/",
            "twitter"         => "https://twitter.com/medoeid50",
            "contact_image"   =>get_setting_by_key('about_image')->image_path ?? null,
        ];
        
        return $this->successResponse( $data ,null, 200);
    }
}
