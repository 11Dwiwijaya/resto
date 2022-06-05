    <style>
tr {
    margin: 0 auto;
    vertical-align: middle !important;
    text-align: center !important;
}
    </style>

    <script>
var table = document.getElementById("table"),
    sumVal = 0;

for (var i = 1; i < table.rows.length; i++) {
    sumVal = sumVal + parseInt(table.rows[i].cells[2].innerHTML);
}

document.getElementById("val").innerHTML = "Sum Value = " + sumVal;
console.log(sumVal);
    </script>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
        <nav nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('home')?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('transaksi/transaksi')?>">Riwayat Transaksi</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Transaksi</li>
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
                    <table class="table table-bordered table-hover" id="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Menu</th>
                                <th>Harga Menu</th>
                                <th>Jumlah Pesanan</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- jika data kosong nak ra dikek i gak pp -->
                            <?php if ($detail == null) : ?>
                            <tr>
                                <td colspan="5">Data Transaksi Kosong</td>
                            </tr>
                            <?php else : ?>
                            <!--  -->
                            <?php $no = 1;
                                    $total = 0;
                                    foreach ($detail as $d) :
                                    


                                    ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $d['nama_masakan']; ?></td>
                                <td><?= $d['harga']; ?></td>
                                <td><?= $d['jumlah_pesanan']; ?></td>
                                <td><?= $d['jumlah_pesanan'] *$d['harga'] ?></td>

                            </tr>
                            <?php 
                                        $tot = $d['jumlah_pesanan'] *$d['harga'] ;
                                        $total += $tot;
                                        ?>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="3">Total Keseluruhan</td>
                                <td>:</td>
                                <td>

                                    <input type="number " readonly style="text-align : center !important"
                                        class="form-control" name="subtotal_item" id="val" type="text"
                                        value="<?= $total ?>">
                                </td>
                            </tr>
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