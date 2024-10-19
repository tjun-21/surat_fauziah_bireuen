<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ $active==="dashboard" ? 'active':'' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home"></span>
                    DASHBOARD
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ $active==="list-surat" ? 'active':'' }} collapsed " data-bs-toggle="collapse" href="#collapseExamplelistsur" aria-labelledby="headingTwo" data-parent="#accordionSidebar" aria-controls="collapseExample">
                    <span data-feather="file-text"></span>
                    LIST SURAT
                </a>
                <div class="collapse" id="collapseExamplelistsur">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="/cuti" class="nav-link">
                                    <p class="text-dark m-0"> CUTI</p>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="/surat" class="nav-link">
                                    <p class="text-dark m-0">LAINNYA</p>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </li>
            {{-- <li class="nav-item">
            <a class="nav-link {{ $active==="surat_cuti" ? 'active':'' }} collapsed " data-bs-toggle="collapse" href="#collapseExamplecuti" aria-labelledby="headingTwo" data-parent="#accordionSidebar" aria-controls="collapseExample">
            <span data-feather="file-text"></span>
            BUAT SURAT
            </a>
            <div class="collapse" id="collapseExamplecuti">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">

                            <a href="/cuti/karyawan/pns" class="nav-link">
                                <p class="text-dark m-0">PNS</p>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="/cuti/karyawan/p3k" class="nav-link">
                                <p class="text-dark m-0">P3K</p>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="/cuti/karyawan/kontrak" class="nav-link">
                                <p class="text-dark m-0">KONTRAK</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $active==="surat_lainnya" ? 'active':'' }} collapsed " data-bs-toggle="collapse" href="#collapseExamplelain" aria-labelledby="headingTwo" data-parent="#accordionSidebar" aria-controls="collapseExample">
                    <span data-feather="file-text"></span>
                    SURAT LAINNYA
                </a>
                <div class="collapse" id="collapseExamplelain">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="/surat/pns" class="nav-link">
                                    <p class="text-dark m-0">PNS</p>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="/surat/p3k" class="nav-link">
                                    <p class="text-dark m-0">P3K</p>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="/surat/kontrak" class="nav-link">
                                    <p class="text-dark m-0">KONTRAK</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li> --}}

            <li class="nav-item">
                <a class="nav-link {{ $active==="karyawan" ? 'active':'' }} collapsed " data-bs-toggle="collapse" href="#collapseExample" aria-labelledby="headingTwo" data-parent="#accordionSidebar" aria-controls="collapseExample">
                    <span data-feather="user"></span>
                    KARYAWAN
                </a>
                <div class="collapse" id="collapseExample">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="/PNS/pns" class="nav-link">
                                    <p class="text-dark m-0">PNS</p>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="/P3K/p3k" class="nav-link">
                                    <p class="text-dark m-0">P3K</p>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="/KONTRAK/kontrak" class="nav-link ">
                                    <p class="text-dark m-0">KONTRAK</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link {{ $active==="datamaster" ? 'active':'' }} collapsed " data-bs-toggle="collapse" href="#collapseExampledat" aria-labelledby="headingTwo" data-parent="#accordionSidebar" aria-controls="collapseExample">
                    <span data-feather="list"></span>
                    DATA MASTER
                </a>
                <div class="collapse" id="collapseExampledat">
                    <div class="card">
                        <ul class="list-group list-group-flush">

                            <li class="list-group-item">
                                <a href="/kategori" class="nav-link ">
                                    <p class="text-dark m-0">Kategori </p>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="/fungsional" class="nav-link">
                                    <p class="text-dark m-0">Fungsional</p>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="/pangkat" class="nav-link">
                                    <p class="text-dark m-0">Pangkat</p>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="/golongan" class="nav-link ">
                                    <p class="text-dark m-0">Golongan</p>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="/jabatan" class="nav-link">
                                    <p class="text-dark m-0">Jabatan</p>
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="/bidang" class="nav-link">
                                    <p class="text-dark m-0">Bidang</p>
                                </a>
                            </li>

                            <li class="list-group-item">
                                <a href="/unit" class="nav-link ">
                                    <p class="text-dark m-0">Unit Kerja</p>
                                </a>
                            </li>


                        </ul>
                    </div>
                </div>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="log-out"></span>
                    Logout
                </a>
            </li>
            {{-- <li class="nav-item">
            <a class="nav-link" href="#">
            <span data-feather="users"></span>
            Customers
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            <span data-feather="bar-chart-2"></span>
            Reports
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
            <span data-feather="layers"></span>
            Integrations
            </a>
        </li> --}}
        </ul>
    </div>
</nav>