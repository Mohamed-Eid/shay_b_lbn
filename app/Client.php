<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected  $appends = ['image_path'];

    protected $guarded = [];

    public  function getImagePathAttribute(){
        return asset('uploads/clients/'.$this->image);
    }

    public function visits(){
        return $this->hasMany(Visit::class);
    }

    public function calc_age(){
        $now = Carbon::now();
        $dob = Carbon::parse($this->age);
        return $dob->diffInYears($now);
    }

}
