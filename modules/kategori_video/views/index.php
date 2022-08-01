<div id="content-wrapper">
    <div class="container-fluid admin pb-0">
        <div class="video-block section-padding">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="background-color: #1c1c1c;">
                        <div class="card-header d-flex justify-content-between">
                            <h5 style="color: #FFFFFF; font-weight: 600;">Kategori Video</h5>
                            <div class="dropdown">
                                <button class="btn btn-plus" type="button" data-bs-toggle="modal" data-bs-target="#modalTambahKategori">
                                    <i class="fa-duotone fa-plus text-white"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body mx-3">
                            <table class="table table-borderless text-center text-white">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 50px;">No</th>
                                        <th scope="col">Nama Kategori</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($result) : ?>
                                        <?php $no = 1;
                                        foreach ($result as $row) : ?>
                                            <tr>
                                                <th scope="row"><?= $no++; ?></th>
                                                <td><?= $row->nama; ?></td>
                                                <td>
                                                    <button class="btn btn-sm btn-light"><i class="fa-duotone fa-pen-to-square"></i></button>
                                                    <button class="btn btn-sm btn-light"><i class="fa-duotone fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="3">
                                                <center>Tidak ada data kategori</center>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>