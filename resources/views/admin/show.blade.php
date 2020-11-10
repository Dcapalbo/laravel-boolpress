@extends('layouts.app')
@section('title')
    Admin Show
@endsection
@section('content')
<div class="container">
<table class="table">
    <thead>
      <tr>
        <th scope="col">Title</th>
        <th scope="col">slug</th>
        <th scope="col">description</th>
        <th scope="col">image</th>
      </tr>
    </thead>
    <tbody>
         <tr>
            <td>{{$post->title}}</td>
            <td>{{$post->slug}}</td>
            <td>{{$post->description}}</td>
            <td>{{$post->image}}</td>
         </tr>
    </tbody>
  </table>
</div>
@endsection