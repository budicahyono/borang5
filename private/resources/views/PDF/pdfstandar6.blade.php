<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>	STANDAR 6. PEMBIAYAAN, PRASARANA, SARANA, DAN SISTEM INFORMASI</title>
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
				<h3>STANDAR 6. PEMBIAYAAN, PRASARANA, SARANA, DAN SISTEM INFORMASI</h3>	
			</div>
			<br>
<p>6.1   Pengelolaan Dana<br></p>
<font color="white"></font >Keterlibatan aktif program studi harus tercerminkan dalam dokumen tentang proses perencanaan, pengelolaan dan pelaporan serta pertanggungjawaban penggunaan dana kepada pemangku kepentingan melalui mekanisme yang transparan dan akuntabel.<br>
<br>
<br>
Jelaskan keterlibatan PS dalam perencanaan anggaran dan pengelolaan dana.<br>
<br>

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
			<br>
6.2   Perolehan dan Alokasi Dana<br>
<br>
6.2.1  Tuliskan realisasi perolehan dan alokasi dana (termasuk hibah) dalam juta rupiah termasuk gaji,  selama tiga tahun terakhir, pada tabel berikut:<br>
<br>
			<br>
			<table class="tg">
			  <tr>
			   
							<th rowspan="2" width="50"><p class="text-center">Sumber Dana</p></th>
							<th rowspan="2" width="50"><p class="text-center">Jenis Dana</p></th>
							<th colspan="3" ><p class="text-center">Jumlah Dana</p></th>
				<tr>
							
							<th width="50"><p class="text-center">TS-2</p></th>
							<th width="50"><p class="text-center">TS-1</p></th>
							<th width="50"><p class="text-center">TS</p></th>
				
			  </tr>
			<?php 
						$Ynow=date('Y');
						$no=1; 
						$sumberdana="";
						?>
						@foreach($data1 as $key => $value)
						<tr>
							<td>{{$value->sumberDana}}</td>
							<td>{{$value->jenisDana}}</td>
							<?php
								if($value->tahun==$Ynow-2)
									echo "<td>".Fungsi::buatrp($value->jumlahDana)."</td><td></td>
									<td></td>";
								if($value->tahun==$Ynow-1)
									echo "<td></td><td>".Fungsi::buatrp($value->jumlahDana)."</td>
										  <td></td>";
								if($value->tahun==$Ynow)
									echo "<td></td><td></td>
										  <td>".Fungsi::buatrp($value->jumlahDana)."</td>";
							?>
						</tr>
						@endforeach
			</table>
			<br>
Penggunaan dana:<br>
<br>
<table class="tg">
			  <tr>
			   
						<th rowspan="2" width="30"><p class="text-center">No</p></th>
						<th rowspan="2" width="100"><p class="text-center">Jenis Penggunaan</p></th>
						<th colspan="3" ><p class="text-center">Presentase Dana</p></th>
				<tr>
							
						<th width="100"><p class="text-center">TS-2</p></th>
						<th width="100"><p class="text-center">TS-1</p></th>
						<th width="100"><p class="text-center">TS</p></th>
				
			  </tr>
			<?php 
						$Ynow=date('Y');
						$no=1; 
						$penggunaandana="";
						?>
						@foreach($data2 as $key => $value)
						<tr>
							<td width="3">{{$no++}}</td>
							<td>{{$value->jenisPenggunaan}}</td>
							<?php
								if($value->tahun==$Ynow-2)
									echo "<td>".Fungsi::buatrp($value->jumlahDana)."</td><td></td>
									<td></td>";
								if($value->tahun==$Ynow-1)
									echo "<td></td><td>".Fungsi::buatrp($value->jumlahDana)."</td>
										  <td></td>";
								if($value->tahun==$Ynow)
									echo "<td></td><td></td>
										  <td>".Fungsi::buatrp($value->jumlahDana)."</td>";
							?>
						</tr>
						@endforeach
			</table>
			<br>
