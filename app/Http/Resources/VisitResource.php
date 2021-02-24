<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VisitResource extends JsonResource
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
            'client_id'     => (int)$this->client_id,
            'consultant_id' => (int)$this->consultant_id,
            'available'     => new AvailableResource($this->available),
        ];
    }
}
