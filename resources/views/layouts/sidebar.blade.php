<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="/">SiHadir</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="/">SH</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="nav-item dropdown @if(Request::segment(1) == 'students' OR Request::segment(1) == 'lecturers' OR Request::segment(1) == 'staffs') active @endif">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i> <span>Master</span></a>
          <ul class="dropdown-menu">
            <li class="@if(Request::segment(1) == 'students') active @endif"><a class="nav-link" href="{{Route('mhs')}}">Student</a></li>
            <li class="@if(Request::segment(1) == 'lecturers') active @endif"><a class="nav-link" href="{{Route('dsn')}}">Lecturer</a></li>
            <li class="@if(Request::segment(1) == 'staffs') active @endif"><a class="nav-link" href="{{Route('baak')}}">Staff</a></li>
            
          </ul>
        </li>
        <li class="nav-item dropdown @if(Request::segment(1) == 'classroom' OR Request::segment(1) == 'study-program' OR Request::segment(1) == 'class' OR Request::segment(1) == 'courses' OR Request::segment(1) == 'schedule') active @endif">
          <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Academic</span></a>
          <ul class="dropdown-menu">
            <li class="@if(Request::segment(1) == 'classroom') active @endif"><a class="nav-link" href="{{Route('ruang')}}">Classroom</a></li>
            <li class="@if(Request::segment(1) == 'study-program') active @endif"><a class="nav-link" href="{{Route('prodi')}}">Study Program</a></li>
            <li class="@if(Request::segment(1) == 'class') active @endif"><a class="nav-link" href="{{Route('kelas')}}">Class</a></li>
            <li class="@if(Request::segment(1) == 'schedule') active @endif"><a class="nav-link" href="{{Route('jadwal')}}">Schedule</a></li>
            <li class="@if(Request::segment(1) == 'courses') active @endif"><a class="nav-link" href="{{Route('matkul')}}">Courses</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown @if(Request::segment(1) == 'presence') active @endif">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-pencil-ruler"></i> <span>Presence Manager</span></a>
          <ul class="dropdown-menu">
            <li class="@if(Request::segment(1) == 'presence') active @endif"><a class="nav-link" href="{{Route('presensi')}}">Presence</a></li>
          </ul>
        </li>
  </aside>
</div>