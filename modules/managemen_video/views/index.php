<div id="content-wrapper">
    <div class="container-fluid admin pb-0">
        <div class="video-block section-padding">
            <div class="row">
                <div class="col-12">
                    <div class="card" style="background-color: #1c1c1c;">
                        <div class="card-header d-flex justify-content-between">
                            <h5 style="color: #FFFFFF; font-weight: 600;">Managemen Video</h5>
                            <div class="dropdown">
                                <button class="btn btn-plus" type="button" data-bs-toggle="modal" data-bs-target="#modalTambahVideo">
                                    <i class="fa-duotone fa-plus text-white"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body mx-3" id="parent_video">
                            <div class="table-responsive">
                                <table class="table table-borderless text-center text-white" id="reload_video">
                                    <tbody>
                                        <?php if ($result) : ?>
                                            <?php $no = 1;
                                            foreach ($result as $row) : ?>
                                                <tr>
                                                    <td style="width: 50px;"><img src="<?= $row->thumbnail; ?>" alt="" width="70" style="border-radius: 8px;"></td>
                                                    <td class="text-left" style="min-width: 170px;">
                                                        <h6 class="mb-0" style="font-weight: 600;"><?= $row->judul; ?></h6>
                                                        <p class="text-secondary mb-0"><?= $row->kategori; ?></p>
                                                    </td>
                                                    <td style="min-width: 170px;">
                                                        <button class="btn btn-md btn-light"><i class="fa-duotone fa-pen-to-square"></i></button>
                                                        <a href="<?= base_url('managemen_video/hapus_video/' . $row->id_video) ?>" class="btn btn-md btn-light"><i class="fa-duotone fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="3">Tidak ada video tersedia</td>
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
</div>
<div class="modal fade" id="modalTambahVideo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLoginLabel">Tambah Video</h5>
            </div>
            <form method="post" action="<?= base_url('managemen_video/tambah_video'); ?>" id="tambah_video" class="modal-body">
                <div class="mb-3" id="req_url">
                    <label for="link_video" class="form-label mb-1" style="font-size: 15px;">Link video</label>
                    <input type="text" class="form-control" id="link_video" name="url" placeholder="Masukkan Url" autocomplete="off">
                </div>
                <div class="mb-3 d-flex flex-column" id="req_id_kategori">
                    <label for="kategori" class="form-label mb-1" style="font-size: 15px;">Kategori</label>
                    <select class="form-select js-example-basic-single" name="id_kategori" id="kategori" aria-label="Default select example" placeholder="Pilih kategori">
                        <?php if ($kategori) : ?>
                            <option value="">Pilih kategori</option>
                            <?php foreach ($kategori as $row) : ?>
                                <option value="<?= $row->id_kategori; ?>"><?= $row->nama; ?></option>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <option value="">Kategori tidak tersedia</option>
                        <?php endif; ?>
                    </select>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-tidak" data-bs-dismiss="modal">Tidak</button>
                <button id="button_tambah_video" onclick="submit_form(this,'#tambah_video',1)" type="button" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>