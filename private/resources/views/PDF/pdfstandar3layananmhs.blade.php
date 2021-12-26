<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Layanan Mahasiswa</title>
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
 
3.2 Layanan kepada Mahasiswa  <br>
Lengkapilah tabel berikut untuk setiap jenis pelayanan kepada mahasiswa PS. <br>

			<br>
			<table class="tg">
			  <tr>
					<th><p class="text-center">No</p></th>
			  		<th><p class="text-center">Jenis Layanan Kepada Mahasiswa</p></th>
					<th><p class="text-center">Bentuk Kegiatan, Pelaksanaan, dan Hasilnya</p></th>
					
			   
			  </tr>
			<?php $no=1; ?>
					@foreach($data5 as $key => $value)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$value->jenisKegiatan}}</td>
							<td>{{$value->isiKegiatan}}</td>
							
						</tr>
					@endforeach
			 </table>

			
		</body>
	</head>
	</div>
</html>