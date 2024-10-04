<html>
<head>
	<title>Politeknik LP3I Kampus Tasikmalaya - Dashboard</title>
	<link rel="icon" href="<?= base_url() ?>template/global_assets/images/poltek.png" "="" type="image/x-icon">
	<link href="<?= base_url() ?>template/global_assets/css/laporan/style.css" rel="stylesheet" type="text/css">
	<style>
	</style>
</head>
<?php
	function tanggal($tanggal){
		switch (date('m',strtotime($tanggal))) {
		  case 1:
			$tanggal=date('d',strtotime($tanggal))." Januari ".date('Y',strtotime($tanggal));
			break;
		  case 2:
			$tanggal=date('d',strtotime($tanggal))." Februari ".date('Y',strtotime($tanggal));
			break;
		  case 3:
			$tanggal=date('d',strtotime($tanggal))." Maret ".date('Y',strtotime($tanggal));
			break;
		  case 4:
			$tanggal=date('d',strtotime($tanggal))." April ".date('Y',strtotime($tanggal));
			break;
		  case 5:
			$tanggal=date('d',strtotime($tanggal))." Mei ".date('Y',strtotime($tanggal));
			break;
		  case 6:
			$tanggal=date('d',strtotime($tanggal))." Juni ".date('Y',strtotime($tanggal));
			break;
		  case 7:
			$tanggal=date('d',strtotime($tanggal))." Juli ".date('Y',strtotime($tanggal));
			break;
		  case 8:
			$tanggal=date('d',strtotime($tanggal))." Agustus ".date('Y',strtotime($tanggal));
			break;
		  case 9:
			$tanggal=date('d',strtotime($tanggal))." September ".date('Y',strtotime($tanggal));
			break;
		  case 10:
			$tanggal=date('d',strtotime($tanggal))." Oktober ".date('Y',strtotime($tanggal));
			break;
		  case 11:
			$tanggal=date('d',strtotime($tanggal))." Nopember ".date('Y',strtotime($tanggal));
			break;
		  case 12:
			$tanggal=date('d',strtotime($tanggal))." Desember ".date('Y',strtotime($tanggal));
			break;
		}
		return $tanggal;
	}
