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

				
					<a href="<?=site_url('user/add')?>" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> User</a>
				</div>
				
			</div>
		</div>
	</div>


	<div class="post d-flex flex-column-fluid" id="kt_post">
		<div id="kt_content_container" class="container">
			<div class="card shadow-sm" id="card">
			<div class="card-body">

				<table class="table table-bordered table-striped table-rounded table-hover gs-7 gy-7 gx-7 DataTable no-footer" id="kt_table_user">
					<thead>
						<!--begin::Table row-->
						<tr role="row">
							<th class="w-10px text-center"><i class="fa fa-bars fs-4"></i></th>
							<th class="w-125px text-center">NO</th>
							<th class="min-w-125px text-center text-uppercase">Foto</th>
							<th class="min-w-125px text-center text-uppercase">Username</th>
							<th class="min-w-125px text-center text-uppercase">Nama</th>
							<th class="min-w-125px text-center text-uppercase">Email</th>
							<th class="min-w-125px text-center text-uppercase">Telp</th>
							<th class="min-w-125px text-center text-uppercase">Tipe</th>
						</tr>
						<!--end::Table row-->
					</thead>
					<tbody>
						<?php if ($result):
							$no = 1;
						 ?>
							<?php foreach($result as $row): ?>
								<tr>
									<td class="text-center">
									
										<button type="button" class="btn btn-sm btn-primary btn-icon fs-10" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" data-kt-menu-flip="top-start">
											<i class="fa fa-bars fs-4"></i>
										</button>
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px" data-kt-menu="true">
											<div class="menu-item px-3 my-2">
												<a href="#" class="menu-link" data-bs-toggle="modal" data-bs-target="#userModal" data-bs-id="<?=$row->id_user?>">Detail</a>
											</div>
											<div class="menu-item px-3 my-2">
												<a href="<?=site_url('user/edit/'.$row->id_user)?>" class="menu-link px-3">Edit</a>
											</div>
											<div class="menu-item px-3 my-2">
												<?php if ($row->id_user != 1): ?>
													<a href="#" class="menu-link px-3 btn_delete" data-bs-toggle="modal" data-bs-target="#modal_delete" data-bs-username="<?=$row->username?>" data-bs-iduser="<?=$row->id_user?>">Hapus</a>
												<?php endif; ?>
											</div>
										</div>

									</td>
									<td class="text-center"></td>
									<td class="text-center">
										<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
											<div class="symbol-label">
										<?php if ($row->foto != "" && file_exists($data_path.'/user/'.$row->foto)): 
											$encimg = setencrypt($data_path.'/user/'.$row->foto);
											?>
											<img src="<?=site_url('media/image_access_profile/'.$encimg)?>" width="50">
										<?php else: ?>
											<img src="<?=site_url('media/no_image')?>" width="50"/>
										<?php endif; ?>
												</div>
											</div>
									</td>
									<td class="text-center"><?=$row->username?></td>
									<td class="text-center"><?=$row->nama?></td>
									<td class="text-center"><?=$row->email?></td>
									<td class="text-center"><?=$row->telp?></td>
									<td class="text-center"><?php
									if ($row->tipe == 1){
										echo "Superadmin";
									}else if ($row->tipe == 2){
										echo "Operator";
									}
									?></td>
								</tr>
							<?php 
							$no++;
							endforeach; ?>
						<?php endif; ?>

					</tbody>
				</table>
			</div>
		</div>
	
	</div>
</div>

<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modal_delete" tabindex="-1" role="basic" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Konfirmasi</h4>
				<div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times fs-4"></i>
                </div>
			</div>
			<div class="modal-body">Anda yakin akan menghapus user [<span id="theusername"></span>]? Aksi ini tidak bisa dibatalkan.
				<input type="hidden" id="theiduser" name="theiduser">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-bs-dismiss="modal"> Batal</button>
				<button type="button" id="btn_delete_confirm" class="btn btn-danger">Ya</button>
			</div>
		</div>
	</div>
</div>