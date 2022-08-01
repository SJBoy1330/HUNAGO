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
                        <div class="card-body mx-3" id="parent_kategori">
                            <table class="table table-borderless text-center text-white" id="reload_kategori">
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
                                                    <button class="btn btn-sm btn-light" onclick="edit(<?= $row->id_kategori; ?>)"><i class="fa-duotone fa-pen-to-square"></i></button>
                                                    <a href="<?= base_url('kategori_video/hapus_kategori/' . $row->id_kategori) ?>" class="btn btn-sm btn-light"><i class="fa-duotone fa-trash"></i></a>
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

<div class="modal fade" id="modalTambahKategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="post" action="<?= base_url('kategori_video/tambah_kategori') ?>" id="tambah_kategori" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLoginLabel">Tambah Kategori Video</h5>
            </div>
            <div class="modal-body">
                <div class="mb-3" id="req_nama">
                    <label for="kategori" class="form-label mb-1" style="font-size: 15px;">Kategori Video</label>
                    <input type="text" class="form-control" id="kategori" name="nama" placeholder="Masukkan kategori video" autocomplete="off">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-tidak" data-bs-dismiss="modal">Tidak</button>
                <button type="button" id="button_tambah_kategori" onclick="submit_form(this,'#tambah_kategori',1)" class="btn btn-primary">Iya</button>
            </div>
        </form>
    </div>
</div>