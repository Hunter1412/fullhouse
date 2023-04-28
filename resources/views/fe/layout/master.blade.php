<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="T12206M1 Team 1">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('/frontend/images/icon.jpg')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title')</title>

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/chosen.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/color-01.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/login.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/site-cart.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/frontend/css/reset.css') }}">

	@yield('myCss')


</head>

<body class="home-page home-01">

	<!-- mobile menu -->
	<div class="mercado-clone-wrap">
		<div class="mercado-panels-actions-wrap">
			<a class="mercado-close-btn mercado-close-panels" href="#">x</a>
		</div>
		<div class="mercado-panels"></div>
	</div>

	<!--header start-->
	@include('fe.layout.partials.header')
	<!--header end-->

	<!--main start-->
	@yield('content')
	<!--main end-->

	<!-- footer start-->
	@include('fe.layout.partials.footer')
	<!-- footer end -->

	@include('fe.layout.partials.login')

	@include('fe.layout.partials.site_cart')

	<!-- jQuery -->
	<!-- <script src="{{ asset('/admin/plugins/jquery/jquery.min.js') }}"></script> -->

	<!-- JavaScript start -->
	<script src="{{ asset('/frontend/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('/frontend/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('/frontend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/frontend/js/jquery.flexslider.js') }}"></script>
	<script src="{{ asset('/frontend/js/chosen.jquery.min.js') }}"></script>
	<script src="{{ asset('/frontend/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('/frontend/js/jquery.countdown.min.js') }}"></script>
	<script src="{{ asset('/frontend/js/jquery.sticky.js') }}"></script>
	<script src="{{ asset('/frontend/js/functions.js') }}"></script>
	@yield('time')

	<!-- login show -->
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	<script>
		const wrapper = document.querySelector('.wrapper');
		const loginLink = document.querySelector('.login-link');
		const registerLink = document.querySelector('.register-link');
		const btnPopup = document.querySelector('.btnLogin-popup');
		const iconClose = document.querySelector('.icon-close');

		const wrapper_cart = document.querySelector('.wrapper-cart');
		const btnCart = document.querySelector('.btnCart-popup');
		const iconCloseCart = document.querySelector('.icon-close-cart');
		//register
		registerLink.addEventListener('click', () => {
			wrapper.classList.add('active');
		});
		// login
		loginLink.addEventListener('click', () => {
			wrapper.classList.remove('active');
		});
		//btn-login
		btnPopup.addEventListener('click', () => {
			wrapper.classList.add('active-popup');
			wrapper_cart.classList.remove('active-popup');
		});
		//close-login
		iconClose.addEventListener('click', () => {
			wrapper.classList.remove('active-popup');
		});

		// site-cart actions
		btnCart.addEventListener('click', () => {
			wrapper_cart.classList.add('active-popup');
			wrapper.classList.remove('active-popup');
		});
		//close-cart
		iconCloseCart.addEventListener('click', () => {
			wrapper_cart.classList.remove('active-popup');
		});
	</script>

	@yield('myJS_profile')

	<!-- add to cart -->
	<script>
		$(document).ready(function() {
			const url = "{{ Route('addCart') }}" ?? "";
			var timeout = null;

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			//create cart
			$('.add-to-cart').click(function(e) {
				e.preventDefault();
				// let pid = $(this).data("id") ?? '';
				// let quantity = $('input[name="product-quatity"]').val() ?? '';

				var data = {
					pid: $('.add-to-cart').data("id") ?? '',
					quantity: $('input[name="product-quatity"]').val() ?? ''
				};
				postAjax(data);
			});

			//edit cart
			$('body').on('change', 'input[name="product-quatity"]', function(e) {
				e.preventDefault();
				//Note: we have many input with this name;
				let pid = $(this).data("id") ?? '';
				let quantity = $(this).val() ?? '';

				var data = {
					pid: pid,
					quantity: quantity,
					action: 'edit'
				};
				if (data.quantity == 0) {
					return;
				}
				// alert(data.pid);
				console.log(data);
				postAjax(data);
			});

			function postAjax(data) {
				$.ajax({
					type: "POST",
					url: url,
					data: data,
					success: function(data) {
						// alert('add product to cart successfully.');
						//show site-cart
						wrapper_cart.classList.add('active-popup');
						getCart();
					},
				});
			}

			//display site cart
			function getCart() {
				$.get(
					"{{ route('showCart')}}",
					function(data) {
						// console.log(data);
						var cart = '';
						let count = 0;
						let total = 0;
						let img = '';
						var cart_page = '';

						$.each(data, function(k, v) {
							var arr_img = JSON.parse(v.product_image);
							count++;
							total += parseInt(v.amount);
							let path = "{{ asset('assets/img/upload/product') }}" + "/" + arr_img[0];
							let id = v.product_id;
							let detail = "{{ route('product.show', " + id + ") }}";

							cart += `<div class="product-box" id="cart_id_${v.id}">
									<span class="icon-close delete-cart" data-cid="${v.id}">
										<ion-icon name="close-outline"></ion-icon>
									</span>
									<a class="p-image" href="${detail}">
										<div class="product-image" style="width:100px">
											<figure><img src="${path}" alt="${v.product_image}" width="100" height="100"></figure>
										</div>
										<p class="product-name">${v.product_name}</p>
									</a>
									<div class="p-info">
										<span class="product-price">$${v.price}</span>
										<span class="product-quantity">
											<input type="number" name="product-quatity" value="${v.quantity}" data-id="${v.product_id}">
										</span>
										<span class="product-amount">$${v.amount}</span>
									</div>
								</div>`;

							cart_page += `
										<li class="pr-cart-item" id="cart_id_${v.id}">
									<!-- image start -->
									<div class="product-image">
										<figure><img src="${path}" alt="${v.product_name}"></figure>
									</div>
									<!-- image end-->
									<!-- name start-->
									<div class="product-name">
										<a class="link-to-product" href="${detail}">
											<p>${v.product_name}</p>
											<small>${v.product_id}</small>
										</a>
									</div>
									<!-- name end-->
									<!-- price -->
									<div class="price-field product-price">
										<p class="price">$${v.product_price}</p>
										<p class="price" style="text-decoration: line-through;color:red">${v.discount}</p>
									</div>
									<!-- price end -->
									<!-- quantity start -->
									<div class="quantity">
										<div class="quantity-input">
											<input type="text" name="product-quatity" value="${v.quantity}" data-id="${v.product_id}" data-max="120" pattern="[0-9]*">
											<a class="btn btn-increase" href="#"></a>
											<a class="btn btn-reduce" href="#"></a>
										</div>
									</div>
									<!-- quantity end -->
									<!-- amount start-->
									<div class="price-field sub-total">
										<p class="price">$${v.amount}</p>
									</div>
									<!-- amount end-->
									<!-- action delete -->
									<div class="delete delete-cart" data-cid="${v.id}">
										<a href="#" class="btn btn-delete" title="">
											<span>Delete from your cart</span>
											<i class="fa fa-times-circle" aria-hidden="true"></i>
										</a>
									</div>
									<!-- action delete end -->
								</li>`;
						});

						$('#cart-page').html(cart_page);
						$('#content-cart').html(cart);
						$('#count').html(count + ' items');
						$('.total-cart').html('Total: $' + total.toFixed(2));
					}
				);
			};
			getCart();

			//delete cart
			$('body').on('click', '.delete-cart', function(e) {
				e.preventDefault();

				let cart_id = $(this).data("cid") ?? '';

				if (confirm('Delete this cart-item?')) {
					$.ajax({
						type: "DELETE",
						url: "{{ url('delete-cart')}}" + '/' + cart_id,
						success: function(data) {
							$("#cart_id_" + cart_id).remove();
							setTimeout(getCart, 1000);
						},
						error: function(data) {
							// console.log('Error:', data);
							console.log(JSON.stringify(data));
						}
					});
				}

			});


		});
	</script>

	@yield('myJS')



</body>

</html>