<style>
td.aksi {
    text-align: center;
    vertical-align: middle;
}
</style>
<script src="<?= base_url('assets/js/jquery-3.6.0.min.js'); ?>"></script>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin/index')?>">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Pegawai</li>
            </ol>
        </nav>


        <div class="card">
            <div class="card-header d-flex mb-2">
                <h>Daftar Karyawan</h>
                <a style=";" class="btn btn-sm btn-success mt-0 ms-auto d-flex"
                    href="<?= base_url('admin/tambah') ?>">Tambah</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table id="myTable" class=" table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Pegawai</th>
                                <th>Username</th>

                                <th>Level</th>
                                <th style="text-align: center; vertical-align: middle;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- jika data kosong nak ra dikek i gak pp -->
                            <?php if ($pegawai == null) : ?>
                            <tr>
                                <td colspan="5">Data Transaksi Kosong</td>
                            </tr>
                            <?php else : ?>
                            <!--  -->
                            <?php
            $no = 1;
            foreach ($pegawai as $p) :
            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $p['nama_user']; ?></td>
                                <td><?= $p['username']; ?></td>


                                <td><?= $p['id_level']; ?></td>

                                <td style="text-align: center; vertical-align: middle;">

                                    <a href="<?= base_url('admin/edit/'); ?><?= $p['id_user']; ?>"
                                        class="btn btn-warning"><span data-feather="edit-2"></span></a>
                                    <a href="<?= base_url('admin/hapus/'); ?><?= $p['id_user']; ?>"
                                        class="btn btn-danger"><span data-feather="trash"></span></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
</main>