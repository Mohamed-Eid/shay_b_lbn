<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Course extends Model implements TranslatableContract
{
    use Translatable;
    protected $guarded = [];
    public $translatedAttributes = ['name', 'description'];

    protected  $appends = ['image_path',];
    public $casts = ['badges'=> 'array'];

    public  function getImagePathAttribute(){
        return asset('uploads/courses/'.$this->image);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(user::class);
    }
    
    public function instructor(){
        return $this->belongsTo(Instructor::class);
    }


    public function features(){
        return $this->hasMany(Feature::class);
    }
    public function lessons(){
        return $this->hasMany(Lesson::class);
    }


}
