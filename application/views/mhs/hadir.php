<!Doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Politeknik LP3I Kampus Tasikmalaya - Edit Presensi</title>
		<?php $this->load->view('template/layout_2/link.php')?>
		<script src="<?= base_url() ?>template/global_assets/js/qr/html5-qrcode.min.js"></script>
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
		<div class="content-wrapper"><!-- Page header -->
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
								<h5 class="card-title"><i class="icon-calendar2"></i> &nbsp; SCAN KEHADIRAN</h5>
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
									<div id="reader" width="100%"></div>
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
		
	</body>
	<script>
		const html5QrCode = new Html5Qrcode("reader");
		// This method will trigger user permissions
		Html5Qrcode.getCameras().then(devices => {
		  /**
		   * devices would be an array of objects of type:
		   * { id: "id", label: "label" }
		   */
		  if (devices && devices.length) {
		    var cameraId = devices[0].id;
		    // .. use this to start scanning.
			// Create instance of the object. The only argument is the "id" of HTML element created above.
			
			
			html5QrCode.start(
			  { facingMode: "environment" },     // retreived in the previous step.
			  {
			    fps: 10,    // sets the framerate to 10 frame per second
			    qrbox: 700  // sets only 250 X 250 region of viewfinder to
					// scannable, rest shaded.
			  },
			  qrCodeMessage => {
			    // do something when code is read. For example:
			    	//alert(`${qrCodeMessage}`);
					$('#notifikasi').load("<?= base_url() ?>/Mhs/hadir_cek?kodejadwalkuliah=<?= $_GET['kodejadwalkuliah'] ?>&id=<?= $_GET['id'] ?>&code="+`${qrCodeMessage}`);
					$('#myAlert').modal({backdrop: 'static', keyboard: false});
				//window.location="absen.php";
				//console.log(`${qrCodeMessage}`);
			    
			  },
			  errorMessage => {
			    // parse error, ideally ignore it. For example:
			    console.log(`QR Code no longer in front of camera.`);
			  })
			.catch(err => {
			  // Start failed, handle it. For example,
			  console.log(`Unable to start scanning, error: ${err}`);
			}); 
		  }
		}).catch(err => {
		  // handle err
		});
		
		
		
	</script>
	<div id="myAlert" class="modal">
		<div class="modal-dialog">
			<div class="modal-content" id="notifikasi">
				<div class="alert alert-warning alert-styled-left alert-arrow-left alert-dismissible mb-0">
					<button type="button" class="close" data-dismiss="modal"><span>×</span></button>
					<span class="font-weight-semibold" id="msg"></span> 
				</div>
			</div>
		</div>
	</div>
</html>
