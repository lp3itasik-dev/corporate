<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya - Cetak Tunjangan Makan</title>
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
	<div class="sheet" style="padding:20px;font-size:12px">
		<div style="display:flex">
			<div style="">
				<h2 style="margin:5px 0px">
					Tunjangan Uang Makan
				</h2>
				<?= date('d/m/Y',strtotime($_GET['dari']))?>
				s.d
				<?= date('d/m/Y',strtotime($_GET['sampai']))?>
			</div>
			<img src="<?= base_url() ?>template/global_assets/images/poltek2.png" height="50px" style="margin-left:auto">
		</div>

		<table style="border-right:1px solid #000;border-bottom:1px solid #000;font-size:12px;width:100%;margin-top:30px;margin-bottom:20px" cellspacing="0">
			<tr>
				<th align="center">NO</th>
				<th align="center" style="width:350px">NAMA</th>
				<th align="center">TOTAL KEHADIRAN</th>
				<th align="center">TOTAL TUNJANGAN</th>
			</tr>
			<?php
				$no=1;
				$total_um=0;
				foreach($read_tunjangan_makan as $tm){
				if($no<45){
					$total_um+=$tm->total_um;
			?>
			<tr>
				<td align="center"><?= $no++ ?></td>
				<td><?= $tm->fullname ?></td>
				<td align="center"><?= $tm->total_kehadiran?></td>
				<td align="right"><span style="float:left">Rp.</span> <?= number_format($tm->total_um,'0','.','.')?></td>
			</tr>
			<?php
				}
					if(($no-1)==count($read_tunjangan_makan)){
						?>
						<tr>
							<td align="center" colspan="3"><b>TOTAL TUNJANGAN MAKAN</b></td>
							<td align="right"><span style="float:left">Rp.</span> <?= number_format($total_um,'0','.','.')?></td>
						</tr>
						<?php
					}
				}
			?>
		</table>
		<?php if($no<36){ ?>
		<span style="float:right">Tasikmalaya, <?= date('d ').$bulan[number_format(date('m'))].date(' Y') ?></span>
		<div style="display:flex;padding-top:20px;width:100%">
			<div style="width:50%;text-align:center">
				Dibuat Oleh:
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<hr style="width:60%;border-top:1px solid #000"></hr>
				<?= $this->session->userdata('fullname') ?>
			</div>
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
		</div>
	<?php } ?>
	</div>
	</div>
	<?php if(count($read_tunjangan_makan)>=36){ ?>
		<div class="sheet" style="padding:20px; font-size:12px">
			<?php if(count($read_tunjangan_makan)>=$no){ ?>
			<table style="border-right:1px solid #000;border-bottom:1px solid #000;font-size:12px;width:100%;margin-top:30px;margin-bottom:20px" cellspacing="0">
				<tr>
					<th align="center">NO</th>
					<th align="center" style="width:350px">NAMA</th>
					<th align="center">TOTAL KEHADIRAN</th>
					<th align="center">TOTAL TUNJANGAN</th>
				</tr>
				<?php
					$no2=1;
					foreach($read_tunjangan_makan as $tm){
					if($no2>=$no){
					$total_um+=$tm->total_um;
				?>
				<tr>
					<td align="center"><?= $no2 ?></td>
					<td><?= $tm->fullname ?></td>
					<td align="center"><?= $tm->total_kehadiran?></td>
					<td align="right"><span style="float:left">Rp.</span> <?= number_format($tm->total_um,'0','.','.')?></td>
				</tr>
			<?php
				}
					if($no2==count($read_tunjangan_makan)){
			?>
			<tr>
				<td align="center" colspan="3"><b>TOTAL TUNJANGAN MAKAN</b></td>
				<td align="right"><span style="float:left">Rp.</span> <?= number_format($total_um,'0','.','.')?></td>
			</tr>
			<?php
					}
					$no2++;
				}
			?>
			</table>
			<?php } ?>
			<span style="float:right">Tasikmalaya, <?= date('d ').$bulan[number_format(date('m'))].date(' Y') ?></span>
			<div style="display:flex;padding-top:20px;width:100%">
				<div style="width:50%;text-align:center">
					Dibuat Oleh:
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<hr style="width:60%;border-top:1px solid #000"></hr>
					<?= $this->session->userdata('fullname') ?>
				</div>
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
			</div>
		</div>
	<?php } ?>
</body>

<script>
window.print();
</script>
</html>
