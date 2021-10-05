@extends('layouts.app')

@section('content')

<?php
    $repas = ["Midi","Soir"];
    if (isset($recettes["entrees"],$recettes["plats"],$recettes["desserts"])){
      $entre = $recettes["entrees"];
      $plat = $recettes["plats"];
      $dessert = $recettes["desserts"];
    }
    if (isset($nb_jours)){
        $jours = 0;
        if ($nb_jours < 7){
            $nb_max_jours = $nb_jours;
        }else {
            $nb_max_jours = 7;
        }
    }
?>

<div class="container table-responsive py-5">
    <table class="table table-bordered table-hover">
      <thead class="thead-dark">
        <tr>
            @while($jours < $nb_max_jours)
               <th scope="col"> {{ $days[$jours] }} </th>
                <?php $jours++ ?>
            @endwhile
        </tr>
      </thead>
      <tbody>
        @for ($j = 1; $j <= 2; $j++)
            <tr class="text-center bg-dark">
                <td colspan="{{$nb_max_jours}}">
                    {{$repas[$j-1]}}
                </td>
            </tr>
        <tr>
            @for ($i = 1; $i <= $nb_max_jours; $i++)
                <td>
                    <h3>entree</h3>
                    {{ $entre[$i*$j]->nom}}
                    <hr>
                    <h3>plat</h3>
                    {{ $plat[$i*$j]->nom }}
                    <hr>
                    <h3>dessert</h3>
                    {{ $dessert[$i*$j]->nom }}
                </td>
        @endfor
         </tr>
  @endfor
      {{-- <th colspan="7">Soir</th>
  </tr>
  <tr>
      <td>Entrée</td>
      <td>Entrée</td>
      <td>Entrée</td>
      <td>Entrée</td>
      <td>Entrée</td>
      <td>Entrée</td>
      <td>Entrée</td>
    </tr>
    <tr>
      <td>Plat</td>
      <td>Plat</td>
      <td>Plat</td>
      <td>Plat</td>
      <td>Plat</td>
      <td>Plat</td>
      <td>Plat</td>
    </tr>
    <tr>
      <td>Dessert</td>
      <td>Dessert</td>
      <td>Dessert</td>
      <td>Dessert</td>
      <td>Dessert</td>
      <td>Dessert</td>
      <td>Dessert</td> --}}
      </tbody>
    </table>
    </div>
    @endsection
