@extends('layouts.app')
@section('content')

  <div class="container">
    <div class="row">
      <table class="table">
      <thead class="thead-dark">
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Created At</th>
          <th>Updated At</th>
        </tr>
      </thead>

        <tbody>
            @foreach ($all_users as $user)
          <tr>
            <th>{{ $user->name }}</th>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated_at }}</td>
          </tr>
          @endforeach
        </tbody>


      </table>
    </div>
  </div>


@endsection
