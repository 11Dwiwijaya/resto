<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('home')?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('menu')?>">Daftar Menu</a></li>
            <li class="breadcrumb-item active">Tambah Menu</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">Tambah Menu</div>
        <div class="card-body">
            <form action="<?= base_url('menu/tambahmenu') ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label" for="jenis_menu">Jenis Menu:</label>
                    <select class="form-select mb-3" name="jenis_menu" aria-label="Default select example">
                        <option selected hidden value="0">Jenis Menu</option>
                        <option value="makanan">Makanan</option>
                        <option value="minuman">Minuman</option>
                    </select>
                    <label class="form-label">Nama Masakan</label>
                    <input type="text" class="form-control" name="nm_menu">
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga Masakan Masakan</label>
                    <input type="text" class="form-control" name="hg_menu">
                </div>
                <div class="mb-3">
                    <label class="form-label">Status Masakan</label>
                    <input type="text" class="form-control" name="st_menu">
                </div>
                <button type="submit" class="btn btn-primary"><span data-feather="plus"></span></button>
            </form>

        </div>
    </div>
</main>