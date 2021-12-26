<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Penelitian Dosen</title>
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
				<p align="justify">7.1.3  Tuliskan judul artikel ilmiah/karya ilmiah/karya seni/buku yang dihasilkan selama tiga tahun terakhir oleh dosen tetap yang bidang keahliannya sesuai dengan PS dengan mengikuti format tabel berikut:	
			</div>
			<br>
			<table class="tg">
			  <tr>
					
						<th rowspan="2" width="30"><p class="text-center">No</p></th>
						<th rowspan="2" width="50"><p class="text-center">Judul</p></th>
						<th rowspan="2" width="50"><p class="text-center">Nama Dosen</p></th>
						<th rowspan="2" width="50"><p class="text-center">Tahun Publikasi</p></th>
						<th colspan="3" ><p class="text-center">Tingkat</th>
						
						<tr>

						<th width="50"><p class="text-center">Lokal</p></th>
						<th width="50"><p class="text-center">Nasional</p></th>
						<th width="50"><p class="text-center">Internasional</p></th>
			  </tr>
			<?php $no=1;
					$total = 0;
					$total1 = 0;
					$total2 = 0;
					  ?>
					@foreach($data3 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->judul}}</td>
						<td>{{$value->nama}}</td>
						<td>{{$value->tahunPublikasi}}</td>
					<?php
						if($value->tingkat == "Lokal"){
							echo "<td>".$value->tingkat."</td><td></td><td></td>";
							$total++;
						}
							
						if($value->tingkat=="Nasional"){
							echo "<td></td><td>".$value->tingkat."</td><td></td>";
							$total1++;
						}
							
						if($value->tingkat=="Internasional"){
							echo "<td></td><td></td><td>".$value->tingkat."</td>";
							$total2++;
						}
							
					?>
					</tr>
					@endforeach
					<tr>
						<th colspan="4">Total</th>

					<td>{{$total}}</td>
					<td>{{$total1}}</td>
					<td>{{$total2}}</td>

			</table>
		</body>
	</head>
</html>