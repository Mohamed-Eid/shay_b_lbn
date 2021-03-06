<?php

namespace App;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model implements TranslatableContract
{
    use Translatable;
    protected $guarded = [];
    public $translatedAttributes = ['name', 'description'];
}
