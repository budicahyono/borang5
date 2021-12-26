<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan STANDAR 7. PENELITIAN, PELAYANAN/PENGABDIAN KEPADA MASYARAKAT, DAN KERJASAMA</title>
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
				<h3>STANDAR 7. 	PENELITIAN, PELAYANAN/PENGABDIAN KEPADA MASYARAKAT, DAN KERJASAMA</h3>	
			</div>
			<br>
7.1   Penelitian Dosen Tetap yang Bidang Keahliannya Sesuai dengan PS<br>
<br>
7.1.1   Jumlah judul penelitian* yang sesuai dengan bidang keilmuan PS, yang dilakukan oleh dosen tetap yang bidang keahliannya sesuai dengan PS selama tiga tahun terakhir dengan mengikuti format tabel berikut:<br>
<br>
			<table class="tg">
			  <tr>

			  			<th width="100"><p class="text-center">Sumber Pembiayaan</p></th>
						<th width="100"><p class="text-center">TS-2</p></th>
						<th width="100"><p class="text-center">TS-1</p></th>
						<th width="100"><p class="text-center">TS</p></th>
						
			  </tr>
			<?php  
						$Ynow=date('Y');
						$penelitian = "";
					?>
					@foreach($data as $key => $value)
					<tr>
						<td>{{$value->sumberBiaya}}</td>
						<?php
								if($value->tahun==$Ynow-2)
									echo "<td>".$value->jumlah."</td><td></td>
									 <td></td>";
								if($value->tahun==$Ynow-1)
									echo "<td></td><td>".$value->jumlah."</td>
										  <td></td>";
								if($value->tahun==$Ynow)
									echo "<td></td><td></td>
										  <td>".$value->jumlah."</td>";
						?>
					</tr>
					@endforeach
			</table>
			<div>
			<p>Catatan: (*) sediakan data pendukung pada saat asesmen lapangan</p>
			</div>
			<br>
7.1.2  Judul artikel ilmiah/karya ilmiah/karya seni/buku yang dihasilkan selama tiga tahun terakhir oleh dosen tetap yang bidang keahliannya sesuai dengan PS dengan mengikuti format tabel berikut:<br>
<br>
			  <table class="tg">
			  <tr>
					
					<th><strong>Jumlah Mahasiswa TA:</strong></th>
						
			  </tr>
			@foreach($data1 as $key => $value)
				<tr>
					<td>{{$value->jumlahMahasiswaTA}}</td>
				</tr>
				@endforeach
			</table>
			<br>
7.1.3  Tuliskan judul artikel ilmiah/karya ilmiah/karya seni/buku yang dihasilkan selama tiga tahun terakhir oleh dosen tetap yang bidang keahliannya sesuai dengan PS dengan mengikuti format tabel berikut:<br>
<br>
<table class="tg">
			  <tr>
					
						<th rowspan="2" width="30"><p class="text-center">No</p></th>
						<th rowspan="2" width="50"><p class="text-center">Judul</p></th>
						<th rowspan="2" width="50"><p class="text-center">Nama Dosen</p></th>
						<th rowspan="2" width="50"><p class="text-center">Tahun Publikasi</p></th>
						<th colspan="3" ><p class="text-center">Tingkat</th>
						
						<tr>

						<th width="50"><p class="text-center">Lokal</p></th>
						<th width="50"><p class="text-center">Nasional</p></th>
						<th width="50"><p class="text-center">Internasional</p></th>
			  </tr>
			<?php $no=1;
					$total = 0;
					$total1 = 0;
					$total2 = 0;
					  ?>
					@foreach($data2 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->judul}}</td>
						<td>{{$value->nama}}</td>
						<td>{{$value->tahunPublikasi}}</td>
					<?php
						if($value->tingkat == "Lokal"){
							echo "<td>".$value->tingkat."</td><td></td><td></td>
							 <td></td>";
							$total++;
						}
							
						if($value->tingkat=="Nasional"){
							echo "<td></td><td>".$value->tingkat."</td><td></td>";
							$total1++;
						}
							
						if($value->tingkat=="Internasional"){
							echo "<td></td><td></td><td>".$value->tingkat."</td>";
							$total2++;
						}
							
					?>
					</tr>
					@endforeach
					<tr>
						<th colspan="4">Total</th>

					<td>{{$total}}</td>
					<td>{{$total1}}</td>
					<td>{{$total2}}</td>

			</table>
			<div>
			<p>Catatan: * = Tuliskan banyaknya dosen pada sel yang sesuai</p>
			</div>
			<br>
7.1.4  Sebutkan karya dosen dan atau mahasiswa Program Studi yang telah memperoleh/sedang memproses perlindungan Hak atas Kekayaan Intelektual (HaKI) selama tiga tahun terakhir.<br>
<br>
			  <table class="tg">
			  <tr>
					
					<th width="50"><p class="text-center">No</p></th>
					<th width=""><p class="text-center">Nama Karya</p></th>
			  </tr>
			<?php $no=1; ?>
					@foreach($data3 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->namaKarya}}</td>
					</tr>
					@endforeach
			</table>
			<div>
			<p>* Lampirkan surat paten HaKI atau keterangan sejenis.</p>
			</div>
			<br>
