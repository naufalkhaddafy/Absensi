<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="{{ url('/dashboard') }}"><i
                class="fa fa-dashboard"></i>
            <span>Dashboard</span></a></li>
    @if (auth()->user()->level == 'admin')
        <li class="{{ request()->is('karyawan') ? 'active' : '' }}"><a href="{{ url('/karyawan') }}"><i
                    class="glyphicon glyphicon-user"></i> <span>Staff</span></a></li>
        <li class="{{ request()->is('rekapan') ? 'active' : '' }}"><a href="{{ url('/rekapan') }}"><i
                    class="glyphicon glyphicon-folder-open"></i> <span>Rekapan</span></a></li>
    @elseif(auth()->user()->level == 'user')

    @endif
    <li class="{{ request()->is('absensi') ? 'active' : '' }}"><a href="{{ url('/absensi') }}"><i
                class="glyphicon glyphicon-check"></i> <span>Absensi</span></a></li>
    <li class="{{ request()->is('#') ? 'active' : '' }}"><a href="#"><i class="glyphicon glyphicon-export"></i>
            <span>Disposisi</span></a></li>
</ul>
