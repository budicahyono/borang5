<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Data Dosen</title>
		<body>
			<style type="text/css">
				.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
				.tg td{font-family:Arial;font-size:11px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
				.tg th{font-family:Arial;font-size:11px;font-weight:normal;padding:9px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
				.tg .tg-3wr7{font-weight:bold;font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
				.tg .tg-ti5e{font-size:8px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
				.tg .tg-rv4w{font-size:8px;font-family:"Arial", Helvetica, sans-serif !important;}
			</style>
 
			<div style="font-family:Arial; font-size:12px;">

			</div>
			@if(Session::get('level')=='user')
				4.6  Tenaga kependidikan
				<br>
				<p align="justify">4.6.1 Tuliskan data tenaga kependidikan  yang ada di PS, Jurusan, Fakultas atau PT yang melayani mahasiswa PS dengan mengikuti format tabel berikut:

			</div>
			<br>
			<br>
			<table class="tg">
			  <tr>
			   <th rowspan="2" ><p class="text-center">No</p></th>
					<th rowspan="2"><p class="text-center">Jenis Tenaga Kependidikan</p></th>
					<th colspan="8" ><p class="text-center">Jumlah Tenaga Kependidikan dengan Pendidikan Terakhir</p></th>
					<th rowspan="2"><p class="text-center">Unit Kerja</p></th>

					<tr>
					<th ><p class="text-center">S3</p></th>
					<th ><p class="text-center">S2</p></th>
					<th ><p class="text-center">S1</p></th>
					<th ><p class="text-center">D4</p></th>
					<th ><p class="text-center">D3</p></th>
					<th ><p class="text-center">D2</p></th>
					<th ><p class="text-center">D1</p></th>
					<th width="50px"><p class="text-center">SMA/SMK</p></th>
			  
			 <?php $no=1;
					$datajenis = "";
					$totals3 =0;
					$totals2 =0;
					$totals1 =0;
					$totald4 =0;
					$totald3 =0;
					$totald2 =0;
					$totald1 =0;
					$totalsma =0;
					?>
					@foreach($data12 as $key => $value)
						<?php
						if($datajenis!=$value->jenis){
						?>
						<tr>
							
							<td align="center">{{$no++}}</td>
							<td>{{$value->jenis}}</td>
							<td align="center">
							<?php $S3 = Fungsi::getData($value->jenis, 'S3') ;
								  $totals3 = $totals3 + $S3;
								  if($S3 > 0)
									  echo $S3; ?>
							</td>
							<td align="center">
								<?php $S2 = Fungsi::getData($value->jenis, 'S2') ;
								if($S2 > 0)
									  echo $S2;
									   $totals2 = $totals2 + $S2;
								?>
							</td><td align="center">
								<?php $S1 = Fungsi::getData($value->jenis, 'S1') ;
								if($S1 > 0)
									  echo $S1;
									   $totals1 = $totals1 + $S1;
								?>
							</td>
							<td align="center">
								<?php $d4 = Fungsi::getData($value->jenis, 'D4') ;
								if($d4 > 0)
									  echo $d4;
									   $totald4 = $totald4 + $d4;
								?>
							</td>
							<td align="center">
								<?php $D3 = Fungsi::getData($value->jenis, 'D3') ;
								if($D3 > 0)
									  echo $D3; 
									  $totald3 = $totald3 + $D3;
								?>
							</td>
							<td align="center">
								<?php $D2 = Fungsi::getData($value->jenis, 'D2') ;
								if($D2 > 0)
									  echo $D2;
									   $totald2 = $totald2 + $D2;
								?>
							</td>
							<td align="center">
								<?php $D1 = Fungsi::getData($value->jenis, 'D1') ;
								if($D1 > 0)
									  echo $D1;
									   $totald1 = $totald1 + $D1;
								?>
							</td>
							<td align="center">
								<?php $SMA = Fungsi::getData($value->jenis, 'SMA/SMK') ;
								if($SMA > 0)
									  echo $SMA;
									   $totalsma = $totalsma + $SMA;
								?>
							</td>
							<td>{{$value->unitKerja}}</td>
						</tr>
						<?php 
						} $datajenis = $value->jenis ; ?>
					@endforeach
					<tr>
					<th colspan="2">Total</th> 
					<td align="center"><?php echo $totals3 ; ?></td>
					<td align="center"><?php echo $totals2 ; ?></td>
					<td align="center"><?php echo $totals1 ; ?></td>
					<td align="center"><?php echo $totald4 ; ?></td>
					<td align="center"><?php echo $totald3 ; ?></td>
					<td align="center"><?php echo $totald2 ; ?></td>
					<td align="center"><?php echo $totald1 ; ?></td>
					<td align="center"><?php echo $totalsma ; ?></td>
					<th bgcolor="grey"></th>
			</table>
			<br>
			* Hanya yang memiliki pendidikan formal dalam bidang perpustakaan
			@endif
		</body>
	</head>
</html>