7.2   Kegiatan Pelayanan/Pengabdian kepada Masyarakat (PkM)<br>
<br>
7.2.1  Tuliskan jumlah kegiatan Pelayanan/Pengabdian kepada Masyarakat (*) yang sesuai dengan bidang keilmuan PS selama tiga tahun terakhir yang dilakukan oleh dosen tetap yang bidang keahliannya sesuai dengan PS dengan mengikuti format tabel berikut:<br>
<br>
			  <table class="tg">
			  <tr>
					
						<th width="100"><p class="text-center">Sumber Dana Kegiatan<br>Pelayana/Pengabdian Kepada<br>Masyarakat</p></th>
						<th width="100"><p class="text-center">TS-2</p></th>
						<th width="100"><p class="text-center">TS-1</p></th>
						<th width="100"><p class="text-center">TS</p></th>
			  </tr>
			<?php  
					$Ynow=date('Y');
					?>
					@foreach($data4 as $key => $value)
					<tr>
						<td>{{$value->sumberBiaya}}</td>
						<?php
								if($value->tahun==$Ynow-2)
									echo "<td>".$value->jumlah."</td><td></td>
									 <td></td>";
								if($value->tahun==$Ynow-1)
									echo "<td></td><td>".$value->jumlah."</td>
										  <td></td>";
								if($value->tahun==$Ynow)
									echo "<td></td><td></td>
										  <td>".$value->jumlah."</td>";
							?>
					</tr>
					@endforeach
			</table>
			<div>
			<p>Catatan: (*) Pelayanan/Pengabdian kepada Masyarakat adalah penerapan bidang ilmu untuk menyelesaikan masalah di masyarakat (termasuk masyarakat industri, pemerintah, dsb.)<p>
			</div>
			<br>
7.2.2   Adakah mahasiswa yang dilibatkan dalam kegiatan pelayanan/pengabdian kepada masyarakat dalam tiga tahun terakhir?<br>
<br>
			  <table class="tg">
			  <tr>
					
						<th><strong>Jumlah Mahasiswa:</strong></th>
			  </tr>
			<?php?>
				@foreach($data5 as $key => $value)
				<tr>
					<td>{{$value->jumlahMahasiswa}}</td>
				</tr>
				@endforeach
			</table>
7.3   Kegiatan Kerjasama dengan Instansi Lain <br>
<br>
7.3.1  Tuliskan instansi dalam negeri yang menjalin kerjasama* yang terkait dengan program studi/jurusan dalam tiga tahun terakhir.<br>
<br>
<table class="tg">
			  <tr>
						<th rowspan="2" width="30"><p class="text-center">No</p></th>
						<th rowspan="2" width="100"><p class="text-center">Nama Instansi</p></th>
						<th rowspan="2" width="100"><p class="text-center">Jenis Kegiatan</p></th>
						<th colspan="2" ><p class="text-center">Kurun Waktu</p></th>
						<th rowspan="2" width="100"><p class="text-center">Manfaat yang Telah Diperoleh</p></th>

						<tr>
						
						<th width="100"><p class="text-center">Mulai</p></th>
						<th width="100"><p class="text-center">Berakhir</p></th>
			  </tr>
			<?php $no=1; ?>
					@foreach($data6 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->namaInstitusi}}</td>
						<td>{{$value->jenisKegiatan}}</td>
						<td>{{$value->tahunMulai}}</td>
						<td>{{$value->tahunSelesai}}</td>
						<td>{{$value->manfaat}}</td>
					</tr>
					@endforeach
			</table>
			<div>
			<p>Catatan : (*) dokumen pendukung disediakan pada saat asesmen lapangan</p>
			</div>
			<br>
7.3.2  Tuliskan instansi luar negeri yang menjalin kerjasama* yang terkait dengan program studi/jurusan dalam tiga tahun terakhir.<br>
<br>
<table class="tg">
			  <tr>
						<th rowspan="2" width="30"><p class="text-center">No</p></th>
						<th rowspan="2" width="100"><p class="text-center">Nama Instansi</p></th>
						<th rowspan="2" width="100"><p class="text-center">Jenis Kegiatan</p></th>
						<th colspan="2" ><p class="text-center">Kurun Waktu</p></th>
						<th rowspan="2" width="100"><p class="text-center">Manfaat yang Telah Diperoleh</p></th>

						<tr>
						
						<th width="100"><p class="text-center">Mulai</p></th>
						<th width="100"><p class="text-center">Berakhir</p></th>
			  </tr>
			<?php $no=1; ?>
					@foreach($data7 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->namaInstitusi}}</td>
						<td>{{$value->jenisKegiatan}}</td>
						<td>{{$value->tahunMulai}}</td>
						<td>{{$value->tahunSelesai}}</td>
						<td>{{$value->manfaat}}</td>
					</tr>
					@endforeach
			</table>
			<div>
			<p>Catatan : (*) dokumen pendukung disediakan pada saat asesmen lapangan</p>
			</div>
		</body>
	</head>
</html>