@extends('layouts.app')

@section('title', '| Users')

@section('content')
  <div class="container">

  <div class="col-lg-10 col-lg-offset-1">
    <h1>
      <i class="fa fa-users"></i>User Adminstration
      <a href="{{route('roles.index')}}" class="btn btn-default pull-right">Role</a>
      <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a>
    </h1>

    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Date/Time/Added</th>
          <th scope="col">User roles</th>
          <th>Operations</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>

            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
            <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
            <td style="display:inline-flex">
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info mr-auto" style="color:#fff;">Edit</a>
              <form action="{{route('users.destroy', $user->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <input class="btn btn-danger" type="submit" value="Delete">
              </form>
            </td>
        </tr>
        @endforeach

      </tbody>
    </table>
  </div>
  <div class="col-md-10 col-md-offset-1">
    <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a>
  </div>

</div>
@endsection
