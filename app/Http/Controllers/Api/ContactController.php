<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;

class ContactController extends Controller
{
    use ApiResponse;

    public function send(Request $request){
        
        $validate = Validator::make($request->all(),[
            'name'        => 'required',
            'email'         => 'required',
            'message'      => 'required',
        ]);

        if($validate->fails())
        {
            return $this->errorResponse($validate->errors()->all(), 200);
        }

        $message = Message::create($request->all());

        if($message)
        {            
            return $this->successResponse( $message, null , 201);
        }

        return $this->errorResponse( __('api.back_end_error') ,200);
    }
}
