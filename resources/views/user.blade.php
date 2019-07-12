@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <h2>Editar Perfil</h2>
    </div>
    <div class="row justify-content-center mt-3">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">*</button>
                <strong>{{ $message }}</strong>
        </div>
        <img src="images/{{ Session::get('image') }}">
    @endif
   
        <form action="{{ action('UserController@update') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="mb-3">
                <label for="title">{{ __('Nombre') }}</label>
                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid': '' }}" name="name" value="{{ Auth::user()->name }}" autofocus required>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="mb-3">
                <label for="email">{{ __('Correo') }}</label>
                <input id="email" type="email" class="form-control{{ $errors->has('title') ? ' is-invalid': '' }}" name="email" value="{{ Auth::user()->email }}" autofocus required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
            
            <button type="submit" class="btn btn-primary">Editar</button>

            
            <a  href="{{ route('userdestroy') }}" class="btn btn-secondary">{{ __('Eliminar') }}
            </a>
        </form>
    </div>
</div>

@endsection