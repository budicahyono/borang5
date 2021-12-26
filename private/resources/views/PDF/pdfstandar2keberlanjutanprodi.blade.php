<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Keberlanjutan Prodi</title>
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
				2.6	  Keberlanjutan<br>
Jelaskan upaya untuk menjamin keberlanjutan (sustainability) program studi ini, khususnya dalam hal: <br>
<br>
			<table class="tg">
			  <tr>
			  		<th><p class="text-center">No</p></th>
					<th><p class="text-center">Jenis Upaya</p></th>
					<th><p class="text-center">Tindak Lanjut</p></th>
			   
			  </tr>
			<?php $no=1; ?>
					@foreach($data as $key => $value)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$value->jenisUpaya}}</td>
							<td>{{$value->upaya}}</td>
							
						</tr>
					@endforeach
			 </table>

			
		</body>
	</head>
</html>