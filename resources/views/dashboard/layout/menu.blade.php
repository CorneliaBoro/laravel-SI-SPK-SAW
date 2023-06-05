<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                <li class="nav-header">MENU UTAMA</li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>

                <li class="nav-header">PROSES SPK</li>
                <li class="nav-item">
                    <a href="/dashboard/dataalternatif" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>
                            Data Alternatif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/datakriteria" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>
                            Data Kriteria
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="/dashboard/datasub" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>
                            Data Sub Kriteria
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="/dashboard/datapenilaian" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p>
                            Penilaian Alternatif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/proses" class="nav-link">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>
                            Proses Perhitungan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/hasil" class="nav-link">
                        <i class="nav-icon far fa-file"></i>
                        <p>
                            Data Hasil Keputusan
                        </p>
                    </a>
                </li>

                <li class="nav-header">DATA PELAKU</li>
                <li class="nav-item">
                    <a href="/dashboard/datauser" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Data Pengguna
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/dataaslab" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Data Aslab
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/datadosen" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Data Dosen
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/datalab" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Data Laboratorium
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard/dataprak" class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Data Praktikum
                        </p>
                    </a>
                </li>
        </nav>
    </ul>
</nav>
