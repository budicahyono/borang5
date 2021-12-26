<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Pengelolaan Dana</title>
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
					<h2>STANDAR 6. PEMBIAYAAN, PRASARANA, SARANA, DAN <br>
					<font color="white">vsvdefvrvbrti</font> SISTEM INFORMASI</h2>
					<br>
					<br>
					6.1   Pengelolaan Dana<br>
					<p align="justify">Keterlibatan aktif program studi harus tercerminkan dalam dokumen tentang proses perencanaan, pengelolaan dan pelaporan serta pertanggungjawaban penggunaan dana kepada pemangku kepentingan melalui mekanisme yang transparan dan akuntabel.
					<br>
					<br>
					Jelaskan keterlibatan PS dalam perencanaan anggaran dan pengelolaan dana.

			</div>
			<br>
			<table class="tg">
			  <tr>
			    <th><p class="text-center">Pengelolaan Dana</p></th>
			  </tr>
			 @foreach($data as $key => $value)
						<tr>
						<td>{{$value->pengelolaanDana}}</td>
					</tr>
					@endforeach
			</table>
		</body>
	</head>
</html>