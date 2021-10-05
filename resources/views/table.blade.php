@extends('layouts.app')

@section('content')
    
<?php 
  $entre = $recettes["entrees"];
  $plat = $recettes["plats"];
  $dessert = $recettes["desserts"];
?>

<div class="container table-responsive py-5"> 
    <table class="table table-bordered table-hover">
      <thead class="thead-dark">
        <tr>
            @foreach ($days as $day)
               <th scope="col"> {{ $day }} </th>
            @endforeach
        </tr>
      </thead>
      <tbody>
        @for ($j = 1; $j <= 2; $j++) 
        <tr>
        @for ($i = 1; $i <= 7; $i++) 
        
          <td>
          <h3>entree</h3>
          <?php echo $entre[$i]->nom?>
          <hr>
          <h3>plat</h3>
          <?php echo $plat[$i]->nom?>
          <hr>
          <h3>dessert</h3>
          <?php echo $dessert[$i]->nom?>  
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