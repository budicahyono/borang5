<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Prestasi Mahasiswa</title>
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
 
			
			<br>
3.1.3   Sebutkan pencapaian prestasi/reputasi mahasiswa dalam tiga tahun terakhir di bidang akademik dan non-akademik (misalnya prestasi dalam penelitian dan lomba karya ilmiah, olahraga, dan seni). <br>
<br>
			<table class="tg">
			  <tr>
					<th><p class="text-center">No</p></th>
			  		<th><p class="text-center">Nama Kegiatan</p></th>
					<th><p class="text-center">Waktu Penyelenggaraan</p></th>
					<th><p class="text-center">Tingkat (Lokal, Wilayah, Nasional, atau Internasional)</p></th>
					<th><p class="text-center">Prestasi yang Dicapai</p></th>
			   
			  </tr>
			<?php $no=1; ?>
					@foreach($data3 as $key => $value)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$value->namaKegiatan}}</td>
							<td>{{$value->waktu}}</td>
							<td>{{$value->tingkat}}</td>
							<td>{{$value->prestasi}}</td>
						</tr>
					@endforeach
			 </table>

			
		</body>
	</head>
</html>