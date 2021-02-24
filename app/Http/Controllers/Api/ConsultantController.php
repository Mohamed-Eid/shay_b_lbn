<?php

namespace App\Http\Controllers\Api;

use App\Consultant;
use App\Http\Controllers\Controller;
use App\Http\Resources\ConsultantResource;
use App\Traits\ApiResponse;

use Illuminate\Http\Request;

class ConsultantController extends Controller
{
    use ApiResponse;

    public function index(){
        return $this->successResponse(ConsultantResource::collection(Consultant::all()));
    }
    public function show(Consultant $consultant){
        return $this->successResponse(new ConsultantResource($consultant));
    }
}
