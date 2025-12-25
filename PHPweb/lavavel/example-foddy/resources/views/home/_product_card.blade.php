<div class="card mb-3 product-card w-100">
  <a href="{{ route('product.show', $product->id) }}">
    @if(!empty($product->image))
      <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height:200px; object-fit:cover;">
    @else
      <img src="{{ asset('img/placeholder.png') }}" class="card-img-top" alt="{{ $product->name }}" style="height:200px; object-fit:cover;">
    @endif
  </a>
  <div class="card-body d-flex flex-column text-center">
    <h5 class="card-title mb-2">{{ $product->name }}</h5>
    <p class="card-text mb-2">{{ number_format($product->gia, 0, '.', ',') }} ₫</p>
    <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-primary mt-auto">Detail</a>
  </div>
</div>
