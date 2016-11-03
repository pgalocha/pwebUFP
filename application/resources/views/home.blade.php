@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in
                    @if(Auth::user())
                       {{ Auth::user()->name}}
                        @php(Route::get(''))
                        @endif
                    !
                </div>
                <a href="http://localhost:8000/"> Voltar ao HomePage!</a>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
