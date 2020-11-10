@extends('layouts.app')
@section('title')
    Guest
@endsection
@section('content')
<div class="container">
  <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($posts as $post)
          <tr>
              <td>{{$post->user->name}}</td>
              <td>{{$post->title}}</td>
              <td>{{$post->description}}</td>
          </tr>
          @endforeach
      </tbody>
  </table>
</div>
@endsection