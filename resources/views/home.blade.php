@extends('layouts.layout_client')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-dark">{{ __('Dashboard') }}</div>

                <div class="card-body text-dark">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Vous êtes connectés') }}
                    
                </div>
                
            </div>
            <br>
            <a href="{{ url('table') }}" class="btn btn-lg btn-secondary">Commencer</a>
        </div>
    </div>
</div>
@endsection
