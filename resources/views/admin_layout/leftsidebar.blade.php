  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
      <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">MINI CRM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview {{request()->is('admin') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{request()->is('admin') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt "></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>  
              </p>
            </a>
            <ul class="nav nav-treeview ">
              <li class="nav-item">
                <a href="{{url('/admin')}}" class="nav-link {{request()->is('admin') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>CMR Dashboard</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{request()->is('admins') ? 'menu-open' : ''}} {{request()->is('admins') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{request()->is('admins') ? 'active' : ''}} {{request()->is('admins') ? 'active' : ''}} ">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                admin list
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/addadmin')}}" class="nav-link {{request()->is('addeadmin') ? 'active' : ''}}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Add Admin</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/adminlist')}}" class="nav-link {{request()->is('categories') ? 'active' : ''}} ">
                  <i class="far fa-file nav-icon"></i>
                  <p>List des admins</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{request()->is('empolyees') ? 'menu-open' : ''}} {{request()->is('addempolyee') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{request()->is('empolyees') ? 'active' : ''}} {{request()->is('addempolyee') ? 'active' : ''}} ">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Empolyees
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/invite')}}" class="nav-link {{request()->is('invite') ? 'active' : ''}}">
                  <i class="far fa-file nav-icon"></i>
                  <p>Invite empolyee</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/categories')}}" class="nav-link {{request()->is('categories') ? 'active' : ''}} ">
                  <i class="far fa-file nav-icon"></i>
                  <p>List des employées</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview {{request()->is('addentreprise') ? 'menu-open' : ''}} {{request()->is('entreprises') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{request()->is('addentreprise') ? 'active' : ''}} {{request()->is('entreprises') ? 'active' : ''}}">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Géstion d'entreprises
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/addentreprise')}}" class="nav-link {{request()->is('addentreprise') ? 'active' : ''}}">
                  <i class="far fa-file nav-icon"></i>
                  <p>ajouter une entreprise</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/entrepriselist')}}" class="nav-link {{request()->is('entrepriselist') ? 'active' : ''}} ">
                  <i class="far fa-file nav-icon"></i>
                  <p>List des Entreprises</p>
                </a>
              </li>
            </ul> 
          </li>
     
          <li class="nav-item has-treeview {{request()->is('vuehistory') ? 'menu-open' : ''}} {{request()->is('vuehistory') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{request()->is('vuehistory') ? 'active' : ''}} {{request()->is('vuehistory') ? 'active' : ''}}">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Géstion d'historique
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/vuehistory')}}" class="nav-link {{request()->is('vuehistory') ? 'active' : ''}}">
                  <i class="far fa-file nav-icon"></i>
                  <p>voire l'historique</p>
                </a>
              </li>
            </ul>
          </li>     
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>