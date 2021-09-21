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

  <table class="table table-striped" id="recette_table">

    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>url</th>
            <th>type</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($recettes as $recette)
        <tr>
            <td>{{$recette->id}}</td>
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
                language: {"url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"}
            });
        });
        function show_ingredients(id_recette){
            $.ajax({
                method: "GET",
                url: "recette/show",
                data: { id_recette: id_recette }
            })
                .done(function( contenu_html ) {
                    alert("ok");
                    recette_table.rows.add;
                });
        }
    </script>
@endsection
