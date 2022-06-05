<script src="<?= base_url('assets/js/jquery-3.6.0.min.js'); ?>"></script>
<script>
base_url = '<?php echo base_url('Kasir/pesanan'); ?>';
//default header
mapia = "	<?php
                        $base_url = 'Kasir';
                        echo base_url($base_url);
                        ?>";
//dropdown jenis menu
$(document).ready(function() {
    $("#jenis_menu").change(function() {
        var jenis_menu = $(this).val();
        console.log(jenis_menu);
        $.ajax({
            url: "<?php echo base_url() ?>Kasir/searchmenu",
            type: "POST",
            data: {
                "jenis_menu": jenis_menu
            },
            cache: false,
            success: function(msg) {
                $("#menu_name").html(msg);
            }
        })
    })
});
//auto harga
$(document).ready(function() {
    $("#menu_name").change(function() {
        var id_menu = $(this).val();
        console.log(id_menu)
        $.ajax({
            type: "POST",
            url: "<?= base_url('Kasir/searchharga'); ?>",
            data: {
                "id_menu": id_menu
            },
            cache: false,
            success: function(msg) {
                $("#harga_menu").val(msg);

            }
        })
    })
});
//uang kembali
$(function() {
    $("#bayar, #total_harga").keyup(function() {
        $("#kembali").val(+$("#bayar").val() - +$("#total_harga").val());
    });
});

//menyimpan data item 
function prosesSimpanItems() {
    var menu_name = document.getElementById("menu_name").value;
    var harga_menu = document.getElementById("harga_menu").value;
    var jml = document.getElementById("jml").value;
    var customer = document.getElementById("customer").value;
    var kodemeja = document.getElementById("kodemeja").value;

    $.ajax({
        type: "POST",
        url: "<?= base_url('Kasir/simpandatapesanan')?>",
        data: {
            'menu_name': menu_name,
            'harga_menu': harga_menu,
            'jml': jml,
            'customer': customer,
            'kodemeja': kodemeja,

        },
        success: function(msg) {
            window.location.replace(mapia);

        }
    });
}
//     if(document.getElementById("kem").value.length == 0)
//     {
//     alert("empty")
// }
</script>
<?php echo form_open('Kasir/prosesSimpanPesanan') ?>
<?php 
    $data     = $this->session->userdata('addArrayTransaksiPesanan');
    $customer = $this->session->userdata('customer');
    $kodemeja = $this->session->userdata('kodemeja');
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
    <!-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('home')?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kasir</li>
        </ol>
    </nav> -->
    <!-- Card Atas Pesanan -->
    <div class="card">
        <div class="card-header">
            Pesanan
        </div>
        <?= form_open() ?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Nama Konsumen</label>
                    <input autocomplete="off" type="text" value="<?= $customer?>" id="customer" name="customer"
                        class="form-control" />
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal Pesanan</label>
                    <input type="text" value="<?= date('Y-m-d'); ?>" readonly id="tgl" name="tgl"
                        class="form-control" />
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <label class="form-label">Nomor Meja</label>
                    <input autocomplete="off" type="text" value="<?= $kodemeja?>" id="kodemeja" name="kodemeja"
                        class="form-control" />
                </div>
                <div class="col-md-6">
                    <label class="form-label">Kode Transaksi</label>
                    <input type="text" readonly value="<?= $fixcode?>" id="kode_transaksi" name="kode_transaksi"
                        class="form-control" />
                </div>


            </div>
        </div>
        <!--  Card Pesanan -->
        <div class="card mt-3">
            <div class="card-header">
                Data Pemesanan
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Jenis Menu</label>
                        <select class="form-select" name="jenis_menu" id="jenis_menu"
                            aria-label="Default select example">
                            <option selected hidden value="0">Jenis Menu</option>
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Harga</label>
                        <input type="text" readonly value="" name="harga_menu" id="harga_menu" class="form-control" />
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="form-label">Nama Menu</label>
                        <select class="form-select" name="" id="menu_name">
                            <option value="0">Pilih menu</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jumlah</label>
                        <input autocomplete="off" type="text" value="" id="jml" name="jml" class="form-control" />
                    </div>
                </div>
                <div class="text-end">
                    <div class="">
                    </div>
                    <a style="width:83px" class="btn btn-success mt-3" href="<?= site_url('kasir/unset') ?>">Unset</a>
                    <div class="">
                    </div>
                    <input type="button" value="Tambah" name="add2" class="btn btn-success mt-3"
                        onClick="prosesSimpanItems();">
                </div>
            </div>
        </div>
        <?= form_close();?>
    </div>
    <?php
            $itemPesanan = $this->session->userdata('addArrayTransaksiPesanan');
            //var_dump($itemPesanan);
            ?>

    <!-- Card Daftar Pesanan -->
    <div class="card mt-2">
        <div class="card-header">Daftar Pesanan</div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-ordered table-hover table-full-width">
                <thead>
                    <th>No.</th>
                    <th>Nama Mneu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th style="width : 200px;">Aksi</th>
                </thead>
                <tbody>
                    <?php if ($itemPesanan == null): ?>

                    <?php else                     : ?>
                    <?php 
                        $i     = 1;
                        $total = 0;
                        foreach ($itemPesanan as $it): ?>
                    <?php //var_dump($it); ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $this->modelKasir->getMenuName($it['menu_name']) ?></td>
                        <td><?= $it['harga_menu']  ?></td>
                        <td><?= $it['jml']  ?></td>
                        <td><?= $it['harga_menu'] * $it['jml'] ?></td>
                        <td><a href="<?= base_url('kasir/hapusDataPemesanan/'); ?><?= $it['date']; ?>"
                                onclick="return confirm ('yakin?')" class="btn btn-danger">Hapus</a></td>
                    </tr>
                    <?php 
                    $tot = $it['harga_menu'] * $it['jml'];
                    $total += $tot;
                    
                    ?>

                    <?php endforeach; ?>
                    <!-- Total Harus Bayar -->
                    <tr>
                        <td colspan="4">
                            <h class="tet-center">Jumlah Total</h>
                        </td>
                        <td>:</td>
                        <td style="text-align : right !important">
                            <div class="form-group">
                                <input type="number " readonly style="text-align : right !important"
                                    class="form-control" name="subtotal_item" id="total_harga" type="text"
                                    value="<?= $total ?>">
                            </div>
                        </td>
                    </tr>
                    <!-- Bayar -->
                    <tr>
                        <td colspan="4">
                            <h>Bayar</h>

                        </td>
                        <td>:</td>
                        <td style="text-align : right !important">
                            <div class="form-group">
                                <input style="text-align : right !important" class="form-control" type="number"
                                    name="subtotal_item" id="bayar">
                            </div>
                        </td>
                    </tr>
                    <!-- Kembali -->
                    <tr>
                        <td colspan="4">
                            <h>Kembali</h 6>
                        </td>
                        <td>:</td>
                        <td style="text-align : right !important">
                            <div class="form-group">
                                <input readonly min="0" style="text-align : right !important" class="form-control"
                                    type="number" name="subtotal_item" id="kembali">
                            </div>
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-12 " style="text-align : right !important">
                <button type="submit" class="btn btn-success"> Simpan</button>
            </div>
        </div>
    </div>
    <?php echo form_close()?>
</main>
<style>
tr {
    margin: 0 auto;
    vertical-align: middle !important;
    text-align: center !important;
}
</style>