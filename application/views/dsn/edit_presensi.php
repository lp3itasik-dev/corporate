<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya - Edit Presensi</title>
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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Dashboard <?= $this->session->userdata('nama').$this->session->userdata('sekolah').$this->session->userdata('jurusan').$this->session->userdata('tahun_akademik') ?></h4>
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
							<div class="card-header text-center row">
								<div class="col-12 mb-2 mt-4">
									<img style="height:7rem;border-radius:5px" src="<?= base_url() ?>template/global_assets/images/logo-politeknik-1.png" alt="" class="bg-dark p-1 pt-2 pb-2">
								</div>
								<div class="col-12">
									<h4 class="card-title">
										DAFTAR HADIR MAHASISWA<br>
										LP3I TASIKMALAYA
									</h4>
									<br>
									<i>Jln. Ir. H. Djuanda No. 106 KM 2 Tasikmalaya</i>
								</div>
							</div>
							<hr class="mt-0"></hr>
							<form action="<?= base_url() ?>Dsn/update_presensi" method="POST">
								<input name="id_lkm" type="hidden" value="<?= $read_lkm[0]->id_lkm; ?>">
								<input name="kodematakuliah" type="hidden" value="<?= $read_lkm[0]->kodematakuliah; ?>">
								<input name="kelas" type="hidden" value="<?= $read_jadwalkuliah[0]->kelas; ?>">
								<input name="pertemuan" type="hidden" value="<?= $read_lkm[0]->pertemuan; ?>">
								<div class="card-body table-responsive">
									<div class="form-group row mb-0 pl-3 pr-3">
										<label class="col-form-label col-3 p-1">PROGRAM <span class="float-right">:</span></label>
										<label class="col-form-label col-3 p-1">
											<?php 
											$jarak="";
											if(count($jurusan)>1){$jarak=", ";}
											for($i=1;$i<=count($jurusan);$i++){
												if(count($jurusan)-$i==1){$jarak=" & ";}
												if(count($jurusan)-$i==0){$jarak="";}
												echo strtoupper((($jurusan[$i-1]).$jarak)); 
											}?>
										</label>
										
										<label class="col-form-label col-3 p-1">NAMA PENGAJAR <span class="float-right">:</span></label>
										<label class="col-form-label col-3 p-1">
											<?= strtoupper($read_jadwalkuliah[0]->nama_lengkap); ?>
										</label>
										
										<label class="col-form-label col-3 p-1">KELAS <span class="float-right">:</span></label>
										<label class="col-form-label col-3 p-1">
											<?= strtoupper($read_jadwalkuliah[0]->kelas); ?>
										</label>
										
										<label class="col-form-label col-3 p-1">MATAKULIAH <span class="float-right">:</span></label>
										<label class="col-form-label col-3 p-1">
											<?= strtoupper($read_jadwalkuliah[0]->matakuliah); ?>
										</label>
										
										<label class="col-form-label col-3 p-1">SEMESTER <span class="float-right">:</span></label>
										<label class="col-form-label col-3 p-1">
											<?= strtoupper($read_jadwalkuliah[0]->semester); ?>
										</label>
										
										<label class="col-form-label col-3 p-1">SKS <span class="float-right">:</span></label>
										<label class="col-form-label col-3 p-1">
											<?= strtoupper($read_jadwalkuliah[0]->sks); ?>
										</label>
										
										<label class="col-form-label col-3 p-1">TAHUN AKADEMIK <span class="float-right">:</span></label>
										<label class="col-form-label col-3 p-1">
											<?= strtoupper($read_jadwalkuliah[0]->tahunajaran); ?>
										</label>
										
										<label class="col-form-label col-3 p-1">HARI/JAM <span class="float-right">:</span></label>
										<label class="col-form-label col-3 p-1">
											<?= strtoupper($read_jadwalkuliah[0]->hari).'/'.strtoupper($read_jadwalkuliah[0]->waktu); ?>
										</label>
										
										<label class="col-form-label col-3 p-1">TANGGAL <span class="float-right">:</span></label>
										<label class="col-form-label col-3 p-1">
											<?= strtoupper(date('d/m/Y',strtotime($read_lkm[0]->tanggal))); ?>
										</label>
										
										<label class="col-form-label col-3 p-1">PERTEMUAN <span class="float-right">:</span></label>
										<label class="col-form-label col-3 p-1">
											<?= strtoupper($read_lkm[0]->pertemuan); ?>
										</label>
									</div>
								</div>
								<div class="card-body">		
									<div class="table-responsive">
										<table class="table table-striped mb-2">
											<thead class="bg-dark">
												<tr>
													<th width="50px" class="text-center">NO</th>
													<th width="100px" class="text-center">NIM</th>
													<th width="300px">NAMA</th>
													<th width="150px" class="text-center">PRESENSI</th>
												</tr>
											</thead>
											<tbody>
											<?php 
											$no=1;
											foreach($read_mhs as $r) {
												$v="";
												$s="";
												$i="";
												$a="";
												$k="";
												if($r->ket=="v"){$v="selected";}
												if($r->ket=="s"){$s="selected";}
												if($r->ket=="i"){$i="selected";}
												if($r->ket=="a"){$a="selected";}
												if($r->ket=="k"){$k="selected";}
												echo'
												<tr>
													<td class="text-center p-1">'.$no++.'</td>
													<td class="text-center p-1">'.$r->nim.'</td>
													<td class="p-1">'.$r->nama_lengkap.'</td>
													<td class="p-1">
														<select id="kehadiran1" name="presensi'.$r->id_absensi.'" class="form-control">
															<option value="" >PILIH</option>
															<option '.$v.' value="v">HADIR</option>
															<option '.$s.' value="s">SAKIT</option>
															<option '.$i.' value="i">IZIN</option>
															<option '.$a.' value="a">ALPA</option>
															<option '.$k.' value="k">KERJA</option>
														</select>
													</td>
												</tr>';
											} ?>
											</tbody>
										</table>
									</div>
								</div>

								
								<div class="card-body">	
									<div class="form-group row">
										<label class="col-form-label col-lg-12">POKOK BAHASAN :</label>
										<div class="col-lg-12">
											<textarea name="materi" type="text" class="form-control"><?= $read_lkm[0]->materi ?></textarea>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-12">MOTIVATOR :</label>
										<div class="col-lg-12">
											<input name="motivator" type="text" class="form-control" value="<?= $read_lkm[0]->motivator ?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-lg-12">MOTIVASI :</label>
										<div class="col-lg-12">
											<textarea name="motivasi" type="text" class="form-control"><?= $read_lkm[0]->motivasi ?></textarea>
										</div>
									</div>
									<div class="form-group row mb-0">
										<label class="col-form-label col-lg-12">TUGAS :</label>
										<div class="col-lg-12">
											<input name="tugas" type="text" class="form-control" value="<?= $read_lkm[0]->tugas ?>">
										</div>
									</div>
									<div class="form-group row m-1">
										<div class="col-12 text-right p-3">
											<a href="<?= base_url() ?>Dsn" name="batal" class="btn bg-grey legitRipple m-1"><i class="icon-cross2 mr-1"></i>BATAL</a>
											<button type="submit" name="submit" class="btn btn-success legitRipple m-1"><i class="icon-checkmark4 mr-2"></i>SIMPAN</button>
										</div>
									</div>
								</div>
							</form>
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
	</script>
	
</body>
</html>
