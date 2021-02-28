<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConsultantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $availables = [];

        foreach($this->availables->groupBy('available_date') as $key => $value){
            $availables[] =  [
                'date' => $key,
                'times' => AvailableResource::collection($value)
            ];
        }
        
        return [
            'id'           => $this->id,
            'name'         => $this->name,
            'address'      => $this->address,
            'bio'          => $this->bio,
            'image'        => $this->image_path ,
            'phone'        => $this->phone,
            'experince'    => $this->experince,
            'lat'          => $this->lat,
            'lng'          => $this->lng,
            'map_link'     => $this->map_link,
            'rate'         => $this->rate,
            'rates'        => RateResource::collection($this->rates),
            'available_in' => count ($availables) > 0 ? $availables : null ,//collect($availables)->values()->all()
            'badges'       => $this->badges,
            'cost'         => $this->cost,
            'discount'     => $this->discount,
            'total_cost'   => discount($this->cost, $this->discount),
            'distance'             => $this->distance ?? null

        ];
    }
}
