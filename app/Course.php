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
    public function branch(){
        return $this->belongsTo(Branch::class);
    }

    public function sections(){
        return $this->hasMany(Section::class);
    }

    public function videos(){
        return $this->hasMany(Video::class);
    }
}
