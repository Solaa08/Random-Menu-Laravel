<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    public $nb_jours = 7;

    public function index(Request $request)
    {
        if (isset($request["nb_jours"]))
            $this->nb_jours = $request["nb_jours"];
        else
            $this->nb_jours = 7;
        $days = $this->get_days();
        $recettes = $this->random_table();
        // var_dump($recettes["entrees"]);
        return view('table')
            ->with('days',$days)
            ->with('recettes',$recettes)
            ->with("nb_jours",$this->nb_jours);
    }

    public function random_table() {
        //$nb_recettes = $nb_jours*6;
        if ($this->nb_jours > 0){
            $entrees =  DB::table("recette")
                ->where("type","=","Entrée")
                ->inRandomOrder()
                ->limit($this->nb_jours*2+1)
                ->get();

            $plats = DB::table("recette")
                ->where("type","=","Plat")
                ->inRandomOrder()
                ->limit($this->nb_jours*2+1)
                ->get();

            $desserts = DB::table("recette")
                ->where("type","=","Dessert")
                ->inRandomOrder()
                ->limit($this->nb_jours*2+1)
                ->get();

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
        for($i = 0; $i < $this->nb_jours-1; $i++){
            $mytime->add(1, 'day');
            $days[] =  $mytime->translatedFormat("l");
        }
        return $days;
    }

    public function refresh_menu(Request $request){
        /*
        $recette = DB::table('recette')
            ->select('id','nom','url')
            ->where('type','=',$request['type'])
            ->whereNotIn('id',$request['autre_id'])
            ->inRandomOrder()
            ->limit(1)
            ->get();
        */

        $recette = DB::table('recette')
            ->select('id','nom','url')
            ->where('type','=',$request['type'])
            ->inRandomOrder()
            ->limit(1)
            ->get();

        $html =
            "
            <div class='d-flex flex-column'>
            <button class='btn-refresh btn btn-dark float-right' data-type='".$request['type']."'style='width: 2.5rem; height: 2.5rem;'>⟳</button>
                <button
                    class='btn-show btn btn-dark float-right'
                    id='show_btn_".$recette[0]->id."'
                    onclick='showRecette(".$recette[0]->id.")'
                    data-type='Entrée'
                    style='width: 2.5rem; height: 2.5rem;'>👁
                </button>
                <h3>".$request['type']."</h3>
                <p id='recette_title_".$recette[0]->id."'>".$recette[0]->nom."</p>
            </div>
            ";
        return $html;
    }
}
