<nav class="navbar navbar-expand navbar-dark bg-dark static-top">
  <a class="navbar-brand mr-1" href="index.html">DB1</a>
  <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
    <i class="fa fa-bars"></i>
  </button>
  <ul class="navbar-nav ml-auto mr-md-0">
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-user-circle fa-fw fa-lg"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
        <a  class="dropdown-item" href="#"><strong>{{Auth::user()->name}}</strong></a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Perfil</a>
        <a class="dropdown-item" href="#">Configuración</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Cerrar sesión</a>
      </div>
    </li>
  </ul>
</nav>