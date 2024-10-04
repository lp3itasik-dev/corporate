<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya - Profile</title>
	<?php $this->load->view('template/link.php')?>
</head>

<body>

	<!-- Main navbar -->
	<?php $this->load->view('template/navbar.php')?>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<?php $this->load->view('template/sidebar.php')?>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-user mr-2"></i>Profile</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content pt-0">

				<!-- Main charts -->
				<div class="row">
					<div class="col-xl-12">

						<!-- Traffic sources -->
						<div class="card">
							<div class="card-body">
								<form name="form" action="<?= base_url() ?>Auth/ProfileUpdate" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
								<div class="row">
									<div class="col-lg-2 col-12 text-center">
										<img src="<?= base_url() ?>template/global_assets/images/foto/<?= $this->session->userdata('foto') ?>" class="img-fluid rounded-circle shadow-1 mb-3" width="150" height="150" alt="">
										<input type="file" class="form-control" name="image">
									</div>
									<div class="col-lg-10 col-12">
										<div class="d-flex"><div class="mt-2 col-2">Username</div><div class="mt-2 mr-2">:</div><input type="text" class="form-control col-8" value="<?= $this->session->userdata('username') ?>" readonly></div>
										<div class="d-flex"><div class="mt-2 col-2">Nama</div><div class="mt-2 mr-2">:</div><input type="text" name="nama" class="form-control col-8" value="<?= $this->session->userdata('fullname') ?>"></div>
										<div class="d-flex"><div class="mt-2 col-2">Divisi</div><div class="mt-2 mr-2">:</div><input type="text" class="form-control col-8" value="<?= $this->session->userdata('divisi') ?>" readonly></div>
										<div class="d-flex"><div class="mt-2 col-2">Thema</div></div>
										<div class="d-flex"><div class="mt-2 col-2">Color 1</div><div class="mt-2 mr-2">:</div><input type="color" name="color1" value="<?= $this->session->userdata('color1') ?>" class="mt-2"></div>
										<div class="d-flex"><div class="mt-2 col-2">Color 2</div><div class="mt-2 mr-2">:</div><input type="color" name="color2" value="<?= $this->session->userdata('color2') ?>" class="mt-2"></div>
										<div class="d-flex"><div class="mt-2 col-2">Gradient</div><div class="mt-2 mr-2">:</div>
											<select name="gradient" class="form-control col-8">
												<?php
													$on="";
													$off="selected";
													if($this->session->userdata('gradient')=="on"){
														$on="selected";
														$off="";
													}
												?>
												<option value="on" <?= $on ?>>ON</option>
												<option value="off" <?= $off ?>>OFF</option>
											</select>
										</div>
											<div class="d-flex"><div class="mt-2 col-2">New Password</div><div class="mt-2 mr-2">:</div><input type="password" name="password" class="form-control col-8" value="" placeholder="New Password"></div>
										</div>
										<div class="col-12 text-right">
											<button type="submit" class="btn btn-sm btn-success">UPDATE</button>
										</div>
								</div>
							</form>
							</div>
						</div>
						<!-- /traffic sources -->

					</div>
				</div>
				<!-- /dashboard content -->

			</div>
			<!-- /content area -->

			<!-- Footer -->
			<?php $this->load->view('template/footer.php')?>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
</body>
</html>
