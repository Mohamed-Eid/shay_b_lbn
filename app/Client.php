<?php

namespace App;

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

}
