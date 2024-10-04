<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya - Report Tunjangan Transport</title>
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
						<h4><i class="icon-file-empty mr-2"></i> <span class="font-weight-semibold">Report</span> - Tunjangan Transport</h4>
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
							<div class="card-header header-elements-inline">
								<h6 class="card-title"><i class="icon-search4"></i> &nbsp; Search For Tunjangan Transport</h6>
							</div>

							<div class="card-body">
								<form action="<?= base_url() ?>Hrd/CetakTunjanganTransport" method="GET" target="_blank">
									<div class="form-group row">
										<label class="col-form-label col-1">Dari <span class="float-right">:</span></label>
										<div class="col-lg-2 col-9">
											<input type="date" class="form-control" name="dari" value="<?= date('Y-m-d',strtotime("-1 months")) ?>">
										</div>
										<label class="col-form-label col-1">Sampai <span class="float-right">:</span></label>
										<div class="col-lg-2 col-9">
											<input type="date" class="form-control" name="sampai" value="<?= date('Y-m-d') ?>">
										</div>
										<div class="col-2 text-left">
											<button type="submit" class="btn btn-dark legitRipple">Search <i class="icon-search4 ml-2"></i></button>
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
