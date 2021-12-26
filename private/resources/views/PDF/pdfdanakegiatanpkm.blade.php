<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Dana Kegiatan PKM</title>
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
				<p align="justify">6.2.3 Tuliskan dana yang diperoleh dari/untuk kegiatan pelayanan/pengabdian kepada masyarakat pada tiga tahun terakhir dengan mengikuti format tabel berikut: 
			</div>
			<br>
			<table class="tg">
			  <tr>
						<th width="100"><p class="text-center">Tahun</p></th>
						<th width="100"><p class="text-center">Judul Kegiatan<br> Pelayanan/Pengabdian<br> Kepada Masyarakat</p></th>
						<th width="100"><p class="text-center">Sumber dan Jenis<br> Dana</p></th>
						<th width="100"><p class="text-center">Jumlah Dana<br> (dalam juta rupiah)</p></th>
			  </tr>
				<?php 
						$total = 0;
					?>
					@foreach($data5 as $key => $value)
					<tr>
						<td>{{$value->tahun}}</td>
						<td>{{$value->judul}}</td>
						<td>{{$value->jenisDana}}</td>
						<td>
						<?php
						 echo Fungsi::buatrp($value->jumlahDana);
						?>
						</td>
					<?php
					$total = $value->jumlahDana + $total;
					?>
					</tr>
					@endforeach
					<tr>
					<th colspan="3"><p class="text-center">Jumlah</p></th>
					<td>
					<?php
						 echo Fungsi::buatrp($total);
					?>
			</table>
		</body>
	</head>
</html>