<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya - Divisi</title>
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
						<h4><i class="icon-color-sampler mr-2"></i> <span class="font-weight-semibold">Master</span> - Divisi</h4>
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
								Divisi
								<button onclick="return tambah()" class="btn btn-sm btn-primary">Tambah</button>
							</div>
							<div class="card-body">
								<div class="table-responsive mt-3">
									<table class="table table-striped mb-3" id="table">
										<thead class="">
											<tr>
												<th class="text-center">No</th>
												<th class="text-center">Divisi</th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$no=1;
												foreach($read_divisi as $d){
											?>
											<tr>
												<td align="center"><?= $no++ ?></td>
												<td><?= $d->divisi ?></td>
												<td class="text-center">
													<button class="btn btn-success btn-sm" onclick="return ubah(`<?= $d->id ?>`,`<?= $d->divisi ?>`)">UBAH</button>
													<button class="btn btn-danger btn-sm" onclick="return hapus(`<?= $d->id ?>`,`<?= $d->divisi ?>`)">HAPUS</button>
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
			$('[name="divisi"]').val("");

			document.form.action = '<?= base_url();?>Hrd/DivisiCreate';
		}
		function ubah(id,divisi){
			$('#Modal').modal('show');

			$('#modal-header').html('<i class="fa fa-pencil"></i> Ubah');
			$('#modal-body-update-or-create').removeClass('d-none');
			$('#modal-body-delete').addClass('d-none');
			$('#modal-button').html('Update');
			$('#modal-button').removeClass('btn-danger');
			$('#modal-button').addClass('btn-success');

			$('[name="id"]').val(id);
			$('[name="divisi"]').val(divisi);

			document.form.action = '<?= base_url();?>Hrd/DivisiUpdate';
		}
		function hapus(id,divisi){
			$('#Modal').modal('show');

			$('#modal-header').html('<i class="fa fa-trash"></i> Hapus');
			$('#modal-body-update-or-create').addClass('d-none');
			$('#modal-body-delete').removeClass('d-none');
			$('#modal-button').html('Delete');
			$('#modal-button').addClass('btn-danger');
			$('#modal-button').removeClass('btn-success');

			$('[name="id"]').val(id);
			$('#name-delete').html(divisi);

			document.form.action = '<?= base_url();?>Hrd/DivisiDelete';
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
						<label>Divisi</label>
						<input type="text" name="divisi" class="form-control mb-2" placeholder="Divisi">
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
