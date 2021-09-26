{{-- @extends('layouts.layout_admin')

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
@endsection --}}


@extends('layouts.layout_admin')



@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    Modifier une recette
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
              <label for="type">Type</label>
              <select class="form-control" id="type" name="type" value="{{ $recette->type }}">
                  <option selected value="">Selectionnez un type</option>
                  @foreach($types as $type)
                      <option value="{{$type}}">{{$type}}</option>
                  @endforeach
              </select>
          </div>
<!--
          <div class="form-group">
              <label for="ingredient_id">ID de l'ingrédient:</label>
              <input type="text" class="form-control" id="ingredient_id" name="ingredient_id"/>
          </div>
-->
          <table class="table table-striped" id="ingredient_select">

              <thead>
              <tr>
                  <th>Nom</th>
                  <th>Type primaire</th>
                  <th>Type secondaire</th>
                  <th>Action</th>
              </tr>
              </thead>

              <tbody>
              @foreach($ingredients as $ingredient)
                  <tr>
                      <td>{{$ingredient->nom}}</td>
                      <td>{{$ingredient->type_primaire}}</td>
                      <td>{{$ingredient->type_secondaire}}</td>
                      <td><input type="checkbox" name="ingredient_id[]" value="{{$ingredient->id}}"></td>
                  </tr>
              @endforeach
              </tbody>
          </table>

          <button type="submit" class="btn btn-primary">Ajouter</button>
          <a class="float-right" href="/recette">Retour</a>
      </form>
  </div>
</div>
@endsection

@section('script')
<script type="application/javascript">
    $(document).ready(function() {
        $('#ingredient_select').DataTable({
            language: {"url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"}
        });
    });
</script>

@endsection
