<?php include_once '../templates/header.php' ?>

<!-- content -->
<div class="container card shadow py-5 my-5">
    <h1 class="text-primary mb- font-title mb-5">User</h1>

    <div class="mb-3">
        <a class="btn btn-primary" href="<?= $base_url . 'admin/user/tambah'; ?>" role="button">Tambah</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Profil</th>
                    <th scope="col">Aktif</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
<!-- end content -->

<?php include_once '../templates/footer.php' ?>