@extends('layouts.layout_admin')

@section('content')
    <h2>cacac {{$ingredients->count()}}</h2>
        @foreach($ingredients as $ingredient)
            <h2>{{$ingredients->id}}</h2>
        @endforeach
@endsection
