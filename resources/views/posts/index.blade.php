@extends('layout.app')
@section('title', 'Blog Page')
@section('content')

<h2 class="my-4">Recent posts</h2>
<div class="row">
    @foreach ($posts as $post)
    <div class="col-md-4 mb-4">
        <div class="card">
            <img class="card-img-top" src="{{Storage::disk('public')->url($post->thumbImage)}}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{mb_strimwidth($post->title, 0, 20) }}</h5>
                <p class="card-text">{{mb_strimwidth($post->body, 0, 40)}}</p>
                <a href="{{ url("/posts/{$post->id}") }}" class="btn btn-primary">Read More
                    &rarr;</a>
            </div>
        </div>
    </div>
    @endforeach

</div>
@include('includes.Pagination', ['items' => $posts])
@endsection