@extends('layouts.app')

@section('title', '| Create New Post')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        <h1>Create New Post</h1>
        <hr>

        <form action="{{route('posts.update')}}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" value="{{$post->title}}" name="title" class="form-control">
          </div>
          <div class="form-group">
            <label for="title">Body</label>
            <textarea name="body" value="{{$post->body}}" rows="8" cols="80"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-info">Edit</button>
          </div>
        </form>

        </div>
    </div>

@endsection
