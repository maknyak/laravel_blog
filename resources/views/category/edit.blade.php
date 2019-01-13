@extends('admin.main')
@section('content')
<h2>Edit Category</h2>
<ul class="list-inline">
    <li class="list-inline-item"><a href="{{ url('category') }}">View All Category</a></li>
    <li class="list-inline-item"><a href="{{ url('category/create') }}">Create New Category</a></li>
</ul>

<div class="row">
    <div class="col-6">
        @include('common.error')

        {!! Form::model($category, array('route' => array('category.update', $category->id), 'method' => 'PUT')) !!}
            <div class="form-group">
            {!! Form::label('name', 'Category Name') !!}
            {!! Form::text('name', $category->name, array('class' => 'form-control')) !!}
            </div>
            {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection