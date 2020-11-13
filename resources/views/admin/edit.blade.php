@extends('layouts.app')
@section('title')
    Create Post
@endsection
@section('content')
<div class="container">
  <form action="{{route('admin.posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="title">Title</label>
      <input type="title" name="title" class="form-control" id="title" placeholder="insert your title" value="{{old("title") ? old("title") : $post->title }}">
    </div>
    <div class="form-group">
      <label for="slug">Slug</label>
      <input type="slug" name="slug" class="form-control" id="slug" placeholder="insert your slug" value="{{old("slug") ? old("slug") : $post->slug}}">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" placeholder="insert your description" cols="50" rows="10">{{old("description") ? old("description") : $post->description}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Edit Post</button>
  </form>
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
</div>
@endsection