?>
<body style="background-color: #CCCCCC">
	<div align="center">
		<table class="bayangprint" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="950">
			<tbody>
				<tr>
					<td style="padding: 30px">
						<div align="center">
							<p align="right">
								<table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" height="133" border="0" width="100%">
									<tbody>
										<tr>
											<td style="text-align:left">
												<div align="left">
													<table cellspacing="0" cellpadding="0" height="74" border="0" width="850">
														<tbody>
															<tr>
																<td valign="top"></td>
															</tr>
															<tr>
																<td valign="top">
																	<table cellspacing="0" cellpadding="0" border="0" width="100%">
																		<tbody>
																			<tr>
																				<td width="80px">
																					<p align="left">
																						<img src="<?= base_url() ?>template/global_assets/images/logo-politeknik-5.png" border="0" height="60px">
																					</p>
																				</td>
																				<td align="left">
																					<b>
																						<font style="font-size: 12pt" color="#000000">POLITEKNIK LP3I</font>
																						<br>
																					</b>
																					<font size="3" color="#000000">KAMPUS TASIKMALAYA</font>
																					<font style="font-size: 11pt" color="#000000">
																						: Jl. Ir. Djuanda No. 106 Km. 2
																						Rancabango Kota
																						Tasikmalaya<br>
																						TAHUN AKADEMIK 2020/2021
																					</font>
																				</td>
																			</tr>
																			<tr>
																				<td>&nbsp;</td>
																				<td>&nbsp;</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</td>
										</tr>
										<tr>
											<td bordercolor="#808080" height="13">
												<font style="font-size: 11pt" face="Arial" color="#000000">
													<span style="font-weight: 700">
														LEMBAR KEGIATAN MENGAJAR POLITEKNIK LP3I KAMPUS TASIKMALAYA
													</span>
												</font>
											</td>
										</tr>
										<tr>
											<td bordercolor="#808080" height="13"></td>
										</tr>
										<tr>
											<td bordercolor="#808080" height="13">
												<table cellspacing="0" cellpadding="3px" border="0" width="100%">
													<tbody>
														<tr>
															<td width="150">
																<font style="font-size: 9pt" face="Arial">
																	JURUSAN
																</font>
															</td>
															<td>:</td>
															<td width="150">
																<b>
																	<font style="font-size: 9pt" face="Arial"> 
																		<?php 
																		$jarak="";
																		if(count($jurusan)>1){$jarak=", ";}
																		for($i=1;$i<=count($jurusan);$i++){
																			if(count($jurusan)-$i==1){$jarak=" & ";}
																			if(count($jurusan)-$i==0){$jarak="";}
																			echo strtoupper((($jurusan[$i-1]).$jarak)); 
																		}?>
																	</font>
																</b>
															</td>
															<td width="150">
																<font style="font-size: 9pt" face="Arial">
																	NAMA PENGAJAR
																</font>
															</td>
															<td>:</td>
															<td width="250px">
																<b>
																	<font style="font-size: 9pt" face="Arial">
																		<?= strtoupper($read_jadwalkuliah[0]->nama_lengkap) ?>
																	</font>
																</b>
															</td>
														</tr>
														<tr>
															<td>
																<font style="font-size: 9pt" face="Arial">
																	KELAS
																</font>
															</td>
															<td>:</td>
															<td>
																<b>
																	<font style="font-size: 9pt" face="Arial">
																		<?= strtoupper($read_jadwalkuliah[0]->kelas) ?>
																	</font>
																</b>
															</td>
															<td width="105">
																<font style="font-size: 9pt" face="Arial">
																	MATAKULIAH
																</font>
															</td>
															<td>:</td>
															<td>
																<b>
																	<font style="font-size: 9pt" face="Arial">
																		<?= strtoupper($read_jadwalkuliah[0]->matakuliah) ?>
																	</font>
																</b>
															</td>
														</tr>
														<tr>
															<td width="82">
																<font style="font-size: 9pt" face="Arial">
																	SEMESTER
																</font>
															</td>
															<td>:</td>
															<td width="401">
																<b>
																	<font style="font-size: 9pt" face="Arial">
																		<?= strtoupper($read_jadwalkuliah[0]->semester) ?>
																	</font>
																</b>
															</td>
															<td width="105">
																<font style="font-size: 9pt" face="Arial">
																	SKS
																</font>
															</td>
															<td>:</td>
															<td>
																<b>
																	<font style="font-size: 9pt" face="Arial">
																		<?= strtoupper($read_jadwalkuliah[0]->sks) ?>
																	</font>
																</b>
															</td>
														</tr>
														<tr>
															<td width="92">
																<font style="font-size: 9pt" face="Arial">
																	TAHUN AKADEMIK
																</font>
															</td>
															<td>:</td>
															<td width="401">
																<b>
																	<font style="font-size: 9pt" face="Arial">
																		<?= strtoupper($read_jadwalkuliah[0]->tahunajaran) ?>
																	</font>
																</b>
															</td>
															<td width="105">
																<font style="font-size: 9pt" face="Arial">
																	HARI/JAM
																</font>
															</td>
															<td>:</td>
															<td>
																<b>
																	<font style="font-size: 9pt" face="Arial">
																		<?= strtoupper($read_jadwalkuliah[0]->hari.'/ '.$read_jadwalkuliah[0]->waktu) ?>
																	</font>
																</b>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
										<tr>
											<td bordercolor="#808080" height="13"></td>
										</tr>
										<tr>
											<td bordercolor="#808080" height="13">
												<table style="border-collapse: collapse" cellspacing="0" cellpadding="2px" bordercolor="#000000" border="1" width="100%">
													<thead>
														<tr>
															<td bgcolor="#666666" align="center" height="25" width="1%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>NO</b></font></td>
															<td bgcolor="#666666" align="center" height="25" width="3%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>TANGGAL</b></font></td>
															<td bgcolor="#666666" align="center" height="25" width="1%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>PRT</b></font></td>
															<td bgcolor="#666666" align="center" height="25" width="10%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>POKOK BAHASAN</b></font></td>
															<td bgcolor="#666666" align="center" height="25" width="1%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>MOTIVATOR</b></font></td>
															<td bgcolor="#666666" align="center" height="25" width="8%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>MOTIVASI 10 MENIT</b></font></td>
															<td bgcolor="#666666" align="center" height="25" width="8%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>TUGAS</b></font></td>

														</tr>
													</thead>
													<tbody>
														<?php $no=1; foreach($read_lkm as $r){ ?>
														<tr>
															<td align="center"><font style="font-size: 8pt" face="Arial" color="#000000"><?= $no++ ?></font></td>
															<td align="center"><font style="font-size: 8pt" face="Arial" color="#000000"><?= tanggal(date('Y-m-d',strtotime($r->tanggal))) ?></font></td>
															<td align="center"><font style="font-size: 8pt" face="Arial" color="#000000"><?= $r->pertemuan ?></font></td>
															<td align="center"><font style="font-size: 8pt" face="Arial" color="#000000"><p><?= nl2br($r->materi) ?></p></font></td>
															<td align="center"><font style="font-size: 8pt" face="Arial" color="#000000"><?= $r->motivator ?></font></td>
															<td align="center"><font style="font-size: 8pt" face="Arial" color="#000000"><p><?= nl2br($r->motivasi) ?></p></font></td>
															<td align="center"><font style="font-size: 8pt" face="Arial" color="#000000"><?= $r->tugas ?></font></td>
														</tr>
														<?php } ?>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</p>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
  </div>
</body>
</html>