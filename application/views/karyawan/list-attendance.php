<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya - List Attendance</title>
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
						<h4><i class="icon-user-check mr-2"></i>List Attendance</h4>
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
								<h6 class="card-title"><i class="icon-search4"></i> &nbsp; Search For List Attendance</h6>
							</div>

							<div class="card-body">
								<form action="" method="POST">
									<div class="form-group row">
										<label class="col-form-label col-1">Tahun <span class="float-right">:</span></label>
										<div class="col-lg-2 col-9">
											<select name="tahun" class="form-control select-search" data-fouc>
												<option value="">Pilih Tahun</option>
												<?php for($i=date('Y');$i>=2022;$i--){
													$select="";
													if($i==$tahun){$select="selected";}
													echo '<option '.$select.' value="'.$i.'">'.$i.'</option>';
												}?>
											</select>
										</div>
										<label class="col-form-label col-1">Bulan <span class="float-right">:</span></label>
										<div class="col-lg-2 col-9">
											<select name="bulan" class="form-control select-search" data-fouc>
												<option value="">Pilih Bulan</option>
												<?php
												$bln=array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember');
												for($i=1;$i<=12;$i++){
													$select="";
													if($i==$bulan){$select="selected";}
													echo '<option '.$select.' value="'.$i.'">'.$bln[$i].'</option>';
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
												<th width="50px" class="text-center">Tanggal</th>
												<th width="150px" class="text-center">check In</th>
												<th width="100px" class="text-center">Location In</th>
												<th width="100px" class="text-center">check Out</th>
												<th width="100px" class="text-center">Location Out</th>
												<th width="100px" class="text-center">Catatan</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$tanggal = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
												for($i=1;$i<=$tanggal;$i++){
													$check_in = "";
													$location_in = "";
													$check_out = "";
													$location_out = "";
													$ket = "";
													$a=0;
													$bg="white";
													if(date('w',strtotime($tahun.'-'.$bulan.'-'.$i))==0){$bg="danger";}
													if($i>9){$a="";}
													$list = $this->m->Get_AttendanceByTanggalAndUser($tahun.'-'.$bulan.'-'.$a.$i,$this->session->userdata('username'));
													foreach($list as $a){
														$check_in = date('H:i:s',strtotime($a->check_in));
														$location_in = '<a target="_blank" href="https://www.google.com/maps?q='.$a->location_in.'&hl=es;z=14">'.$a->location_in.'</a>';
														$check_out = date('H:i:s',strtotime($a->check_in));
														$location_out = '<a target="_blank" href="https://www.google.com/maps?q='.$a->location_out.'&hl=es;z=14">'.$a->location_out.'</a>';
														$ket = $a->catatan;
													}
											?>
											<tr class="bg-<?= $bg ?>">
												<td align="center"><?= $i ?></td>
												<td align="center"><?= $check_in ?></td>
												<td align="center"><?= $location_in ?></td>
												<td align="center"><?= $check_out ?></td>
												<td align="center"><?= $location_out ?></td>
												<td><?= $ket ?></td>
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
