@extends('layout.admin')

@section('content')
<div class="container-fluid">
  <h1>Thêm tài khoản</h1>
  @if($errors->any()) <div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
  <form action="{{ route('admin.user.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label>Tên</label>
      <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>
    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>
    <div class="form-group">
      <label>Mật khẩu</label>
      <input type="password" name="password" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Xác nhận mật khẩu</label>
      <input type="password" name="password_confirmation" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Role</label>
      <select name="role" class="form-control">
        <option value="user" {{ old('role')=='user' ? 'selected' : '' }}>User</option>
        <option value="staff" {{ old('role')=='staff' ? 'selected' : '' }}>Staff</option>
        <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>Admin</option>
      </select>
    </div>
    <button class="btn btn-primary">Tạo</button>
  </form>
</div>
@endsection
