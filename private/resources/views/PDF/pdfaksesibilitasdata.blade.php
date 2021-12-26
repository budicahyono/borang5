<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Aksesibilitas</title>
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

			
				<p align="justify">6.5.2    Beri tanda √ pada kolom yang sesuai (hanya satu kolom) dengan aksesibilitas tiap jenis data, dengan mengikuti format tabel berikut:

			</div>
			<br>
			<table class="tg">
			  <tr>

			  		<th rowspan="2" width="30"><p class="text-center">No</p></th>
					<th rowspan="2" width="100"><p class="text-center">Jenis Data</p></th>
					<th colspan="4" ><p class="text-center">Sistem Pengelolaan Data</p></th>
					
					<tr>

					<th width="100"><p class="text-center">Secara<br>Manual</p></th>
					<th width="100"><p class="text-center">Dengan<br>Komputer<br>Tanpa<br>Jaringan</p></th>
					<th width="100"><p class="text-center">Dengan<br>Komputer<br>Jaringan<br>Lokal (LAN)</p></th>
					<th width="100"><p class="text-center">Dengan<br>Komputer<br>Jaringan<br>LUAS (WAN)</p></th>
						
			  </tr>
			<?php $no=1; ?>
				@foreach($data2 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->jenisData}}</td>
						<?php
							if($value->sistemPengelolaanData=='manual' || $value->sistemPengelolaanData=='Manual')
								echo "<td>".$value->sistemPengelolaanData."</td>
									  <td></td><td></td><td></td>";
							if($value->sistemPengelolaanData=='Komputer NonLAN')
								echo "<td></td>
									  <td>".$value->sistemPengelolaanData."</td><td></td><td></td>";
							if($value->sistemPengelolaanData=='Komputer LAN')
								echo "<td></td>
									  <td></td><td>".$value->sistemPengelolaanData."</td><td></td>";
							if($value->sistemPengelolaanData=='Komputer WAN')
								echo "<td></td><td></td><td></td>
									 <td>".$value->sistemPengelolaanData."</td>";
						?>
					</tr>
				@endforeach
			</table>
		</body>
	</head>
</html>