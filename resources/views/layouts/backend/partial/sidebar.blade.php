<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="{{ asset('assets/backend/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
		     style="opacity: .8">
		<span class="brand-text font-weight-light">AdminLTE 3</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			@if (Auth::user())
				<div class="image">
					<img width="100" height="100" class="mg-circle elevation-2" src="{{ url('storage/photoUsers/'.Auth::user()->photo ) }}">

				</div>
				<div class="info">
					<a href="#" class="d-block">{{ Auth::user()->name }} </a>
				</div>
			@else
				<div class="image">
					<img src="{{ asset('assets/backend/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">

				</div>
				<div class="info">
					<a href="#" class="d-block">Nouveau utilisateur  	{{ trans('sidebar.menu.newuser') }}</a>
				</div>

			@endif

		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
					 with font-awesome or any other icon font library -->
				<li class="nav-item has-treeview">
					<a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
						<i class="nav-icon fa fa-dashboard"></i>
						<p>

							{{ trans('sidebar.menu.Dashboard') }}

						</p>
					</a>
				</li>
				@can('users_manage')
					<li class="nav-item has-treeview">
						<a class="nav-link  nav-dropdown-toggle" href="#">
							<i class="fa-fw fa fa-users nav-icon"></i>
							<p>
								{{ trans('cruds.userManagement.title') }}
								<i class="right fa fa-angle-left"></i>
							</p>


						</a>
						<ul class="nav nav-treeview">

								<li class="nav-item">
									<a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
										<i class="fa-fw fa fa-unlock-alt nav-icon">

										</i>
										<p>{{ trans('cruds.permission.title') }}</p>
									</a>
								</li>


									<li class="nav-item">
									<a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
										<i class="fa-fw fa fa-briefcase nav-icon">

										</i>
										<p>{{ trans('cruds.role.title') }}</p>
									</a>
								</li>


									<li class="nav-item">
									<a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
										<i class="fa-fw fa fa-user nav-icon">

										</i>
										<p>{{ trans('cruds.user.title') }}</p>
									</a>
								</li>
							<li class="nav-item has-treeview">
								<a href="{{ route('admin.setting.index') }}" class="nav-link {{ Request::is('admin/setting') ? 'active' : '' }}">
									<i class="nav-icon fa fa-server"></i>
									<p>
										{{ trans('sidebar.menu.setting') }}
									</p>
								</a>
							</li>

						</ul>
					</li>
                 @endcan
				<li class="nav-item has-treeview {{ Request::is('admin/employee*') || Request::is('admin/attendance*') || Request::is('admin/advanced_salary*')? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/employee*') || Request::is('admin/attendance*') ||  Request::is('admin/advanced_salary*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>

							{{ trans('sidebar.menu.Employee') }}
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.employee.create') }}" class="nav-link {{ Request::is('admin/employee/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>
									{{ trans('sidebar.menu.addemp') }}
									</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.employee.index') }}" class="nav-link {{ Request::is('admin/employee') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>
									{{ trans('sidebar.menu.tousemp') }}
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.attendance.create') }}" class="nav-link {{ Request::is('admin/attendance/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>
									{{ trans('sidebar.menu.Pointage') }}
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.attendance.index') }}" class="nav-link {{ Request::is('admin/attendance') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>
									{{ trans('sidebar.menu.PointagePrensence') }}
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.advanced_salary.create') }}" class="nav-link {{ Request::is('admin/advanced_salary/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>
									{{ trans('sidebar.menu.Avancesalaire') }}
									</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.advanced_salary.index') }}" class="nav-link {{ Request::is('admin/advanced_salary') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>
									{{ trans('sidebar.menu.TousAvancesalaire') }}
								</p>
							</a>
						</li>
					</ul>



				<li class="nav-item has-treeview {{ Request::is('admin/product*') || Request::is('admin/category') || Request::is('admin/supplier*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/product*') ||  Request::is('admin/category*') ||  Request::is('admin/supplier*')  ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							{{ trans('sidebar.menu.Produit') }}
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.category.create') }}" class="nav-link {{ Request::is('admin/category/create')? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>{{ trans('sidebar.menu.Ajoutercategoriest') }}</p>

							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.category.index') }}" class="nav-link {{ Request::is('admin/category') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>{{ trans('sidebar.menu.Categories') }}</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.supplier.create') }}" class="nav-link {{ Request::is('admin/supplier/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>

								{{ trans('sidebar.menu.AjouterFournisseur') }}
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.supplier.index') }}" class="nav-link {{ Request::is('admin/supplier') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>{{ trans('sidebar.menu.Fournisseurs') }}</p>

							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.product.create') }}" class="nav-link {{ Request::is('admin/product/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>{{ trans('sidebar.menu.AjouterProduit') }}</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.product.index') }}" class="nav-link {{ Request::is('admin/product') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p> {{ trans('sidebar.menu.Produits') }}</p>
							</a>
						</li>

					</ul>
				</li>
				<li class="nav-item has-treeview {{ Request::is('admin/customer*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/customer*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							{{ trans('sidebar.menu.Clients') }}

							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.customer.create') }}" class="nav-link {{ Request::is('admin/customer/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>{{ trans('sidebar.menu.AjouterClient') }}</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.customer.index') }}" class="nav-link {{ Request::is('admin/customer') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>

								<p>{{ trans('sidebar.menu.clientslist') }}</p>
							</a>
						</li>
					</ul>
				</li>



				<li class="nav-item has-treeview {{ Request::is('admin/salary*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/salary*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							  {{ trans('sidebar.menu.Salaire') }}
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.salary.index') }}" class="nav-link {{ Request::is('admin/salary') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p> {{ trans('sidebar.menu.PayerSalaire') }}</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.salary.create') }}" class="nav-link {{ Request::is('admin/salary/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>

								<p>  {{ trans('sidebar.menu.paymentsdesalaire') }}</p>
							</a>
						</li>
					</ul>
				</li>


				<li class="nav-item has-treeview {{ Request::is('admin/expense*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/expense*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
					  {{ trans('sidebar.menu.Frais') }}

							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.expense.create') }}" class="nav-link {{ Request::is('admin/expense/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>{{ trans('sidebar.menu.AjouterFrais') }}</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.expense.today') }}" class="nav-link {{ Request::is('admin/expense-today') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>{{ trans('sidebar.menu.Fraisjounaliee') }}</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.expense.month') }}" class="nav-link {{ Request::is('admin/expense-month*') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p> {{ trans('sidebar.menu.Fraismensuelle') }}</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.expense.yearly') }}" class="nav-link {{ Request::is('admin/expense-yearly*') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>

								<p> {{ trans('sidebar.menu.Fraisannuels') }}</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.expense.index') }}" class="nav-link {{ Request::is('admin/expense') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p> {{ trans('sidebar.menu.ToutesFrais') }}</p>

							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview {{ Request::is('admin/order*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/order*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							{{ trans('sidebar.menu.Commande') }}

							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.order.pending') }}" class="nav-link {{ Request::is('admin/order/pending') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p> {{ trans('sidebar.menu.Commandeenattente') }}</p>

							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.order.approved') }}" class="nav-link {{ Request::is('admin/order/approved') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>{{ trans('sidebar.menu.Commandeapprouvees') }}</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview {{ Request::is('admin/sales*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/sales*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							{{ trans('sidebar.menu.Rapportdesventes') }}

							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.sales.today') }}" class="nav-link {{ Request::is('admin/sales-today') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p> {{ trans('sidebar.menu.Rapportjournalier') }}</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.sales.monthly') }}" class="nav-link {{ Request::is('admin/sales-monthly*') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>

								<p> {{ trans('sidebar.menu.Rapportmensuel') }}</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.sales.total') }}" class="nav-link {{ Request::is('admin/sales-total') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p> {{ trans('sidebar.menu.Ventestotales') }}</p>
							</a>
						</li>
					</ul>
				</li>


				<li class="nav-item">
					<a class="nav-link" href="{{ route('logout') }}"
					   onclick="event.preventDefault();
					   document.getElementById('logout-form').submit();">
						<i class="nav-icon fa fa-sign-out"></i>
						 {{ trans('sidebar.menu.Sedeconnecter') }}
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</li>

			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>