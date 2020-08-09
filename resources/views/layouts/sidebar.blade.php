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
            <li class="@if(Request::segment(1) == 'students') active @endif"><a class="nav-link" href="{{url('students')}}">Students</a></li>
            <li class="@if(Request::segment(1) == 'lecturers') active @endif"><a class="nav-link" href="{{url('lecturers')}}">Lectures</a></li>
            <li class="@if(Request::segment(1) == 'staffs') active @endif"><a class="nav-link" href="{{url('staffs')}}">Staffs</a></li>
            
          </ul>
        </li>
        <li class="nav-item dropdown @if(Request::segment(1) == 'classrooms' OR Request::segment(1) == 'study-programs' OR Request::segment(1) == 'classes' OR Request::segment(1) == 'courses' OR Request::segment(1) == 'schedules') active @endif">
          <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Academic</span></a>
          <ul class="dropdown-menu">
            <li class="@if(Request::segment(1) == 'classrooms') active @endif"><a class="nav-link" href="{{url('classrooms')}}">Classroom</a></li>
            <li class="@if(Request::segment(1) == 'study-programs') active @endif"><a class="nav-link" href="{{url('study-programs')}}">Study Program</a></li>
            <li class="@if(Request::segment(1) == 'classes') active @endif"><a class="nav-link" href="{{url('classes')}}">Class</a></li>
            <li class="@if(Request::segment(1) == 'schedules') active @endif"><a class="nav-link" href="{{url('schedules')}}">Schedule</a></li>
            <li class="@if(Request::segment(1) == 'courses') active @endif"><a class="nav-link" href="{{url('courses')}}">Courses</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown @if(Request::segment(1) == 'presences') active @endif">
          <a href="#" class="nav-link has-dropdown"><i class="fas fa-pencil-ruler"></i> <span>Presence Manager</span></a>
          <ul class="dropdown-menu">
            <li class="@if(Request::segment(1) == 'presences') active @endif"><a class="nav-link" href="{{url('presences')}}">Presences</a></li>
          </ul>
        </li>
  </aside>
</div>