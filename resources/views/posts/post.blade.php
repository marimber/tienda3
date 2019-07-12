@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <img src="{{ asset('images/' . $post->img) }}" alt="Aqui ira la imagen">

           

            <form action="{{ route('destroy', $post) }}" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-danger btn-x5" value="Eliminar"></input>
            </form>



            <p>Creado el: {{ $post->created_at->toFormattedDateString() }}</p>
            <form action="{{ action('CommentController@store' , ['post_id' => $post->id]) }}" method="POST" 
            enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="content">{{ __('addComment') }}</label>
                    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('comment') }}</button>
            </form>
            @foreach ($post->comments as $comment)
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $comment->user->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $comment->created_at->
                        toFormattedDateString() }}</h6>
                        <p class="card-text">{{ $comment->content }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection