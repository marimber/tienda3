@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($posts as $post)
            <article id="{{ $post->id }}">
                <header>
                    <a href="{{ action('PostController@show', $post->id) }}">
                        <h2 class="text-dark">{{ $post->title }}</h2>
                    </a>
                </header>
                <div class="post-content">
                    <a href="{{ action('PostController@show', $post->id) }}">
                        <img src="{{ asset('images/' . $post->img) }}" class="img-fluid" alt="Aqui va una imagen">
                    </a>
                </div>
                <hr/>
            </article>
            @endforeach
        </div>
    </div>
</div>
@endsection