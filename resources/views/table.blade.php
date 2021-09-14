<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=Entrée.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
    
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
        <tr>
            <th colspan="7">Midi</th>
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
          <td>Dessert</td>
        </tr>
        <tr>
            <th colspan="7">Soir</th>
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
            <td>Dessert</td>
      </tbody>
    </table>
    </div>