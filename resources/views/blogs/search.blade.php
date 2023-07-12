@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($blogs as $blog)
        <div class="col-4">
            <div class="card p-4">
                <a style="text-decoration: none;" href="{{url('blog-detail',$blog->slug)}}"><img class="card-img-top"
                        src="{{asset($blog->image)}}" alt="Card image" style="width:100%"></a>
                <div class="card-body">
                    <a style="text-decoration: none;" href="{{url('blog-detail',$blog->slug)}}">
                        <h4 class="card-title">{{$blog->title}}</h4>
                    </a>
                    <p class="card-text">{{$blog->content}}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
