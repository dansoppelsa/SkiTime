@extends('layouts.master')


@section('content')

  <h1>Users</h1>

  <table class="table">
    <thead>
    <tr>
      <th></th>
      <th></th>
      <th></th>
    </tr>
    </thead>
    <tbody>

    @foreach( $users as $user )
      <tr>
        <td>{{ $user->present()->fullName }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->present()->paid }}</td>
      </tr>
    @endforeach

    </tbody>
  </table>

@stop