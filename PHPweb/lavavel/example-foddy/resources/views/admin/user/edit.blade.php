@extends('layout.admin')

@section('content')
<div class="container-fluid">
  <h1>Chỉnh sửa tài khoản</h1>
  @if($errors->any()) <div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
  <form action="{{ route('admin.user.update', $user) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group">
      <label>Tên</label>
      <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
    </div>
    <div class="form-group">
      <label>Mật khẩu (để trống nếu không đổi)</label>
      <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group">
      <label>Role</label>
      <select name="role" class="form-control">
        <option value="user" {{ old('role', $user->role)=='user' ? 'selected' : '' }}>User</option>
        <option value="staff" {{ old('role', $user->role)=='staff' ? 'selected' : '' }}>Staff</option>
        <option value="admin" {{ old('role', $user->role)=='admin' ? 'selected' : '' }}>Admin</option>
      </select>
    </div>
    <button class="btn btn-primary">Lưu</button>
  </form>
</div>
@endsection
