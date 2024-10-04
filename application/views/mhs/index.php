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
								<h5 class="card-title"><i class="icon-calendar2"></i> &nbsp; JADWAL KULIAH</h5>
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
												<th width="100px" class="text-center">RUANGAN</th>
												<th width="100px" class="text-center">AKSI</th>
											</tr>
										</thead>
										<tbody>
										<?php 
										$n=0;
										foreach($read_jadwalkuliah as $r){
											$href="#";
											$bg="";
											$prt="";
											$btn="";											
											$v="return belum()";											
											$s="belum";											
											$i="belum";											
											$k="belum";		
											$absensi="";
											if(isset($status_input[$n])){
												if($status_input[$n]!=""){
													$bg=$status_input[$n];
													$btn="all";
													$prt=$pertemuan[$n];
													$absensi=$id_absensi[$n];
													$href=base_url()."/Mhs/hadir_presensi?kodejadwalkuliah=".$r->kodejadwalkuliah."&id=".$absensi;
												}
											}
											if($btn=="all"){																							
												$v="";											
												$s="s";											
												$i="i";											
												$k="k";
											}
											echo'
											<tr class="'.$bg.'">
												<td class="text-center p-1">'.$r->waktu.'</td>
												<td class="text-center p-1">'.strtoupper($r->hari).'</td>
												<td class="text-center p-1">'.strtoupper($r->matakuliah).'</td>
												<td class="text-center p-1">'.strtoupper($r->ruangan).'</td>
												<td class="text-center p-1">
													<a onclick="'.$v.'" href="'.$href.'" class="btn btn-success m-1 p-1">HADIR</a>
													<button onclick="return '.$s.'(`'.$absensi.'`,`'.strtoupper($r->matakuliah).'`,`'.$prt.'`)" class="btn btn-primary m-1 p-1">SAKIT</button>
													<button onclick="return '.$i.'(`'.$absensi.'`,`'.strtoupper($r->matakuliah).'`,`'.$prt.'`)" class="btn btn-warning m-1 p-1">IZIN</button>
													<button onclick="return '.$k.'(`'.$absensi.'`,`'.strtoupper($r->matakuliah).'`,`'.$prt.'`)" class="btn btn-info m-1 p-1">KERJA</button>
												</td>
											</tr>
											';
											$n++;
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
        function belum(){
			$('#myAlert').modal('show');
			$('#msg').html('BELUM WAKTUNYA INPUT PRESENSI');
		}
        function s(id_absensi,matakuliah,pertemuan){
			$('#myModal').modal({backdrop: 'static', keyboard: false});
			$('[name="matakuliah"]').val(matakuliah);
			$('[name="pertemuan"]').val(pertemuan);
			$('[name="presensi"]').val("SAKIT");
			
            $('.modal-title').html('INPUT PRESENSI');
            $('#formId').attr('action', '<?= base_url() ?>Mhs/update_presensi?ket=sakit&id='+id_absensi);
		}
        function i(id_absensi,matakuliah,pertemuan){
			$('#myModal').modal({backdrop: 'static', keyboard: false});
			$('[name="matakuliah"]').val(matakuliah);
			$('[name="pertemuan"]').val(pertemuan);
			$('[name="presensi"]').val("IZIN");
			
            $('.modal-title').html('INPUT PRESENSI');
            $('#formId').attr('action', '<?= base_url() ?>Mhs/update_presensi?ket=izin&id='+id_absensi);
		}
        function k(id_absensi,matakuliah,pertemuan){
			$('#myModal').modal({backdrop: 'static', keyboard: false});
			$('[name="matakuliah"]').val(matakuliah);
			$('[name="pertemuan"]').val(pertemuan);
			$('[name="presensi"]').val("KERJA");
			
            $('.modal-title').html('INPUT PRESENSI');
            $('#formId').attr('action', '<?= base_url() ?>Mhs/update_presensi?ket=kerja&id='+id_absensi);
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
	<div id="myModal" class="modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-dark">
					<h5 class="modal-title">Basic modal</h5>
					<button type="button" class="close" data-dismiss="modal">×</button>
			    </div>
			    <form id="formId" action="" method="POST">
                <div class="modal-body b-add bg-grey pb-1">
				    <div class="form-group row">
						<label class="col-form-label col-lg-3">MATAKULIAH <span class="float-right">:</span></label>
						<div class="col-lg-4">
							<input name="matakuliah" type="text" class="form-control text-white" readonly>
						</div>
						<label class="col-form-label col-lg-3">PERTEMUAN <span class="float-right">:</span></label>
						<div class="col-lg-2">
							<input name="pertemuan" type="text" class="form-control text-white bg-grey" readonly>
						</div>
					</div>
				</div>
				<div class="modal-body b-add">
				    <div class="form-group row">
						<label class="col-form-label col-3">PRESENSI <span class="float-right">:</span></label>
						<div class="col-9">
							<input name="presensi" type="text" class="form-control" readonly>
						</div>
					</div>
				    <div class="form-group row">
						<label class="col-form-label col-3">KETERANGAN <span class="float-right">:</span></label>
						<div class="col-lg-12">
							<textarea name="keterangan" type="text" class="form-control" required></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer bg-dark">
					<button id="tutup" type="button" class="btn bg-grey" data-dismiss="modal">TUTUP</button>
					<button id="submit" type="submit" class="btn bg-success">SIMPAN</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
