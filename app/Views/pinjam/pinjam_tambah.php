<?= view('_partial/_header') ?>
<?= view('_partial/_sidebar') ?>

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    </div>

    <div class="col-12 mb-3">
        <div class="card shadow">
            <div class="card-header p-4">
                <p class="m-0 font-weight-bold text-primary"><i class="ni ni-app"></i> Pinjam Barang</p>
            </div>
            <form action="/pinjam/simpan" method="post">
                <?= csrf_field(); ?>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-8">
                            <label for="name">Nama Peminjam</label>
                            <input type="text" name="name" id="name" class="form-control <?= $verror_msg->hasError('name') ? 'is-invalid' : ''; ?>" value="<?= user()->username; ?>" readonly>
                            <input type="text" name="id" id="id" class="form-control" value="<?= user()->id; ?>" hidden>
                            <div class="invalid-feedback">
                                <?= $verror_msg->getError('name'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-8">
                            <label for="tgl_pinjam">Tanggal Pinjam</label>
                            <input type="text" name="tgl_pinjam" id="tgl_pinjam" class="form-control <?= $verror_msg->hasError('tgl_pinjam') ? 'is-invalid' : ''; ?>" value="<?= date('Y-d-m'); ?>" readonly>
                            <div class="invalid-feedback">
                                <?= $verror_msg->getError('tgl_pinjam'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-8">
                            <label for="nama_barang">Nama Barang</label>
                            <select name="nama_barang" id="nama_barang" class="form-control">
                                <option value="">----Pilih Barang----</option>
                                <?php foreach ($dataBrg as $brg) {
                                    if ($brg['unit'] != 0) { ?>
                                        <option value="<?= $brg['kode_barang'] ?>"><?= $brg['nama_barang'] ?></option>
                                <?php }
                                } ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $verror_msg->getError('nama_barang'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="jumlah">Jumlah barang</label>
                            <input type="text" name="jumlah" id="jumlah" class="form-control <?= session()->has('stock') ? 'is-invalid' : ''; ?>" value="<?= old('jumlah') ?>">
                            <div class="invalid-feedback">
                                <?= session()->getFlashdata('stock'); ?>
                            </div>
                        </div>
                        <div class="form-group col-4">
                            <label for="tgl_kembali">Tanggal Kembali</label>
                            <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control <?= $verror_msg->hasError('tgl_kembali') ? 'is-invalid' : ''; ?>" value="<?= old('tgl_kembali') ?>">
                            <div class="invalid-feedback">
                                <?= $verror_msg->getError('tgl_kembali'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-8">
                            <label for="tujuan">Tujuan Peminjaman</label>
                            <input type="text" name="tujuan" id="tujuan" class="form-control <?= $verror_msg->hasError('tujuan') ? 'is-invalid' : ''; ?>" value="<?= old('tujuan') ?>">
                            <div class="invalid-feedback">
                                <?= $verror_msg->getError('tujuan'); ?>
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

<?= view('_partial/_footer') ?>