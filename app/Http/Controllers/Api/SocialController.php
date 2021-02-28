<?php

namespace App\Http\Controllers\Api;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SocialController extends Controller
{
    use ApiResponse;

    public function facebook(Request $request){
        $validate = Validator::make($request->all(),[
            'facebook_id' => 'required',
        ]);

        if($validate->fails())
        {
            return $this->errorResponse($validate->errors()->all(), 200);
        }

        $client = Client::where('facebook_id',$request->facebook_id)->first();

        if($client)
        {      
            $client->update([
                'api_token' =>  \Illuminate\Support\Str::random(100)
            ]);     
        }else{
            $data = $request->all();
            $data['api_token'] = \Illuminate\Support\Str::random(100);
            $data['facebook_id'] =  $request->facebook_id;
            $client = Client::create($data);
        }
        return $this->successResponse( new ClientResource($client), null , 200);
    }
    
    public function google(Request $request){
        $validate = Validator::make($request->all(),[
            'google_id' => 'required',
        ]);

        if($validate->fails())
        {
            return $this->errorResponse($validate->errors()->all(), 200);
        }

        $client = Client::where('google_id',$request->google_id)->first();

        if($client)
        {      
            $client->update([
                'api_token' =>  \Illuminate\Support\Str::random(100)
            ]);     
        }else{
            $data = $request->all();
            $data['api_token'] = \Illuminate\Support\Str::random(100);
            $data['google_id'] =  $request->google_id;
            $client = Client::create($data);
        }
        return $this->successResponse( new ClientResource($client), null , 200);
    }
}
