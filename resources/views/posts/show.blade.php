@extends('layout.app')
@section('title', $post->title)
@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">{{$post->title}}</h1>
            <p class="text-muted">{{$post->published_at}} by {{$post->user->name}}.</p>
            <img src="https://via.placeholder.com/1000x400" alt="Blog Image" class="img-fluid mb-4">
            <p>{{$post->body}}</p>
        </div>
    </div>
</div>
@endsection
