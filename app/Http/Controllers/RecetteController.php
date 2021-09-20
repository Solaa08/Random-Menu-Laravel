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
            $url = "<a href='".$request['url']."'>".$request['url']."</a>";

            $recette = Recette::create([
                'nom'=>$request['name'],
                'url'=>$url,
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

            return response(redirect('recette')->with('success', 'Recette crée avec succès'));
        }
        else{
            return response(redirect('recette')->with('error', 'Type de recette inconnu.'));
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
        //
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

        return response(view('recettes.edit', compact('recette')));
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
        $recette = Recette::where('id', $id)->update([
            'nom'=>$request['name'],
            'url'=>$request['url'],
            'ingredient'=>$request['ingredient_id'],
            'user_id'=>auth()->user()->getAuthIdentifier()
        ]);
        return response(redirect('recette')->with('success', 'Recette mis à jour avec succès'));
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

        return response(redirect('recette')->with('success', 'Recette supprimé avec succès'));
    }
}
