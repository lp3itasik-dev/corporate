<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya - Database Siswa</title>
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
						<h4><i class="icon-color-sampler mr-2"></i> <span class="font-weight-semibold">Corporate Culture</span> - Resume Buku</h4>
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
								<h6 class="card-title"><i class="icon-search4"></i> &nbsp; Search For Resume Buku</h6>
							</div>

							<div class="card-body">
								<form action="" method="POST">
									<div class="form-group row">
										<label class="col-form-label col-1">Tahun <span class="float-right">:</span></label>
										<div class="col-lg-2 col-9">
											<select name="sekolah" class="form-control select-search" data-fouc>
												<option value="">Pilih Tahun</option>
												<?php for($i=date('Y');$i>=2022;$i--){
													$select="";
													if($i==$tahun){$select="selected";}
													echo '<option '.$select.' value="'.$i.'">'.$i.'</option>';
												}?>
											</select>
										</div>
										<div class="col-2 text-left">
											<button type="submit" name="submit" class="btn btn-dark legitRipple">Search <i class="icon-search4 ml-2"></i></button>
										</div>
									</div>
								</form>
								<div class="table-responsive mt-3">
									<table class="table table-bordered table-striped">
										<thead class="">
											<tr>
												<th width="50px" class="text-center">No</th>
												<th width="80px">Bulan</th>
												<th width="150px" class="text-center">Judul</th>
												<th width="100px" class="text-center">Penulis</th>
												<th width="100px" class="text-center">Penerbit</th>
												<th width="100px" class="text-center">Tahun Terbit</th>
												<th width="100px" class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$bulan=array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember');
												for($i=1;$i<=12;$i++){
													$id = $i."/".$tahun;
													$judul = "-";
													$penulis = "-";
													$penerbit = "-";
													$tahun_terbit = "-";
													$btn = "lp3i";
													$btn_text = "Add";
													$buku = $this->m->Get_ResumeByBulanByUser($i,$tahun);
													foreach($buku as $b){
														$id = $b->id_buku;
														$judul = $b->judul;
														$penulis = $b->penulis;
														$penerbit = $b->penerbit;
														$tahun_terbit = $b->tahun_terbit;
														if($b->status==1){
															$btn = "info";
															$btn_text = "View";
														}else{
															$btn = "success";
															$btn_text = "Edit";
														}
													}
											?>
											<tr>
												<td class="text-center"><?= $i ?></td>
												<td><?= $bulan[$i-1]?></td>
												<td><?= $judul ?></td>
												<td><?= $penulis ?></td>
												<td><?= $penerbit ?></td>
												<td class="text-center"><?= $tahun_terbit ?></td>
												<td class="text-center">
													<a class="btn bg-<?= $btn ?>" href="<?= base_url().ucfirst($this->session->userdata('level')) ?>/<?= ucfirst($btn_text) ?>ResumeBuku/<?= $id ?>">
														<?= $btn_text ?> Resume
													</a>
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
</html>
