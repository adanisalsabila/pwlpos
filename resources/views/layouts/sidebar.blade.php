<div class="sidebar">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            {{-- <div class="image">
                <img src="{{ asset('public/images/haruto.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div> --}}
        </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Dashboard Item -->
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link {{ ($activeMenu == 'dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>dashboard</p>
                </a>
            </li>

            <!-- Data Pengguna Section -->
            <li class="nav-header">users</li>

            <li class="nav-item">
                <a href="{{ route('level.index') }}" class="nav-link {{ ($activeMenu ?? '') == 'level' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-layer-group"></i>
                    <p>level user</p>
                </a>
            </li>
{{--             
            <li class="nav-item">
                <a href="{{ url('/level') }}" class="nav-link {{ ($activeMenu == 'level') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-layer-group"></i>
                    <p>level</p>
                </a>
            </li> --}}
            <li class="nav-item">
                <a href="{{ url('/user') }}" class="nav-link {{ ($activeMenu == 'user') ? 'active' : '' }}">
                    <i class="nav-icon far fa-user"></i>
                    <p>data user</p>
                </a>
            </li>

            <!-- Data Barang Section -->
            <li class="nav-header">barang</li>
            <li class="nav-item">
                <a href="{{ url('/kategori') }}" class="nav-link {{ ($activeMenu == 'kategori') ? 'active' : '' }}">
                    <i class="nav-icon far fa-bookmark"></i>
                    <p>kategori</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/barang') }}" class="nav-link {{ ($activeMenu == 'barang') ? 'active' : '' }}">
                    <i class="nav-icon far fa-list-alt"></i>
                    <p>data</p>
                </a>
            </li>

             <!-- SUPPLIER Section (New) -->
             <li class="nav-header">supplier</li>
             <li class="nav-item">
                 <a href="{{ url('/supplier') }}" class="nav-link {{ ($activeMenu == 'supplier') ? 'active' : '' }}">
                     <i class="nav-icon fas fa-truck"></i>
                     <p>data</p>
                 </a>
             </li>
             {{-- <li class="nav-item">
                <a class="nav-link @yield('active_supplier')" href="{{ route('supplier.index') }}">
                    Supplier
                </a>
            </li>
             --}}

            <!-- Data Transaksi Section -->
            <li class="nav-header">transaksi</li>
            <li class="nav-item">
                <a href="{{ url('/stok') }}" class="nav-link {{ ($activeMenu == 'stok') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cubes"></i>
                    <p>stok</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/penjualan') }}" class="nav-link {{ ($activeMenu == 'penjualan') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cash-register"></i>
                    <p>penjualan</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ url('/penjualan-detail') }}" class="nav-link {{ ($activeMenu == 'penjualandetail') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-cash-register"></i>
                    <p>penjualan detail</p>
                </a>
            </li>

             <!-- Tombol Logout -->
        {{-- <li>
            <li class="nav-header">Log Out</li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </li> --}}

        {{-- <li>
            <li class="nav-header">Log Out</li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout" style="background-color: red; color: white; padding: 10px 20px; border: none; cursor: pointer; width: 100%; text-align: center;">
                    Logout
                </button>
            </form> --}}
        
            <!-- CSS for the button -->
            {{-- <style>
                .btn-logout {
                    background-color: red; /* Warna latar belakang merah */
                    color: white; /* Warna teks putih */
                    padding: 10px 20px;
                    border: none;
                    cursor: pointer;
                    width: 100%;
                    text-align: center;
                    font-size: 16px; /* Ukuran font */
                    border-radius: 5px; /* Sudut melengkung */
                }
        
                .btn-logout:hover {
                    background-color: darkred; /* Warna saat hover */
                }
            </style> --}}

            {{-- <style>
                .sidebar {
                    background-color: #ffc0cb !important; /* Pink */
                }
            
                .sidebar .nav-link.active {
                    background-color: #ff69b4 !important; /* Hot pink untuk menu aktif */
                    color: white !important;
                }
            
                .sidebar .nav-link {
                    color: #6e0047 !important; /* Warna teks untuk link normal */
                }
            
                .sidebar .nav-header {
                    color: #c71585 !important; /* Warna judul section */
                }
            
                .sidebar .nav-icon {
                    color: #ff69b4 !important; /* Warna ikon */
                }
            </style>
             --}}
        </li>
        
        </ul>
    </nav>
</div>
