<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya - Dashboard</title>
	<?php $this->load->view('template/link.php')?>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="">
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
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
						<h4><i class="icon-home4 icon-sidebar"></i><span class="font-weight-semibold pl-2">Dashboard</span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content pt-0">

				<!-- Main charts -->
				<div class="">
					<div class="row">
						<!-- Traffic sources -->
						<div class="card col-lg-6">
							<div class="card-header header-elements-inline">
								<h6 class="card-title">Maps</h6>
							</div>
							<div class="card-body">
								<iframe width="100%" height="100%" frameborder="10" scrolling="no" marginheight="0" marginwidth="0" src="" id="maps"></iframe>
							</div>
						</div>
						<!-- /traffic sources -->

						<div class="col-lg-6">
							<div class="card">
								<div class="card-header header-elements-inline">
									<h6 class="card-title">Live Attendance</h6>
								</div>

								<div class="card-body">
									<form action="<?= base_url() ?>Karyawan/Attendance" method="POST">
									    <input type="hidden" name="lokasi" class="form-control">
										<div class="col-12 text-center" style="font-size:100px" id="time">
											12:12
										</div>
										<div class="col-12">
											<label>Catatan :</label>
											<textarea name="catatan" class="form-control p-2" style="resize: none; border:1px solid #aaa!important" rows="4"></textarea>
										</div>
										<div class="col-12 text-center mt-2">
											<?php
											$in="";
											$out= "disabled";
											foreach($read_attendance as $ra){}
											if(count($read_attendance)>0){
												$in="disabled";
												$out= "";
												if($ra->check_out!=NULL){
													$in="disabled";
													$out= "disabled";
												}
											}
											?>
											<button class="btn btn-info" name="check_in" <?= $in ?>>Masuk</button>
											<button class="btn btn-info" name="check_out" <?= $out ?>>Keluar</button>
										</div>
									</form>
								</div>
							</div>
						</div>
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
	<script>
	setInterval(times(), 1000);
	function times(){
		var dt = new Date();
		var time = dt.getHours() + ":" + dt.getMinutes();
		$('#time').html(time);
	}
	var x = $('[name="lokasi"]');

	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition, showError);
	} else {
		$('[name="lokasi"]').val("Geolocation is not supported by this browser.");
	}

	function showPosition(position) {
	  $('[name="lokasi"]').val(position.coords.latitude + "," + position.coords.longitude);
		$('#maps').attr('src','https://www.google.com/maps?q='+position.coords.latitude+','+position.coords.longitude+'&hl=es;z=14&output=embed');
	}

	function showError(error) {
	  switch(error.code) {
	    case error.PERMISSION_DENIED:
	      $('[name="lokasi"]').val("User denied the request for Geolocation.")
	      break;
	    case error.POSITION_UNAVAILABLE:
	      $('[name="lokasi"]').val("Location information is unavailable.")
	      break;
	    case error.TIMEOUT:
	      $('[name="lokasi"]').val("The request to get user location timed out.")
	      break;
	    case error.UNKNOWN_ERROR:
	      $('[name="lokasi"]').val("An unknown error occurred.")
	      break;
	  }
	}
	</script>
</body>
</html>
