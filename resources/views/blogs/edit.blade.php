@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Blog</a></div>

                <div class="card-body">

                    <form method="post" class="form-inline" action="{{route('blog.update',$data->id)}}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="Title">Title</label>
                        <input type="text" class="form-control" name="title" value="@if(old('title')){{ old('title') }}@elseif($data){{$data->title}}@endif" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="Content">Content</label>
                        <textarea type="text" class="form-control" placeholder="Content" name="content" >@if(old('content')){{ old('content') }}@elseif($data){{$data->content}}@endif</textarea>
                    </div>
                    <div class="form-group">
                        <label for="Content">Image</label>
                        <input type="file" class="form-control"  name="image">
                        <img src="{{asset($data->image)}}" width="100px" height="80px">
                    </div>
                    <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