6.2.2  Tuliskan dana untuk kegiatan penelitian pada tiga tahun terakhir yang melibatkan dosen yang bidang keahliannya sesuai dengan program studi, dengan mengikuti format tabel berikut:<br>
<br>
<table class="tg">
			  <tr>
						<th width="100"><p class="text-center">Tahun</p></th>
						<th width="100"><p class="text-center">Judul Penelitian</p></th>
						<th width="100"><p class="text-center">Sumber dan Jenis<br> Dana</p></th>
						<th width="100"><p class="text-center">Jumlah Dana*<br>(dalam juta rupiah)</p></th>
			  </tr>
			<?php  
					$total = 0;
					?>
					@foreach($data3 as $key => $value)
					<tr>
						<td>{{$value->tahun}}</td>
						<td>{{$value->judul}}</td>
						<td>{{$value->jenisDana}}</td>
						<td>
						<?php
						 echo Fungsi::buatrp($value->jumlahDana);


						?></td>
					<?php
					$total = $value->jumlahDana + $total;
					?>
					</tr>
					@endforeach
					<tr>
					<th colspan="3"><p class="text-center">Jumlah</p></th>
					<td>
					<?php
						 echo Fungsi::buatrp($total);
					?>
			</table>
			<div>
			<p> * Di luar dana penelitian/penulisan skripsi, tesis, dan disertasi sebagai bagian dari studi lanjut.</p>
			</div>
			<br>
6.2.3 Tuliskan dana yang diperoleh dari/untuk kegiatan pelayanan/pengabdian kepada masyarakat pada tiga tahun terakhir dengan mengikuti format tabel berikut: <br>
<br>
<table class="tg">
			  <tr>
						<th width="100"><p class="text-center">Tahun</p></th>
						<th width="100"><p class="text-center">Judul Kegiatan<br> Pelayanan/Pengabdian<br> Kepada Masyarakat</p></th>
						<th width="100"><p class="text-center">Sumber dan Jenis<br> Dana</p></th>
						<th width="100"><p class="text-center">Jumlah Dana<br> (dalam juta rupiah)</p></th>
			  </tr>
				<?php 
						$total = 0;
					?>
					@foreach($data4 as $key => $value)
					<tr>
						<td>{{$value->tahun}}</td>
						<td>{{$value->judul}}</td>
						<td>{{$value->jenisDana}}</td>
						<td>
						<?php
						 echo Fungsi::buatrp($value->jumlahDana);
						?>
						</td>
					<?php
					$total = $value->jumlahDana + $total;
					?>
					</tr>
					@endforeach
					<tr>
					<th colspan="3"><p class="text-center">Jumlah</p></th>
					<td>
					<?php
						 echo Fungsi::buatrp($total);
					?>
			</table>
			<br>
6.3   Prasarana<br>
<br>
6.3.1 Tuliskan data ruang kerja dosen tetap yang bidang keahliannya sesuai dengan PS dengan mengikuti format tabel berikut:<br>
<br>
<table class="tg">
			  <tr>
						<th width="100"><p class="text-center">Ruang Kerja Dosen</p></th>
						<th width="100"><p class="text-center">Jumlah<br> Ruang</p></th>
						<th width="100"><p class="text-center">Jumlah Luas<br>(m2)</p></th>
			  </tr>
				<?php 
					$total=0;
					 ?>

					@foreach($data5 as $key => $value)
					<tr>
						<td>{{$value->jenisRuang}}</td>
						<td>{{$value->jumlahRuang}}</td>
						<td>{{$value->jumlahLuas}}</td>

					<?php
					$total = $value->jumlahLuas + $total;
					?>
					</tr>
					@endforeach
					<tr>
					<th colspan="2">Total</th>
					<td>{{$total}}</td>
			</table>
			<br>
