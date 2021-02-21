<?php

namespace App\Http\Controllers\Dashboard;

use App\Available;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvailableController extends Controller
{
    public function destroy(Available $available)
    {

        $available->delete();
        
        return 'done';
    }
}
