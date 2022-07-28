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
				<div class="me-4">
				</div>
				
			</div>
		</div>
	</div>


	<div class="post d-flex flex-column-fluid" id="kt_post">
		<div id="kt_content_container" class="container">
			
			<div class="card mb-5 mb-xl-10">
				<div class="card-body pt-9 pb-0">
					<div class="d-flex flex-wrap flex-sm-nowrap mb-3">
						<div class="me-7 mb-4">
							<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
								<?php if ($result->foto != "" && file_exists($this->data_path.'user/'.$result->foto)){
									$setencrypt = setencrypt($this->data_path.'user/'.$result->foto);
									$url = site_url('media/image_access_profile/'.$setencrypt);
									//$url = $this->main_url .'user/'.$result->foto;
								} else {
									$url = site_url('media/no_image'); 
								} ?>
									<img src="<?=$url?>" alt="image">
								<?php //else; ?>
								<?php //endif; ?>

								<div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
							</div>
						</div>
						<div class="flex-grow-1">
							<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
								<div class="d-flex flex-column">
									<div class="d-flex align-items-center mb-2">
										<span class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1"><?=$result->nama?>
										</span>
									</div>
								</div>
							</div>
							<div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
								<span href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2"><i class="bi bi-person-fill"></i> <?=$result->username?></span>
							</div>
						</div>
					</div>
					<div class="d-flex overflow-auto h-55px">
						<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
							<li class="nav-item">
								<a class="nav-link text-active-primary me-6 active" href="<?=site_url('profil')?>">Profil</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-active-primary me-6" href="<?=site_url('profile/ubah_password')?>">Ubah Kata Sandi</a>
							</li>
						</ul>
					</div>
				</div>
			</div>


			<div class="card shadow-sm" id="card">
				<?php echo form_open(site_url('profile/save'), array('class' => 'form-horizontal', 'id' => 'profileform')); ?>

				<div class="card-body">
					

					<div class="row mb-3">
						<!--begin::Label-->
						<label for="username" class="col-sm-2 col-12 col-form-label">
							Username <span class='text-danger'>*</span>
						</label>
						<!--end::Label-->
						<div class="col-sm-10 col-12">
							<input type="text" class="form-control" name="username" value="<?=$result->username?>" required />
						</div>
					</div>
					<div class="row mb-3">
						<!--begin::Label-->
						<label for="nama" class="col-sm-2 col-12 col-form-label">
							Nama <span class='text-danger'>*</span>
						</label>
						<!--end::Label-->
						<div class="col-sm-10 col-12">
							<input type="text" class="form-control" id="nama" name="nama" value="<?=$result->nama?>" required />
						</div>
					</div>

					<div class="row mb-3">
						<!--begin::Label-->
						<label for="alamat" class="col-sm-2 col-12 col-form-label">
							Alamat <span class='text-danger'>*</span>
						</label>
						<!--end::Label-->
						<div class="col-sm-10 col-12">
							<textarea class="form-control" id="alamat" name="alamat" required><?=$result->alamat?></textarea>
						</div>
					</div>
					<div class="row mb-3">
						<!--begin::Label-->
						<label for="telp" class="col-sm-2 col-12 col-form-label">
							Telp <span class='text-danger'>*</span>
						</label>
						<!--end::Label-->
						<div class="col-sm-10 col-12">
							<input type="text" class="form-control" id="telp" name="telp" value="<?=$result->telp?>"  required>
						</div>
					</div>
					<div class="row mb-3">
						<!--begin::Label-->
						<label for="email" class="col-sm-2 col-12 col-form-label">
							Email <span class='text-danger'>*</span>
						</label>
						<!--end::Label-->
						<div class="col-sm-10 col-12">
							<input type="email" class="form-control" id="email" name="email" value="<?=$result->email?>" required>
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
									<?php if ($result->foto != "" && file_exists($this->data_path.'user/'.$result->foto)){
										$setencrypt = setencrypt($this->data_path.'user/'.$result->foto);
										$url = site_url('media/image_access_profile/'.$setencrypt);
									} else {
										$url = site_url('media/no_image'); 
									} 
									?>
								     <div class="image-input-wrapper w-125px h-125px" style="background-image: url(<?=$url?>)"></div>
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

				</div>
				<div class="card-footer">

					<div class="text-center">
						<a href="<?=site_url('profile')?>" class="btn btn-light btn-sm">
							<i class="bi bi-arrow-left"></i> Batal
						</a>
						<button type="submit" id="submit_profile" class="btn btn-sm btn-success">
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