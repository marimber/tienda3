@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>Nueva Publicacion</h2>
    </div>
    <div class="row justify-content-center mt-3">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{ $message }}</strong>
        </div>
        <img src="images/{{ Session::get('image') }}">
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with you input.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{ action('PostController@save') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="form-group row">
                <label for="title" class="col-sm-4 col-form-label text-md-right">{{ __('Title') }}</label>
                <div class="col-md-6">
                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" values="{{ old('title') }}" autofocus />
                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="prince" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                <div class="coll-md-6">
                    <input id="img" type="file" class="form-control-file{{ $errors->has('img') ? ' is-invalid' : '' }}" name="img" >
                    @if ($errors->has('img'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('img') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Create') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection