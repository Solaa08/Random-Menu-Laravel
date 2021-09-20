<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecetteRequest;
use Illuminate\Http\Request;
use App\Models\Recette;

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

        return view('indexrecette', compact('recettes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('createrecette'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RecetteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecetteRequest $request)
    {
        $recette = Recette::create([
            'nom'=>$request['name'],
            'url'=>$request['url'],
            'ingredient'=>$request['ingredient_id'],
            'user_id'=>auth()->user()->getAuthIdentifier()
        ]);

        return redirect('recette')->with('success', 'Recette crée avec succès');
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
        
        return response(view('edit', compact('recette')));
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
        return redirect('/recette')->with('success', 'Recette mis à jour avec succès');
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

        return redirect('/recette')->with('success', 'Recette supprimé avec succès');
    }
}
