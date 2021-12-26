<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Peralatan LAB</title>
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
				<p align="justify">6.4.3  Tuliskan peralatan utama yang digunakan di laboratorium (tempat praktikum, bengkel, studio, ruang simulasi, rumah sakit, puskesmas/balai kesehatan, green house, lahan untuk pertanian, dan sejenisnya) yang dipergunakan dalam proses pembelajaran di jurusan/fakultas dengan  mengikuti format tabel berikut:</p>
			</div>
			<br>
			<table class="tg">
			  <tr>
			   			<th rowspan="2" width="30"><p class="text-center">No</p></th>
						<th rowspan="2" width="50"><p class="text-center">Nama Laboratorium</p></th>
						<th rowspan="2" width="50"><p class="text-center">Jenis peralatan Utama</p></th>
						<th rowspan="2" width="50"><p class="text-center">Jumlah Unit</p></th>
						<th colspan="2" ><p class="text-center">Kepemilikan</p></th>
						<th colspan="2" ><p class="text-center">Kondisi</p></th>
						<th rowspan="2" width="50"><p class="text-center">Rata-rata Waktu<br>Penggunaan<br>(Jam/Minggu)</p></th>

						<tr>

						<th width="50"><p class="text-center">SD</p></th>
						<th width="50"><p class="text-center">SW</p></th>
						<th width="50"><p class="text-center">Terawat</p></th>
						<th width="50"><p class="text-center">Tidak<br>Terawat</p></th>
						
			  </tr>
			 <?php $no=1; ?>
					@foreach($data7 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->namaLaboratorium}}</td>
						<td>{{$value->namaPeralatan}}</td>
						<td>{{$value->jumlahUnit}}</td>
						<?php
							if($value->kepemilikan=="sendiri" || $value->kepemilikan=="Sendiri" )
								echo "<td>".$value->kepemilikan."</td><td></td>";
							if($value->kepemilikan=="sewa" || $value->kepemilikan=="Sewa")
								echo "<td></td><td>".$value->kepemilikan."</td>";
							
							if($value->kondisi=="terawat" || $value->kondisi=="Terawat" )
								echo "<td>".$value->kondisi."</td><td></td>";
							if($value->kondisi=="tidak terawat" || $value->kondisi=="Tidak Terawat")
								echo "<td></td><td>".$value->kondisi."</td>";
						?>
						<td>{{$value->utilisasi}}</td>
					</tr>
					@endforeach
			</table>
			<div >
			  		<strong>Keterangan</strong>
			  		<br>
			  			<p>SD=Milik PT/Fakultas/Jurusan Sendiri<br>SW=Sewa/Kontrak/Kerjasama</p>
			  		</div>
		</body>
	</head>
</html>