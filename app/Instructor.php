<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['name','bio'];

    protected $guarded = [];

    protected  $appends = ['image_path',];

    public  function getImagePathAttribute(){
        return asset('uploads/instructors/'.$this->image);
    }

    public function words(int $words_count){
        return \Illuminate\Support\Str::limit(\Illuminate\Support\Str::words(strip_tags($this->bio) , $words_count), 20, '...') ;
    }
}
