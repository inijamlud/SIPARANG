<?= view('admin/_partial/_header') ?>
<?= view('admin/_partial/_sidebar') ?>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    </div>

    <div class="col-12 mb-3">
        <div class="card shadow">
            <div class="card-header p-4">
                <p class="m-0 font-weight-bold text-primary"><i class="ni ni-app"></i> Tambah Barang</p>
            </div>
            <form action="/admin/pmj_simpan" method="post">
                <?= csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-8">
                            <label for="name">Nama Peminjam</label>
                            <input type="text" name="name" id="name" class="form-control <?= $verror_msg->hasError('name') ? 'is-invalid' : ''; ?>" value="<?= old('name') ?>">
                            <div class="invalid-feedback">
                                <?= $verror_msg->getError('name'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-8">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control <?= $verror_msg->hasError('email') ? 'is-invalid' : ''; ?>" value="<?= old('email') ?>">
                            <div class="invalid-feedback">
                                <?= $verror_msg->getError('email'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control <?= $verror_msg->hasError('username') ? 'is-invalid' : ''; ?>" value="<?= old('username') ?>">
                            <div class="invalid-feedback">
                                <?= $verror_msg->getError('username'); ?>
                            </div>
                        </div>
                        <div class="form-group col-4">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control <?= $verror_msg->hasError('password') ? 'is-invalid' : ''; ?>" value="<?= old('password') ?>">
                            <div class="invalid-feedback">
                                <?= $verror_msg->getError('password'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>


</div>
</div>

<?= view('admin/_partial/_footer') ?>