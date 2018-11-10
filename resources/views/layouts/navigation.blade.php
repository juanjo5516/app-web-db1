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
				<a href="index.html">
					<i class="fa fa-users"></i>
					<span class="nav-label">Inventario</span>
					<span class="fa arrow"></span>
				</a>
				<ul class="nav nav-second-level">
					<li><a href="/insumos">Insumos</a></li>
				</ul>
			</li>
			<li>
				<a href="index.html">
					<i class="fa fa-cog"></i>
					<span class="nav-label">Integrantes</span>
					<span class="fa arrow"></span>
				</a>
				<ul class="nav nav-second-level">
					<li><a href="/integrantes">Listado de integrantes</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>