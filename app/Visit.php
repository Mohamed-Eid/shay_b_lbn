<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $guarded = [];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function consultant(){
        return $this->belongsTo(Consultant::class);
    }

    public function available(){
        return $this->belongsTo(Available::class);
    }
}