6.3.2   Tuliskan data prasarana (kantor, ruang kelas, ruang laboratorium, studio, ruang perpustakaan, kebun percobaan, dsb. kecuali  ruang dosen) yang dipergunakan PS dalam proses belajar mengajar dengan  mengikuti format tabel berikut:<br>
<br>
<table class="tg">
			  <tr>
			    
						<th rowspan="2" width="30"><p class="text-center">No</p></th>
						<th rowspan="2" width="50"><p class="text-center">Jenis Prasarana</p></th>
						<th rowspan="2" width="50"><p class="text-center">Jumalh<br> Unit</p></th>
						<th rowspan="2" width="50"><p class="text-center">Total<br> Luas<br>(m2)</p></th>
						<th colspan="2" ><p class="text-center">Kepemilikan</p></th>
						<th colspan="2"  ><p class="text-center">Kondisi</p></th>
						<th rowspan="2" width="50"><p class="text-center">Utilisasi<br>(Jam/Minggu)</p></th>
						
						<tr>
			
						<th width="50"><p class="text-center">SD</p></th>
						<th width="50"><p class="text-center">SW</p></th>
						<th width="50"><p class="text-center">Terawat</p></th>
						<th width="50" style="border::1px"><p class="text-center">Tidak<br>Terawat</p></th>
					
					
			  </tr>
			  <?php $no=1; ?>
			@foreach($data6 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->jenisPrasarana}}</td>
						<td>{{$value->jumlahUnit}}</td>
						<td>{{$value->luas}}</td>
						<?php
							if($value->kepemilikan=="sendiri" || $value->kepemilikan=="Sendiri" )
								echo "<td>".$value->kepemilikan."</td><td></td>";
							if($value->kepemilikan=="sewa" || $value->kepemilikan=="Sewa")
								echo "<td></td><td>".$value->kepemilikan."</td>";
							
							if($value->kondisi=="terawat" || $value->kondisi=="Terawat" )
								echo "<td>".$value->kondisi."</td><td></td>";
							if($value->kondisi=="tidak terawat" || $value->kondisi=="Tidak Terawat")
								echo "<td></td><td>".$value->kondisi."</td>";
						?>
						<td>{{$value->utilisasi}}</td>
					</tr>
					@endforeach
			</table>
			<div >
			  		<strong>Keterangan</strong>
			  		<br>
			  		<p>SD=Milik PT/Fakultas/Jurusan Sendiri<br>SW=Sewa/Kontrak/Kerjasama</p>
			</div>
			<br>
6.3.3   Tuliskan data prasarana lain yang menunjang (misalnya tempat olah raga, ruang bersama, ruang himpunan mahasiswa, poliklinik) dengan mengikuti format tabel berikut:<br>
<br>
<table class="tg">
			  <tr>
			   			<th rowspan="2" width="30"><p class="text-center">No</p></th>
						<th rowspan="2" width="50"><p class="text-center">Jenis Prasarana<br>Penunjang</p></th>
						<th rowspan="2" width="50"><p class="text-center">Jumalh<br> Unit</p></th>
						<th rowspan="2" width="50"><p class="text-center">Total<br> Luas<br>(m2)</p></th>
						<th colspan="2" ><p class="text-center">Kepemilikan</p></th>
						<th colspan="2" ><p class="text-center">Kondisi</p></th>
						<th rowspan="2" width="50"><p class="text-center">Unit<br>Pengelola</p></th>
						
						<tr>
			
						<th width="50"><p class="text-center">SD</p></th>
						<th width="50"><p class="text-center">SW</p></th>
						<th width="50"><p class="text-center">Terawat</p></th>
						<th width="50" style="border::2px"><p class="text-center">Tidak<br>Terawat</p></th>
					
					
			  </tr>
			  <?php $no=1; ?>
					@foreach($data7 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->jenisPrasarana}}</td>
						<td>{{$value->jumlahUnit}}</td>
						<td>{{$value->luas}}</td>
						<?php
							if($value->kepemilikan=="sendiri" || $value->kepemilikan=="Sendiri" )
								echo "<td>".$value->kepemilikan."</td><td></td>";
							if($value->kepemilikan=="sewa" || $value->kepemilikan=="Sewa")
								echo "<td></td><td>".$value->kepemilikan."</td>";
							
							if($value->kondisi=="terawat" || $value->kondisi=="Terawat" )
								echo "<td>".$value->kondisi."</td><td></td>";
							if($value->kondisi=="tidak terawat" || $value->kondisi=="Tidak Terawat")
								echo "<td></td><td>".$value->kondisi."</td>";
						?>
						<td>{{$value->pengelola}}</td>
					</tr>
					@endforeach
			</table>
			<div >
			  		<strong>Keterangan</strong>
			  		<br>
			  		<p>SD=Milik PT/Fakultas/Jurusan Sendiri<br>SW=Sewa/Kontrak/Kerjasama</p>
			</div>
