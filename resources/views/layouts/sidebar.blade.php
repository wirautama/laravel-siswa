<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="{{Request::is('admin/dashboard*') ? 'active' : ''}}">
        <a href="{{route('dashboard')}}"><i class="fa fa-home"></i><span>Dashboard</span></a>
    </li>
  


    <li class="treeview {{Request::is('admin/siswa*', 'admin/jurusan*', 'admin/guru*') ? 'active' : ''}}">
      <a href="#" >
        <i class="fa fa-table"></i> <span>Data Master</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="/admin/siswa" class="{{Request::is('admin/siswa*') ? 'text-bold' : ''}}"><i class="fa fa-circle-o"></i> Data Siswa</a></li>
        <li><a href="/admin/jurusan" class="{{Request::is('admin/jurusan*') ? 'text-bold' : ''}}"><i class="fa fa-circle-o"></i> Data jurusan</a></li>
        <li><a href="/admin/guru" class="{{Request::is('admin/guru*') ? 'text-bold' : ''}}"><i class="fa fa-circle-o"></i> Data Guru</a></li>
        <li><a href="/admin/mapel" class="{{Request::is('admin/mapel*') ? 'text-bold' : ''}}"><i class="fa fa-circle-o"></i> Data Mapel</a></li>
      </ul>
    </li>
    
    
    
  </ul>