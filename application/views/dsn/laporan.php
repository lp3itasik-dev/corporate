<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya - Laporan</title>
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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Laporan</h4>
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
								<h5 class="card-title"><i class="icon-file-empty2"></i> &nbsp; LAPORAN MENGAJAR</h5>
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
											echo'
											<tr>
												<td class="text-center p-1">'.$r->waktu.'</td>
												<td class="text-center p-1">'.$r->hari.'</td>
												<td class="text-center p-1">'.$r->matakuliah.'</td>
												<td class="text-center p-1">'.$r->kelas.'</td>
												<td class="text-center p-1">
													<a href="'.base_url().'/Dsn/laporan_presensi?kodematakuliah='.$r->kodematakuliah.'&kelas='.$r->kelas.'" target="_blank" class="btn btn-primary m-1"><i class="icon-printer"></i>&nbsp; PRESENSI</a>
													<a href="'.base_url().'/Dsn/lkm?kodematakuliah='.$r->kodematakuliah.'&kelas='.$r->kelas.'" target="_blank" class="btn btn-success m-1"><i class="icon-printer"></i>&nbsp; LKM</a>
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
	</script>
</body>
</html>