6.4   Sarana Pelaksanaan Kegiatan Akademik<br>
<br>
6.4.1   Pustaka (buku teks, karya ilmiah, dan jurnal; termasuk juga dalam bentuk CD-ROM dan media lainnya)<br>
Tuliskan rekapitulasi jumlah ketersediaan pustaka yang relevan dengan bidang PS dengan mengikuti format tabel 1 berikut:<br>
<br>
<font color="white"> dfahgdagdadadad</font >Tabel 1. Rekapitulasi jumlah ketersediaan pustaka yang relevan dengan bidang PS <br>
<br>
<table class="tg">
			  <tr>
						<th width="100"><p class="text-center">Jenis Pustaka</p></th>
						<th width="100"><p class="text-center">Jumlah Judul</p></th>
						<th width="100"><p class="text-center">Jumlah Copy</p></th>
			  </tr>
				<?php 
					$total = 0;
					$total1 = 0;
					 ?>
					@foreach($data8 as $key => $value)
					<tr>
						<td>{{$value->jenisPustaka}}</td>
						<td>{{$value->jumlahJudul}}</td>
						<td>{{$value->jumlahCopy}}</td>

					<?php
					$total = $value->jumlahJudul + $total;
					$total1 = $value->jumlahCopy + $total1;
					?>
					</tr>
					@endforeach
					<tr>
					<th colspan="1">Total</th>
					<td>{{$total}}</td>
					<td>{{$total1}}</td>
			</table>
			<br>
Isikan jurnal/prosiding seminar yang tersedia/yang diterima secara teratur (lengkap), terbitan 3 tahun terakhir dengan mengikuti format tabel 2 berikut:<br>
<br>
<font color="white">hgdagdadadad</font >Tabel 2.  Jurnal yang tersedia/yang diterima secara teratur (lengkap), terbitan 3 tahun terakhir <br>
<table class="tg">
			  <tr>
			   			<th width="100"><p class="text-center">JenisJurnal</p></th>
						<th width="100"><p class="text-center">Nama Jurnal</p></th>
						<th width="100"><p class="text-center">Tahun</p></th>
						<th width="100"><p class="text-center">Nomor</p></th>
						<th width="100"><p class="text-center">Jumlah</p></th>
					
					
			  </tr>
			  @foreach($data9 as $key => $value)
					<tr>
						<td>{{$value->akreditasi}}</td>
						<td>{{$value->namaJurnal}}</td>
						<td>{{$value->tahun}}</td>
						<td>{{$value->nomor}}</td>
						<td>{{$value->jumlah}}</td>
					</tr>
					@endforeach
			</table>
			<p>Catatan * = termasuk e-journal.</p>
			<br>
6.4.2    Sebutkan sumber-sumber pustaka di lembaga lain (lembaga perpustakaan/ sumber dari internet beserta  alamat website) yang biasa diakses/dimanfaatkan oleh dosen dan mahasiswa program studi ini.<br>
<br>
<table class="tg">
			  <tr>
			   			<th width="30"><p class="text-center">NO</p></th>
						<th><p class="text-center">Sumber</p></th>	
			  </tr>
			 <?php  $no=1; ?>
					@foreach($data10 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->sumberpustaka}}</td>
					</tr>
					@endforeach
			</table>
			<br>
