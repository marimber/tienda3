@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>Nueva publicacion</h2>
    </div>
    <div class="row justify-content-center mt-3">
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">*</button>
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
        <form action="{{ action('PostController@store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="mb-3">
                <label for="title">{{ __('Title') }}</label>
                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid': '' }}" name="title" value="{{ old('title') }}" autofocus required>
                @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input{{ $errors->has('img') ? ' is-invalid' : '' }}" id="img" name="img" required>
                <label class="custom-file-label" for="img">{{ __('Image') }}</label>
                <div class="invalid-feedback">Example invalid custom file feedback</div>
            </div>
            <button type="submit" class="btn btn-primary">
                {{ __('Create') }}
            </button>
        </form>
    </div>
</div>
@endsection
