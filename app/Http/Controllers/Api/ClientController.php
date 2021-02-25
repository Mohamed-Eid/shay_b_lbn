<?php

namespace App\Http\Controllers\Api;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{

    use ApiResponse;


    public function index(){
        return ClientResource::collection(Client::all());
    }

    public function register(Request $request)
    {

        $validate = Validator::make($request->all(),[
            'name'        => 'required',
            'age'         => 'required',
            'gender'      => 'required',
            'status'      => 'required',
            'mobile'      => 'required|unique:clients',
            'password'    => 'required|confirmed',
        ]);

        if($validate->fails())
        {
            return $this->errorResponse($validate->errors()->all(), 200);
        }

        $data = $request->except(['password', 'password_confirmation' ]);
        
        $data['password'] = bcrypt($request->password);
        
        $data['api_token']  = \Illuminate\Support\Str::random(100);
        
        if($request->has('image') && $request->image != "" ){
            $data['image'] = upload_image_base64('clients',$request->image);
        }

        $client = Client::create($data);

        if($client)
        {            
            return $this->successResponse( new ClientResource($client), null , 201);
        }

        return $this->errorResponse( __('api.back_end_error') ,200);
    }

    public function login(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'mobile' => 'required',
            'password' => 'required',
        ]);

        if($validate->fails())
        {
            return $this->errorResponse($validate->errors()->all(), 200);
        }
        
        $client = Client::where('mobile',$request->mobile)->first();

        if($client)
        {
            if(Hash::check($request->password, $client->password))
            {
                $client->api_token = \Illuminate\Support\Str::random(100);
                $client->save();
                return $this->successResponse(new ClientResource($client), null ,200);
            }              
        }
        return $this->errorResponse([__('auth.failed')], 200);

    }


    public function profile(Request $request)
    {
        $client = $request->client;

        return $this->successResponse( new ClientResource($client), null ,200);
    }


    public function update(Request $request)
    {
        $client = $request->client;
        $rules = [
            'name'        => 'required',
            'status'      => 'required',          
            'age'         => 'required',          
            'gender'      => 'required',          
            ];
        $rules += [
            'mobile' => ['required' ,Rule::unique('clients','mobile')->ignore($client->mobile,'mobile')],
            'email'  => [Rule::unique('clients','email')->ignore($client->email,'email')]
        ];
        
        $validate = Validator::make($request->all(),$rules);

        if($validate->fails())
        {
            return $this->errorResponse($validate->errors()->all() );
        }
        
        $data = $request->except(['image']);

        if($request->has('image') && $request->image != null){
            delete_image('clients',$client->image);
            $data['image'] = upload_image_base64('clients',$request->image);
        }

        $client->update($data);
        
        return $this->successResponse(new ClientResource($client));
    }

    public function update_fcm(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'fcm_token' => 'required',
        ]);

        if($validate->fails())
        {
            return $this->errorResponse($validate->errors()->all());
        }
        

        $client = $request->client;

        $client->update([
            'fcm_token' => $request->fcm_token
        ]);
        return $this->successResponse(new ClientResource($client));

    }
    

    public function change_password(Request $request)
    {
        //validateion
        $validate = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password'     => 'required',
        ]);
        if($validate->fails())
        {
            return $this->errorResponse($validate->errors()->all());
        }


        $client = $request->client;

        if(Hash::check($request->old_password, $client->password))
        {
            $client->update([
                'password' => bcrypt($request->new_password),
            ]);
            return $this->successResponse( null , null ,200);
        }
        return $this->errorResponse( [__('api.wrong_password')]);
    }

}
