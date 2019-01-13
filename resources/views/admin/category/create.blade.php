@extends('admin.layout')
@section('content')
<h2>Add Category</h2>
@include('admin.category.submenu')

<div class="row">
    <div class="col-6">
        @include('admin.common.error')

        {!! Form::open(array('url' => 'admin/category')) !!}
            <div class="form-group">
            {!! Form::label('name', 'Category Name') !!}
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
            </div>
            {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection