<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    public function index()
    {
        $days = $this->get_days();
        $recettes = $this->random_table(7);
        // var_dump($recettes["entrees"]);
        return view('table')->with('days',$days)->with('recettes',$recettes);
    }

    public function random_table($nb_jours) {
        //$nb_recettes = $nb_jours*6;
        if ($nb_jours > 0){
            $entrees =  DB::table("recette")
                ->where("type","=","Entrée")
                ->inRandomOrder("id")
                ->limit($nb_jours*2)
                ->get();

            $plats = DB::table("recette")
                ->where("type","=","Plat")
                ->inRandomOrder("id")
                ->limit($nb_jours*2)
                ->get();
            ;

            $desserts = DB::table("recette")
                ->where("type","=","Dessert")
                ->inRandomOrder("id")
                ->limit($nb_jours*2)
                ->get();
            ;

            return array(
                "entrees" => $entrees,
                "plats" => $plats,
                "desserts" => $desserts
            );
        }
        else {
            return [];
        }
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
