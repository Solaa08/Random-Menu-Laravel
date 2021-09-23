@extends('layouts.layout_admin')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    Modifier l'ingrédient
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

      <form method="post" action="{{ route('ingredient.update', $ingredient->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Nom :</label>
              <input type="text" class="form-control" name="name" value="{{ $ingredient->nom }}"/>
          </div>

          <div class="form-group">
              <label for="cases">Type primaire :</label>
              <input type="text" class="form-control" name="type_primaire" value="{{ $ingredient->type_primaire }}"/>
          </div>

          <div class="form-group">
            <label for="cases">Type secondaire :</label>
            <input type="text" class="form-control" name="type_secondaire" value="{{ $ingredient->type_secondaire }}"/>
        </div>
          <button type="submit" class="btn btn-primary">Modifier</button>
      </form>
  </div>
</div>
@endsection
