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
				<p align="justify">4.3.3  Aktivitas dosen tetap yang bidang bidang keahliannya sesuai dengan PS dinyatakan dalam sks rata-rata per semester pada satu tahun akademik terakhir, diisi dengan perhitungan sesuai SK Dirjen DIKTI no. 48 tahun 1983 (12 sks setara dengan 36 jam kerja per minggu)
			</div>
			<br>
			<br>
			<table class="tg">
			  <tr>
			   
			   <th rowspan="3" ><p class="text-center">No</p></th>
						<th rowspan="3"><p class="text-center">Nama Dosen</p></th>
						<th colspan="3"><p class="text-center">SKS Pengajaran Pada</p></th>
						<th rowspan="3"><p class="text-center">SKS Penelitian</p></th>
						<th rowspan="3"><p class="text-center">SKS Pengabdian Kepada Masyarakat</p></th>
						<th colspan="2"><p class="text-center">SKS Manajemen</p></th>
						<th rowspan="3"><p class="text-center">Jumlah SKS</p></th>
						 
					<tr>
						<th><p class="text-center" >PS Sendiri</p></th>
						<th><p class="text-center">PS Lain PT Sendiri</p></th>
						<th><p class="text-center">PT Lain</p></th>
						<th><p class="text-center">PS Sendiri</p></th>
						<th><p class="text-center">PT Lain</p></th>
						<tr>
			  </tr>
			  <?php $no=1;
						$total=0;
						$jumlah=0;
						$jumlah2=0;
						$jumlah3=0;
						$jumlah4=0;
						$jumlah5=0;
						$jumlah6=0;
						$jumlah7=0;
						$jumlah8=0;
						$rata2=0;?>
					@foreach($data14 as $key => $value)
						<tr>

							<?php
						 	$total = $value->sks_PSsendiri + $value->sks_PSLainPTsendiri +$value->sks_PTLain + $value->sks_penelitian + $value->sks_Pengabdian + $value->sks_PtSendiri + $value->sksPTlain;		
							?>
							<td align="center">{{$no++}}</td>
							<td>{{$value->nama}}</td>
							<td align="center">{{$value->sks_PSsendiri}}</td>
							<td align="center">{{$value->sks_PSLainPTsendiri}}</td>
							<td align="center">{{$value->sks_PTLain}}</td>
							<td align="center">{{$value->sks_penelitian}}</td>
							<td align="center">{{$value->sks_Pengabdian}}</td>
							<td align="center">{{$value->sks_PtSendiri}}</td>
							<td align="center">{{$value->sksPTlain}}</td>
							<td align="center">{{$total}}</td>
							
							<?php
						 	$jumlah = $value->sks_PSsendiri + $jumlah;
						 	$jumlah2= $value->sks_PSLainPTsendiri + $jumlah2;
						 	$jumlah3 = $value->sks_PTLain + $jumlah3;
						 	$jumlah4 = $value->sks_penelitian + $jumlah4;
						 	$jumlah5 = $value->sks_Pengabdian + $jumlah5;
						 	$jumlah6 = $value->sks_PtSendiri + $jumlah6;
						 	$jumlah7 = $value->sksPTlain + $jumlah7;
						 	$jumlah8 = $total + $jumlah8;
						 	$rata2 = $total + $rata2;
						 	 	
							?>
						</tr>
					@endforeach
					<tr>
					<th colspan="2">Jumlah</th> 
					<td align="center">{{$jumlah}}</td>
					<td align="center">{{$jumlah2}}</td>
					<td align="center">{{$jumlah3}}</td>
					<td align="center">{{$jumlah4}}</td>
					<td align="center">{{$jumlah5}}</td>
					<td align="center">{{$jumlah6}}</td>
					<td align="center">{{$jumlah7}}</td>
					<td align="center">{{$jumlah8}}</td>
					
				<tr>
				<th colspan="9" align="left">Rata-Rata</th> 
				<?php
	   			$hasilrata2 = $rata2 / ($no-1);
	   			echo "<td align=center>".$hasilrata2."</td>";
	   			?>
			</table>
			Catatan:<br>
				Sks pengajaran sama dengan sks mata kuliah yang diajarkan. Bila dosen mengajar kelas paralel, maka beban sks pengajaran untuk satu tambahan kelas paralel adalah 1/2 kali sks mata kuliah.<br>
				*   rata-rata adalah jumlah sks dibagi dengan jumlah dosen tetap.<br>
				**  sks manajemen dihitung sbb :<br>
				Beban kerja manajemen untuk jabatan-jabatan ini adalah sbb : <br>
				- rektor/direktur politeknik 12 sks	<br>
				- pembantu rektor/dekan/ketua sekolah tinggi/direktur akademi 10 sks<br>
				- ketua lembaga/kepala UPT 8 sks<br>
				- pembantu dekan/ketua jurusan/kepala pusat/ketua senat akademik/ketua senat fakultas 6 sks<br>
				- sekretaris jurusan/sekretaris pusat/sekretaris senat akademik/sekretaris senat universitas/ sekretaris senatfakultas/ kepala lab. atau studio/kepala balai/ketua PS 4 sks<br>
				- sekretaris PS 3 sks<br>
				Bagi PT yang memiliki struktur organisasi yang berbeda, beban kerja manajemen untuk jabatan baru disamakan dengan beban kerja jabatan yang setara.<br>
			@endif
		</body>
	</head>
</html>