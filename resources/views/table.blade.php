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
        <?php for ($j = 1; $j <= 2; $j++) { ?>
        <tr>
            <th colspan="7"></th>
        </tr>
        <?php for ($i = 1; $i <= 7; $i++) { ?>
        <tr>
          <td><?php echo $entre[$i]->nom?></td>
        </tr>
        <tr>
          <td><?php echo $plat[$i]->nom?></td>
        </tr>
        <tr>
          <td><?php echo $dessert[$i]->nom?></td>
        </tr>
        <?php } ?>
        <tr>
          <?php } ?>
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