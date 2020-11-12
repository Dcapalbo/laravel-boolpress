@extends('layouts.app')
@section('title')
    Admin
@endsection
@section('content')
<div class="container">
<table class="table">
    {{-- <thead>
      <tr>
        <th scope="col">Author</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Slug</th>
        <th scope="col">Image</th>
        <th scope="col">Actions</th>
      </tr>
    </thead> --}}
    <tbody>
        @foreach ($posts as $post)
         <tr class="table_flex">
            <th>Author</th>
            <td>{{$post->user->name}}</td>
            <th>Title</th>
            <td>{{$post->title}}</td>
            <th>Description</th>
            <td>{{$post->description}}</td>
            <td>{{$post->comments->content}}</td>
            <td><img src="{{asset('storage/'.$post->image)}}" src="{{asset('http://via.placeholder.com/400x200')}}" width="400" height="200"></td>
            <td class="flex_bottons">
              <a href="{{route('admin.posts.show', $post->id)}}" target="_blank"><button type="submit" class="btn btn-primary">View Post</button></a>
              <a href="{{route('admin.posts.edit', $post->id)}}" target="_blank"><button type="submit" class="btn btn-primary">Edit Post</button></a>
              <form action="{{route("admin.posts.destroy", $post->id)}}" method="POST">
                  @csrf
                  @method("DELETE")
                  <button type="submit" class="btn btn-primary">Delete Post</button>
              </form>
            </td>
         </tr>
        @endforeach
    </tbody>
  </table>
  <a href="{{route('admin.posts.create')}}" target="_blank"><button type="submit" class="btn btn-primary">Create Post</button></a>
</div>
@endsection
