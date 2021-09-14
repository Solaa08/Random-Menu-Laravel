<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class TableController extends Controller
{
    public function index()
    {
        $days = $this->get_days();
        return view('table')->with('days',$days);
    }
    
    public function get_days()
    {
        $mytime = Carbon::now();
        $days[] = $mytime->translatedFormat("l");
        for($i = 0; $i < 6; $i++){
            $mytime->add(1, 'day');
            $days[] =  $mytime->translatedFormat("l");
        }

        return $days;
    }
}
