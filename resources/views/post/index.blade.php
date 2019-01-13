@extends('admin.main')
@section('content')
<h2>Posts</h2>
<div class="row">
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if(count($posts))
                    @foreach($posts as $post) 
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->author}}</td>
                        <td><a class="btn btn-warning btn-sm" href="{{ url('post/'. $post->id .'/edit') }}">Edit</a></td>
                        <td>
                            {!! Form::open(array('url' => 'post/'. $post->id, 'method' => 'DELETE')) !!}
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