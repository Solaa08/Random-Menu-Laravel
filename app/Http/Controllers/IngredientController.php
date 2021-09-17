<?php

namespace App\Http\Controllers;

use App\Http\Requests\IngredientRequest;
use Illuminate\Http\Request;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $voitures = Ingredient::all();

        return view('indexadmin', compact('ingredients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  IngredientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IngredientRequest $request)
    {
        $ingredient = Ingredient::create([
            'nom'=>$request['name'],
            'type_primaire'=>$request['type_primaire'],
            'type_secondaire'=>$request['type_secondaire'],
            'user_id'=>auth()->user()->getAuthIdentifier()
        ]);

        return redirect('ingredient/indexadmin')->with('success', 'Ingrédient crée avec succès');
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
        $ingredient = Ingredient::findOrFail($id);

        return response(view('edit', compact('ingredient')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IngredientRequest $request, $id)
    {
        return redirect('/ingredient/indexadmin')->with('success', 'Ingrédient mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();

        return redirect('/ingredient/indexadmin')->with('success', 'Voiture supprimée avec succès');
    }
}
