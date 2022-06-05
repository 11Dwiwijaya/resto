<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="">Coffee Wijaya</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="<?= base_url('login/logout')?>">Sign out</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <?php if($this->session->userdata['id_level']==1) : ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= base_url('home')?>">
                            <span data-feather="home"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('Admin/daftarpegawai')?>">
                            <span data-feather="file"></span>
                            Pegawai
                        </a>
                    </li>

                    <?php elseif($this->session->userdata['id_level']==2) : ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= base_url('home/index')?>">
                            <span data-feather="home"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('Menu')?>">
                            <span data-feather="shopping-cart"></span>
                            Menu Makanan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('Laporan')?>">
                            <span data-feather="file"></span>
                            Laporan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('transaksi/transaksi')?>">
                            <span data-feather="list"></span>
                            Transaksi
                        </a>
                    </li>
                    <?php elseif($this->session->userdata['id_level']==3) : ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= base_url('home')?>">
                            <span data-feather="home"></span>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('Kasir')?>">
                            <span data-feather="shopping-cart"></span>
                            Kasir
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('kasir/transaksi')?>">
                            <span data-feather="layers"></span>
                            Riwayat Transaksi
                        </a>
                    </li>
                </ul>

                <?php endif; ?>


            </div>
        </nav>