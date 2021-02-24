<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Consultant extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['name', 'address' , 'bio'];
    protected  $appends = ['image_path'];

    protected $guarded = [];

    public $casts = ['badges'=> 'array'];

    public  function getImagePathAttribute(){
        return asset('uploads/consultants/'.$this->image);
    }

    public function availables(){
        return $this->hasMany(Available::class);
    }

    public function visits(){
        return $this->hasMany(Visit::class);
    }
}