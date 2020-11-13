@extends('layouts.app')
@section('title')
    Admin
@endsection
@section('content')
  @foreach ($posts as $post)
        <div class="container-fluid">
            <li>
              @if ($post->image == null)
                <img src="https://via.placeholder.com/350" width="100%" height="500px" alt="image">
              @else
                <img src="{{asset('storage/'.$post->image)}}" width="100%" height="500px" alt="image">
              @endif
            </li>
            <li class="title_item">Title: {{$post->title}}</li>
        </div>
        <ul class="container container_flex">
          <h3>Author</h3>
          <li>{{$post->user->name}}</li>
          <h3>Description</h3>
          <li>{{$post->description}}
            <li class="tags">
              @foreach ($post->tags as $tag)   
                {{$tag->name}}
              @endforeach
            </li>
          </li>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Comments
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
              <li class="dropdown-item wrapper">
                @foreach ($post->comments as $comment)
                  {{$comment->content}}
                @endforeach
              </li>
            </div>
          </div>
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
        @endforeach
  <a href="{{route('admin.posts.create')}}" target="_blank"><button type="submit" class="btn btn-primary">Create Post</button></a>
</div>
</div>
@endsection
