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
				4.3  Dosen Tetap <br>
				<p align="justify">Dosen tetap dalam borang akreditasi BAN-PT adalah dosen yang diangkat dan ditempatkan sebagai tenaga tetap pada PT yang bersangkutan; termasuk dosen penugasan Kopertis, dan dosen yayasan pada PTS dalam bidang yang relevan dengan keahlian bidang studinya. Seorang dosen hanya dapat menjadi dosen tetap pada satu perguruan tinggi, dan mempunyai penugasan kerja minimum 36 jam/minggu.<br>

				Dosen tetap dipilah dalam 2 kelompok, yaitu:<br>
				1. dosen tetap yang bidang keahliannya sesuai dengan PS<br>
				2. dosen tetap yang bidang keahliannya di luar PS<br>
				4.3.1  Data dosen tetap yang bidang keahliannya sesuai dengan bidang PS:

			</div>
			<br>
			<br>
			<table class="tg">
			  <tr>
			   
			    <th width="50px"><p class="text-center">No</p></th>
					<th width="200px"><p class="text-center">Nama Dosen Tetap</p></th>
					<th width="100px"><p class="text-center">NIDN</p></th>
					<th width="100px"><p class="text-center">Tgl. Lahir</p></th>
					<th width="50px"><p class="text-center">Jabatan Akademik</p></th>
					<th width="100px"><p class="text-center">Gelar Akademik</p></th>
					<th width="50px"><p class="text-center">Pendidikan S1, S2, S3  dan Asal PT</p></th>
					<th width="200px"><p class="text-center">Bidang Keahlian untuk Setiap Jenjang Pendidikan</p></th>
			  </tr>
			  <?php $no=1; ?>
					@foreach($data as $key => $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td>{{$value->nama}}</td>
							<td align="center">{{$value->nidn}}</td>
							<td align="center">{{$value->tanggalLahir}}</td>
							<td>{{$value->fungsionalTerakhir}}</td>
							<td>{{$value->gelar}}</td>
							<td align="center">{{$value->pendidikanTerakhir}}</td>
							<td>{{$value->bidangKeahlian}}</td>
							
						</tr>
					@endforeach
			</table>
			<br>
			* Lampirkan fotokopi ijazah <br>
			** NIDN : Nomor Induk Dosen Nasional <br>
			*** Dosen yang telah memperoleh sertifikat dosen agar diberi tanda (***) dan fotokopi sertifikatnya agar dilampirkan<br>
			@endif
		</body>
	</head>
</html>