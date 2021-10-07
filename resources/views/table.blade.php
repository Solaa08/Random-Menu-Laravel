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
            <tr class="text-center">
                <td colspan="{{$nb_max_jours}}">
                    {{$repas[$j-1]}}
                </td>
            </tr>
            <tr>
            @for ($i = 1; $i <= $nb_max_jours; $i++)
                <td>
                    <div>

                    </div>
                    <div>
                        <div id="refresh_menu_div_{{$repas[$j-1]}}_{{$i}}_entree">
                            <button class="btn-refresh btn btn-dark float-right" id="refresh_menu_btn_{{$entre[$i*$j]->id}}" data-type="Entrée">+</button>
                            {{-- <button class="btn btn-dark float-right" id="refresh_menu_btn_{{$entre[$i*$j]->id}}" onclick="refresh_menu('{{$entre[$i*$j]->id}}','Entrée')">+</button> --}}
                            <h3>Entrée</h3>
                            {{ $entre[$i*$j]->nom}}
                        </div>
                        <hr>
                        <div id="refresh_menu_div_{{$repas[$j-1]}}_{{$i}}_plat">
                            <button class="btn-refresh btn btn-dark float-right" id="refresh_menu_btn_{{$plat[$i*$j]->id}}" data-type="Plat">+</button>
                            <h3>Plat</h3>
                            {{ $plat[$i*$j]->nom }}
                        </div>
                        <hr>
                        <div id="refresh_menu_div_{{$repas[$j-1]}}_{{$i}}_dessert">
                            <button class="btn-refresh btn btn-dark float-right" id="refresh_menu_btn_{{$dessert[$i*$j]->id}}" data-type="Dessert">+</button>
                            <h3>Dessert</h3>
                            {{ $dessert[$i*$j]->nom }}
                        </div>
                    </div>
                </td>
            @endfor
            </tr>
        @endfor
      </tbody>
    </table>
</div>

<script type="application/javascript">

  $(".container table").on(
    'click',
    'button.btn-refresh',
    function(e){
        var type = $(e.currentTarget).data('type');
        console.log(type);
        $.ajax({
            method: "GET",
            url: "table/refresh_menu",
            data: {type:type}
        })
        .done(( contenu_html ) => {
            console.log($(e.currentTarget).parent());
            console.log($(e.currentTarget).parent());
            if (contenu_html !== ""){
                $(e.currentTarget).parent().html(contenu_html);
            }
        });
    }
  )

</script>
@endsection
