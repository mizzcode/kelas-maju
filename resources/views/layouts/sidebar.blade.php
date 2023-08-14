<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="#">Mizz</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">Mz</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">MENU</li>
          <li class="nav-item {{Request::is('admin') ? 'active' : ''}}">
            <a href="{{route("dashboard")}}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
          </li>
          <li class="nav-item {{Request::is('admin/*') ? 'active' : ''}}">
            <a href="{{route("mahasiswa.index")}}"><i class="fa-solid fa-graduation-cap"></i><span>Mahasiswa</span></a>
          </li>
      </ul>
    </aside>
  </div>