@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if(session('success'))
                <h4 class="d-flex justify-content-center" style="color: green;">{{ session('success')}}</h4>
                @endif
                @if(session('failed'))
                <h4 style="color: green; text-align:center mt-4">{{ session('failed')}}</h4>
                @endif
                <div class="card-header">
                    <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                        Blog List</h5>
                    <a href="{{route('blog.create')}}" class="btn btn-primary font-weight-bolder btn-sm">
                        Add New</a>

                    <div class="card-body">
                        <table id="blogTable" class="table table-bordered faculty-dataTable p-2">
                            <thead>
                                <tr>
                                    <td>Title</td>
                                    <th>Content</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $res)
                                <tr>
                                    <td>{{$res->title}}</td>
                                    <td>{{$res->content}}</td>
                                    <td><img width="100px" height="50px" src="{{asset($res->image)}}"></td>
                                    <td>
                                        <a href="{{route('blog.edit',$res->id)}}" class="btn btn-primary mr-2">Edit</a>
                                        <a href="{{route('blog.destroy',$res->id)}}" class="btn btn-danger mr-2">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#blogTable').DataTable();
    });
</script>


@endsection
