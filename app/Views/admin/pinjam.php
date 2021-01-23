<?= view('admin/_partial/_header'); ?>
<?= view('admin/_partial/_sidebar'); ?>

<div class="main-content" id="panel">
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-10 col-10">
                        <h6 class="h2 text-white d-inline-block mb-0">Transaksi Peminjaman</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item">Master Data</li>
                                <li class="breadcrumb-item"><a href="">Transaksi Peminjaman</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Card stats -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Transaksi Peminjaman </h3>
                            </div>
                        </div>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort">#</th>
                                    <th scope="col" class="sort">Tanggal Pinjam</th>
                                    <th scope="col" class="sort">Nama peminjam</th>
                                    <th scope="col" class="sort">Nama Barang</th>
                                    <th scope="col" class="sort text-center">Jumlah</th>
                                    <th scope="col" class="sort">Status</th>
                                    <th scope="col" class="sort">Konfirmasi</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php $i = 0;
                                foreach ($dataTransaksi as $trs) { ?>
                                    <tr>
                                        <th><?= ++$i; ?></th>
                                        <td><?= $trs['tgl_pinjam']; ?></td>
                                        <td><?= $trs['name']; ?></td>
                                        <td><?= $trs['nama_barang']; ?></td>
                                        <td class="text-center"><?= $trs['jumlah']; ?></td>
                                        <?php if ($trs['status'] == '0') { ?>
                                            <td class="text-right">
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-danger"></i>
                                                    <span class="status text-warning">Menunggu Konfirmasi</span>
                                                </span>
                                            </td>
                                        <?php } elseif ($trs['status'] == '1') { ?>
                                            <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-green"></i>
                                                    <span class="status">Dipinjam</span>
                                                </span>
                                            </td>
                                        <?php } elseif ($trs['status'] == '2') { ?>
                                            <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-warning"></i>
                                                    <span class="status">Dikembalikan</span>
                                                </span>
                                            </td>
                                        <?php } elseif ($trs['status'] == '3') { ?>
                                            <td>
                                                <span class="badge badge-dot mr-4">
                                                    <i class="bg-warning"></i>
                                                    <span class="status">Ditolak</span>
                                                </span>
                                            </td>
                                        <?php } ?>

                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <?php if ($trs['status'] == '0') { ?>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="<?= base_url('admin/pinjam_ok/' . $trs['id_peminjaman']) ?>" method="post">
                                                            <input type="hidden" name="kode_barang" value="<?= $trs['kode_barang']; ?>">
                                                            <input type="hidden" name="id_peminjaman" value="<?= $trs['id_peminjaman']; ?>">
                                                            <button type="submit" class="dropdown-item"><i class="fa fa-check"></i>Konfirmasi</button>
                                                        </form>
                                                        <form action="<?= base_url('admin/pinjam_tolak/' . $trs['id_peminjaman']) ?>" method="post">
                                                            <input type="hidden" name="id_pinjam" value="<?= $trs['id_peminjaman'] ?>">
                                                            <input type="hidden" name="id_peminjam" value="<?= $trs['id_user'] ?>">
                                                            <input type="hidden" name="kode_barang" value="<?= $trs['kode_barang'] ?>">
                                                            <input type="hidden" name="jml" value="<?= $trs['jumlah'] ?>">
                                                            <input type="hidden" name="tgl_pinjam" value="<?= $trs['tgl_pinjam'] ?>">
                                                            <input type="hidden" name="tgl_kembali" value="<?= $trs['tgl_kembali'] ?>">
                                                            <input type="hidden" name="status" value="0">
                                                            <button type="submit" class="dropdown-item"><i class="fa fa-times"></i>Tolak</button>
                                                        </form>
                                                    </div>
                                                <?php } elseif ($trs['status'] == '1') { ?>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <form action="<?= base_url('admin/pinjam_ok/' . $trs['id_peminjaman']) ?>" method="post">
                                                            <input type="hidden" name="kode_barang" value="<?= $trs['kode_barang']; ?>">
                                                            <input type="hidden" name="id_peminjaman" value="<?= $trs['id_peminjaman']; ?>">
                                                            <button type="submit" class="dropdown-item"><i class="fa fa-check"></i>Konfirmasi</button>
                                                        </form>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fas fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('admin/_partial/_footer'); ?>