	
					<!--begin::Footer-->
					<div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
						<!--begin::Container-->
						<div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
							<!--begin::Copyright-->
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted fw-bold me-1">2021©</span>
								<a href="https://manager.instastudio.co.id" target="_blank" class="text-gray-800 text-hover-primary">InstaStudio</a>
							</div>
							<!--end::Copyright-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->
		
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="<?=base_url('assets/dist/assets/plugins/global/plugins.bundle.js')?>"></script>
		<script src="<?=base_url('assets/dist/assets/js/scripts.bundle.js')?>"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Vendors Javascript(used by this page)-->
		<script src="<?=base_url('assets/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')?>"></script>
		<!--end::Page Vendors Javascript-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="<?=base_url('assets/dist/assets/js/custom/widgets.js')?>"></script>
		<script src="<?=base_url('assets/dist/assets/js/custom/apps/chat/chat.js')?>"></script>
		<script src="<?=base_url('assets/dist/assets/js/custom/modals/create-app.js')?>"></script>
		<script src="<?=base_url('assets/dist/assets/js/custom/modals/upgrade-plan.js')?>"></script>
		<!--end::Page Custom Javascript-->
		<script type="text/javascript">
			var baseUrl = "<?=base_url()?>";
		</script>
		<?php 
		if(isset($js_add) && is_array($js_add)){
		    foreach($js_add AS $js){
		        echo $js;
		    }
		}else{
		    echo (isset($js_add) && ($js_add != "") ? $js_add : ""); 
		}

		?>

		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>