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

  <table class="table table-striped" id="ingredient_table">
        <thead>
          <tr>
              <th scope="col">ID</th>
              <th scope="col">Nom</th>
              <th scope="col">Type primaire</th>
              <th scope="col">Type secondaire</th>
              <th scope="col">Action</th>
          </tr>
      </thead>

    <tbody>
        @foreach($ingredients as $ingredient)
        <tr>
            <td>{{$ingredient->id}}</td>
            <td>{{$ingredient->nom}}</td>
            <td>{{$ingredient->type_primaire}}</td>
            <td>{{$ingredient->type_secondaire}}</td>
            <td><a href="{{ route('ingredient.edit', $ingredient->id)}}" class="btn btn-primary">Modifier</a>
            
                <form action="{{ route('ingredient.destroy', $ingredient->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  <a href="ingredient/create"><button class="btn btn-primary">Ajouter</button></a>
<div>
  <script>
  $(document).ready(function() {
    let recette_table = $('#ingredient_table').DataTable({
        responsive: true,
        language: {"url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"}
    });
});
</script>
@endsection
