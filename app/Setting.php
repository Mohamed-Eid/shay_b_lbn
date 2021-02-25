<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['value'];

    protected $guarded = [];
    protected  $appends = ['image_path'];

    public  function getImagePathAttribute(){
        return asset('uploads/settings/'.$this->one_value);
    }

}
