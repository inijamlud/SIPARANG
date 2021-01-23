<?= view('_partial/_header') ?>
<?= view('_partial/_sidebar') ?>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    </div>

    <div class="col-12 mb-3">
        <div class="card shadow">
            <div class="card-header p-4">
                <p class="m-0 font-weight-bold text-primary"><i class="ni ni-app"></i> Edit Barang</p>
            </div>
            <?php foreach ($peminjam as $pmj) { ?>
                <form action="/peminjam/proses_edit/<?= $pmj['id']; ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-8">
                                <label for="name">Nama Peminjam</label>
                                <input type="text" name="name" id="name" class="form-control <?= $verror_msg->hasError('name') ? 'is-invalid' : ''; ?>" value="<?= $pmj['name'] ?>">
                                <div class="invalid-feedback">
                                    <?= $verror_msg->getError('name'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-8">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control <?= $verror_msg->hasError('email') ? 'is-invalid' : ''; ?>" value="<?= $pmj['email'] ?>">
                                <div class="invalid-feedback">
                                    <?= $verror_msg->getError('email'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="username">Username</label>
                                <input type="username" name="username" id="username" class="form-control <?= $verror_msg->hasError('username') ? 'is-invalid' : ''; ?>" value="<?= $pmj['username'] ?>">
                                <div class="invalid-feedback">
                                    <?= $verror_msg->getError('username'); ?>
                                </div>
                            </div>
                            <div class="form-group col-4">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control <?= $verror_msg->hasError('password') ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback">
                                    <?= $verror_msg->getError('password'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>


</div>
</div>

<?= view('_partial/_footer') ?>