6.4.3  Tuliskan peralatan utama yang digunakan di laboratorium (tempat praktikum, bengkel, studio, ruang simulasi, rumah sakit, puskesmas/balai kesehatan, green house, lahan untuk pertanian, dan sejenisnya) yang dipergunakan dalam proses pembelajaran di jurusan/fakultas dengan  mengikuti format tabel berikut:<br>
<br>
<table class="tg">
			  <tr>
			   			<th rowspan="2" width="30"><p class="text-center">No</p></th>
						<th rowspan="2" width="50"><p class="text-center">Nama Laboratorium</p></th>
						<th rowspan="2" width="50"><p class="text-center">Jenis peralatan Utama</p></th>
						<th rowspan="2" width="50"><p class="text-center">Jumlah Unit</p></th>
						<th colspan="2" ><p class="text-center">Kepemilikan</p></th>
						<th colspan="2" ><p class="text-center">Kondisi</p></th>
						<th rowspan="2" width="50"><p class="text-center">Rata-rata Waktu<br>Penggunaan<br>(Jam/Minggu)</p></th>

						<tr>

						<th width="50"><p class="text-center">SD</p></th>
						<th width="50"><p class="text-center">SW</p></th>
						<th width="50"><p class="text-center">Terawat</p></th>
						<th width="50"><p class="text-center">Tidak<br>Terawat</p></th>
						
			  </tr>
			 <?php $no=1; ?>
					@foreach($data11 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->namaLaboratorium}}</td>
						<td>{{$value->namaPeralatan}}</td>
						<td>{{$value->jumlahUnit}}</td>
						<?php
							if($value->kepemilikan=="sendiri" || $value->kepemilikan=="Sendiri" )
								echo "<td>".$value->kepemilikan."</td><td></td>";
							if($value->kepemilikan=="sewa" || $value->kepemilikan=="Sewa")
								echo "<td></td><td>".$value->kepemilikan."</td>";
							
							if($value->kondisi=="terawat" || $value->kondisi=="Terawat" )
								echo "<td>".$value->kondisi."</td><td></td>";
							if($value->kondisi=="tidak terawat" || $value->kondisi=="Tidak Terawat")
								echo "<td></td><td>".$value->kondisi."</td>";
						?>
						<td>{{$value->utilisasi}}</td>
					</tr>
					@endforeach
			</table>
			<div >
			  		<strong>Keterangan</strong>
			  		<br>
			  		<p>SD=Milik PT/Fakultas/Jurusan Sendiri<br>SW=Sewa/Kontrak/Kerjasama</p>
			</div>
			<br>
6.5   Sistem Informasi<br>
<br>
6.5.1   Jelaskan sistem informasi dan fasilitas yang digunakan oleh program studi untuk proses pembelajaran (hardware, software, e-learning, perpustakaan, dll.).<br>
<br>
<table class="tg">
			  <tr>

			  			<th width="50"><p class="text-center">No</p></th>
						<th><p class="text-center">Deskripsi</p></th>
						
			  </tr>
			<?php $no=1; ?>
					@foreach($data12 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->deskripsi}}</td>
					</tr>
					@endforeach
			</table>
			<br>
6.5.2    Beri tanda √ pada kolom yang sesuai (hanya satu kolom) dengan aksesibilitas tiap jenis data, dengan mengikuti format tabel berikut:<br>
<br>
			<table class="tg">
			  <tr>

			  		<th rowspan="2" ><p class="text-center">No</p></th>
					<th rowspan="2" ><p class="text-center">Jenis Data</p></th>
					<th colspan="4" ><p class="text-center">Sistem Pengelolaan Data</p></th> 
					
					<tr>
					<th>Secara Manual</th>
					<th>Dengan Komputer Tanpa Jaringan</th>
					<th>Dengan Komputer Jaringan Lokal (LAN)</th>

					<th>Dengan Komputer Jaringan LUAS (WAN)</th>

			
			<?php $no=1; ?>
				@foreach($data13 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->jenisData}}</td>
						<?php
							if($value->sistemPengelolaanData=='manual' || $value->sistemPengelolaanData=='Manual')
								echo "<td>".$value->sistemPengelolaanData."</td>
									  <td></td><td></td><td></td>";
							if($value->sistemPengelolaanData=='Komputer NonLAN')
								echo "<td></td>
									  <td>".$value->sistemPengelolaanData."</td><td></td><td></td>";
							if($value->sistemPengelolaanData=='Komputer LAN')
								echo "<td></td>
									  <td></td><td>".$value->sistemPengelolaanData."</td><td></td>";
							if($value->sistemPengelolaanData=='Komputer WAN')
								echo "<td></td><td></td><td></td>
									 <td>".$value->sistemPengelolaanData."</td>";
						?>
					</tr>
				@endforeach
			</table>

		</body>
	</head>
</html>