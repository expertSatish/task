@extends('layouts.app')

@section('content')

<div class="container">
    <div>
        <h5>{{$blog->title}}</h5>
    </div>
    <div class="row">
        <img class="card-img-top" src="{{asset($blog->image)}}" alt="Card image" style="width:100%" height="400px">
    </div>
    <div class="row p-5">
        <h5>Description</h5>
        <p>{{$blog->content}}</p>
    </div>
</div>
    @endsection