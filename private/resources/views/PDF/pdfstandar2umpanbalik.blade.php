<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Umpan Balik</title>
		<body>
			<style type="text/css">
				.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
				.tg td{font-family:Arial;font-size:11px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
				.tg th{font-family:Arial;font-size:11px;font-weight:normal;padding:9px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
				.tg .tg-3wr7{font-weight:bold;font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
				.tg .tg-ti5e{font-size:8px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
				.tg .tg-rv4w{font-size:8px;font-family:"Arial", Helvetica, sans-serif !important;}
			</style>
 
			
			<br>
			2.5   Umpan Balik<br>

Apakah program studi telah melakukan kajian tentang proses pembelajaran melalui umpan balik dari dosen, mahasiswa, alumni, dan pengguna lulusan mengenai harapan dan persepsi mereka?  Jika Ya, jelaskan isi umpan balik dan tindak lanjutnya.<br>
<br>
			<table class="tg">
			  <tr>
			  		<th><p class="text-center">Umpan Balik Dari</p></th>
					<th><p class="text-center">Isi</p></th>
					<th><p class="text-center">Tindak</p></th>
			   
			  </tr>
			@foreach($data as $key => $value)
						<tr>
							<td>{{$value->sumber}}</td>
							<td>{{$value->isi}}</td>
							<td>{{$value->tindakLanjut}}</td>
							
						</tr>
			@endforeach
			</table>

			
		</body>
	</head>
</html>