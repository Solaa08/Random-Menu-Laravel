@extends('layout')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="uper">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif

  @if(session()->get('error'))
      <div class="alert alert-danger">
          {{ session()->get('error') }}
      </div><br />
  @endif

      <div id="toto">
          <button onclick="show_ingredients('1')">CLIQUEZ</button>
      </div>

  <table class="table table-striped table-bordered dt-responsive nowrap" id="recette_table" style="width: 100em">

    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">URL</th>
            <th scope="col">Type</th>
            <th scope="col">Action</th>
            <th scope="col">Ingrédients contenus dans la recette :</th>
        </tr>
    </thead>

    <tbody>
        @foreach($recettes as $recette)
        <tr>
            <td class="text-center" onclick="show_ingredients('{{$recette->id}}')">{{$recette->id}}</td>
            <td>{{$recette->nom}}</td>
            <td>{!! $recette->url !!}</td>
            <td>{{$recette->type}}</td>
            <td>
                <a href="{{ route('recette.edit', $recette->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>Modif</a>
                <button onclick="show_ingredients('{{$recette->id}}')" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i>Voir</button>
                <form action="{{ route('recette.destroy', $recette->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i>Supp</button>
                </form>
            </td>
            <td id="table_ingredients_{{$recette->id}}" >
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <a href="recette/create"><button class="btn btn-primary">Ajouter</button></a>
<div>
@endsection

@section('script')
    <script type="application/javascript">
        $(document).ready(function() {
            let recette_table = $('#recette_table').DataTable({
                responsive: true,
                language: {"url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"}
            });
        });

        function show_ingredients(id_recette){
            $.ajax({
                method: "GET",
                url: "recette/"+id_recette,
            })
            .done(function( contenu_html ) {
                let name = "#table_ingredients_"+id_recette;
                $(name).html("<h2>SALUT</h2>");
            });
        }

    </script>
@endsection
