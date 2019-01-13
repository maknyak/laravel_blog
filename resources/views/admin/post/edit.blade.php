@extends('admin.layout')
@section('content')
<h2>Edit Post</h2>
@include('admin.post.submenu')
<div class="row">
    <div class="col-8">
        @include('admin.common.error')

        {!! Form::model($post, ['route' => ['post.update', $post->id], 'method' => 'PUT', 'files' => true])!!}
            <div class="form-group">
            {!! Form::label('category_id', 'Category') !!}
            {!! Form::select('category_id', $categories, null, ['placeholder' => 'Select Category', 'class' => 'form-control']) !!}
            </div>

            <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', null, array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
            {!! Form::label('author', 'Author') !!}
            {!! Form::text('author', null, array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
            {!! Form::label('short_description', 'Short Description') !!}
            {!! Form::text('short_description', null, array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', null, array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
            {!! Form::label('image', 'Image') !!}
            {!! Form::file('image', null, array('class' => 'form-control')) !!}
            </div>
            {!! Form::submit('Save', array('class' => 'btn btn-primary')) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection