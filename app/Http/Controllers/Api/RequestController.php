<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Request as AppRequest;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{        
    use ApiResponse ;

    public function store(Request $request)
    {

        $validate = Validator::make($request->all(),[
            'name'       => 'required',
            'email'      => 'required|unique:requests',
            'phone'      => 'required|unique:consultants|unique:requests',
            'address'    => 'required',
            'bio'        => 'required',
        ]);

        if($validate->fails())
        {
            return $this->errorResponse($validate->errors()->all(), 200);
        }

        $data = $request->all();
        

        $app_request = AppRequest::create($data);

        if($app_request)
        {            
            return $this->successResponse(null,null , 201 );
        }

        return $this->errorResponse( __('api.back_end_error') ,200);
    }
}
