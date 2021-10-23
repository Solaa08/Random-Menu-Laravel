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
                        <div class="d-flex flex-column" id="refresh_menu_div_{{$repas[$j-1]}}_{{$i}}_entree">
                            <div class="d-flex flex-row justify-content-around">
                                <button
                                    class="btn-refresh btn btn-dark float-right"
                                    id="refresh_menu_btn_{{$entre[$i*$j]->id}}"
                                    data-type="Entrée"
                                    style="width: 2.5rem; height: 2.5rem;">⟳
                                </button>
                                <button
                                    class="btn-show btn btn-dark float-right"
                                    id="show_btn_{{$entre[$i*$j]->id}}"
                                    onclick="showRecette('{{$entre[$i*$j]->id}}')"
                                    data-type="Entrée" style="width: 2.5rem; height: 2.5rem;">👁
                                </button>
                            </div>
                            <br>
                            {{-- <button class="btn btn-dark float-right" id="refresh_menu_btn_{{$entre[$i*$j]->id}}" onclick="refresh_menu('{{$entre[$i*$j]->id}}','Entrée')">+</button> --}}
                            <h3 >Entrée</h3>
                            <p id="recette_title_{{$entre[$i*$j]->id}}">{{ $entre[$i*$j]->nom}}</p>
                        </div>
                        <hr>
                        <div class="d-flex flex-column" id="refresh_menu_div_{{$repas[$j-1]}}_{{$i}}_plat">
                            <div class="d-flex flex-row justify-content-around">
                                <button
                                    class="btn-refresh btn btn-dark float-right"
                                    id="refresh_menu_btn_{{$plat[$i*$j]->id}}"
                                    data-type="Plat"
                                    style="width: 2.5rem; height: 2.5rem;">⟳
                                </button>
                                <button
                                    class="btn-show btn btn-dark float-right"
                                    id="show_btn_{{$entre[$i*$j]->id}}"
                                    onclick="showRecette('{{$plat[$i*$j]->id}}')"
                                    data-type="Entrée"
                                    style="width: 2.5rem; height: 2.5rem;">👁
                                </button>
                            </div>
                            <br>
                            <h3>Plat</h3>
                            <p id="recette_title_{{$plat[$i*$j]->id}}">{{ $plat[$i*$j]->nom }}</p>
                        </div>
                        <hr>
                        <div class="d-flex flex-column" id="refresh_menu_div_{{$repas[$j-1]}}_{{$i}}_dessert">
                            <div class="d-flex flex-row justify-content-around">
                                <button
                                    class="btn-refresh btn btn-dark float-right"
                                    id="refresh_menu_btn_{{$dessert[$i*$j]->id}}"
                                    data-type="Dessert"
                                    style="width: 2.5rem; height: 2.5rem;">⟳
                                </button>
                                <button
                                    class="btn-show btn btn-dark float-right"
                                    id="show_btn_{{$entre[$i*$j]->id}}"
                                    onclick="showRecette('{{$dessert[$i*$j]->id}}')"
                                    data-type="Entrée"
                                    style="width: 2.5rem; height: 2.5rem;">👁
                                </button>
                            </div>
                            <br>
                            <h3>Dessert</h3>
                            <p id="recette_title_{{$dessert[$i*$j]->id}}">{{ $dessert[$i*$j]->nom }}</p>
                        </div>
                    </div>
                </td>
            @endfor
            </tr>
        @endfor
      </tbody>
    </table>

    <div class="container" id="result">

    </div>
</div>


<div id="modal_contenu_recette" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<script type="application/javascript">
  $(".container table").on(
    'click',
    'button.btn-refresh',
    function(e){
        var type = $(e.currentTarget).data('type');
        $.ajax({
            method: "GET",
            url: "table/refresh_menu",
            data: {type:type}
        })
        .done(( contenu_html ) => {
            if (contenu_html !== ""){
                $(e.currentTarget).parent().html(contenu_html);
            }
        });
    }
  )

  function showRecette(id_recette){
      let recette_title = $("#recette_title_"+id_recette).text();
      $.ajax({
          method: "GET",
          url: "table/recette/"+id_recette,
      })
      .done(( contenu_html ) => {
          if (contenu_html !== ""){
              $('#modal_contenu_recette').modal('toggle')
              $(".modal-title").html('Ingrédients de la recette : '+recette_title);
              $(".modal-body").html(contenu_html);
          }
      });
  }

</script>
@endsection
