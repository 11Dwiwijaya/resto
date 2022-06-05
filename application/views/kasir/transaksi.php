    <style>
tr {
    margin: 0 auto;
    vertical-align: middle !important;
    text-align: center !important;
}
    </style>


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
        <nav nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('home')?>">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Riwayat Transaksi</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header">
                <div class=" d-flex ">
                    <h5>Daftar Riwayat Transaksi</h5>
                    <a style="margin-right:23px" class="btn btn-sm btn-success mt-0 ms-auto d-flex"
                        href="<?= base_url('kasir') ?>">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="myTable">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Kode Transaksi</th>
                                <th>Tanggal Transaksi</th>
                                <th>Nama Konsumen</th>
                                <th>Kode Meja</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- jika data kosong nak ra dikek i gak pp -->
                            <?php if ($transaksi == null) : ?>
                            <tr>
                                <td colspan="5">Data Transaksi Kosong</td>
                            </tr>
                            <?php else : ?>
                            <!--  -->
                            <?php $no = 1;
                                    foreach ($transaksi as $val) :

                                    ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $val['kode_transaksi']; ?></td>
                                <td><?= $val['tanggal_transaksi']; ?></td>
                                <td><?= $val['customer']; ?></td>
                                <td><?= $val['id_meja'] ?></td>
                                <td>
                                    <a style="width: 70px;"
                                        href="<?=base_url('kasir/detailTransaksi/')  ;?><?=$val['id_transaksi']  ;?>"
                                        class="btn btn-success btn-sm">Detail</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>

    </main>