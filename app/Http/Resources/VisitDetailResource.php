<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VisitDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'client'      => new ClientResource($this->client),
            'consultant'  => new ConsultantResource($this->consultant),
            'available'   => new AvailableResource($this->available),
            'payment_method'   => $this->payment_method,
        ];
    }
}
