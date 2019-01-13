@extends('admin.main')
@section('content')
<h2>Create Post</h2>
@include('post.submenu')
<div class="row">
    <div class="col-8">
        @include('common.error')

        {!! Form::open(array('url' => 'post', 'files' => true)) !!}
            <div class="form-group">
            {!! Form::label('category_id', 'Category') !!}
            {!! Form::select('category_id', $categories, ['' => 'Select Category'], array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
            {!! Form::label('title', 'Title') !!}
            {!! Form::text('title', $post->title, array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
            {!! Form::label('author', 'Author') !!}
            {!! Form::text('author', $post->author, array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
            {!! Form::label('short_description', 'Short Description') !!}
            {!! Form::text('short_description', $post->short_description, array('class' => 'form-control')) !!}
            </div>

            <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', $post->description, array('class' => 'form-control')) !!}
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