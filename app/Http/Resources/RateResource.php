<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RateResource extends JsonResource
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
            'id' => $this->id,
            'rate' => $this->rate,
            'comment' => $this->comment,
            'question' => \App\Setting::find(27)->value,
            'answer' => $this->answer,
        ];
    }
}
