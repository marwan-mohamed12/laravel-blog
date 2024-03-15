@extends('layout.app')
@section('title', "Create Post")
@section('content')
<div class="row justify-content-md-center py-3 py-md-5">
    <div class="col-12 col-md-11 col-lg-8 col-xl-7 col-xxl-6">
        <div class="bg-white p-4 p-md-5 rounded shadow-sm">
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <h2 class="h3">Create Post</h2>
                    </div>
                </div>
            </div>
            {{-- @if ($errors->any())
            @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
            @endforeach
            @endif --}}
            <form action="{{route('posts.store')}}" method="POST">
                @csrf
                <div class="row gy-3 gy-md-4 overflow-hidden">
                    <div class="col-12">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title"
                            value="{{old('title')}}" required />
                    </div>
                    <div class="col-12">
                        <label for="body" class="form-label">Body <span class="text-danger">*</span></label>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Write Post Body here" id="floatingTextarea2"
                                style="height: 100px" name="body">{{old('body')}}</textarea>
                            <label for="floatingTextarea2"></label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="enabledSelect" class="form-label">Enabled <span class="text-danger">*</span></label>
                        <select id="enabledSelect" name="enabled" class="form-select" required>
                            {{old('enabled')}}
                            <option value="">Choose 0 or 1</option>
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
