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

  <table class="table table-striped">

    <thead>
        <tr>
          <td>ID</td>
          <td>Type</td>
          <td>Nom</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>

    <tbody>
        @foreach($ingredients as $ingredient)
        <tr>
            <td>{{$ingredient->id}}</td>
            <td>{{$ingredient->type}}</td>
            <td>{{$ingredient->name}}</td>
            <td><a href="{{ route('ingredient.edit', $ingredient->id)}}" class="btn btn-primary">Modifier</a></td>
            <td>
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
<div>
@endsection
