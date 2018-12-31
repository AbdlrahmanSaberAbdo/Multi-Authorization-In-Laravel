@extends('layouts.app')

@section('title', '| View Post')

@section('content')

<div class="container">

    <h1>{{ $post->title }}</h1>
    <hr>
    <p class="lead">{{ $post->body }} </p>
    <hr>
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    @can('edit post')
    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info" role="button">Edit</a>
    @endcan
    @can('delete post')
    <form class="pull-right" action="{{route('posts.destroy', $post->id)}}" method="POST">
      @csrf
      @method('DELETE')
      <input class="btn btn-danger" type="submit" value="Delete">
    </form>
    @endcan


</div>

@endsection
