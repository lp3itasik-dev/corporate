		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md bg-lp3i">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center bg-lp3i">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user-material">
					<div class="sidebar-user-material-body">
						<div class="card-body text-center">
							<a href="#">
								<img src="<?= base_url() ?>template/global_assets/images/foto/<?= $this->session->userdata('foto') ?>" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
							</a>
							<h4 class="mb-0 text-white text-shadow-dark text-outline text-lp3i"><b><?= $this->session->userdata('fullname') ?></b></h4>
							<span class="font-size-sm text-white text-shadow-dark text-outline text-lp3i"><b><?= $this->session->userdata('divisi') ?></b></span>
						</div>

						<div class="sidebar-user-material-footer">
							<a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>My account</span></a>
						</div>
					</div>

					<div class="collapse" id="user-nav">
						<ul class="nav nav-sidebar">
							<li class="nav-item">
								<a href="<?= base_url() ?>Auth/Profile" class="nav-link">
									<i class="icon-user icon-sidebar"></i>
									<span>My profile</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header">
							<div class="text-uppercase font-size-xs line-height-xs">Main</div>
							<i class="icon-menu" title="Main"></i>
						</li>

						<li class="nav-item">
							<a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>" class="nav-link">
								<i class="icon-home4 icon-sidebar"></i>
								<span class="text-sidebar">
									Dashboard
								</span>
							</a>
						</li>
						<?php if($this->session->userdata('level')=="hrd"){ ?>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-color-sampler icon-sidebar"></i> <span class="text-sidebar">Master</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Data Master" style="display: none;">

								<li class="nav-item">
									<a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>/Divisi" class="nav-link text-sidebar">
										Divisi
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>/Karyawan" class="nav-link text-sidebar">
										Karyawan
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>/TunjanganMakan" class="nav-link text-sidebar">
										Tunjangan Makan
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>/TunjanganTransport" class="nav-link text-sidebar">
										Tunjangan Transport
									</a>
								</li>

							</ul>
						</li>
						<?php } ?>

						<li class="nav-item">
							<a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>/ListAttendance" class="nav-link">
								<i class="icon-user-check icon-sidebar"></i>
								<span class="text-sidebar">
									List Attendance
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>/ListAttendanceTeam" class="nav-link">
								<i class="icon-users icon-sidebar"></i>
								<span class="text-sidebar">
									List Attendance Team
								</span>
							</a>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-color-sampler icon-sidebar"></i> <span class="text-sidebar">Corporate Culture</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Data Master" style="display: none;">

								<li class="nav-item">
									<a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>/ResumeBuku" class="nav-link text-sidebar">
										Resume Buku
									</a>
								</li>

							</ul>
						</li>
						<?php if($this->session->userdata('level')=="hrd"){ ?>
							<li class="nav-item nav-item-submenu">
								<a href="#" class="nav-link"><i class="icon-file-empty icon-sidebar"></i> <span class="text-sidebar">Report</span></a>
								<ul class="nav nav-group-sub" data-submenu-title="Data Master" style="display: none;">

									<li class="nav-item">
										<a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>/ReportTunjanganMakan" class="nav-link text-sidebar">
											Tunjangan Makan
										</a>
									</li>
									<li class="nav-item">
										<a href="<?= base_url().ucfirst($this->session->userdata('level')) ?>/ReportTunjanganTransport" class="nav-link text-sidebar">
											Tunjangan Transport
										</a>
									</li>

								</ul>
							</li>
						<?php } ?>

						<li class="nav-item">
							<a href="<?= base_url() ?>logout" class="nav-link">
								<i class="icon-switch2 icon-sidebar"></i>
								<span class="text-sidebar">
									Logout
								</span>
							</a>
						</li>
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->

		</div>
