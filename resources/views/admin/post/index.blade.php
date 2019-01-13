@extends('admin.layout')
@section('content')
<h2>Post</h2>
@include('admin.post.submenu')
<div class="row">
    <div class="col-12">
        @if (Session::has('post_alert'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {!! session('post_alert') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if(count($posts))
                    @foreach($posts as $post) 
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->author}}</td>
                        <td class="text-right">
                            <a class="btn btn-warning btn-sm" href="{{ url('admin/post/'. $post->id .'/edit') }}">Edit</a>
                            {!! Form::open(array('url' => 'admin/post/'. $post->id, 'method' => 'DELETE', 'class' => 'd-inline')) !!}
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button class="btn btn-danger btn-sm">Delete</button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">No Data</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection