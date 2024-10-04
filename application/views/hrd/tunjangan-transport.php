<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya - Tunjangan Transport</title>
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
						<h4><i class="icon-color-sampler mr-2"></i> <span class="font-weight-semibold">Master</span> - Tunjangan Transport</h4>
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
								Tunjangan Transport
								<button onclick="return tambah()" class="btn btn-sm btn-primary">Tambah</button>
							</div>
							<div class="card-body">
								<div class="table-responsive mt-3">
									<table class="table table-striped mb-3" id="table">
										<thead class="">
											<tr>
												<th class="text-center">No</th>
												<th class="text-center">Uang Transport</th>
												<th class="text-center">Waktu Kehadiran</th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$no=1;
												foreach($read_tunjangan_transport as $tt){
											?>
											<tr>
												<td align="center"><?= $no++ ?></td>
												<td align="right"><span class="float-left">Rp.</span> <?= number_format($tt->uang_transport,'0','.','.') ?></td>
												<td align="center"><?= $tt->jam_absen ?></td>
												<td class="text-center">
													<button class="btn btn-success btn-sm" onclick="return ubah(`<?= $tt->id ?>`,`<?= $tt->uang_transport ?>`,`<?= $tt->jam_absen ?>`)">UBAH</button>
													<button class="btn btn-danger btn-sm" onclick="return hapus(`<?= $tt->id ?>`,`Waktu Kehadiran <?= $tt->jam_absen ?>, Tunjangan Rp. <?= number_format($tt->uang_transport,'0','.','.') ?>`)">HAPUS</button>
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
		$(document).ready(function() {
			var myTable = $('#table').DataTable({});
		});
		function tambah(){
			$('#Modal').modal('show');

			$('#modal-header').html('<i class="fa fa-plus"></i> Create');
			$('#modal-body-update-or-create').removeClass('d-none');
			$('#modal-body-delete').addClass('d-none');
			$('#modal-button').html('Tambah');
			$('#modal-button').removeClass('btn-danger');
			$('#modal-button').addClass('btn-success');

			$('[name="id"]').val("");
			$('[name="uang_transport"]').val("");
			$('[name="waktu_kehadiran"]').val("");

			document.form.action = '<?= base_url();?>Hrd/TunjanganTransportCreate';
		}
		function ubah(id,uang_transport,waktu_kehadiran){
			$('#Modal').modal('show');

			$('#modal-header').html('<i class="fa fa-pencil"></i> Ubah');
			$('#modal-body-update-or-create').removeClass('d-none');
			$('#modal-body-delete').addClass('d-none');
			$('#modal-button').html('Update');
			$('#modal-button').removeClass('btn-danger');
			$('#modal-button').addClass('btn-success');

			$('[name="id"]').val(id);
			$('[name="uang_transport"]').val(uang_transport);
			$('[name="waktu_kehadiran"]').val(waktu_kehadiran);

			document.form.action = '<?= base_url();?>Hrd/TunjanganTransportUpdate';
		}
		function hapus(id,transport){
			$('#Modal').modal('show');

			$('#modal-header').html('<i class="fa fa-trash"></i> Hapus');
			$('#modal-body-update-or-create').addClass('d-none');
			$('#modal-body-delete').removeClass('d-none');
			$('#modal-button').html('Delete');
			$('#modal-button').addClass('btn-danger');
			$('#modal-button').removeClass('btn-success');

			$('[name="id"]').val(id);
			$('#name-delete').html(transport);

			document.form.action = '<?= base_url();?>Hrd/TunjanganTransportDelete';
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
						<label>Uang Transport</label>
						<input type="number" name="uang_transport" class="form-control text-right mb-2" placeholder="Tunjangan Transport">
						<label>Waktu Kehadiran</label>
						<input type="time" name="waktu_kehadiran" class="form-control text-right" placeholder="Waktu Kehadiran">
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
