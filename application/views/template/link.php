	<!-- Icon -->
	<link rel="icon" href="<?= base_url('template/global_assets/images/ico-silt.png') ?>" type="image/x-icon">

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>template/global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>template/layout_2/LTR/material/full/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>template/layout_2/LTR/material/full/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>template/layout_2/LTR/material/full/assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>template/layout_2/LTR/material/full/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?= base_url() ?>template/layout_2/LTR/material/full/assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?= base_url() ?>template/global_assets/js/main/jquery.min.js"></script>
	<script src="<?= base_url() ?>template/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url() ?>template/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="<?= base_url() ?>template/global_assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?= base_url() ?>template/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="<?= base_url() ?>template/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="<?= base_url() ?>template/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="<?= base_url() ?>template/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script src="<?= base_url() ?>template/global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="<?= base_url() ?>template/global_assets/js/plugins/pickers/daterangepicker.js"></script>

	<script src="<?= base_url() ?>template/layout_2/LTR/material/full/assets/js/app.js"></script>
	<script src="<?= base_url() ?>template/global_assets/js/demo_pages/dashboard.js"></script>

	<script src="<?= base_url() ?>template/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="<?= base_url() ?>template/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js"></script>
	<script src="<?= base_url() ?>template/global_assets/js/plugins/forms/selects/select2.min.js"></script>

	<script src="<?= base_url() ?>template/global_assets/js/demo_pages/form_inputs.js"></script>
	<script src="<?= base_url() ?>template/global_assets/js/demo_pages/form_select2.js"></script>

	<script src="<?php echo base_url();?>template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>

	<!-- /theme JS files -->
	<style>
		::placeholder {
		  color: #083470!important;
		  opacity: 0.5!important;
		}
		.bg-lp3i-grd{
			<?php if($this->session->userdata('color1')!=null ){ ?>
			background-image: linear-gradient(<?= $this->session->userdata('color2') ?>, <?= $this->session->userdata('color1') ?>);
			<?php }else{ ?>
			background-image: linear-gradient(#80c9ec, #083470);
			<?php } ?>
		}
		.bg-lp3i-grd-lr{
			background-image: linear-gradient(to left,<?= $this->session->userdata('color2') ?>, <?= $this->session->userdata('color1') ?>);
		}
		.bg-lp3i{
			background-color: <?= $this->session->userdata('color1') ?>;
		}
		.bg-lp3i-light{
			background-color: <?= $this->session->userdata('color2') ?>;
		}
		.text-lp3i{
			color: <?= $this->session->userdata('color1') ?>!important;
		}
		.card-header-bg{
			<?php if($this->session->userdata('gradient')=="on"){ ?>
				background-image: linear-gradient(177deg, <?= $this->session->userdata('color2') ?> 0%, rgba(255,255,255,1) 100%);
			<?php }else{ ?>
				background-color: <?= $this->session->userdata('color2') ?>!important;
			<?php } ?>
		}
		.dataTables_paginate .paginate_button.current, .dataTables_paginate .paginate_button.current:focus, .dataTables_paginate .paginate_button.current:hover {
		    background-color: <?= $this->session->userdata('color1') ?>;
		}
		.text-outline{
			text-shadow:
	    -1px -1px 0 #fff,
	    1px -1px 0 #fff,
	    -1px 1px 0 #fff,
	    1px 1px 0 #fff;
		}
		.form-control2, .select2-selection2 {
			border: 2px solid #ddd!important;
			background-color: #fff;
			border-radius: 5px;
			padding: 1px 10px;
			font-size: 16px;
			height: auto;
		}
		.modal-lock{
			width: -webkit-fill-available!important;
		}
		.modal-content-lock{
			height: inherit!important;
		}
		.absolute-center{
			position: absolute;
		  top: 50%;
		  left: 50%;
		  transform: translate(-50%, -50%);
		}
		.bg-blue{
			background-color: #083470;
		}
		.bg-fara{
			background-color: #ce1c7b;
		}
		.bg-aripin{
			background-color: #083470;
		}
		.bg-riju{
			background-color: #0a5744;
		}
		.icon-sidebar{
			font-size: 17px!important;
		}
		.text-sidebar{
			font-size: 15px!important;
		}
		input[type="color" i] {
			border:none;
			height: 18px;
			width: 30px;
		}
	</style>
