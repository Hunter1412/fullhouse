@extends('fe.layout.master')

@section('title', 'Checkout')

@section('myCss')
@endsection

@section('content')
<main id="main" class="main-site checkout page">

	<div class="container">
		<div class="wrap-breadcrumb">
			<ul>
				<li class="item-link"><a href="{{route('home')}}" class="link">home</a></li>
				<li class="item-link"><a href="{{route('cart')}}" class="link">Cart</a></li>
				<li class="item-link"><span>checkout</span></li>
			</ul>
		</div>
		<div class=" main-content-area">

			@if (session('success'))
			<div class="alert alert-success">{{ session('success') }}</div>
			@endif

			<form action="{{ route('createOrder') }}" method="post" name="frm-billing">
				@csrf
				<div class="wrap-address-billing col-md-8 px-3">
					<h3 class="box-title">Information Order</h3>
					<div class="">
						<div class="col-12 col-md-6 form-group">
							<label for="fname">Full name<span>*</span></label>
							<input class="form-control" type="text" name="receiver_name" value="{{old('receiver_name', $user->name)}}" required placeholder="Your name">
							<small class="text-danger">{{$errors->first('receiver_name')}}</small>
						</div>
						<div class="col-12 col-md-6 form-group">
							<label for="phone">Phone number<span>*</span></label>
							<input class="form-control" id="phone" type="number" name="receiver_phone" value="{{old('receiver_phone', $user->phone)}}" required placeholder="10 digits format">
							<small class="text-danger">{{$errors->first('receiver_phone')}}</small>
						</div>

						<div class="col-12 form-group">
							<label for="country">Note: </label>
							<textarea class="form-control" name="note" id="note" cols="30" rows="5" placeholder="Note for this order, if have">{{old('note')}}</textarea>
						</div>

						<!-- shipping -->
						<div class="summary-item shipping-method">
							<h4 class="title-box f-title">Shipping method</h4>
							<div class="choose-payment-methods">
								<!-- at store -->
								<label class="payment-method">
									<input name="method_shipping" id="method_shipping_no" value="0" type="radio" checked>
									<span>No Shipping</span>
									<span class="payment-desc">Please you call before.
										<p>Address at: No 391A, Nam Ky Khoi Nghia Street, District 3, HCM City</p>
									</span>
								</label>
								<!-- shipping to address -->
								<label class="payment-method">
									<input name="method_shipping" id="method_shipping" value="1" type="radio">
									<span>Shipping to: </span>
									<span class="payment-desc">

										<div class="col-12 col-md-4">
											<label for="">City/Province <span>*</span>:</label>
											<select style="display:flex;" class="form-control" name="shipping_city" id="city">
												<option value="" selected>Select city/province</option>
												@foreach($provinces as $item)
												<option value="{{$item->code}}">{{$item->full_name_en}}</option>
												@endforeach
											</select>
										</div>

										<div class="col-12 col-md-4">
											<label for="phone">District: <span>*</span></label>
											<select class="form-control" name="shipping_district" id="shipping_district" value="{{old('shipping_district')}}" required>
												<option value="">-- Select district --</option>
											</select>
											<small class="text-danger">{{$errors->first('shipping_district')}}</small>
										</div>

										<div class="col-12 col-md-4">
											<label for="add">Address:</label>
											<input class="form-control" id="shipping_address" type="text" name="shipping_address" value="{{ old('shipping_address')}}" required placeholder="Street at apartment number">
											<small class="text-danger">{{ $errors->first('shipping_address') }}</small>
										</div>

									</span>
								</label>

							</div>
						</div>

						<div class="choose-payment-methods">
							<h4 class="title-box f-title">Shipping method</h4>
							<label class="payment-method">
								<input name="payment_method" id="payment-method-bank" value="0" type="radio">
								<span>Direct Bank Transder</span>
								<span class="payment-desc">
									<table class="shop_attributes">
										<tbody>
											<tr>
												<th>Account Name:</th>
												<td>FULL HOUSE</td>
											</tr>
											<tr>
												<th>Account No:</th>
												<td>0123456789</td>
											</tr>
											<tr>
												<th>At Bank:</th>
												<td>BIDV - ABC</td>
											</tr>
										</tbody>
									</table>
								</span>
							</label>

							<label class="payment-method">
								<input name="payment_method" id="payment-method-visa" value="1" type="radio">
								<span>COD</span>
								<span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
							</label>

							<label class="payment-method">
								<input name="payment_method" id="payment-method-paypal" value="2" type="radio">
								<span>Paypal</span>
								<span class="payment-desc">You can pay with your credit</span>
								<span class="payment-desc">card if you don't have a paypal account</span>
							</label>
						</div>
						<!-- <p class="row-in-form fill-wife">
							<label class="checkbox-field">
								<input name="create-account" id="create-account" value="forever" type="checkbox">
								<span>Create an account?</span>
							</label>
							<label class="checkbox-field">
								<input name="different-add" id="different-add" value="forever" type="checkbox">
								<span>Ship to a different address?</span>
							</label>
						</p> -->
					</div>
				</div>

				<div class="col-md-4">
					<div class="summary summary-checkout">
						<div class="summary-item col-12">
							<h4 class="title-box">Total cart: <span class="total-cart">$ 0.00</span></h4>
							<input type="hidden" class="total-cart" name="value_order" value="">
						</div>

						<div class="summary-item col-12">
							<b class="">Shipping fee: <span class="shipping-fee">$ 0.00</span></b>
							<input type="hidden" class="total-cart" name="shipping_fee" value="">
						</div>
						<hr>
						<div class="summary-item col-12">
							<label class="">Coupon code:</label>
							<input class="form-control col-5" id="coupon-code" type="text" name="coupon_code" value="{{ old('coupon_code')}}" placeholder="Enter Your Coupon code">

							<div class="row" style="margin:0 20px;">
								<span class="title"> => Discount:</span>
								<b class="value-coupon" style="font-size: 16px;">$ 0.00</b>
							</div>
						</div>

						<hr>
						<div class="summary-item payment-method">
							<p class="summary-info grand-total">
								<span>Grand Total</span> <span class="grand-total-price" style="font-size: 2em;"> $ 0.00</span>
							</p>
							<button type="submit" class="btn btn-medium">Place order now</button>
						</div>
					</div>
				</div>
			</form>


			<div style="clear: left;"></div>
			<hr>
			<!-- products most view -->
			<!-- <div class="wrap-show-advance-info-box style-1 box-in-site"> -->
			<div class="style-1" style="margin-top: 5%;">
				<h3 class="title-box">Most Viewed Products</h3>
				<div class="wrap-products">
					<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="4" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"4"}}'>

						@foreach($products as $product)
						<div class="product product-style-2 equal-elem ">
							<div class="product-thumnail">
								<a href="{{route('product.show', $product->product_id)}}" title="{{$product->product_name}}">
									<figure>
										<img src="{{ asset('assets/img/upload/product/'.$product->product_image['0']) }}" width="800" height="800" alt="{{$product->product_image['0']}}">
									</figure>
								</a>
								<div class="group-flash">
									@if($product->discount > 0)
									<span class="flash-item sale-label">
										sale {{number_format($product->discount/$product->product_price*100,0)}}%
									</span>
									@endif
								</div>
								<div class="wrap-btn">
									<a href="{{route('product.show', $product->product_id)}}" class="function-link">quick view</a>
								</div>
							</div>
							<div class="product-info">
								<a href="{{route('product.show', $product->product_id)}}" class="product-name"><span>{{$product->product_name}}</span></a>
								<div class="wrap-price">
									<span class="product-price">
										${{number_format($product->product_price - $product->discount,2)}}
									</span>
									@if($product->discount > 0)
									<span style="text-decoration: line-through;">${{number_format($product->product_price,2)}}</span>
									@endif
								</div>
							</div>
						</div>

						@endforeach


					</div>
				</div><!--End wrap-products-->
			</div>
			<!-- products most view end-->

		</div><!--end main content area-->
		<!--end main content area-->
	</div>
	<!--end container-->

