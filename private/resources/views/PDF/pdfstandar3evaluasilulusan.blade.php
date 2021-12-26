<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Evaluasi Lulusan</title>
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
 

Hasil studi pelacakan dirangkum dalam tabel berikut: <br>
Nyatakan angka persentasenya(*)  pada kolom yang sesuai.<br>
<br>

			<table class="tg">
			<tr>
						<th rowspan="3">No</th>
						<th rowspan="3">Jenis Kemampuan</th>
						<th colspan="4">Tanggapan Pihak Pengguna</th>
						<th rowspan="3" >Tindak Lanjut</th>
						
						<tr>

						<th rowspan="2">Sangat Baik (%)</th>
						<th rowspan="2">Baik (%)</th>
						<th rowspan="2">Cukup (%)</th>
						<th rowspan="2" style="border::1px">Kurang (%)</th>

						</tr>
						
						
			
			<tr>
					<?php $no=1; 
					$total=0;
					$total1=0;
					$total2=0;
					$total3=0;?>
					@foreach($data2 as $key => $value)
						<tr>

							<td>{{$no++}}</td>
							<td>{{$value->jenisKemampuan}}</td>
							<td>{{$value->tanggapanSangatBaik}}</td>
							<td>{{$value->tanggapanBaik}}</td>
							<td>{{$value->tanggapanCukup}}</td>
							<td>{{$value->tanggapanKurang}}</td>
							<td>{{$value->tindakLanjut}}</td>
							
						
							<?php
							$total = $value->tanggapanSangatBaik + $total;
							$total1 = $value->tanggapanBaik + $total1;
							$total2 = $value->tanggapanCukup + $total2;
							$total3 = $value->tanggapanKurang + $total3;

							?>
						
					@endforeach
							<tr>
							<th colspan="2">Total</th>
							<td>{{$total}}</td>
							<td>{{$total1}}</td>
							<td>{{$total2}}</td>
							<td>{{$total3}}</td>
							<td></td>

				
			</table>
			<br>
Catatan :  Sediakan dokumen pendukung pada saat asesmen lapangan <br>
<br>
(*) persentase tanggapan pihak pengguna = [(jumlah tanggapan pada peringkat) : (jumlah tanggapan yang ada)] x 100<br>
<br>
3.3.2  Rata-rata waktu tunggu lulusan untuk memperoleh pekerjaan yang pertama = … bulan (Jelaskan bagaimana data ini diperoleh)<br>
<br>
3.3.3  Persentase lulusan yang bekerja pada bidang yang sesuai dengan keahliannya = … % (Jelaskan bagaimana data ini diperoleh) <br>

		</body>
	</head>
</html>