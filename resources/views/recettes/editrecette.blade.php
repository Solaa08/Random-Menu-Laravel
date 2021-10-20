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

         <form method="post" action="{{ route('recette.update', $recette->id ) }}" id="recette_update">
         <input type="hidden" name="ingredient_id" id="ingredient_id">
         <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Nom :</label>
              <input type="text" class="form-control" name="name" value="{{ $recette->nom }}"/>
          </div>

          <div class="form-group">
              <label for="cases">URL :</label>
              <input type="text" class="form-control" name="url" value="{!! $recette->url !!}"/>
          </div>

          <div class="form-group">
              <label for="type">Type</label>
              <select class="form-control" id="type" name="type">
                  <option value="">Selectionnez un type</option>
                  @foreach($types as $type)
                      @if($recette->type === $type)
                          <option selected value="{{$type}}">{{$type}}</option>
                      @else
                          <option value="{{$type}}">{{$type}}</option>
                      @endif
                  @endforeach
              </select>
          </div>
<!--
          <div class="form-group">
              <label for="ingredient_id">ID de l'ingrédient:</label>
              <input type="text" class="form-control" id="ingredient_id" name="ingredient_id"/>
          </div>
-->
          <table class="table table-striped dt-responsive" id="ingredient_select">

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
                      @if(isset($recette_contenu[$ingredient->id]))
                        <td><input checked type="checkbox" name="ingredient_check[]" value="{{$ingredient->id}}"></td>
                      @else
                        <td><input type="checkbox" name="ingredient_check[]" value="{{$ingredient->id}}"></td>
                      @endif
                  </tr>
              @endforeach
              </tbody>
          </table>

          <button type="submit" class="btn btn-primary">Ajouter</button>
          <a class="float-right" href="{{ url('admin/recette') }}">Retour</a>
      </form>
  </div>
</div>
@endsection

@section('script')
<script type="application/javascript">
    $(document).ready(function() {
        let table = $('#ingredient_select').DataTable({
            responsive: {
                details: true
            },
            language: {"url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/French.json"},
        });

        let checkedVals = $('input[name="ingredient_check[]"]:checkbox:checked').map(function() {
            return this.value;
        }).get();
        console.log(checkedVals);
        $('#recette_update').submit(function(event) {
            //checkboxes should have a general class to traverse
            let rowcollection = table.$("input:checked", {"page": "all"});

            //Now loop through all the selected checkboxes to perform desired actions
            let checkedVals = [];
            rowcollection.each(function(index,elem){
                //You have access to the current iterating row
                checkedVals.push($(elem).val());
                //Do something with 'checkbox_value'
            });

            let checkedVals_json = JSON.stringify(checkedVals);
            console.log(checkedVals);
            $('#ingredient_id').val(checkedVals_json);
        });

    });
</script>

@endsection
