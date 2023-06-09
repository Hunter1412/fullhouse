<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="{{ route('admin.dashboard')}}" class="brand-link">
		<img src="{{ asset('/frontend/images/icon.jpg') }}" alt="Admin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">Full House</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="{{ Auth::user()->getAvatar() }}" class="img-circle elevation-2" alt="{{Auth::user()->name}}">
			</div>
			<div class="info">
				<a href="#" class="d-block">{{ Auth::user()->name}}</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
				<!-- <li class="nav-item menu-open">
					<a href="{{ route('admin.dashboard')}}" class="nav-link active">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li> -->
				<!-- product -->
				<li class="nav-item menu-open">
					<a href="{{ route('admin.product.index')}}" class="nav-link">
						<i class="nav-icon fas fa-copy"></i>
						<p>
							Products
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{route('admin.product.create')}}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>New product</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.product.index')}}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>
									Product List
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('admin.category.index')}}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Category
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{route('admin.product.report')}}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Report product</p>
							</a>
						</li>
					</ul>
				</li>
				<!-- product -->

				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-chart-pie"></i>
						<p>
							Sales
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.order.index')}}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Order list</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.coupon.index') }}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Coupons</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.reportSales')}}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Sales report</p>
							</a>
						</li>
					</ul>
				</li>

				<!-- user -->
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-book"></i>
						<p>
							User
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.user.index')}}" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Data User</p>
							</a>
						</li>
					</ul>
				</li>
				<!-- MISCELLANEOUS -->
				<li class="nav-header">MISCELLANEOUS</li>
				<li class="nav-header">
					<h5 class="nav-link">
						<!-- Authentication -->
						<form method="POST" action="{{ route('logout') }}">
							@csrf
							<a href="{{route('logout')}}" onclick="event.preventDefault();this.closest('form').submit();">
								Log Out
							</a>
						</form>
					</h5>
				</li>

			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>