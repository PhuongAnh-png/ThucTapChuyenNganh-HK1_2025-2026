@extends('layout/admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Chỉnh sửa sản phẩm</h3>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back</a>
    </div>

    @if($products)
    <form action="{{ route('admin.products.update', $products->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- ///tên sản phẩm -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $products->name) }}" required>
            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <!-- danh mục -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id', $products->category_id) == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <!-- giá sản phẩm -->
        <div class="mb-3">
            <label for="gia" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="gia" name="gia" value="{{ old('gia', $products->gia) }}" required>
            @error('gia')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <!-- trạng thái sản phẩm -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="1" {{ old('status', $products->status) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $products->status) == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            @error('status')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <!-- ảnh sản phẩm -->
        <div class="mb-3">
            <label for="image" class="form-label">Product Image</label>
            <div class="mb-2">
                @if($products->image)
                    <img src="{{ asset('storage/' . $products->image) }}" alt="Current Image" width="100" class="img-thumbnail">
                @else
                    <span class="text-muted">No image current</span>
                @endif
            </div>
            <input type="file" class="form-control" id="image" name="image">
            <small class="text-muted">Bỏ trống nếu không muốn đổi ảnh mới</small>
            @error('image')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    @else
        <div class="alert alert-warning">Không tìm thấy sản phẩm.</div>
    @endif
</div>
@endsection
