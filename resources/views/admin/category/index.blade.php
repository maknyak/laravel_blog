@extends('admin.layout')
@section('content')
    <h2>Category</h2>
    @include('admin.category.submenu')

    <div class="row">
        <div class="col-12"> 
            @if (Session::has('category_alert'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {!! session('category_alert') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif    

            <table class="table table-sm">
                <thead>
                    <tr>
                        <th colspan="2">Category Name</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($categories) > 0)
                        @foreach($categories as $categori) 
                        <tr>
                            <td>{{ $categori->name }}</td>
                            <td class="text-right">
                                <a class="btn btn-warning btn-sm" href="{{ url('admin/category/'. $categori->id .'/edit') }}">Edit</a>
                                {!! Form::open(array('url' => 'admin/category/'. $categori->id, 'method' => 'DELETE', 'class' => 'd-inline')) !!}
                                {!! csrf_field() !!}
                                {!! method_field('DELETE') !!}
                                <button class="btn btn-danger btn-sm">Delete</button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td class="text-center">No Data</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection