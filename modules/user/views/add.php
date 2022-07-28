<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Toolbar-->
	<div class="toolbar" id="kt_toolbar">
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<?php 
			if (isset($parent) && $parent != ""){
				$arrchild = (isset($arrchild) && is_array($arrchild) ? $arrchild : null);
				echo breadcrumb($parent, $arrchild); 
			}
			?>

			<div class="d-flex align-items-center py-1">
				
			</div>
		</div>
	</div>


	<div class="post d-flex flex-column-fluid" id="kt_post">
		<div id="kt_content_container" class="container">
			<div class="card shadow-sm" id="card">

				<div class="card-header">
					<div class="card-toolbar">
						<a href="<?=site_url('user')?>" class="btn btn-light btn-sm">
							<i class="bi bi-arrow-left"></i> Batal
						</a>
					</div>
				</div>



				<?php echo form_open_multipart('', array('class' => 'form-horizontal')); ?>

				<div class="card-body">
					<div class="row mb-3">
						<label for="username" class="col-sm-2 col-12 col-form-label">Username <span class="text-danger">*</span></label>
						<!--end::Label-->
						<div class="col-sm-10 col-12">
							<input type="text" class="form-control" id="username" name="username" required />
						</div>
					</div>

					<div class="row mb-3">
						<label for="nama" class="col-sm-2 col-12 col-form-label">Nama <span class="text-danger">*</span></label>
						<!--end::Label-->
						<div class="col-sm-10 col-12">
							<input type="text" class="form-control" id="nama" name="nama" required />
						</div>
					</div>

					<div class="row mb-3">
						<label for="alamat" class="col-sm-2 col-12 col-form-label">Alamat <span class="text-danger">*</span></label>
						<!--end::Label-->
						<div class="col-sm-10 col-12">
							<textarea name="alamat" id="alamat" class="form-control"></textarea>
						</div>
						
					</div>

					<div class="row mb-3">
						<label for="email" class="col-sm-2 col-12 col-form-label">Email <span class="text-danger">*</span></label>
						<!--end::Label-->
						<div class="col-sm-10 col-12">
							<input type="email" class="form-control" id="email" name="email" required />
						</div>
						
					</div>

					<div class="row mb-3">
						<label for="telp" class="col-sm-2 col-12 col-form-label">Telp <span class="text-danger">*</span></label>
						<!--end::Label-->
						<div class="col-sm-10 col-12">
							<input type="text" class="form-control" id="telp" name="telp" required />
						</div>
						
					</div>

					<div class="row mb-3">
						<label for="tipe" class="col-sm-2 col-12 col-form-label">Tipe User <span class="text-danger">*</span></label>
						<!--end::Label-->
						<div class="col-sm-10 col-12">
							<select name="tipe" id="tipe" class="form-select form-select-sm " data-control="select2">
								<option value="">Pilih Tipe User</option>
								<option value="1">Superadmin</option>
								<option value="2">Admin</option>
							</select>
						</div>
					</div>

					<div class="row mb-3">
						<label for="aktif" class="col-sm-2 col-12 col-form-label">Status <span class="text-danger">*</span></label>
						<!--end::Label-->
						<div class="col-sm-10 col-12">
							<select name="aktif" id="aktif" class="form-select form-select-sm " data-control="select2">
								<option value="1">Aktif</option>
								<option value="0">Tidak Aktif</option>
							</select>
						</div>
					</div>

					<div class="row mb-3">
						<!--begin::Label-->
						<label for="foto" class="col-sm-2 col-12 col-form-label">
							Foto
						</label>
						<!--end::Label-->
						<div class="col-sm-10 col-12">
							<div class="image-input image-input-outline " data-kt-image-input="true" style="background-image: url(<?=base_url('assets/dist/assets/media/avatars/blank.png')?>)">
								     <!--begin::Image preview wrapper-->
								     <div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?=base_url('assets/dist/assets/media/avatars/blank.png')?>)"></div>
								     <!--end::Image preview wrapper-->

								     <!--begin::Edit button-->
								     <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="" data-bs-original-title="Ubah foto">
								         <i class="bi bi-pencil-fill fs-7"></i>

								         <!--begin::Inputs-->
								         <input type="file" name="foto" accept=".png, .jpg, .jpeg">
								         <input type="hidden" name="foto_remove">
								         <!--end::Inputs-->
								     </label>
								     <!--end::Edit button-->

								     <!--begin::Cancel button-->
								     <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="" data-bs-original-title="Batal">
								         <i class="bi bi-x fs-2"></i>
								     </span>
								     <!--end::Cancel button-->

								     <!--begin::Remove button-->
								     <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="" data-bs-original-title="Hapus foto">
								         <i class="bi bi-x fs-2"></i>
								     </span>
								     <!--end::Remove button-->
								 </div>
						</div>
					</div>

						
					<div class="row mb-3">
						<label for="password" class="col-sm-2 col-12 col-form-label">Kata Sandi <span class="text-danger">*</span></label>
						<!--end::Label-->
						<div class="col-sm-10 col-12">
							<input type="password" class="form-control" id="password" name="password" required />
						</div>
					</div>

					<div class="row mb-3">
						<label for="repassword" class="col-sm-2 col-12 col-form-label">Ulang Kata Sandi <span class="text-danger">*</span></label>
						<!--end::Label-->
						<div class="col-sm-10 col-12">
							<input type="password" class="form-control" id="repassword" name="repassword" required />
						</div>
					</div>
				</div>

				<div class="card-footer">						

					<div class="text-center">

						<button type="submit" id="submit_user" class="btn btn-sm btn-success">
							<span class="indicator-label"><i class="bi bi-check-lg"></i> Simpan</span>
							<span class="indicator-progress">Please wait...
							<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
						</button>
					</div>

				</div>

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>