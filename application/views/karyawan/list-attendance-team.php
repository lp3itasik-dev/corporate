<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya - List Attendance Team</title>
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
						<h4><i class="icon-users mr-2"></i>List Attendance Team</h4>
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
								<h6 class="card-title"><i class="icon-search4"></i> &nbsp; List Attendance Team Today</h6>
							</div>

							<div class="card-body">
								<div class="table-responsive mt-3">
									<table class="table table-bordered table-striped">
										<thead class="">
											<tr>
												<th width="50px" class="text-center">No</th>
												<th width="150px" class="text-center">Nama</th>
												<th width="150px" class="text-center">check In</th>
												<th width="100px" class="text-center">Location In</th>
												<th width="100px" class="text-center">check Out</th>
												<th width="100px" class="text-center">Location Out</th>
												<th width="100px" class="text-center">Catatan</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$no=1;
											foreach($list as $l){
												$check_in = date('H:i:s',strtotime($l->check_in));
												$location_in = '<a target="_blank" href="https://www.google.com/maps?q='.$l->location_in.'&hl=es;z=14">'.$l->location_in.'</a>';
												$check_out = date('H:i:s',strtotime($l->check_in));
												$location_out = '<a target="_blank" href="https://www.google.com/maps?q='.$l->location_out.'&hl=es;z=14">'.$l->location_out.'</a>';
												$ket = $l->catatan;
										?>
											<tr>
												<td align="center"><?= $no++ ?></td>
												<td><?= $l->nama ?></td>
												<td align="center"><?= $check_in ?></td>
												<td align="center"><?= $location_in ?></td>
												<td align="center"><?= $check_out ?></td>
												<td align="center"><?= $location_out ?></td>
												<td><?= $ket ?></td>
											</tr>
										<?php
											}
										?>
										</tbody>
									</table>
								</div>
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
