<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="/">
            <span class="align-middle">Aplikasi Siakad</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item active">
                <a class="sidebar-link" href="/">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-header">
                Module Master
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('identitas') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Identitas Sekolah</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.kelas') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data Kelas</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.mapel') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data Mata Pelajaran</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.tahun_ajaran') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data Tahun Ajaran</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.ruangan') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data Ruangan</span>
                </a>
            </li>


            <li class="sidebar-header">
                Modul Pengguna
            </li>


            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.siswa') }}">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Data Siswa</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.guru') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data Guru</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.administrator') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Data Administrator</span>
                </a>
            </li>

            <li class="sidebar-header">
                Module Siswa
            </li>

             <li class="sidebar-item">
                <a class="sidebar-link" href="/">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Data Guru</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="/">
                    <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Data Mata Pelajaran</span>
                </a>
            </li>

            <li class="sidebar-header">
                Module Laporan
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="/">
                    <i class="align-middle" data-feather="map"></i> <span class="align-middle">Data Laporan</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
