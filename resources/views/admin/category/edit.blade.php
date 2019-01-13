@extends('admin.main')
@section('content')
<h2>Edit Category</h2>
@include('category.submenu')

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