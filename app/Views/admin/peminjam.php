<?= view('admin/_partial/_header'); ?>
<?= view('admin/_partial/_sidebar'); ?>

<div class="main-content" id="panel">
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Data Peminjam</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="/admin"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item">Master Data</li>
                                <li class="breadcrumb-item"><a href="">Data Peminjam</a></li>
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
                                <h3 class="mb-0">Data Peminjam </h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="/admin/pmj_tambah" class="btn btn-sm btn-primary"><i class="ni ni-fat-add"></i> Tambah peminjam</a>
                            </div>
                        </div>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">#</th>
                                    <th scope="col" class="sort" data-sort="budget">Nama peminjam</th>
                                    <th scope="col" class="sort" data-sort="status">Email</th>
                                    <th scope="col" class="sort" data-sort="completion">Username</th>
                                    <th class="sort"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                <?php $i=0; foreach ($dataPeminjam as $pmj) { ?>
                                    <tr>
                                        <th><?= ++$i;?></th>
                                        <td><?= $pmj['name']; ?></td>
                                        <td><?= $pmj['email']; ?></td>
                                        <td><?= $pmj['username']; ?></td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="/admin/pmj_hapus/<?= $pmj['id'];?>" onclick="return confirm('Anda yakin ingin mengapus?')">Hapus</a> 
                                                    <a class="dropdown-item" href="/admin/pmj_edit/<?= $pmj['id'];?>">Edit</a>
                                                </div>
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