@extends('layout.admin')

@section('content')
<div class="container-fluid">
  <h1>Chi tiết tài khoản</h1>
  <table class="table table-bordered">
    <tr><th>Name</th><td>{{ $user->name }}</td></tr>
    <tr><th>Email</th><td>{{ $user->email }}</td></tr>
    <tr><th>Role</th><td>{{ $user->role }}</td></tr>
    <tr><th>Created</th><td>{{ $user->created_at }}</td></tr>
  </table>
  <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-secondary">Edit</a>
  <a href="{{ route('admin.user.index') }}" class="btn btn-light">Back</a>
</div>
@endsection
