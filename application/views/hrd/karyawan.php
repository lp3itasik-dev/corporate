<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya - Karyawan</title>
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
						<h4><i class="icon-color-sampler mr-2"></i> <span class="font-weight-semibold">Master</span> - Karyawan</h4>
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
								Karyawan
								<button onclick="return tambah()" class="btn btn-sm btn-primary">Tambah</button>
							</div>
							<div class="card-body">
								<div class="table-responsive mt-3">
									<table class="table table-striped mb-3" id="table">
										<thead class="">
											<tr>
												<th class="text-center">No</th>
												<th class="text-center">Foto</th>
												<th class="text-center">Nama</th>
												<th class="text-center">Username</th>
												<th class="text-center">Level</th>
												<th class="text-center">Divisi</th>
												<th class="text-center">Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$no=1;
												foreach($read_users as $u){
											?>
											<tr>
												<td align="center"><?= $no++ ?></td>
												<td align="center"><img src="<?= base_url() ?>template/global_assets/images/foto/<?= $u->foto ?>" height="80px"></td>
												<td><?= $u->fullname ?></td>
												<td align="center"><?= $u->username ?></td>
												<td align="center"><?= $u->level ?></td>
												<td align="center"><?= $u->divisi ?></td>
												<td class="text-center">
													<button class="btn btn-success btn-sm" onclick="return ubah(`<?= $u->username ?>`,`<?= $u->fullname ?>`,`<?= $u->level ?>`,`<?= $u->id_divisi ?>`,`<?= $u->foto ?>`)">UBAH</button>
													<button class="btn btn-danger btn-sm" onclick="return hapus(`<?= $u->username ?>`,`<?= $u->fullname ?>`)">HAPUS</button>
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
			$('[name="username"]').val("");
			$('[name="username"]').removeAttr('readonly');
			$('[name="password"]').val("");
			$('[name="nama"]').val("");
			$('[name="divisi"]').val("");
			$('[name="level"]').val("");
			$('[name="foto"]').val("");

			document.form.action = '<?= base_url();?>Hrd/KaryawanCreate';
		}
		function ubah(username,nama,level,divisi,foto){
			$('#Modal').modal('show');

			$('#modal-header').html('<i class="fa fa-pencil"></i> Ubah');
			$('#modal-body-update-or-create').removeClass('d-none');
			$('#modal-body-delete').addClass('d-none');
			$('#modal-button').html('Update');
			$('#modal-button').removeClass('btn-danger');
			$('#modal-button').addClass('btn-success');

			$('[name="id"]').val(username);
			$('[name="username"]').val(username);
			$('[name="username"]').attr('readonly','readonly');
			$('[name="password"]').val("");
			$('[name="nama"]').val(nama);
			$('[name="divisi"]').val(divisi);
			$('[name="level"]').val(level);
			$('[name="foto"]').val(foto);

			document.form.action = '<?= base_url();?>Hrd/KaryawanUpdate';
		}
		function hapus(username,nama){
			$('#Modal').modal('show');

			$('#modal-header').html('<i class="fa fa-trash"></i> Hapus');
			$('#modal-body-update-or-create').addClass('d-none');
			$('#modal-body-delete').removeClass('d-none');
			$('#modal-button').html('Delete');
			$('#modal-button').addClass('btn-danger');
			$('#modal-button').removeClass('btn-success');

			$('[name="id"]').val(username);
			$('#name-delete').html(nama);

			document.form.action = '<?= base_url();?>Hrd/KaryawanDelete';
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
						<label>Username</label>
						<input type="text" name="username" class="form-control mb-2" placeholder="Username">
						<label>New Password</label>
						<input type="password" name="password" class="form-control mb-2" placeholder="Password">
						<label>Nama</label>
						<input type="text" name="nama" class="form-control mb-2" placeholder="Nama">
						<label>Divisi</label>
						<select name="divisi" class="form-control mb-2">
							<option value="">Pilih</option>
							<?php foreach($read_divisi as $d){ ?>
							<option value="<?= $d->id ?>"><?= $d->divisi ?></option>
							<?php } ?>
						</select>
						<label>Level</label>
						<select name="level" class="form-control mb-2">
							<option value="">Pilih</option>
							<option value="karyawan">Karyawan</option>
							<option value="hrd">Admin</option>
						</select>
						<label>Foto</label>
						<input type="file" name="image" class="form-control mb-2" placeholder="Foto">
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
