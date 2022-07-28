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
			<div class="card shadow-sm mb-5 mb-xl-10">
				<div class="card-body pt-9 pb-0">
					<div class="d-flex flex-wrap flex-sm-nowrap mb-3">
						<div class="me-7 mb-4">
							<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
								<?php //if ($result->foto != "" && file_exists(APPPATH.'../upload/user/'.$result->foto)): 
									if ($result->foto != "" && file_exists($this->data_path.'user/'.$result->foto)){
										$encimg = setencrypt($this->data_path.'user/'.$result->foto);
										$imgurl = site_url('media/image_access_profile/'.$encimg);
									}else{
										$imgurl = site_url('media/no_image');
									}
									?>
									<img src="<?=$imgurl?>" alt="image">
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
								<a class="nav-link text-active-primary me-6" href="<?=site_url('profile')?>">Profil</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-active-primary me-6 active" href="<?=site_url('profile/ubah_password')?>">Ubah Kata Sandi</a>
							</li>
						</ul>
					</div>
				</div>
			</div>


			<div class="card shadow-sm" id="card">

				<div class="card-body">

					<?php echo form_open('', array('class' => 'form-horizontal')); ?>

					<div class="row mb-3">
						<!--begin::Label-->
						<label for="oldpassword" class="col-sm-2 col-12 col-form-label">
							Kata Sandi Lama <span class='text-danger'>*</span>
						</label>
						<!--end::Label-->
						<div class="col-sm-10 col-12">
							<input type="password" class="form-control" id="oldpassword" name="oldpassword" value="" required />
						</div>
					</div>

					<div class="row mb-3">
						<!--begin::Label-->
						<label for="password" class="col-sm-2 col-12 col-form-label">
							Kata Sandi Baru <span class='text-danger'>*</span>
						</label>
						<!--end::Label-->
						<div class="col-sm-10 col-12">
							<input type="password" class="form-control" id="password" name="password" value="" required />
						</div>
					</div>

					<div class="row mb-3">
						<!--begin::Label-->
						<label for="repassword" class="col-sm-2 col-12 col-form-label">
							Ulangi Kata Sandi Baru <span class='text-danger'>*</span>
						</label>
						<!--end::Label-->
						<div class="col-sm-10 col-12">
							<input type="password" class="form-control" id="repassword" name="repassword" value="" required />
						</div>
					</div>
				</div>
				<div class="card-footer">

					<div class="text-center">
						<a href="<?=site_url('profile')?>" class="btn btn-light btn-sm">
							<i class="bi bi-arrow-left"></i> Batal
						</a>
						<button type="submit" id="submit_password" class="btn btn-sm btn-success">
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