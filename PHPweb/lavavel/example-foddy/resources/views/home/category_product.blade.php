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
                @include('home._product_card', ['product' => $object])
            </div>

        @empty
            <div class="col-12 text-center py-5">
                <div class="alert alert-warning">
                    <h4 class="mb-0"> Hiện chưa có sản phẩm nào trong danh mục này.</h4>
                </div>
            </div>
        @endforelse

        <div class="col-12 mt-4">
            {{ $products->links() }}
        </div>
    </div>
</div>


@endsection
