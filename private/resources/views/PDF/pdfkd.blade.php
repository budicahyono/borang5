<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Upaya Peningkatan Sumber Daya Manusia</title>
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
				<p align="justify">4.5.3.   Kegiatan dosen tetap yang bidang keahliannya sesuai dengan PS dalam seminar ilmiah/lokakarya/penataran/workshop/ pagelaran/ pameran/peragaan yang tidak hanya melibatkan dosen PT sendiri.
			</div>
			<br>
			<br>
			<table class="tg">
			  <tr>
			   <th rowspan="2" width="50px"><p class="text-center">No</p></th>
					<th rowspan="2" width="200px"><p class="text-center">Nama Dosen</p></th>
					<th rowspan="2" width="200px"><p class="text-center">Jenis Kegiatan</p></th>
					<th rowspan="2" width="200px"><p class="text-center">Tempat</p></th>
					<th rowspan="2" width="100px"><p class="text-center">Waktu</p></th>
					<th colspan="2" ><p class="text-center">Sebagai</p></th>
				 
					<tr>
					<th align="center"><p class="text-center">Peserta</p></th>
					<th align="center"><p class="text-center">Penyaji</p></th>
			  </tr>

			 <?php $no=1; ?>
			 					@foreach($data9 as $key => $value)
			 						<tr>
			 							<td>{{$no++}}</td>
			 							<td>{{$value->nama}}</td>
			 							<td>{{$value->jenisKegiatan}}</td>
			 							<td>{{$value->tempat}}</td>
			 							<td>{{$value->waktu}}</td>
			 							<?php 

			 								if($value->sebagai=='Peserta'){
			 									echo "<td align=center>".$value->sebagai."</td>";
			 									echo "<td align=center><center>--</center></td>"; 
			 								} 
			 								else{
			 									echo "<td align=center><center>--</center></td>"; 
			 									echo "<td align=center>".$value->sebagai."</td>";
			 								}
			 								?>					
			 						</tr>
			 					@endforeach
			</table>
			<br>
			<br>
			* Jenis kegiatan : Seminar ilmiah, Lokakarya, Penataran/Pelatihan, Workshop, Pagelaran, Pameran, Peragaan dll
			@endif
		</body>
	</head>
</html>