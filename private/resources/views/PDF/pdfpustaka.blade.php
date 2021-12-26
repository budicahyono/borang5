<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Pustaka</title>
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

      
				6.4   Sarana Pelaksanaan Kegiatan Akademik
				<br>
				<br>
				<p align=justify>6.4.1   Pustaka (buku teks, karya ilmiah, dan jurnal; termasuk juga dalam bentuk CD-ROM dan media lainnya)
				Tuliskan rekapitulasi jumlah ketersediaan pustaka yang relevan dengan bidang PS dengan mengikuti format tabel 1 berikut:
	
			</div>
			<br>
			<table class="tg">
			  <tr>
						<th width="100"><p class="text-center">Jenis Pustaka</p></th>
						<th width="100"><p class="text-center">Jumlah Judul</p></th>
						<th width="100"><p class="text-center">Jumlah Copy</p></th>
			  </tr>
				<?php 
					$total = 0;
					$total1 = 0;
					 ?>
					@foreach($data4 as $key => $value)
					<tr>
						<td>{{$value->jenisPustaka}}</td>
						<td>{{$value->jumlahJudul}}</td>
						<td>{{$value->jumlahCopy}}</td>

					<?php
					$total = $value->jumlahJudul + $total;
					$total1 = $value->jumlahCopy + $total1;
					?>
					</tr>
					@endforeach
					<tr>
					<th colspan="1">Total</th>
					<td>{{$total}}</td>
					<td>{{$total1}}</td>
			</table>
		</body>
	</head>
</html>