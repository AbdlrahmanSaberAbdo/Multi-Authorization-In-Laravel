@extends('layouts.app')
@section('title', '| Roles')

@section('content')
  <div class="container">

  <div class="col-lg-10 col-lg-offset-1">
      <h1><i class="fa fa-key"></i> Roles

      <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
      <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permission</a>
    </h1>
      <hr>
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">Role</th>
            <th scope="col">permission</th>
            <th scope="col">Operation</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roles as $role)
          <tr>

              <td>{{ $role->name }}</td>
              <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
              <td style="display:inline-flex">
              <p style="margin-left:6px;">
              <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info mr-auto" style="color:#fff;">Edit</a>
                <form action="{{route('roles.destroy', $role->id)}}" method="POST">
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
    <a href="{{ route('roles.create')}}" class="btn btn-success">Add Role</a>
  </div>
</div>

@endsection
