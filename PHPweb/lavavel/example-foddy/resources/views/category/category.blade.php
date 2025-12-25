@extends('layout/admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="cart-footer small muted mb-3"></div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Quản lý Danh mục</h3>
         <a href="{{ route('admin.category.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Add New
        </a>
    </div>

    <table class="table table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Begin</th>
                <th scope="col">End</th>
                <th scope="col" class="text-center">Edit</th>
                <th scope="col" class="text-center">Delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $object)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>@if($object->image)
                        <img src="{{ asset('storage/' . $object->image) }}" alt="" height="50" width="50" style="object-fit: cover; border-radius: 5px;">
                    @else
                        <span class="badge bg-secondary">No Image</span>
                    @endif
                </td>
                <td>{{$object->name}}</td>
                <td>
                    @if(isset($object->status) && $object->status == 1)
                        <span class="text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg> Active
                        </span>
                    @else
                        <span class="text-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                            </svg> Inactive
                        </span>
                    @endif
                </td>
                <td>{{$object->created_at ? $object->created_at->format('d/m/Y') : 'N/A'}}</td>
                <td>{{$object->updated_at ? $object->updated_at->format('d/m/Y') : 'N/A'}}</td>

                <td class="text-center">
                    <!-- button edit -->
                    <a href="{{ route('admin.category.edit', ['category' => $object->id]) }}">
                        <i class="bi bi-pencil"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                        </svg>
                    </a>
                </td>

                <td class="text-center">
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="event.preventDefault(); if(confirm('Bạn có chắc chắn muốn xóa {{ $object->name }}?')) { document.getElementById('delete-form-{{ $object->id }}').submit(); }">
                        <i class="bi bi-trash-fill"></i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                    </a>
                    <form id="delete-form-{{ $object->id }}" action="{{ route('admin.category.destroy', ['category' => $object->id]) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center"><h4>Chưa có dữ liệu</h4></td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
