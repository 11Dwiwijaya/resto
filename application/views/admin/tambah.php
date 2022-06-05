<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/index')?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('admin/daftarpegawai')?>">Daftar Pegawai</a></li>

            <li class="breadcrumb-item active" aria-current="page">Tambah Pegawai</li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-header">Tambah Pegawai</div>
        <div class="card-body">

            <form action="<?= base_url('admin/tambahdata') ?>" method="POST">
                <div class="mb-3">

                    <label class="form-label">Nama user</label>
                    <input type="text" autocomplete="off" class="form-control" name="nm_user">
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" autocomplete="off" class="form-control" name="username">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="text" autocomplete="off" class="form-control" name="pass">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="jenis_menu">Level:</label>
                    <select class="form-select" name="level" aria-label="Default select example">
                        <option hidden selected value="0">Pilih level</option>
                        <option value="2">Manager</option>
                        <option value="3">Kasir</option>


                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Tambah Pegawai</button>
            </form>
        </div>

    </div>
</main>