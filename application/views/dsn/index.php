<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya - Dashboard</title>
	<?php $this->load->view('template/layout_2/link.php')?>
</head>

<body>

	<!-- Main navbar -->
	<?php $this->load->view('template/layout_2/navbar.php')?>	
	<!-- /main navbar -->

					
	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<?php $this->load->view('template/layout_2/sidebar.php')?>	
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Dashboard</h4>
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
								<h5 class="card-title"><i class="icon-calendar2"></i> &nbsp; JADWAL MENGAJAR</h5>
							</div>
							<div class="card-body">
								<?php if(isset($_GET['msg'])=="input_success"){
									echo'
									<div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible mb-3">
										<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
										<span class="font-weight-semibold">Presensi Tersimpan!</span> 
									</div>
									';
								}?>
								<div class="table-responsive">
									<table class="table table-framed">
										<thead class="bg-dark">
											<tr>
												<th width="100px" class="text-center">JAM</th>
												<th width="100px" class="text-center">HARI</th>
												<th width="200px" class="text-center">MATAKULIAH</th>
												<th width="100px" class="text-center">KELAS</th>
												<th width="100px" class="text-center">AKSI</th>
											</tr>
										</thead>
										<tbody>
										<?php 
										$i=0;
										foreach($read_jadwalkuliah as $r){
											$bg="";
											$btn="tambah_belum";
											$btn2="tambah_belum";
											if($r->hari==$hari[date('N')-1]){$bg="bg-danger-800";$btn="tambah";$btn2="qr";}
											if(isset($status_input[$i])){
												if($status_input[$i]!=""){$bg=$status_input[$i];}
												if($status_input[$i]=="bg-success-800"){$btn="tambah_sudah";$btn2="qr";}
											}
											echo'
											<tr class="'.$bg.'">
												<td class="text-center p-1">'.$r->waktu.'</td>
												<td class="text-center p-1">'.$r->hari.'</td>
												<td class="text-center p-1">'.$r->matakuliah.'</td>
												<td class="text-center p-1">'.$r->kelas.'</td>
												<td class="text-center p-1">
													<button onclick="return ubah(`'.$r->kodematakuliah.'`,`'.str_replace(" ","%20",$r->kelas).'`)" class="btn btn-warning m-1"><i class="icon-pencil7"></i> EDIT</button>
													<button onclick="return '.$btn.'(`'.$r->kodematakuliah.'`,`'.$r->matakuliah.'`,`'.$pertemuan[$i].'`,`'.$r->kelas.'`)" class="btn btn-success m-1"><i class="icon-plus3"></i> INPUT</button>
													<button onclick="return '.$btn2.'(`'.$r->kodejadwalkuliah.'`)" class="btn btn-primary m-1"><i class="icon-qrcode"></i>&nbsp; QR Code</button>
												</td>
											</tr>
											';
											$i++;
										} ?>
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
			<?php $this->load->view('template/layout_2/footer.php')?>
			<!-- /footer -->
 
		</div>
		<!-- /main content -->
		
	</div>
	<!-- /page content -->
	<script>	
		window.top.close();  
        function ubah(kodematakuliah,kelas){
			$('#myModal').modal({backdrop: 'static', keyboard: false});
			
			$('[name="edit_pertemuan"]').load('<?= base_url() ?>Dsn/cek_pertemuan?kodematakuliah='+kodematakuliah+'&kelas='+kelas);
			
            $('.modal-title').html('EDIT PRESENSI');
            $('[name="kodematakuliah"]').val(kodematakuliah);
			$('[name="kelas"]').val(kelas);
            
			$('[name="edit_pertemuan"]').attr('required','required');
			
            $('.b-add').addClass('d-none');
            $('.b-edit').removeClass('d-none');
            $('#submit').html('UBAH');
            $('#formId').attr('action', '<?= base_url() ?>Dsn/edit_presensi?kodematakuliah='+kodematakuliah+'&kelas='+kelas);
        }
        function tambah_sudah(){
			$('#myAlert').modal('show');
			$('#msg').html('INPUT PRESENSI HARI INI TELAH SELESAI');
		}
        function tambah_belum(){
			$('#myAlert').modal('show');
			$('#msg').html('BELUM WAKTUNYA INPUT PRESENSI');
		}
        function tambah(kodematakuliah,matakuliah,pertemuan,kelas){
			$('#myModal').modal({backdrop: 'static', keyboard: false});
			$('[name="kodematakuliah"]').val(kodematakuliah);
			$('[name="matakuliah"]').val(matakuliah);
			$('[name="pertemuan"]').val(pertemuan);
			$('[name="kelas"]').val(kelas);
			
			$('[name="edit_pertemuan"]').removeAttr('required');
			
            $('.modal-title').html('INPUT PRESENSI');
            $('.b-add').removeClass('d-none');
            $('.b-edit').addClass('d-none');
            $('#submit').html('SIMPAN');
            $('#formId').attr('action', '<?= base_url() ?>Dsn/add_presensi');
        }
        function qr(kodejadwalkuliah){
			$('#myQR').modal({backdrop: 'static', keyboard: false});
			var url = "https://api.qrserver.com/v1/create-qr-code/?data=";
			$('.b-qr').load('<?= base_url() ?>Dsn/cek_qr?kodejadwalkuliah='+kodejadwalkuliah+'&url='+url);
			$('[name="kodejadwalkuliah"]').val(kodejadwalkuliah);
        }
	</script>
	
	<div id="myAlert" class="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="alert alert-warning alert-styled-left alert-arrow-left alert-dismissible mb-0">
					<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
					<span class="font-weight-semibold" id="msg"></span> 
				</div>
			</div>
		</div>
	</div>
	<div id="myQR" class="modal">
		<div class="modal-dialog ">
			<div class="modal-content">
				<div class="modal-header bg-dark">
					<h5 class="modal-title">QR Presensi</h5>
			    </div>
				<div class="modal-body b-qr">
				</div>
				<div class="modal-footer bg-dark">
					<form action="<?= base_url() ?>Dsn/hapus_qr" method="POST">
						<input name="kodejadwalkuliah" type="hidden">
						<button type="submit" class="btn bg-success">SELESAI</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div id="myModal" class="modal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-dark">
					<h5 class="modal-title">Basic modal</h5>
					<button type="button" class="close" data-dismiss="modal">×</button>
			    </div>
			    <form id="formId" action="" method="POST">
                <div class="modal-body b-add bg-grey pb-1">
				    <div class="form-group row">
						<label class="col-form-label col-lg-2">MATAKULIAH <span class="float-right">:</span></label>
						<div class="col-lg-5">
							<input name="matakuliah" type="text" class="form-control text-white" readonly>
							<input name="kodematakuliah" type="hidden" value="">
						</div>
						<label class="col-form-label col-lg-2">KELAS <span class="float-right">:</span></label>
						<div class="col-lg-3">
							<input name="kelas" type="text" class="form-control text-white" readonly>
						</div>
						<label class="col-form-label col-lg-2">TANGGAL <span class="float-right">:</span></label>
						<div class="col-lg-5">
							<input name="tanggal" type="date" class="form-control text-white" value="<?= date('Y-m-d'); ?>" readonly>
						</div>
						<label class="col-form-label col-lg-2">PERTEMUAN <span class="float-right">:</span></label>
						<div class="col-lg-3">
							<input name="pertemuan" type="text" class="form-control text-white bg-grey" readonly>
						</div>
					</div>
				</div>
				<div class="modal-body b-add">
				    <div class="form-group row">
						<label class="col-form-label col-lg-12">POKOK BAHASAN :</label>
						<div class="col-lg-12">
							<textarea name="materi" type="text" class="form-control"></textarea>
						</div>
					</div>
				    <div class="form-group row">
						<label class="col-form-label col-lg-12">MOTIVATOR :</label>
						<div class="col-lg-12">
							<input name="motivator" type="text" class="form-control">
						</div>
					</div>
				    <div class="form-group row">
						<label class="col-form-label col-lg-12">MOTIVASI :</label>
						<div class="col-lg-12">
							<textarea name="motivasi" type="text" class="form-control"></textarea>
						</div>
					</div>
				    <div class="form-group row">
						<label class="col-form-label col-lg-12">TUGAS :</label>
						<div class="col-lg-12">
							<input name="tugas" type="text" class="form-control">
						</div>
					</div>
				</div>
				<div class="modal-body b-edit">
				    <div class="form-group row">
						<label class="col-form-label col-lg-3">PILIH PERTEMUAN<span class="float-right">:</span></label>
						<div class="col-lg-9">
							<select name="edit_pertemuan" class="form-control select2 select2-container" required>
								<option value="1">1</option>
								<option value="1">2</option>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer bg-dark">
					<button id="tutup" type="button" class="btn bg-grey" data-dismiss="modal">TUTUP</button>
					<button id="submit" type="submit" class="btn bg-success">Save changes</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
