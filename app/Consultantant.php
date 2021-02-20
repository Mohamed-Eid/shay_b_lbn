<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Consultantant extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['name', 'address' , 'bio'];
    protected  $appends = ['image_path','header_path',];

    protected $guarded = [];


    public  function getImagePathAttribute(){
        return asset('uploads/consultantants/'.$this->image);
    }

}
