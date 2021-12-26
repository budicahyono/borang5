<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Peningkatan Sumber Daya Manusia</title>
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
				<p align="justify">4.5.4    Sebutkan pencapaian prestasi/reputasi dosen (misalnya prestasi dalam pendidikan, penelitian dan pelayanan/pengabdian kepada masyarakat).
			</div>
			<br>
			<br>
			<table class="tg">
			  <tr>
			   <th width="50px"><p class="text-center">No</p></th>
					<th width="200px"><p class="text-center">Nama Dosen</p></th>
					<th width="200px"><p class="text-center">Prestasi Yang di Capai</p></th>
					<th width="100px"><p class="text-center">Waktu Pencapaian</p></th>
					<th width="100px"><p class="text-center">Tingkat</p></th>
			  </tr>
			 <?php $no=1; ?>
					@foreach($data10 as $key => $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td>{{$value->nama}}</td>
							<td>{{$value->prestasi}}</td>
							<td align="center">{{$value->waktu}}</td>
							<td>{{$value->tingkat}}</td>
							
						</tr>
					@endforeach
			</table>
			<br>
			* Sediakan dokumen pendukung pada saat asesmen lapangan.
			@endif
		</body>
	</head>
</html>