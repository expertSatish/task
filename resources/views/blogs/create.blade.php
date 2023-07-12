@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Blog</a></div>

                <div class="card-body">

                    <form method="post" class="form-inline" action="{{route('blog.store')}}" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                        <label for="Title">Title</label>
                        <input type="text" class="form-control" placeholder="Enter Title" name="title">
                    </div>
                    <div class="form-group">
                        <label for="Content">Content</label>
                        <textarea type="text" class="form-control" placeholder="Enter Content" name="content" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Content">Image</label>
                        <input type="file" class="form-control" name="image">
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
