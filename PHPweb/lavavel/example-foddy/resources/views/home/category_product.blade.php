@extends('layout/admin')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-12 mb-4">
            <h2 class="text-center font-weight-bold text-uppercase" style="color: #82ae46;">Danh Sách Sản Phẩm</h2>
            <div class="dropdown-divider"></div>
        </div>

        @forelse($products as $object)
            <div class="col-md-6 col-lg-3 mb-4 d-flex">
                <div class="card product-card shadow-sm border-0 w-100">
                    <div class="img-container" style="height: 200px; overflow: hidden;">
                        <img src="{{ $object->image}}" class="card-img-top h-100 w-100" style="object-fit: cover;" alt="{{ $object->name }}">
                    </div>

                    <div class="card-body d-flex flex-column text-center">
                        <h5 class="card-title mb-2">{{ $object->name }}</h5>

                        <p >
                            {{ $object->gia }}
                        </p>

                        <div class="mt-auto">
                            <a href="{{ route('single_product', ['category' => $object->id]) }}" class="btn btn-primary btn-block rounded-pill">Detail </a>
                        </div>
                    </div>
                </div>
            </div>

        @empty
            <div class="col-12 text-center py-5">
                <div class="alert alert-warning">
                    <h4 class="mb-0"> Hiện chưa có sản phẩm nào trong danh mục này.</h4>
                </div>
            </div>
        @endforelse
    </div>
</div>


@endsection
