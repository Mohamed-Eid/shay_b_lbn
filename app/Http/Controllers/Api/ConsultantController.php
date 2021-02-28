<?php

namespace App\Http\Controllers\Api;

use App\Consultant;
use App\Http\Controllers\Controller;
use App\Http\Resources\ConsultantResource;
use App\Traits\ApiResponse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultantController extends Controller
{
    use ApiResponse;

    public function index(){
        return $this->successResponse(ConsultantResource::collection(Consultant::all()));
    }

    public function search(Request $request){
        $consultants = Consultant::when($request->search , function ($q) use ($request){
            return $q->whereTranslationLike('name','%'.$request->search.'%');
        })->latest()->get();
        
        return $this->successResponse(ConsultantResource::collection($consultants));
    }

    public function filter(Request $request){
        return [
            "recent"        => $this->successResponse(ConsultantResource::collection(Consultant::latest()->get())) ,
            "rate"          => $this->successResponse(ConsultantResource::collection(Consultant::OrderBy("rate","desc")->get())),
            "certificated"  => $this->successResponse(ConsultantResource::collection($this->get_certificated())),
            "location"  => $this->successResponse(ConsultantResource::collection($this->get_nearest($request->lat,$request->lng))),
        ][$request->type];
    }

    private function get_nearest($lat , $lng){

        $consultants    =    DB::table("consultants");
        $consultants    =    $consultants->select("*", DB::raw("6371 * acos(cos(radians(" . $lat . "))
        * cos(radians(lat)) * cos(radians(lng) - radians(" . $lng . "))
        + sin(radians(" .$lat. ")) * sin(radians(lat))) AS distance"));
        $consultants   =   $consultants->orderBy('distance', 'asc')->get();

        // return $consultants;

    
        $data = [];
        foreach ($consultants as $key => $consultant) {
            $data[] = Consultant::find($consultant->id);
        }
        return $data;
    }

    private function get_certificated(){
        $items = Consultant::all();
        $consultants = [];
        foreach($items as $item){
            if(in_array("certificated",$item->badges)){
                $consultants[] = $item;
            }
        }
        return $consultants ;
    }

    public function show(Consultant $consultant){
        return $this->successResponse(new ConsultantResource($consultant));
    }
}
