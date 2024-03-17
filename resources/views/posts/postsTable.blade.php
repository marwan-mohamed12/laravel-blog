@extends('layout.app')
@section('title', 'Posts List')
@section('content')
@include('components.Pagination', ['items' => $posts])
<div class="table-responsive">
    <table class="table table-fit table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Enabled</th>
                <th scope="col">User</th>
                <th scope="col">Published at</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{substr($post->body, 0, 50)}}.....</td>
                <td>{{$post->enabled ? 'Yes' : "No"}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{date("l jS \of F Y h:i:s A", strtotime($post->published_at ))}}</td>
                <td>
                    @if ($post->user_id == Auth::id())
                    <div class="d-flex flex-row mb-3 gap-2">
                        <div>
                            <a href="{{url("posts/{$post->id}/edit")}}" class="btn btn-primary">
                                <i class="material-icons text-light">edit</i>
                            </a>
                        </div>
                        <div>
                            <form action="{{route('posts.destroy', $post->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                {{-- <a type="submit" class="btn btn-danger">
                                    <i class="material-icons text-light">delete</i>
                                </a> --}}
                                <input type="submit" value="delete" class="btn btn-danger text-light">
                            </form>
                        </div>
                    </div>
                    @endif
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection
