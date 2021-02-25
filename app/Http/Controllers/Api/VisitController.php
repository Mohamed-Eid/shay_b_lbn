<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VisitDetailResource;
use App\Http\Resources\VisitResource;
use App\Traits\ApiResponse;
use App\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VisitController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->successResponse(VisitDetailResource::collection($request->client->visits), null , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'consultant_id'        => 'required',
            'available_id'         => 'required',
        ]);

        if($validate->fails())
        {
            return $this->errorResponse($validate->errors()->all(), 200);
        }

        $client = $request->client;

        $data = $request->all();
        
        $data['client_id'] = $client->id;
        
        $visit = Visit::create($data);

        if($visit)
        {            
            return $this->successResponse( new VisitResource($visit), null , 201);
        }

        return $this->errorResponse( [__('api.back_end_error')] ,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($visit)
    {   $visit = Visit::find($visit);
        return $visit ? $this->successResponse( new VisitDetailResource($visit), null , 200) :  $this->errorResponse( [__('api.not_found')] ,404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $visit)
    {
        $visit = Visit::find($visit);
        if(!$visit){
            $this->errorResponse( [__('api.not_found')] ,404);
        }

        $visit->update([
            'available_id' => $request->available_id
        ]);

        return $this->successResponse( new VisitDetailResource($visit), null , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visit $visit)
    {
        $visit->delete();
        return $this->successResponse(  200);
    }
}
