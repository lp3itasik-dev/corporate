<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya - Cetak Tunjangan Transport</title>
	<link href="<?= base_url() ?>template/global_assets/css/extras/paper.css" rel="stylesheet" type="text/css">
	<style>
	td,th{
		border-top:1px solid #000;
		border-left:1px solid #000;
		padding: 3px;
	}
	</style>
</head>
<?php $bulan=array("Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");?>
<body class="A4" style="font-family:Arial">
	<?php
	foreach($read_users as $u){
		$read_tunjangan_transport = $this->m->Get_AttendanceByUser($u->username,$_GET['dari'],$_GET['sampai']);
		if(count($read_tunjangan_transport)>0){
	?>
	<div class="sheet" style="padding:20px;font-size:12px">
		<div style="display:flex">
			<div style="">
				<h2 style="margin:5px 0px">
					Tunjangan Uang Transport
				</h2>
				<?= date('d/m/Y',strtotime($_GET['dari']))?>
				s.d
				<?= date('d/m/Y',strtotime($_GET['sampai']))?>
			</div>
			<img src="<?= base_url() ?>template/global_assets/images/poltek2.png" height="50px" style="margin-left:auto">
		</div>

		<div style="margin-top:30px;margin-bottom:10px">
			Nama : <?= $u->fullname ?>
		</div>
		<table style="border-right:1px solid #000;border-bottom:1px solid #000;font-size:12px;width:100%;margin-bottom:20px" cellspacing="0">
			<tr>
				<th align="center">NO</th>
				<th align="center" style="width:350px">NAMA</th>
				<th align="center">CHECK IN</th>
				<th align="center">CHECK OUT</th>
				<th align="center">UANG TRANSPORT</th>
			</tr>
			<?php
				$no=1;
				$total_ut=0;
				foreach($read_tunjangan_transport as $tt){
				$total_ut+=$tt->ut;
			?>
			<tr>
				<td align="center"><?= $no++ ?></td>
				<td><?= $tt->nama ?></td>
				<td align="center"><?= date('H:i',strtotime($tt->check_in)) ?></td>
				<td align="center"><?= date('H:i',strtotime($tt->check_out)) ?></td>
				<td align="right"><span style="float:left">Rp.</span> <?= number_format($tt->ut,'0','.','.')?></td>
			</tr>
		<?php
			if(($no-1)==count($read_tunjangan_transport)){
		?>
			<tr>
				<td align="center" colspan="4"><b>TOTAL TUNJANGAN TRANSPORT</b></td>
				<td align="right"><span style="float:left">Rp.</span> <?= number_format($total_ut,'0','.','.')?></td>
			</tr>
		<?php
				}
			}
		?>
		</table>
		<span style="float:right">Tasikmalaya, <?= date('d ').$bulan[number_format(date('m'))].date(' Y') ?></span>
		<div style="display:flex;padding-top:20px;width:100%">
			<div style="width:50%;text-align:center">
				Disetujui Oleh:
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<hr style="width:60%;border-top:1px solid #000"></hr>
				H. Rudi Kurniawan, ST., MM.
			</div>
			<div style="width:50%;text-align:center">
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<hr style="width:60%;border-top:1px solid #000"></hr>
				<?= $u->fullname ?>
			</div>
		</div>
	</div>
<?php } } ?>
</body>

<script>
//window.print();
</script>
</html>
