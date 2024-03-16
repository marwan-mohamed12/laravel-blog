@extends('layout.app')
@section('title', 'Users List')
@section('content')
@include('components.Pagination', ['items' => $users])
<div class="table-responsive">
    <table class="table table-fit table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">Posts Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->posts_count}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection