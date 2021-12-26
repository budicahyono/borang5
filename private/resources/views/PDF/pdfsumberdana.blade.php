<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Sumber Dana</title>
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
				6.2   Perolehan dan Alokasi Dana
				<br>
				<br>
				<p align="justify">6.2.1  Tuliskan realisasi perolehan dan alokasi dana (termasuk hibah) dalam juta rupiah termasuk gaji,  selama tiga tahun terakhir, pada tabel berikut:
	
			</div>
			<br>
			<table class="tg">
			  <tr>
			   
							<th rowspan="2" width="50"><p class="text-center">Sumber Dana</p></th>
							<th rowspan="2" width="50"><p class="text-center">Jenis Dana</p></th>
							<th colspan="3" ><p class="text-center">Jumlah Dana</p></th>
				<tr>
							
							<th width="50"><p class="text-center">TS-2</p></th>
							<th width="50"><p class="text-center">TS-1</p></th>
							<th width="50"><p class="text-center">TS</p></th>
				
			  </tr>
			<?php 
						$Ynow=date('Y');
						$no=1; 
						$sumberdana="";
						?>
						@foreach($data2 as $key => $value)
						<tr>
							<td>{{$value->sumberDana}}</td>
							<td>{{$value->jenisDana}}</td>
							<?php
								if($value->tahun==$Ynow-2)
									echo "<td>".Fungsi::buatrp($value->jumlahDana)."</td><td></td>
								 <td></td>";
								if($value->tahun==$Ynow-1)
									echo "<td></td><td>".Fungsi::buatrp($value->jumlahDana)."</td>
										  <td></td>";
								if($value->tahun==$Ynow)
									echo "<td></td><td></td>
										  <td>".Fungsi::buatrp($value->jumlahDana)."</td>";
							?>
						</tr>
						@endforeach
			</table>
		</body>
	</head>
</html>