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
								<h6 class="card-title"><i class="icon-add"></i> &nbsp; Add Resume Buku</h6>
							</div>

							<div class="card-body">
								<?php foreach($read_resume_buku as $r){}?>
								<input type="hidden" name="id_buku" class="form-control" value="<?= $r->id_buku ?>">
								<?php $nama_bulan=array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember') ?>
								<div class="row">
									<label class="col-form-label col-lg-2 col-sm-12 col-12">Bulan/ Tahun <span class="float-right">:</span></label>
									<div class="col-lg-6 col-6">
										<input type="text" class="form-control" value="<?= $nama_bulan[$r->bulan-1].'/ '.$r->tahun ?>" readonly>
									</div>
								</div>
								<div class="row">
									<label class="col-form-label col-lg-2 col-sm-12 col-12">Judul <span class="float-right">:</span></label>
									<div class="col-lg-6 col-6">
										<input type="text" name="judul" class="form-control" value="<?= $r->judul ?>" readonly>
									</div>
								</div>
								<div class="row">
									<label class="col-form-label col-lg-2 col-sm-12 col-12">ISBN <span class="float-right">:</span></label>
									<div class="col-lg-2 col-6">
										<input type="text" name="isbn" class="form-control" value="<?= $r->no_isbn ?>" readonly>
									</div>
								</div>
								<div class="row">
									<label class="col-form-label col-lg-2 col-sm-12 col-12">Penulis <span class="float-right">:</span></label>
									<div class="col-lg-3 col-6">
										<input type="text" name="penulis" class="form-control" value="<?= $r->penulis ?>" readonly>
									</div>
								</div>
								<div class="row">
									<label class="col-form-label col-lg-2 col-sm-12 col-12">Penerbit <span class="float-right">:</span></label>
									<div class="col-lg-3 col-6">
										<input type="text" name="penerbit" class="form-control" value="<?= $r->penerbit ?>" readonly>
									</div>
								</div>
								<div class="row">
									<label class="col-form-label col-lg-2 col-sm-12 col-12">Tahun Terbit <span class="float-right">:</span></label>
									<div class="col-lg-1 col-6">
										<input type="number" name="tahun_terbit" class="form-control" value="<?= $r->tahun_terbit ?>" readonly>
									</div>
								</div>
								<div class="row">
									<label class="col-form-label col-lg-2 col-sm-12 col-12">Resume Buku <span class="float-right">:</span></label>
									<div class="col-12">
											<?= $r->resume ?>
									</div>
								</div>
								<div class="row">
									<div class="col-12 pt-2 text-right">
										<a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>/ResumeBuku" class="btn btn-dark legitRipple">Back <i class="icon-arrow-left52 ml-2"></i></a>
										<?php if($r->status == 0){ ?>
										<a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>/ResumeBukuVerifikasi/<?= $r->id_buku?>" class="btn btn-success legitRipple">Verification <i class="icon-checkmark4 ml-2"></i></a>
										<?php } ?>
									</div>
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
