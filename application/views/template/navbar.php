<?php if($this->session->userdata('gradient')=="on"){$grd="-grd-lr";}else{$grd="";} ?>
	<div class="navbar navbar-expand-md navbar-dark navbar-static bg-lp3i<?= $grd ?>">

		<!-- Header with logos -->
		<div class="navbar-header d-none d-md-flex align-items-md-center">
			<div class="navbar-brand navbar-brand-md">
				<a href="index.html" class="d-inline-block">
					<img style="height:1.5rem" src="<?= base_url() ?>template/global_assets/images/silt-white.png" alt="">
				</a>
			</div>

			<div class="navbar-brand navbar-brand-xs">
				<a href="index.html" class="d-inline-block">
					<img style="height:1.5rem" src="<?= base_url() ?>template/global_assets/images/silt-white.png" alt="">
				</a>
			</div>
		</div>
		<!-- /header with logos -->


		<!-- Mobile controls -->
		<div class="d-flex flex-1 d-md-none">
			<div class="navbar-brand mr-auto">
				<a href="index.html" class="d-inline-block">
					<img src="<?= base_url() ?>template/global_assets/images/silt-white.png" alt="">
				</a>
			</div>
			<a href="#" class="navbar-toggler sidebar-mobile-main-toggle">
				<i class="icon-lock5"></i>
			</a>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>
		<!-- /mobile controls -->


		<!-- Navbar content -->
		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>

				<li class="nav-item dropdown">


				</li>
			</ul>

			<span class="mr-md-auto"></span>

			<ul class="navbar-nav">
				<!-- <li class="nav-item m-1">
					<form action="" method="GET">
						<input type="text" name="searchnama" placeholder="Cari" class="form-control2">
					</form>
				</li>
				<li class="nav-item m-1">
					<a onclick="return lock()" href="#" class="d-flex align-items-center btn btn-sm bg-lp3i" style="font-size:0.8rem">
						<i class="icon-lock5"></i>
					</a>
				</li> -->
				<li class="nav-item m-1">
					<a href="<?= base_url() ?>logout" class="d-flex align-items-center btn btn-sm bg-lp3i" style="font-size:0.8rem">
						<i class="icon-switch2"></i>
					</a>
				</li>
			</ul>
		</div>
		<!-- /navbar content -->

	</div>
