@extends('layouts.app')
@section('title')
    Admin Show
@endsection
@section('content')
<div class="container">
  <div class="container-fluid">
    <li>
      @if ($post->image == null)
        <img src="https://via.placeholder.com/350" width="100%" height="500px" alt="image">
      @else
        <img src="{{asset('storage/'.$post->image)}}" alt="">
      @endif
    </li>
    <li class="title_item">Title: {{$post->title}}</li>
</div>
<ul class="container container_flex">
  <h3>Author</h3>
  <li>{{$post->user->name}}</li>
  <h3>Description</h3>
  <li>{{$post->description}}</li>
  <h3>Tags</h3> 
  <li>
    @foreach ($post->tags as $tag)   
      {{$tag->name}}
    @endforeach
  </li>
  <h3>Comments</h3> 
  <li>
    @foreach ($post->comments as $comment)
      {{$comment->content}}
    @endforeach
  </li>
  <li class="flex_bottons">
    <a href="{{route('admin.posts.show', $post->id)}}" target="_blank"><button type="submit" class="btn btn-primary">View Post</button></a>
    <a href="{{route('admin.posts.edit', $post->id)}}" target="_blank"><button type="submit" class="btn btn-primary">Edit Post</button></a>
    <form action="{{route("admin.posts.destroy", $post->id)}}" method="POST">
        @csrf
        @method("DELETE")
        <button type="submit" class="btn btn-primary">Delete Post</button>
    </form>
  </li>
</ul>      
</div>
@endsection