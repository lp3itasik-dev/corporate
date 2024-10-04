<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya - Tunjangan Makan</title>
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
						<h4><i class="icon-color-sampler mr-2"></i> <span class="font-weight-semibold">Master</span> - Tunjangan Makan</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content pt-0">

				<!-- Main charts -->
				<div class="row">
					<div class="col-xl-6">

						<!-- Traffic sources -->
						<div class="card">
							<div class="card-body">
								<div class="table-responsive mt-3">
									<table class="table table-bordered table-striped">
										<thead class="">
											<tr>
												<th class="text-center">Uang Makan</th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												foreach($read_tunjangan_makan as $tm){
											?>
											<tr>
												<td align="right"><span class="float-left">Rp.</span> <?= number_format($tm->uang_makan,'0','.','.') ?></td>
												<td class="text-center">
													<button class="btn btn-success btn-sm" onclick="return ubah(`<?= $tm->uang_makan ?>`)">UBAH</button>
												</td>
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

<script>
		function ubah(uang_makan){
			$('#Modal').modal('show');

			$('#modal-header').html('<i class="fa fa-pencil"></i> Update');
			$('#modal-body-update-or-create').removeClass('d-none');
			$('[name="img"]').removeClass('d-none');
			$('#modal-body-delete').addClass('d-none');
			$('#modal-button').html('Ubah');
			$('#modal-button').removeClass('btn-danger');
			$('#modal-button').addClass('btn-success');

			$('[name="uang_makan"]').val(uang_makan);

			document.form.action = '<?= base_url();?>Hrd/TunjanganMakanUpdate';
		}
</script>
<!--Modal-->
<form name="form" action="" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
	<div id="Modal" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="text-align:center">
					<h3 id="modal-header"></h3>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">

					<input type="hidden" name="id">

					<span id="modal-body-update-or-create">
						<label>Uang Makan</label>
						<input type="number" name="uang_makan" class="form-control text-right" placeholder="Tunjangan Makan">
					</span>

					<span id="modal-body-delete">
						Are you sure want to delete <b id="name-delete"></b> from this table?
					</span>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Back</button>
					<button type="submit" class="btn btn-success" id="modal-button">Save</button>
				</div>
			</div>
		</div>
	</div>
</form>
<!--Modal-->
</html>
