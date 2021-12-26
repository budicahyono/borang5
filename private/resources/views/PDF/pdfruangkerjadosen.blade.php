<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Dana Kegiatan Pkm</title>
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

      
				6.3   Prasarana
				<br>
				<br>
				6.3.1 Tuliskan data ruang kerja dosen tetap yang bidang keahliannya sesuai dengan PS dengan mengikuti format tabel berikut:
	
			</div>
			<br>
			<table class="tg">
			  <tr>
						<th width="100"><p class="text-center">Ruang Kerja Dosen</p></th>
						<th width="100"><p class="text-center">Jumlah<br> Ruang</p></th>
						<th width="100"><p class="text-center">Jumlah Luas<br>(m2)</p></th>
			  </tr>
				<?php 
					$total=0;
					 ?>

					@foreach($data as $key => $value)
					<tr>
						<td>{{$value->jenisRuang}}</td>
						<td>{{$value->jumlahRuang}}</td>
						<td>{{$value->jumlahLuas}}</td>

					<?php
					$total = $value->jumlahLuas + $total;
					?>
					</tr>
					@endforeach
					<tr>
					<th colspan="2">Total</th>
					<td>{{$total}}</td>
			</table>
		</body>
	</head>
</html>