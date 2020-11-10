@extends('layouts.app')
@section('title')
    Create Post
@endsection
@section('content')
<div class="container">
  <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="form-group">
      <label for="title">Title</label>
      <input type="title" name="title" class="form-control" id="title" placeholder="insert your title">
    </div>
    <div class="form-group">
      <label for="slug">Slug</label>
      <input type="slug" name="slug" class="form-control" id="slug" placeholder="insert your slug">
    </div>
    {{-- <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="insert your password">
      </div> --}}
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" placeholder="insert your description" cols="50" rows="10"></textarea>
    </div>
    {{-- <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control" name="image" id="image" value="image" placeholder="insert image"  accept="image/*">
    </div> --}}
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection
