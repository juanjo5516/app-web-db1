<nav class="navbar-default navbar-static-side" role="navigation">
	<div class="sidebar-collapse">
		<ul class="nav metismenu" id="side-menu">
			<li class="nav-header">
				<div class="dropdown profile-element"> 
					<span><img alt="image" class="img-circle" src="{{asset('img/user2.png')}}" /></span>
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<span class="clear">
							<span class="block m-t-xs">
								<strong class="font-bold">{{ Auth::user()->name}}</strong>
							</span>
							<span class="text-muted text-xs block">Opciones <b class="caret"></b></span>
						</span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#">Profile</a></li>
						<li><a href="#">Contacts</a></li>
						<li><a href="#">Mailbox</a></li>
						<li class="divider"></li>
						<li><a href="#">Logout</a></li>
					</ul>
				</div>
				<div class="logo-element">MINE</div>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-group"></i>
					<span class="nav-label">Citas</span>
					<span class="fa arrow"></span>
				</a>
				<ul class="nav nav-second-level">
					<li><a href="/insumos">Crear Cita</a></li>
					<li><a href="/insumos">Ver citas</a></li>
				</ul>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-heartbeat"></i>
					<span class="nav-label">Signos Vitales</span>
					<span class="fa arrow"></span>
				</a>
				<ul class="nav nav-second-level">
					{{-- <li><a href="/insumos">Insumos</a></li> --}}
					{{-- <li><a href="/laboratorios">Laboratorios</a></li> --}}
				</ul>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-building-o"></i>
					<span class="nav-label">Laboratorios</span>
					<span class="fa arrow"></span>
				</a>
				<ul class="nav nav-second-level">
					{{-- <li><a href="/insumos">Insumos</a></li> --}}
					{{-- <li><a href="/laboratorios">Laboratorios</a></li> --}}
				</ul>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-users"></i>
					<span class="nav-label">Pacientes</span>
					<span class="fa arrow"></span>
				</a>
				<ul class="nav nav-second-level">
					{{-- <li><a href="/insumos">Insumos</a></li> --}}
					{{-- <li><a href="/laboratorios">Laboratorios</a></li> --}}
				</ul>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-money"></i>
					<span class="nav-label">Caja</span>
					<span class="fa arrow"></span>
				</a>
				<ul class="nav nav-second-level">
					{{-- <li><a href="/insumos">Insumos</a></li> --}}
					{{-- <li><a href="/laboratorios">Laboratorios</a></li> --}}
				</ul>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-medkit"></i>
					<span class="nav-label">Farmacia</span>
					<span class="fa arrow"></span>
				</a>
				<ul class="nav nav-second-level">
					{{-- <li><a href="/insumos">Insumos</a></li> --}}
					{{-- <li><a href="/laboratorios">Laboratorios</a></li> --}}
				</ul>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-building-o"></i>
					<span class="nav-label">Bodega</span>
					<span class="fa arrow"></span>
				</a>
				<ul class="nav nav-second-level">
					<li><a href="/insumos">Categorias</a></li>
					<li><a href="/insumos">Productos</a></li>
					<li><a href="/insumos">Inventario</a></li>
				</ul>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-flag"></i>
					<span class="nav-label">Ofertas</span>
					<span class="fa arrow"></span>
				</a>
				<ul class="nav nav-second-level">
					{{-- <li><a href="/insumos">Insumos</a></li> --}}
					{{-- <li><a href="/laboratorios">Laboratorios</a></li> --}}
				</ul>
			</li>
		</ul>
	</div>
</nav>