@extends('layouts.layout_admin')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    Modifier la recette
  </div>

  <div class="card-body">

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

      <form method="post" action="{{ route('recette.update', $recette->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Nom :</label>
              <input type="text" class="form-control" name="name" value="{{ $recette->nom }}"/>
          </div>

          <div class="form-group">
              <label for="cases">URL :</label>
              <input type="text" class="form-control" name="url" value="{{ $recette->url }}"/>
          </div>

          <div class="form-group">
            <label for="cases">ID de l'ingrédient :</label>
            <input type="text" class="form-control" name="ingredient" value="{{ $recette->ingredient_id }}"/>
        </div>
          <button type="submit" class="btn btn-primary">Modifier</button>
      </form>
  </div>
</div>
@endsection
