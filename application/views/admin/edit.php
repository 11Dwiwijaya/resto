<form action="<?= base_url('Admin/editdata') ?>" method="POST">
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('admin/index')?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/daftarpegawai')?>">Daftar Pegawai</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edir User</li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-header">
                Edit User
            </div>
            <div class="card-body">

                <div class="mb-3">

                    <label class="form-label">Nama User</label>
                    <input type="hidden" value="<?= $pegawai['id_user'] ?>" class="form-control" name="id_user">
                    <input type="text" value="<?= $pegawai['nama_user'] ?>" class="form-control" name="nm_pegawai">
                </div>
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" value="<?= $pegawai['username'] ?>" class="form-control" name="username">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="text" value="<?= $pegawai['password'] ?>" class="form-control" name="password">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="jenis_menu">Level:</label>
                    <select class="form-select" name="level" aria-label="Default select example">
                        <option hidden selected value="0">Pilih level</option>

                        <option value='2' <?php if ($pegawai['id_level'] == 2) {
                              echo "selected";
                            } ?>> Manager </option>
                        <option value='3' <?php if ($pegawai['id_level'] == 3) {
                              echo "selected";
                            } ?>> Kasir </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Edit Menu</button>

            </div>
        </div>


        </div>
    </main>
</form>