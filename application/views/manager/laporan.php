<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('home')?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Laporan</li>
        </ol>
    </nav>
    <div class="mt-4 d-flex">
        <div style="width: 500px;" class="card">
            <div class="card-header">
                Laporam Harian
            </div>
            <div class="card-body">
                <?php form_open('laporan/getLaporan') ?>
                <label>Tanggal Awal</label>
                <input class="form-control" type="date" name="" id="">
                <label class="mt-2">Tanggal Akhir</label>
                <input class="form-control" type="date" name="" id="">
                <div class="row text-end">
                    <div class="">
                        <button type="submit" class="btn btn-primary mt-3">Cari</button>

                    </div>
                </div>
                <?php form_close() ?>
            </div>

        </div>
        <div style="width: 500px; margin-left: 20px;" class="card">
            <div class="card-header">
                Laporam Bulanan
            </div>
            <div class="card-body">
                <?php form_open('getLaporanBulanan') ?>
                <label>Pilih Bulan</label>
                <?php echo form_dropdown('bulan', $bulan, set_value('bulan'), 'class="form-select"'); ?>
                <div class="row text-end">
                    <div class="">
                        <button style="margin-top:80px" type="submit" class="btn btn-primary">Cari</button>

                    </div>
                </div>
                <?php form_close(); ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="card mt-3">
        <div class="card-header">
            Tabel Laporan
        </div>
        <div class="card-body">
            <table id="myTable" class="table table-hover table-responsive">
                <thead>
                    <tr>
                        <td>No.</td>
                        <td>Tanggal Transaksi</td>
                        <td>Nama Menu</td>
                        <td>Penjualan</td>
                        <td>Pemasukan</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan=3>Total </td>
                        <td>:</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</main>