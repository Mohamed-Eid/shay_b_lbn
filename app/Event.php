<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Event extends Model implements TranslatableContract
{
    use Translatable;
    protected $guarded = [];
    public $translatedAttributes = ['name', ];

    protected  $appends = ['image_path',];

    public  function getImagePathAttribute(){
        return asset('uploads/events/'.$this->image);
    }

    public function user(){
        return $this->belongsTo(user::class);
    }
    
    public function instructor(){
        return $this->belongsTo(Instructor::class);
    }


    public function event_features(){
        return $this->hasMany(EventFeature::class);
    }
}
