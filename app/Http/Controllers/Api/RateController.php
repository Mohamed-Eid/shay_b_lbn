<?php

namespace App\Http\Controllers\Api;

use App\Consultant;
use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RateController extends Controller
{
    use ApiResponse;

    public function rate_consultant(Request $request){

        
        $validate = Validator::make($request->all(),[
            'consultant_id' => 'required',
            'rate'          => 'required|min:0|max:5',
        ]);

        if($validate->fails())
        {
            return $this->errorResponse($validate->errors()->all(), 200);
        }

        $consultant = Consultant::find($request->consultant_id);
        
        if(!$consultant){
            return $this->errorResponse( [__('api.not_found')] ,404);
        }

        $data = $request->except(['consultant_id']);
        $data['client_id'] = $request->client->id;
        $data['setting_id'] = 27;

        $rate = $consultant->rates()->create($data);

        if($rate){
            $consultant->update([
                'rate' => number_format(( $consultant->rates->sum('rate') / $consultant->rates->count()), 2, '.', '')
            ]);
            return $this->successResponse( null , 201);
        }

        return $this->errorResponse( [__('api.backend_error')] ,404);
    }
}
