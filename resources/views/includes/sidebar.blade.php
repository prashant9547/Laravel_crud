<nav class="navbar-default navbar-static-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav metismenu" id="side-menu">
			<li class="nav-header">
				<div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="{!! asset('image/hood.png') !!}" height="48" width="48" />
                             </span>

					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"> Admin <img alt="image" class="img-circle" src="{!! asset('image/circle-64.png') !!}" height="10" width="10" /></strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
					<ul class="dropdown-menu animated fadeInRight m-t-xs">
						<li><a href="{{ url('/profile') }}"> <i class="fa fa-user"></i> Profile</a></li>
						{{--
						<li><a href="#">Contacts</a></li>
						<li><a href="#">Mailbox</a></li> --}} {{--
						<li class="divider"></li> --}}
						<li>
							<a href="{{ url('/logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
							<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
					</ul>
				</div>
				<div class="logo-element">
					IN+
				</div>
				{{--
				<div class="dropdown profile-element">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<span>
							<img alt="image" class="img-circle" src="{!! asset('image/hood.png') !!}" height="48" width="48">
						</span>
						<span class="clear">
							<span class="block m-t-xs">
								<strong class="font-bold">Blog Admin</strong>
							</span>
						</span>
					</a>
				</div>
				<div class="logo-element">
				</div> --}}
			</li>
			{{--
			<li {{{ (Request::is( '/admin/home') || Request::is( '/admin/home/*') ? 'class=active' : '') }}}>
				<a href="{{ url('/admin/home') }}">
					<i class="fa fa-th-large" aria-hidden="true"></i>
					<span class="nav-label">Dashboard</span>
				</a>
			</li> --}}
			<li {{{ (Request::is( 'home') || Request::is( 'home/*') ? : '') }}}>
				<a href="{{ url('/home') }}">
					<i class="fa fa-th-large" aria-hidden="true"></i>
					<span class="nav-label"> Dashboard  </span>
				</a>
			</li>
			<li>
				<a>
					<i class="fa fa-user" aria-hidden="true"></i>
					<span class="nav-label"> Categories </span>
					<span class="fa arrow"></span>
				</a>
				<ul class="nav nav-second-level">
					<li {{{ (Request::is( 'parent_category') || Request::is( 'parent_category/*') ? 'class=active' : '') }}}>
						<a href="{{ url('parent_category') }}">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<span class="nav-label"> Parent Category </span>
							</a>
				</ul>

				<ul class="nav nav-second-level">
					<li {{{ (Request::is( 'categories') || Request::is( 'categories/*') ? 'class=active' : '') }}}>
						<a href="{{ url('categories') }}">
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<span class="nav-label"> Main Categories </span>
						</a>
					</li>
				</ul>
				<ul class="nav nav-second-level">
					<li {{{ (Request::is( 'subcategories') || Request::is( 'subcategories/*') ? 'class=active' : '') }}}>
						<a href="{{ url('subcategories') }}">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<span class="nav-label"> Sub Categories </span>
							</a>
					</li>
				</ul>

				</li>
				<li>
				<a>
					<i class="fa fa-user" aria-hidden="true"></i>
					<span class="nav-label"> Manage Admins </span>
					<span class="fa arrow"></span>
				</a>
				<ul class="nav nav-second-level">
					<li {{{ (Request::is( 'role') || Request::is( 'role/*') ? 'class=active' : '') }}}>
						<a href="{{ url('role') }}">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<span class="nav-label"> Roles </span>
							</a>
				</ul>

				<ul class="nav nav-second-level">
					<li {{{ (Request::is( 'adminrole') || Request::is( 'adminrole/*') ? 'class=active' : '') }}}>
						<a href="{{ url('adminrole') }}">
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<span class="nav-label"> Manage Role </span>
						</a>
					</li>
				</ul>
				</li>

				<li {{{ (Request::is( 'shipping_method') || Request::is( 'shipping_method/*') ? 'class=active' : '') }}}>
					<a href="{{ url('shipping_method') }}">
				<i class="fa fa-envelope" aria-hidden="true"></i>
				<span class="nav-label"> Shipping Method </span>
				</a>
				</li>
				<li {{{ (Request::is( 'unit') || Request::is( 'unit/*') ? 'class=active' : '') }}}>
					<a href="{{ url('unit') }}">
			<i class="fa fa-envelope" aria-hidden="true"></i>
			<span class="nav-label"> Unit </span>
			</a>
				</li>
				<li {{{ (Request::is( 'payment_method') || Request::is( 'payment_method/*') ? 'class=active' : '') }}}>
					<a href="{{ url('payment_method') }}">
				<i class="fa fa-envelope" aria-hidden="true"></i>
				<span class="nav-label"> Payment Method </span>
			</a>
				</li>
				<li>
					<a>
				<i class="fa fa-user" aria-hidden="true"></i>
				<span class="nav-label"> Tax / Location </span>
				<span class="fa arrow"></span>
			</a>
					<ul class="nav nav-second-level">
						<li {{{ (Request::is( 'parent_category') || Request::is( 'parent_category/*') ? 'class=active' : '') }}}>
							<a href="{{ url('parent_category') }}">
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<span class="nav-label"> Parent Category </span>
						</a>


					</ul>
					<ul class="nav nav-second-level">

						<li {{{ (Request::is( 'categories') || Request::is( 'categories/*') ? 'class=active' : '') }}}>
							<a href="{{ url('categories') }}">
					<i class="fa fa-envelope" aria-hidden="true"></i>
					<span class="nav-label">Main Categories </span>
					</a>
						</li>

					</ul>
					<ul class="nav nav-second-level">
						<li {{{ (Request::is( 'subcategories') || Request::is( 'subcategories/*') ? 'class=active' : '') }}}>
							<a href="{{ url('subcategories') }}">
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<span class="nav-label"> Sub Categories </span>
						</a>
						</li>
					</ul>
					</li>

					{{--
					<li {{{ (Request::is( 'parent_category') || Request::is( 'parent_category/*') ? 'class=active' : '') }}}>
						<a href="{{ url('parent_category') }}">
				<i class="fa fa-envelope" aria-hidden="true"></i>
				<span class="nav-label"> Parent Category </span>
				</a>
					</li>
					<li {{{ (Request::is( 'categories') || Request::is( 'categories/*') ? 'class=active' : '') }}}>
						<a href="{{ url('categories') }}">
				<i class="fa fa-envelope" aria-hidden="true"></i>
				<span class="nav-label"> Categories </span>
				</a>
					</li>
					<li {{{ (Request::is( 'subcategories') || Request::is( 'subcategories/*') ? 'class=active' : '') }}}>
						<a href="{{ url('subcategories') }}">
			<i class="fa fa-envelope" aria-hidden="true"></i>
			<span class="nav-label"> Sub Categories </span>
			</a>
					</li> --}}
					<li {{{ (Request::is( 'slider') || Request::is( 'slider/*') ? 'class=active' : '') }}}>
						<a href="{{ url('slider') }}">
					<i class="fa fa-picture-o" aria-hidden="true"></i>
					<span class="nav-label"> Slider </span>
					</a>
					</li>
					<li {{{ (Request::is( 'newsletter') || Request::is( 'newsletter/*') ? 'class=active' : '') }}}>
						<a href="{{ url('newsletter') }}">
				<i class="fa fa-envelope" aria-hidden="true"></i>
				<span class="nav-label"> Newsletter </span>
				</a>
					</li>
					<li>
						<a href="#"><i class="fa fa-cogs"></i> <span class="nav-label"> Settings </span> <span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
							<li {{{ (Request::is( 'website') || Request::is( 'website/*') ? 'class=active' : '') }}}>
								<a href="{{ url('website') }}">
					<i class="fa fa-globe" aria-hidden="true"></i>
					<span class="nav-label"> Website Setting </span>
					</a>
							</li>
							<li {{{ (Request::is( 'contentpage') || Request::is( 'contentpage/*') ? 'class=active' : '') }}}>
								<a href="{{ url('contentpage') }}">
					<i class="fa fa-globe" aria-hidden="true"></i>
					<span class="nav-label"> Content Page </span>
					</a>
							</li>
						</ul>
					</li>
					{{--
					<li {{{ (Request::is( 'admin/subcategories') || Request::is( 'admin/subcategories/*') ? 'class=active' : '') }}}>
						<a href="{{ url('admin/subcategories') }}">
					<i class="fa fa-list-alt" aria-hidden="true"></i>
					<span class="nav-label">Sub Categories </span>
					</a>
					</li> --}} {{--
					<li>
						<a>
					<i class="fa fa-user" aria-hidden="true"></i>
					<span class="nav-label"> Categories </span>
					<span class="fa arrow"></span>
				</a>
						<ul class="nav nav-second-level">
							<li {{{ (Request::is( 'admin/categories') || Request::is( 'admin/categories/*') ? 'class=active' : '') }}}>
								<a href="{{ url('admin/categories') }}">
					<i class="fa fa-user" aria-hidden="true"></i>
					<span class="nav-label"> Categories </span>
					</a>
						</ul> --}} {{--
						<ul class="nav nav-second-level">
							<li {{{ (Request::is( 'admin/subcategories') || Request::is( 'admin/subcategories/*') ? 'class=active' : '') }}}>
								<a href="{{ url('admin/subcategories') }}">
					<i class="fa fa-user" aria-hidden="true"></i>
					<span class="nav-label"> Sub Categories </span>
					</a>
						</ul> --}} {{-- </li> --}} {{--
						<li>
							<a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Catalog</span> <span class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li><a href="#">Dashboard v.1</a></li>
								<li><a href="#">Dashboard v.2</a></li>

							</ul>
						</li> --}} {{--
						<li {{{ (Request::is( 'user') || Request::is( 'user/*') ? 'class=active' : '') }}}>
							<a href="{{ url('/user') }}">
					<i class="fa fa-user" aria-hidden="true"></i>
					<span class="nav-label">User</span>
				</a>
						</li>
						<li {{{ (Request::is( 'property') || Request::is( 'property/*') ? 'class=active' : '') }}}>
							<a href="{{ url('/property') }}">
					<i class="fa fa-building" aria-hidden="true"></i>
					<span class="nav-label"> Property </span>
				</a>
						</li>
						<li {{{ (Request::is( 'news') || Request::is( 'news/*') ? 'class=active' : '') }}}>
							<a href="{{ url('/news') }}">
				<i class="fa fa-newspaper-o" aria-hidden="true"></i>
					<span class="nav-label">News </span>
				</a>
						</li>
						<li {{{ (Request::is( 'residentialproject') || Request::is( 'residentialproject/*') ? 'class=active' : '') }}}>
							<a href="{{ url('/residentialproject') }}">
				<i class="fa fa-building" aria-hidden="true"></i>
					<span class="nav-label">Residential Project </span>
				</a>
						</li>
						<li {{{ (Request::is( 'amenities') || Request::is( 'amenities/*') ? 'class=active' : '') }}}>
							<a href="{{ url('/amenities') }}">
				<i class="fa fa-building" aria-hidden="true"></i>
					<span class="nav-label"> Amenities </span>
				</a>
						</li>
						<li {{{ (Request::is( 'specification') || Request::is( 'specification/*') ? 'class=active' : '') }}}>
							<a href="{{ url('/specification') }}">
				<i class="fa fa-cog" aria-hidden="true"></i>
				
					<span class="nav-label"> Specification </span>
				</a>
						</li> --}} {{--
						<li {{{ (Request::is( 'groups') || Request::is( 'groups/*') ? 'class=active' : '') }}}>
							<a href="{{ url('/groups') }}">
					<i class="fa fa-th-large"></i>
					<span class="nav-label">Groups</span>
				</a>
						</li> --}} {{--
						<li {{{ (Request::is( 'events') || Request::is( 'events/*') ? 'class=active' : '') }}}>
							<a href="{{ url('/events') }}">
					<i class="fa fa-th-large"></i>
					<span class="nav-label">Events</span>
				</a>
						</li> --}} {{--
						<li {{{ (Request::is( 'report') || Request::is( 'report/*') ? 'class=active' : '') }}}>
							<a href="{{ url('/report') }}">
					<i class="fa fa-th-large"></i>
					<span class="nav-label">Reports</span>
				</a>
						</li> --}} {{--
						<li {{{ (Request::is( 'accountverification') || Request::is( 'accountverification/*') ? 'class=active' : '') }}}>
							<a href="{{ url('/accountverification') }}">
					<i class="fa fa-th-large"></i>
					<span class="nav-label">Account verification</span>
				</a>
						</li> --}}
		</ul>
	</div>
</nav>