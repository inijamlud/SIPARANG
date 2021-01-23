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
            <form action="/barang/simpan" method="post">
                <?= csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-2">
                            <label for="kode_barang">Kode Barang</label>
                            <input type="text" name="kode_barang" id="kode_barang" class="form-control <?= $verror_msg->hasError('kode_barang') ? 'is-invalid' : ''; ?>" value="<?= old('kode_barang') ?>">
                            <div class="invalid-feedback">
                                <?= $verror_msg->getError('kode_barang'); ?>
                            </div>
                        </div>
                        <div class="form-group col-10">
                            <label for="nama_barang">Nama barang</label>
                            <input type="text" name="nama_barang" id="nama_barang" class="form-control <?= $verror_msg->hasError('nama_barang') ? 'is-invalid' : ''; ?>" value="<?= old('nama_barang') ?>">
                            <div class="invalid-feedback">
                                <?= $verror_msg->getError('nama_barang'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="merk">Merk</label>
                            <input type="text" name="merk" id="merk" class="form-control" value="<?= old('merk') ?>">
                        </div>
                        <div class="form-group col-6">
                            <label for="jenis">Jenis</label>
                            <input type="jenis" name="jenis" id="jenis" class="form-control" value="<?= old('jenis') ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                        <label for="unit">unit</label>
                        <input type="unit" name="unit" id="unit" class="form-control" value="<?= old('unit') ?>">
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