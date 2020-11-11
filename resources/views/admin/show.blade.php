@extends('layouts.app')
@section('title')
    Admin Show
@endsection
@section('content')
<div class="container">
<table class="table">
    <thead>
      <tr>
        <th scope="col">Author</th>
        <th scope="col">Title</th>
        <th scope="col">slug</th>
        <th scope="col">description</th>
        <th scope="col">image</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
         <tr>
            <td>{{$post->user->name}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->slug}}</td>
            <td>{{$post->description}}</td>
            <td><img src="{{asset('storage/'.$post->image)}}" alt="image" width="400" height="200"></td>
            <td>
               <form action="{{route("admin.posts.destroy", $post->id)}}" method="POST">
                  @csrf
                  @method("DELETE")
                  <button type="submit" class="btn btn-primary">Delete Post</button>
               </form>
            </td>
         </tr>
    </tbody>
  </table>
</div>
@endsection