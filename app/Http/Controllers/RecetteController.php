<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecetteRequest;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use App\Models\Recette;
use Illuminate\Support\Facades\DB;

class RecetteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recettes = Recette::all();

        return response(view('recettes.indexrecette', compact('recettes')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ingredients = Ingredient::all("id","nom","type_primaire","type_secondaire");
        return response(view('recettes.createrecette')->with("types",Recette::$type_recette)->with("ingredients",$ingredients));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RecetteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecetteRequest $request)
    {
        if (in_array($request['type'],Recette::$type_recette)){
            $recette = Recette::create([
                'nom'=>$request['name'],
                'url'=>$request['url'],
                'type'=>$request['type'],
                'user_id'=>auth()->user()->getAuthIdentifier()
            ]);

            foreach ($request["ingredient_id"] as $ingre){
                $data[] = array(
                    'ingredient_id'=>$ingre,
                    'recette_id'=>$recette->id
                );
            }

            DB::table("recette_contenu")->insertOrIgnore($data);

            return response(redirect('admin/recette')->with('success', 'Recette crée avec succès'));
        }
        else{
            return response(redirect('admin/recette')->with('error', 'Type de recette inconnu.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ingredients_id = DB::table("recette_contenu")
            ->select("ingredient_id")
            ->where("recette_id",'=',$id)
            ->pluck("ingredient_id");

        /*$ingredients = DB::table("ingredient")
            ->select("nom","type_primaire","type_secondaire")
            ->whereIn("id",$ingredients_id)
            ->get();
        */
        $ingredients = Ingredient::whereIn("id",$ingredients_id)->get();
        return response(view("recettes.tableau_ingredient")->with("ingredients",$ingredients)->with("recette_id",$id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recette = Recette::findOrFail($id);
        $recette_contenu = DB::table('recette_contenu')
            ->where('recette_id','=',$id)
            ->pluck('ingredient_id','ingredient_id');
        $ingredients = Ingredient::all("id","nom","type_primaire","type_secondaire");
        return response(view('recettes.editrecette')
            ->with("types",Recette::$type_recette)
            ->with("ingredients",$ingredients)
            ->with("recette",$recette)
            ->with("recette_contenu",$recette_contenu));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecetteRequest $request, $id)
    {
        if (in_array($request['type'],Recette::$type_recette)){
            $data = array();
            $ingredients_checked = json_decode($request['ingredient_id'],true);
            Recette::where('id', $id)->update([
                'nom'=>$request['name'],
                'url'=>$request['url'],
                'type'=>$request['type'],
                'user_id'=>auth()->user()->getAuthIdentifier()
            ]);
            if (!empty($ingredients_checked)){
                foreach ($ingredients_checked as $ingre){
                    $data[] = array(
                        'ingredient_id'=>intval($ingre),
                        'recette_id'=>intval($id)
                    );
                }
            }
            DB::table("recette_contenu")
                ->where("recette_id",'=',$id)
                ->delete();

            if (!empty($data)){
                DB::table("recette_contenu")
                    ->insert($data);
            }
            return response(redirect('admin/recette')->with('success', 'Recette modifiée avec succès'));
        }
        else{
            return response(redirect('admin/recette')->with('error', 'Recette non mise à jour.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recette = Recette::findOrFail($id);
        $recette->delete();

        return response(redirect('admin/recette')->with('success', 'Recette supprimé avec succès'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function ingredient_destroy(Request $request){
        DB::table("recette_contenu")->where([
            ["recette_id","=",$request['recette_id']],
            ["ingredient_id","=",$request['ingredient_id']],
        ])->delete();

        return response('Ingrédient de la recette supprimé avec succès');
    }
}
