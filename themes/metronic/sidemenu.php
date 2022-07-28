<!--begin::Aside menu-->
	<div class="aside-menu flex-column-fluid">
		<!--begin::Aside Menu-->
		<div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
			<!--begin::Menu-->
			<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
				<div class="menu-item menu-accordion">
					<a href="<?=site_url('dashboard')?>" class="menu-link <?=setmenuactive(current_url(), "/dashboard")?>">
						<span class="menu-icon">
							<i class="bi bi-house-door fs-4"></i>
							
						</span>
						<span class="menu-title">&nbsp;&nbsp;Dashboard</span>
					</a>
				</div>

				<div class="menu-item menu-accordion">
					<a href="<?=site_url('slideshow')?>" class="menu-link <?=setmenuactive(current_url(), "/slideshow")?>">
						<span class="menu-icon">
							<i class="bi bi-aspect-ratio fs-4"></i>
							
						</span>
						<span class="menu-title">&nbsp;&nbsp;Slideshow</span>
					</a>
				</div>

				<div class="menu-item menu-accordion">
					<a href="<?=site_url('blog')?>" class="menu-link <?=setmenuactive(current_url(), "/blog")?>">
						<span class="menu-icon">
							<i class="bi bi-building fs-4"></i>
							
						</span>
						<span class="menu-title">&nbsp;&nbsp;Blog</span>
					</a>
				</div>

				<div class="menu-item menu-accordion">
					<a href="<?=site_url('kategori_blog')?>" class="menu-link <?=setmenuactive(current_url(), "/kategori_blog")?>">
						<span class="menu-icon">
							<i class="bi bi-person-bounding-box fs-4"></i>
							
						</span>
						<span class="menu-title">&nbsp;&nbsp;Kategori Blog</span>
					</a>
				</div>

				<div class="menu-item menu-accordion">
					<a href="<?=site_url('project')?>" class="menu-link <?=setmenuactive(current_url(), "/project")?>">
						<span class="menu-icon">
							<i class="bi bi-building fs-4"></i>
							
						</span>
						<span class="menu-title">&nbsp;&nbsp;Project</span>
					</a>
				</div>

				<div class="menu-item menu-accordion">
					<a href="<?=site_url('kategori_project')?>" class="menu-link <?=setmenuactive(current_url(), "/kategori_project")?>">
						<span class="menu-icon">
							<i class="bi bi-aspect-ratio fs-4"></i>
							
						</span>
						<span class="menu-title">&nbsp;&nbsp;Kategori Project</span>
					</a>
				</div>

				<div class="menu-item menu-accordion">
					<a href="<?=site_url('kontak')?>" class="menu-link <?=setmenuactive(current_url(), "kontak")?>">
						<span class="menu-icon">
							<i class="bi bi-bookmark-star fs-4"></i>
							
						</span>
						<span class="menu-title">&nbsp;&nbsp;Kontak</span>
					</a>
				</div>
				
				<div class="menu-item menu-accordion">
					<a href="<?=site_url('user')?>" class="menu-link <?=setmenuactive(current_url(), "/user")?>">
						<span class="menu-icon">
						<i class="bi bi-patch-question"></i>
							
						</span>
						<span class="menu-title">&nbsp;&nbsp;User</span>
					</a>
				</div>

			</div>
			<!--end::Menu-->
		</div>
		<!--end::Aside Menu-->
	</div>
	<!--end::Aside menu-->