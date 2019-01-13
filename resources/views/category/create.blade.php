@extends('admin.main')
@section('content')
<h2>Add New Category</h2>
@include('category.submenu')

<div class="row">
    <div class="col-6">
        @include('common.error')

        {!! Form::open(array('url' => 'category')) !!}
            <div class="form-group">
            {!! Form::label('name', 'Category Name') !!}
            {!! Form::text('name', null, array('class' => 'form-control')) !!}
            </div>
            {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection