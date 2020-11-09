@extends('layouts.app')
@section('title')
    Show
@endsection
@section('content')
<div class="jumbotron">
    <h1 class="display-4">Generic Post</h1>
      <a class="btn btn-primary btn-lg" href="#" role="button">Approfondisci</a>
    </p>
  </div>
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
            <tr>
                <td>{{$post->user->name}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
            </tr>
        </tbody>
    </table>
  </div>
  @endsection