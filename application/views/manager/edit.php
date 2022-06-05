<form action="<?= base_url('menu/editdata') ?>" method="POST">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('home')?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('menu')?>">Daftar Menu</a></li>
                <li class="breadcrumb-item active">Edit Menu</li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-header">Edit Menu</div>
            <div class="card-body">

                <label class="form-label" for="jenis_menu">Jenis Menu:</label>
                <select class="form-select mb-2" name="jenis_menu" aria-label="Default select example">
                    <option selected hidden value="0">Jenis Menu</option>
                    <option value="makanan" <?php if ($menu['jenis_masakan'] == 'makanan') {
                                    echo "selected";
                                  } ?>>Makanan</option>
                    <option value="minuman" <?php if ($menu['jenis_masakan'] == 'minuman') {
                                    echo "selected";
                                  } ?>>Minuman</option>
                </select>
                <label class="form-label">Nama Masakan</label>
                <input type="hidden" value="<?= $menu['id_masakan'] ?>" class="form-control" name="id_masakan">
                <input type="text" value="<?= $menu['nama_masakan'] ?>" class="form-control mb-2" name="nama_masakan">
                <label class="form-label">Harga Masakan Masakan</label>
                <input type="text" value="<?= $menu['harga'] ?>" class="form-control mb-2" name="harga">
                <label class="form-label">Status Masakan</label>
                <input type="text" value="<?= $menu['status_masakan'] ?>" class="form-control " name="status_masakan">
                <button type="submit" class="btn btn-circle btn-primary mt-3"><span data-feather="save"></span></button>
            </div>

    </main>
</form>