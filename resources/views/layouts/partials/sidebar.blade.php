<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      J
      <span class="brand-text font-weight-light">JHOCELYN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library --> 
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>
                Configuracion                
              </p>
            </a>
          </li>       
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-users-cog"></i>
              <p>
                Paramétricas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('categorias') }}" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Categorias</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="{{ url('productos') }}" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('proveedores') }}" class="nav-link">
                  <i class="fas fa-user nav-icon"></i>
                  <p>Provedores</p>
                </a>
              </li>               
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Pedidos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-file-alt nav-icon"></i>
                  <p>Nuevo pedido</p>
                </a>
              </li>            
            </ul>
          </li>  
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Ventas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-file-alt nav-icon"></i>
                  <p>Clientes</p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-file-alt nav-icon"></i>
                  <p>Ventas</p>
                </a>
              </li>            
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-file-contract"></i>
              <p>
                Reportes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('reportes') }}" class="nav-link">
                  <i class="fas fa-address-card nav-icon"></i>
                  <p></p>
                </a>
              </li>
                           
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Salir                
              </p>
            </a>
          </li>
   
        </ul>
      </nav>      

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>