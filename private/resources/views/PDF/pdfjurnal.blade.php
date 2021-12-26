<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Jurnal</title>
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
				<p align="justify">Isikan jurnal/prosiding seminar yang tersedia/yang diterima secara teratur (lengkap), terbitan 3 tahun terakhir dengan mengikuti format tabel 2 berikut:
			</div>
			<br>
			<table class="tg">
			  <tr>
			   			<th width="100"><p class="text-center">JenisJurnal</p></th>
						<th width="100"><p class="text-center">Nama Jurnal</p></th>
						<th width="100"><p class="text-center">Tahun</p></th>
						<th width="100"><p class="text-center">Nomor</p></th>
						<th width="100"><p class="text-center">Jumlah</p></th>
					
					
			  </tr>
			  @foreach($data5 as $key => $value)
					<tr>
						<td>{{$value->akreditasi}}</td>
						<td>{{$value->namaJurnal}}</td>
						<td>{{$value->tahun}}</td>
						<td>{{$value->nomor}}</td>
						<td>{{$value->jumlah}}</td>
					</tr>
					@endforeach
			</table>
			<div >
			  			<p>Catatan*=termasuk e-journal</p>
			  		</div>
		</body>
	</head>
</html>