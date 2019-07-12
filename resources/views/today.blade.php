@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<h2>Nueva Publicacion</h2>
	</div>
	<div class="row justify-content-center mt-3">
	@if ($message = Session::get('success'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">close</button>
				<strong>{{ $message }}</strong>	
		</div>
		<img src="images/{{ Session::get('image') }}">
	@endif
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

		<form action="{{ action('PostController@save') }}" method="POST" enctype="multipart/form-data">
		@csrf
			<div class="for-group row">
				<label for="tittle" class="col-sm-4 col-form-label text-md-rigth">{{ __('Title') }}</label>
				<div class="col-md-6">
					<input id="tittle" type="text" class="form-controlle{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" autofocus />
					@if ($errors->has('title'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('title') }}</strong>
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