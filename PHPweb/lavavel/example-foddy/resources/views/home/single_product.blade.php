@extends('layout/admin')
@section('content')

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="row align-items-center"> <div class="col-lg-5 mb-5 ftco-animate">
                    <a href="{{ asset('storage/' . ($product->image ?? '')) }}" class="image-popup prod-img-bg d-block text-center">
                        @if(!empty($product->image))
                            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid w-100 rounded shadow-sm"
                                 style="max-height: 500px; object-fit: cover;"
                                 alt="{{ $product->name }}">
                        @else
                            <img src="{{ asset('img/placeholder.png') }}" class="img-fluid w-100 rounded shadow-sm" style="max-height: 500px; object-fit: cover;" alt="{{ $product->name }}">
                        @endif
                    </a>
                </div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
<h3>{{ $product->name }}</h3>

					@if(!empty($product->category))
						<p>Category: <a href="{{ route('category.show', $product->category->id) }}">{{ $product->category->name }}</a></p>
					@endif

    				<div class="rating d-flex">
							<p class="text-left mr-4">
								<a href="#" class="mr-2">5.0</a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
							</p>
							<p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
							</p>
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
							</p>
						</div>
<p class="price"> <span>{{ number_format($product->gia, 0, '.', ',') }} ₫</span> </p>
					<p>{{ $product->decription ?? '' }}</p>
                    <p>{!! $product->content ?? '' !!}</p>

						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
		              <div class="select-wrap">
	                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                  <select name="" id="" class="form-control">
	                  	<option value="">Small</option>
	                    <option value="">Medium</option>
	                    <option value="">Large</option>
	                    <option value="">Extra Large</option>
	                  </select>
	                </div>
		            </div>
							</div>
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="ion-ios-remove"></i>
	                	</button>
	            		</span>
	             	<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
	             	<span class="input-group-btn ml-2">
	                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
	                     <i class="ion-ios-add"></i>
	                 </button>
	             	</span>
	          	</div>
                <div class="w-100"></div>
	          	<div class="col-md-12">
	          		<p style="color: #000;">600 kg available</p>
	          	</div>
          	</div>
           	@php $cartRoute = \Illuminate\Support\Facades\Route::has('cart') ? route('cart') : null; @endphp
           	@if($cartRoute)
           	    <p><a href="{{ $cartRoute }}" class="btn btn-black py-3 px-5">Add to Cart</a></p>
            @else
           	    <p><button type="button" class="btn btn-black py-3 px-5" disabled title="Cart unavailable">Add to Cart</button></p>
            @endif
    			</div>
    		</div>
    	</div>
    </section>
@endsection
