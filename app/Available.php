<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Available extends Model
{
    protected $guarded = [];

    public function consultant(){
        return $this->belongsTo(Consultant::class);
    }
}
