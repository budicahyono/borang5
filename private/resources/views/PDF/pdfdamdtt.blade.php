<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Data Dosen</title>
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
				<p align="justify">4.4.2  Tuliskan data aktivitas mengajar dosen tidak tetap pada satu tahun terakhir di PS ini dengan mengikuti format tabel berikut:
			</div>
			<br>
			<br>
			<table class="tg">
			  <tr>
			   <th width="50px"><p class="text-center">No</p></th>
					<th width="200px"><p class="text-center">Nama Dosen  Tidak Tetap</p></th>
					<th width="200px"><p class="text-center">Bidang Keahlian</p></th>
					<th width="100px"><p class="text-center">Kode Mata Kuliah</p></th>
					<th width="200px"><p class="text-center">Nama Mata Kuliah</p></th>
					<th width="50px"><p class="text-center">Jumlah Kelas</p></th>
					<th width="50px"><p class="text-center">Jumlah Pertemuan Yang di Rencanakan</p></th>
					<th width="50px"><p class="text-center">Jumlah Pertemuan Yang di Laksanakan</p></th>
					
			  </tr>
			 <?php $no=1;
					$total=0;
					$total1=0; ?>
					
					@foreach($data6 as $key => $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td>{{$value->nama}}</td>
							<td>{{$value->bidangKeahlian}}</td>
							<td align="center">{{$value->idmatakuliah}}</td>
							<td>{{$value->namaMataKuliah}}</td>
							<td align="center">{{$value->jumlahKelas}}</td>
							<td align="center">{{$value->jumlahRencanaPertemuan}}</td>
							<td align="center">{{$value->jumlahRealisasiPertemuan}}</td>
						<!-- jumlahkan -->
						<?php
						 $total = $value->jumlahRencanaPertemuan + $total;
						 $total1 = $value->jumlahRealisasiPertemuan + $total1;	
							
						?>
							
							
						</tr>
					@endforeach
					<tr>
					<th colspan="6">Jumlah</th>
					<td align="center">{{$total}}</td>
					<td align="center">{{$total1}}</td>
			</table>
			<br>
			@endif
		</body>
	</head>
</html>