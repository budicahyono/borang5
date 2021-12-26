<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Kerjasama Instansi Luar Negeri</title>
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
				<p align="justify">7.3.2  Tuliskan instansi luar negeri yang menjalin kerjasama* yang terkait dengan program studi/jurusan dalam tiga tahun terakhir.	
			</div>
			<br>
			<table class="tg">
			  <tr>
						<th rowspan="2" width="30"><p class="text-center">No</p></th>
						<th rowspan="2" width="100"><p class="text-center">Nama Instansi</p></th>
						<th rowspan="2" width="100"><p class="text-center">Jenis Kegiatan</p></th>
						<th colspan="2" ><p class="text-center">Kurun Waktu</p></th>
						<th rowspan="2" width="100"><p class="text-center">Manfaat yang Telah Diperoleh</p></th>

						<tr>
						
						<th width="100"><p class="text-center">Mulai</p></th>
						<th width="100"><p class="text-center">Berakhir</p></th>
			  </tr>
			<?php $no=1; ?>
					@foreach($data2 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->namaInstitusi}}</td>
						<td>{{$value->jenisKegiatan}}</td>
						<td>{{$value->tahunMulai}}</td>
						<td>{{$value->tahunSelesai}}</td>
						<td>{{$value->manfaat}}</td>
					</tr>
					@endforeach
			</table>
		</body>
	</head>
</html>