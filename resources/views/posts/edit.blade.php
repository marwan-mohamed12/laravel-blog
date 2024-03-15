@extends('layout.app')
@section('title', "Edit Post")
@section('content')
<div class="row justify-content-md-center py-3 py-md-5">
    <div class="col-12 col-md-11 col-lg-8 col-xl-7 col-xxl-6">
        <div class="bg-white p-4 p-md-5 rounded shadow-sm">
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <h2 class="h3">Edit Post</h2>
                    </div>
                </div>
            </div>
            <form action="{{route('posts.update', $post->id)}}" method="POST">
                @csrf
                @method("PUT")
                <div class="row gy-3 gy-md-4 overflow-hidden">
                    <div class="col-12">
                        <label for="id" class="form-label">Id <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="id" id="id" placeholder="Id" value="{{$post->id}}"
                            disabled />
                    </div>
                    <div class="col-12">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title"
                            value="{{$post->body}}" required />
                    </div>
                    <div class="col-12">
                        <label for="body" class="form-label">Body <span class="text-danger">*</span></label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                style="height: 100px" name="body">{{$post->body}}</textarea>
                            <label for="floatingTextarea2">Write Post Body</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="enabledSelect" class="form-label">Enabled</label>
                        <select id="enabledSelect" class="form-select" name="enabled">
                            {{$post->enabled}}
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <input type="submit" value="submit" class="col-12 btn btn-primary" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection