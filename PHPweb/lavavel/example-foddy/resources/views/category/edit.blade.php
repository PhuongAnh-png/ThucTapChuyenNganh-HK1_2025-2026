@extends('layout/admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Chỉnh sửa Danh mục</h3>
        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary">Back</a>
    </div>

    @if($category)
    <form action="{{ route('admin.category.update', ['category' => $category->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" required>
            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Category Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($category->image)
                <div class="mt-2"><img src="{{ asset('storage/'.$category->image) }}" alt="Image" style="max-height:80px"></div>
            @endif
            @error('image')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="1" {{ old('status', $category->status) == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $category->status) == '0' ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    @else
        <div class="alert alert-warning">Không tìm thấy danh mục.</div>
    @endif
</div>
@endsection
