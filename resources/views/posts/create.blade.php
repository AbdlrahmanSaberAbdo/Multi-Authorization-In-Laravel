@extends('layouts.app')

@section('title', '| Create New Post')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        <h1>Create New Post</h1>
        <hr>

        <form action="{{route('posts.store')}}" method="POST">
          @csrf
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control">
          </div>
          <div class="form-group">
            <label for="body">Body</label>
            <textarea id="body" class="form-control" name="body" rows="8" cols="80"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-info">Create</button>
          </div>
        </form>

        </div>
    </div>

@endsection
