@extends('layouts.app')
@section('title')
    Admin
@endsection
@section('content')
<div class="container">
<table class="table">
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Slug</th>
        <th scope="col">Image</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
         <tr>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->slug}}</td>
            <td>{{$post->image}}</td>
            <td><a href="{{route('admin.posts.show', $post->id)}}" target="_blank">View Post</a></td>
            <td><a href="{{route('admin.posts.edit', $post->id)}}" target="_blank">Edit Post</a></td>
            <td><form action="{{route("admin.posts.destroy", $post->id)}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="btn btn-primary">Delete Post</button>
                </form>
            </td>
         </tr>
        @endforeach
    </tbody>
  </table>
  <a href="{{route('admin.posts.create')}}" target="_blank">Create Post</a>
</div>

@endsection