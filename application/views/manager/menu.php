<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('home')?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Menu</li>
        </ol>
    </nav>
    <div class=" card">
        <div class=" card-header mb-2 d-flex ">
            <h5>Daftar Menu</h5>
            <a style="" class="btn btn-sm btn-success ms-auto d-flex" href="<?= base_url('menu/tambah') ?>">Tambah
                Menu</a>
        </div>
        <div class="card-body">
            <table id="myTable" class="table display">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Menu</th>
                        <th>Jenis Masakan</th>
                        <th>Harga</th>
                        <th>Status</th>

                        <th style="text-align: center; vertical-align: middle;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- jika data kosong nak ra dikek i gak pp -->
                    <?php if ($menu == null) : ?>
                    <tr>
                        <td colspan="5">Data Transaksi Kosong</td>
                    </tr>
                    <?php else : ?>
                    <!--  -->
                    <?php
          $no = 1;
          foreach ($menu as $m) :
          ?>

                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $m['nama_masakan']; ?></td>
                        <td><?= $m['jenis_masakan']; ?></td>
                        <td><?= $m['harga']; ?></td>
                        <td><?= $m['status_masakan']; ?></td>
                        <td style="text-align: center; vertical-align: middle;">
                            <a href="<?= base_url('menu/edit/'); ?><?= $m['id_masakan']; ?>"
                                class="btn btn-warning"><span data-feather="edit-2"></span></a>
                            <a href="<?= base_url('menu/hapus/'); ?><?= $m['id_masakan']; ?>"
                                class="btn btn-danger"><span data-feather="trash"></span></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>