<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Penelitian Mahasiswa</title>
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
				7.1.2   Adakah mahasiswa tugas akhir yang dilibatkan dalam penelitian dosen dalam tiga tahun terakhir? 
				<br>
				<br> 
					Tidak ada<br>
					 Ada<br>
				
				<p align="justify">Jika ada, banyaknya mahasiswa PS yang ikut serta dalam penelitian dosen adalah  ... orang, dari ... mahasiswa yang melakukan tugas akhir melalui skripsi.

			</div>
			<br>
			<table class="tg">
			  <tr>
					
					<th><strong>Jumlah Mahasiswa TA:</strong></th>
						
			  </tr>
			@foreach($data2 as $key => $value)
				<tr>
					<td>{{$value->jumlahMahasiswaTA}}</td>
				</tr>
				@endforeach
			</table>
		</body>
	</head>
</html>