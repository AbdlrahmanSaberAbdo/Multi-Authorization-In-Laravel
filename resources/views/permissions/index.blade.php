@extends('layouts.app')
@section('title', '| Permission')

@section('content')
  <div class="container">

  <div class="col-lg-10 col-lg-offset-1">
      <h1><i class="fa fa-key"></i>Available Permissions

      <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
      <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
    </h1>
      <hr>
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Operation</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($permissions as $permission)
          <tr>

              <td>{{ $permission->name }}</td>
              <td style="display: inline-flex;">
              <a style="color:#fff;" href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info mr-auto">Edit</a>
              <p style="margin-left:6px">
                <form action="{{route('permissions.destroy', $permission->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <input class="btn btn-danger" type="submit" value="Delete">
                </form>
              </p>
              </td>
          </tr>
          @endforeach

        </tbody>
      </table>
  </div>
  <div class="col-md-10 col-md-offset-1">
    <a href="{{ route('permissions.create')}}" class="btn btn-success">Add Permission</a>
  </div>
</div>

@endsection
