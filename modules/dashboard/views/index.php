<div id="content-wrapper">
	<div class="container-fluid admin pb-0" style="padding-top: 0px;">
		<div class="top-mobile-search">
			<div class="row">
				<div class="col-md-12">
					<form class="mobile-search">
						<div class="input-group">
							<input type="text" class="form-control mobile-search" placeholder="Pencarian...">
							<div class="input-group-append">
								<button class="btn btn-mobile-search" type="button">
									<i class="fa-solid fa-magnifying-glass" style="color: #828282"></i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<a data-bs-toggle="modal" data-bs-target="#modalTambahVideo" class="avatar avatar-60 shadow-lg rounded-circle avatar-presensi-solid avatar-kontak position-fixed">
			<i class="fa-solid fa-plus-large text-white" style="font-size: 20px;"></i>
		</a>
		<div class="wrapper-kosong"></div>
		<div id="parent_video">
			<div id="reload_video">
				<?php if ($result) : ?>
					<div class="top-category section-padding">
						<?php if ($kategori) : ?>
							<div class="row filter">
								<div class="col-md-12">
									<div class="scrollmenu base_tipe">
										<a onclick="get_kategori(this,'all')">
											<div class="tag tipe active">
												<span class="text-uppercase">Semua</span>
											</div>
										</a>
										<?php foreach ($kategori as $row) : ?>
											<a onclick="get_kategori(this,<?= $row->id_kategori; ?>)">
												<div class="tag tipe">
													<span class="text-uppercase"><?= $row->nama; ?></span>
												</div>
											</a>
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						<?php endif; ?>
						<hr>
						<div class="video-block section-padding" id="parenting_tipe">
							<div class="row">
								<div class="col-md-12">
									<div class="main-title">
										<h6>Video Terbaru</h6>
									</div>
								</div>
								<?php foreach ($result as $row) : ?>
									<div class="col-xl-3 col-sm-6 mb-3 zoom-filter showing" data-tipe="kategori-<?= $row->id_kategori; ?>">
										<div class="video-card dashboard">
											<div class="video-card-image">
												<a class="play-icon" href="<?= $row->url; ?>" target="_blank"><i class="fas fa-play-circle"></i></a>
												<a href="#"><img class="img-fluid" src="<?= $row->thumbnail; ?>" alt=""></a>
											</div>
											<div class="video-card-body">
												<div class="video-title">
													<a href="<?= site_url('video/single') ?>"><?= tampil_text($row->judul, 40); ?></a>
												</div>
												<div class="video-page text-success">
													<?= $row->kategori; ?>
												</div>
												<div class="video-view">
													<i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;<?= nice_time($row->create_date); ?>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<?php
				if (!$result) {
					$cnt = 0;
				} else {
					$cnt = count($result);
				}
				?>
				<?= vector_default(base_url('assets/img/vector/vector_video.svg'), 'Tidak ada video', 'Klik tombol pada pojok kanan bawah untuk menambahkan video!', 'vector_video', $cnt); ?>
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
			<form method="post" action="<?= base_url('dashboard/tambah_video'); ?>" id="tambah_video" class="modal-body">
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
				<button id="button_tambah_video" onclick="submit_form(this,'#tambah_video',2)" type="button" class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</div>
</div>