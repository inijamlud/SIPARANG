<?= view('_partial/_header'); ?>
<?= view('_partial/_sidebar'); ?>

<div class="main-content" id="panel">
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-10 col-10">
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item">Master Data</li>
                                <li class="breadcrumb-item"><a href="">Laporan Pengembalian</a></li>
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
                                <h3 class="mb-0">Laporan Pengembalian </h3>
                            </div>
                        </div>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort">#</th>
                                    <th scope="col" class="sort">Tanggal Pengajuan</th>
                                    <th scope="col" class="sort">Tanggal Kembali</th>
                                    <th scope="col" class="sort">Nama Barang</th>
                                    <th scope="col" class="sort text-center">Jumlah</th>
                                    <th scope="col" class="sort">Status</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php $i = 0;
                                foreach ($lappmj as $trs) { ?>
                                    <tr>
                                        <th><?= ++$i; ?></th>
                                        <td><?= $trs['tgl_pinjam']; ?></td>
                                        <td><?= $trs['tgl_kembali']; ?></td>
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
                                                    <span class="status text-green">Dipinjam</span>
                                                </span>
                                            </td>
                                        <?php } elseif ($trs['status'] == '2') { ?>
                                            <td>
                                                <span class="badge badge-dot mr-4">
                                                    <span class="status text-info">Dikembalikan</span>
                                                </span>
                                            </td>
                                        <?php } elseif ($trs['status'] == '3') { ?>
                                            <td>
                                                <span class="badge badge-dot mr-4">
                                                    <span class="status text-danger">Ditolak</span>
                                                </span>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        <!-- <? $pager->links('brg_pages', 'custom_pagination') ?> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('_partial/_footer'); ?>