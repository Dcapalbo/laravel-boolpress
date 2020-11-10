@extends('layouts.app')
@section('title')
    Admin
@endsection
@section('content')
<div class="container">
<table class="table">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Slug</th>
        <th scope="col">Image</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
         <tr>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->slug}}</td>
            <td>{{$post->image}}</td>
         </tr>
        @endforeach
    </tbody>
  </table>
</div>
@endsection