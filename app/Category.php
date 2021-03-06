<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
class Category extends Model  implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['name'];
    protected  $appends = ['image_path',];

    protected $guarded = [];

    public  function getImagePathAttribute(){
        return asset('uploads/categories/'.$this->image);
    }
}
