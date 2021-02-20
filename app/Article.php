<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['name', 'description'];
    protected  $appends = ['image_path','header_path',];

    protected $guarded = [];


    public function formated_date(){
        return $this->created_at->format('j, M');
    }

    public function words(int $words_count){
        return \Illuminate\Support\Str::words(strip_tags($this->description) , $words_count);
    }

    public function videos()
    {
        return $this->morphMany(Video::class, 'videoable');
    }

    public  function getImagePathAttribute(){
        return asset('uploads/articles/'.$this->image);
    }
    public  function getHeaderPathAttribute(){
        return asset('uploads/articles/'.$this->header);
    }
}
