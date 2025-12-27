@extends('layout.admin')

@section('content')
<div class="container-fluid">
  <h1 class="mt-4">Quản lý người dùng</h1>
  @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
  @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif
  <a href="{{ route('admin.user.create') }}" class="btn btn-primary mb-3">Thêm tài khoản mới</a>
  <div class="card mb-3">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              <th>Created</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                <td>
                  <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-sm btn-secondary">Edit</a>
                  <form action="{{ route('admin.user.destroy', $user) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Xác nhận xóa?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