</main>
@endsection

@section('myJS')
<script>
	// <!-- cal coupon -->
	$(document).ready(function() {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$('body').on('change', '#coupon-code', function() {
			post_coupon();
		});
		post_coupon();



		function post_coupon() {
			let coupon_code = $('#coupon-code').val().toUpperCase() ?? '';
			let value_order = $('input[name="value_order"]').val() ?? 0;
			if (coupon_code == "") {
				return;
			}
			$.ajax({
				type: 'post',
				url: "{{route('postCoupon')}}",
				data: {
					code: coupon_code,
					value_order: value_order
				},
				success: function(data) {
					let discount = 0;
					$.each(data, function(k, v) {
						if (k === coupon_code) {
							discount = v.value;
							return;
						}
					});
					// console.log(discount);
					$('.value-coupon').html("$" + parseFloat(discount).toFixed(2));
					let total = (value_order - discount).toFixed(2);
					$('.result').html("$" + total);
				}
			});
		}

	});

	// <!-- select city/district -->
	jQuery(document).ready(function() {
		$('#shipping_district').html("<option value='0'>-- Select district --</option>");

		$('#shipping_city').change(function() {
			var code = $(this).val();
			// Empty the dropdown
			$('#shipping_district').find('option').not(':first').remove();

			// AJAX request 
			$.ajax({
				url: 'district/' + code,
				type: 'get',
				dataType: 'json',
				success: function(response) {
					$.each(response, function(k, v) {
						var option = `<option value="${v.code}">${v.full_name_en}</option>`;
						$("#shipping_district").append(option);
						console.log(option);
					});
				}
			});
		});
	});
</script>
@endsection