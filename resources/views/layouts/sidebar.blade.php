<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#">KelasMaju</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="#">KM</a>
    </div>
    <ul class="sidebar-menu">
        {{-- Solusi fix prettier untuk remove spasi pada route --}}
        @php
        $dashboard = "dashboard";
        $userIndex = "user.index";
        $studentIndex = "student.index";
        $teacherIndex = "teacher.index";
        $mapelIndex = "mapel.index";
        @endphp
        
      <li class="menu-header">MENU</li>
      <li class="nav-item {{Request::is('admin') ? 'active' : ''}}">
        <a href="{{route($dashboard)}}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="nav-item {{Request::is('admin/user') ? 'active' : ''}}">
        <a href="{{route($userIndex)}}"><i class="fas fa-user"></i><span>Pengguna</span></a>
      </li>
      <li class="nav-item {{Request::is('admin/student') ? 'active' : ''}}">
        <a href="{{route($studentIndex)}}"><i class="fas fa-graduation-cap"></i><span>Siswa</span></a>
      </li>
      <li class="nav-item {{Request::is('admin/teacher') ? 'active' : ''}}">
        <a href="{{route($teacherIndex)}}"><i class="fas fa-graduation-cap"></i><span>Guru</span></a>
      </li>
      <li class="nav-item {{Request::is('admin/mapel') ? 'active' : ''}}">
        <a href="{{route($mapelIndex)}}"><i class="fas fa-calendar-alt"></i><span>Mapel</span></a>
      </li>
    </ul>
  </aside>
</div>