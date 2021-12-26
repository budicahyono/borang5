<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Mahasiswa Non Reguler</title>
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
3.1.2 Tuliskan data mahasiswa non-reguler(2) dalam lima tahun terakhir dengan mengikuti format tabel berikut: <br>
<br>
			<table class="tg">

			 <body>
						<tr>
						<th rowspan="2"><p class="text-center"> Tahun Akademik</th></p>
						<th rowspan="2"><p class="text-center"> Daya Tampung</th></p>
						<th colspan="2">Jumlah Calon Mahasiswa</th>
						<th colspan="2">Jumlah Mahasiswa Baru</th>
						<th colspan="2">Jumlah Total Mahasiswa</th>
						</tr>
						
					

					
						<tr>
						
						<th>Ikut Seleksi</th>
						<th>Lulus Seleksi</th>
						<th>Non Reguler</th>
						<th>Transfer</th>
						<th>Non Reguler</th>
						<th>Transfer</th>
						</tr>
					

				
					<?php ?>
					@foreach($data2 as $key => $value)
						<tr>
							<td>{{$value->tahunAkademik}}</td>
							<td>{{$value->dayaTampung}}</td>
							<td>{{$value->calonMahasiswaIkut}}</td>
							<td>{{$value->calonMahasiswaLulus}}</td>
							<td>{{$value->mahasiswaBaruNonReguler}}</td>
							<td>{{$value->mahasiswaBaruTransfer}}</td>
							<td>{{$value->totalMahasiswaNonReguler}}</td>
							<td>{{$value->totalMahasiswaTransfer}}</td>
							
						</tr>
					@endforeach
				
				</body>
				</table>
					</tbody>
					</table>
					</body>
					</head>
					</html>
			