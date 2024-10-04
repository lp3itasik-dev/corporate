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
													<tbody>
														<tr>
															<td rowspan="2" bgcolor="#666666" align="center" height="25" width="1%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>NO</b></font></td>
															<td rowspan="2" bgcolor="#666666" align="center" height="25" width="2%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>NIM</b></font></td>
															<td rowspan="2" bgcolor="#666666" align="center" height="25" width="5%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>NAMA MAHASISWA</b></font></td>
															<td colspan="<?= $jml_prt ?>" bgcolor="#666666" align="center" height="25" width="10%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>PERTEMUAN</b></font></td>
															<td rowspan="2" bgcolor="#666666" align="center" height="25" width="1%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>HADIR</b></font></td>
															<td rowspan="2" bgcolor="#666666" align="center" height="25" width="1%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>SAKIT</b></font></td>
															<td rowspan="2" bgcolor="#666666" align="center" height="25" width="1%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>IJIN</b></font></td>
															<td rowspan="2" bgcolor="#666666" align="center" height="25" width="1%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>ALFA</b></font></td>
															<td rowspan="2" bgcolor="#666666" align="center" height="25" width="1%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>KERJA</b></font></td>

														</tr>
														<tr>
															<?php 
															for($i=1;$i<=$jml_prt;$i++){
																echo'
																	<td bgcolor="#666666" align="center" height="25" width="1%">
																		<font style="font-size: 9pt" face="Arial" color="#FFFFFF">
																			<b>
																				'.$i.'
																			</b>
																		</font>
																	</td>
																';
															}
															?>
														</tr>
														<?php $no=0; foreach($read_mhs as $r){ ?>
														<tr>
															<td align="center"><font style="font-size: 8pt" face="Arial" color="#000000"><?= ++$no ?></font></td>
															<td align="center"><font style="font-size: 8pt" face="Arial" color="#000000"><?= $r->nim ?></font></td>
															<td><font style="font-size: 8pt" face="Arial" color="#000000">&nbsp;<?= $r->nama_lengkap ?></font></td>
															<?php 
															$v=0;
															$s=0;
															$iz=0;
															$a=0;
															$k=0;
															for($i=1;$i<=$jml_prt;$i++){
																$bg="";
																if($pesensi[$r->kode_aplikan][$i]=="v"){$v++;}
																if($pesensi[$r->kode_aplikan][$i]=="s"){$bg="#00CC00";$s++;}
																if($pesensi[$r->kode_aplikan][$i]=="i"){$bg="#FFFF00";$iz++;}
																if($pesensi[$r->kode_aplikan][$i]=="a"){$bg="#FF0033";$a++;}
																if($pesensi[$r->kode_aplikan][$i]=="k"){$bg="#FF9900";$k++;}
																echo'
																	<td style="background-color:  '.$bg.'" align="center">'.$pesensi[$r->kode_aplikan][$i].'</td> 
																';
															}
															if($v==0){$v="";}
															if($s==0){$s="";}
															if($iz==0){$iz="";}
															if($a==0){$a="";}
															if($k==0){$k="";}
															?>                                                                                                                         
															<td align="center"><?= $v ?></td>
															<td align="center"><?= $s ?></td>
															<td align="center"><?= $iz ?></td>
															<td align="center"><?= $a ?></td>
															<td align="center"><?= $k ?></td>

														</tr>
														<?php } ?>
														<tr>
															<td height="20" bgcolor="#666666" colspan="<?= $jml_prt+8 ?>"></td>
														</tr>
														<tr rowspan="3">
															<td colspan="2" rowspan="3"></td>
															<td>&nbsp;Tanggal Pertemuan</td>
															<?php 
															$i=1; 
															foreach($read_lkm as $r){ 
																$i++;
																echo'
																	<td align="center">'.date('d',strtotime($r->tanggal)).'</td>
																';
															} 
															for($i=$i;$i<=$jml_prt;$i++){
																echo'
																<td align="center"></td>
																';
															}?>
															<td colspan="5"></td>
														</tr>
														<tr>
															<td>&nbsp;Bulan</td>
															<?php 
															$i=1; 
															foreach($read_lkm as $r){ 
																$i++;
																echo'
																	<td align="center">'.date('m',strtotime($r->tanggal)).'</td>
																';
															} 
															for($i=$i;$i<=$jml_prt;$i++){
																echo'
																<td align="center"></td>
																';
															}?>
															<td colspan="5"></td>
														</tr>
														<tr>
															<td>&nbsp;Tahun</td>
															<?php 
															$i=1; 
															foreach($read_lkm as $r){ 
																$i++;
																echo'
																	<td align="center">'.date('y',strtotime($r->tanggal)).'</td>
																';
															} 
															for($i=$i;$i<=$jml_prt;$i++){
																echo'
																<td align="center"></td>
																';
															}?>
															<td colspan="5"></td>
														</tr>
														<tr>
															<td height="20" bgcolor="#66666" colspan="<?= $jml_prt+8 ?>"></td>
														</tr>
														<tr rowspan="3">
															<td colspan="2" rowspan="4">&nbsp; Jumlah Mahasiswa</td>
															<td>&nbsp;Sakit</td>
															<?php for($i=1;$i<=$jml_prt;$i++){ 
															$jml="";
															if($jml_presensi[$i]['s']>0){$jml=$jml_presensi[$i]['s'];}
															echo '
																<td align="center" style="color: #00CC00">'.$jml.'</td>
															';
															}?>
															<td colspan="5"></td>
														</tr>
														<tr>
															<td>&nbsp;Izin</td>
															<?php for($i=1;$i<=$jml_prt;$i++){ 
															$jml="";
															if($jml_presensi[$i]['i']>0){$jml=$jml_presensi[$i]['i'];}
															echo '
																<td align="center" style="color: #FFFF00">'.$jml.'</td>
															';
															}?>
															<td colspan="5"></td>
														</tr>
														<tr>
															<td>&nbsp;Alpa</td>
															<?php for($i=1;$i<=$jml_prt;$i++){ 
															$jml="";
															if($jml_presensi[$i]['a']>0){$jml=$jml_presensi[$i]['a'];}
															echo '
																<td align="center" style="color: #FF0033">'.$jml.'</td>
															';
															}?>
															<td colspan="5"></td>
														</tr>
														<tr>
															<td>&nbsp;Kerja</td>
															<?php for($i=1;$i<=$jml_prt;$i++){ 
															$jml="";
															if($jml_presensi[$i]['k']>0){$jml=$jml_presensi[$i]['k'];}
															echo '
																<td align="center" style="color: #FF9900">'.$jml.'</td>
															';
															}?>
															<td colspan="5"></td>
														</tr>
														<tr bgcolor="#66666">
															<td colspan="3">
																<font style="font-size: 9pt" face="Arial" color="#FFFFFF">
																	<b>
																		&nbsp;Total Tidak Hadir
																	</b>
																</font>
															</td>
															<?php for($i=1;$i<=$jml_prt;$i++){ 
															$jml=$jml_presensi[$i]['s']+$jml_presensi[$i]['i']+$jml_presensi[$i]['a']+$jml_presensi[$i]['k'];
															if($jml==0){$jml="";}
															echo '
																<td align="center">
																	<font style="font-size: 8pt" face="Arial" color="#FFFFFF">
																		<b>
																			'.$jml.'
																		</b>
																	</font>
																</td>
															';
															}?>		
															<td colspan="5"></td>
														</tr>
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