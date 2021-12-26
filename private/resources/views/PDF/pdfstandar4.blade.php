<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Standar IV</title>
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
				<h3>STANDAR IV. SUMBER DAYA MANUSIA</h3>
				4.1  	Sistem Seleksi dan Pengembangan
				<p align="justify">Laporan tentang penjelasan sistem seleksi/perekrutan, penempatan, pengembangan, retensi, dan pemberhentian dosen dan tenaga kependidikan untuk menjamin mutu penyelenggaraan program akademik (termasuk informasi tentang ketersediaan pedoman tertulis dan konsistensi pelaksanaannya).
				</div>
			<table class="tg">
			  <tr>
			    <th class="tg">Sistem Seleksi dan Pengembangan<br></th>
			  </tr>
			 @foreach($data as $key => $value)
                        <tr>
                            <td align="justify">{{$value->sistemSeleksi}}</td>

			  @endforeach
			</table>

				4.2  	Monitoring dan Evaluasi
				<p align="justify">Laporan tentang penjelasan sistem monitoring dan evaluasi, serta rekam jejak kinerja akademik dosen dan kinerja tenaga kependidikan (termasuk informasi tentang ketersediaan pedoman tertulis, dan monitoring dan evaluasi kinerja dosen dalam tridarma serta dokumentasinya).	
			</div>
			<br>
			<table class="tg">
			  <tr>
			   
			    <th class="tg">Monitoring dan Evaluasi<br></th>
			  </tr>
			  @foreach($data as $key => $value)
                        <tr>
                            <td align="justify">{{$value->monev}}</td>
                            
                        </tr>
                    @endforeach
			</table>
				<br>
				4.3  Dosen Tetap 
				<p align="justify">Dosen tetap dalam borang akreditasi BAN-PT adalah dosen yang diangkat dan ditempatkan sebagai tenaga tetap pada PT yang bersangkutan; termasuk dosen penugasan Kopertis, dan dosen yayasan pada PTS dalam bidang yang relevan dengan keahlian bidang studinya. Seorang dosen hanya dapat menjadi dosen tetap pada satu perguruan tinggi, dan mempunyai penugasan kerja minimum 36 jam/minggu.<br></p>
				Dosen tetap dipilah dalam 2 kelompok, yaitu:<br>
				1. dosen tetap yang bidang keahliannya sesuai dengan PS<br>
				2. dosen tetap yang bidang keahliannya di luar PS
			</div>
			<br>
			<br>
			4.3.1  Data dosen tetap yang bidang keahliannya sesuai dengan bidang PS:
			<br>
			<table class="tg">
			  <tr>
			   
			    <th><p class="text-center">No</p></th>
					<th><p class="text-center">Nama Dosen Tetap</p></th>
					<th><p class="text-center">NIDN</p></th>
					<th><p class="text-center">Tgl. Lahir</p></th>
					<th><p class="text-center">Jabatan Akademik</p></th>
					<th><p class="text-center">Gelar Akademik</p></th>
					<th><p class="text-center">Pendidikan S1, S2, S3  dan Asal PT</p></th>
					<th><p class="text-center">Bidang Keahlian untuk Setiap Jenjang Pendidikan</p></th>
			  </tr>
			  <?php $no=1; ?>
					@foreach($data1 as $key => $value)
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

			<br>
			<br>
			<br>
			4.3.2  Data dosen tetap yang bidang keahliannya di luar bidang PS: <br>
			<table class="tg">
			  <tr>
			   		<th><p class="text-center">No</p></th>
					<th><p class="text-center">Nama Dosen Tetap</p></th>
					<th><p class="text-center">NIDN</p></th>
					<th><p class="text-center">Tgl. Lahir</p></th>
					<th><p class="text-center">Jabatan Akademik</p></th>
					<th><p class="text-center">Gelar Akademik</p></th>
					<th><p class="text-center">Pendidikan S1, S2, S3  dan Asal PT</p></th>
					<th><p class="text-center">Bidang Keahlian untuk Setiap Jenjang Pendidikan</p></th>
			  </tr>
			  <?php $no=1; ?>
					@foreach($data2 as $key => $value)
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
			</tbody>
			</table>
			<br>
			* Lampirkan fotokopi ijazah <br>
			** NIDN : Nomor Induk Dosen Nasional <br>
			*** Dosen yang telah memperoleh sertifikat dosen agar diberi tanda (***) dan fotokopi sertifikatnya agar dilampirkan<br>
			<br>
			
			4.3.3  Aktivitas dosen tetap yang bidang bidang keahliannya sesuai dengan PS dinyatakan dalam sks rata-rata per semester pada satu tahun akademik terakhir, diisi dengan perhitungan sesuai SK Dirjen DIKTI no. 48 tahun 1983 (12 sks setara dengan 36 jam kerja per minggu)<br>
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
					@foreach($data3 as $key => $value)
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
				<br>


			4.3.4 Tuliskan data aktivitas mengajar dosen tetap yang bidang keahliannya sesuai dengan PS,  dalam satu tahun akademik terakhir di PS ini dengan mengikuti format tabel berikut:<br>
			<table class="tg">
			  <tr>
			   
			    	<th><p class="text-center">No</p></th>
					<th><p class="text-center">Nama Dosen Tetap</p></th>
					<th><p class="text-center">Bidang Keahlian</p></th>
					<th><p class="text-center">Kode Mata Kuliah</p></th>
					<th><p class="text-center">Nama Mata Kuliah</p></th>
					<th><p class="text-center">Jumlah Kelas</p></th>
					<th><p class="text-center">Jumlah Pertemuan Yang di Rencanakan</p></th>
					<th><p class="text-center">Jumlah Pertemuan Yang di Laksanakan</p></th>
			  </tr>
			  <?php $no=1; 
					$total=0;
					$total1=0; ?>

					@foreach($data4 as $key => $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td>{{$value->nama}}</td>
							<td>{{$value->bidangKeahlian}}</td>
							<td align="center">{{$value->idmatakuliah}}</td>
							<td>{{$value->namaMataKuliah}}</td>
							<td align="center">{{$value->jumlahKelas}}</td>
							<td align="center">{{$value->jumlahRencanaPertemuan}}</td>
							<td align="center">{{$value->jumlahRealisasiPertemuan}}</td>

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
			* Lampirkan fotokopi ijazah <br>
			** NIDN : Nomor Induk Dosen Nasional <br>
			*** Dosen yang telah memperoleh sertifikat dosen agar diberi tanda (***) dan fotokopi sertifikatnya agar dilampirkan<br>
			<br>

			4.3.5  Tuliskan data aktivitas mengajar dosen tetap yang bidang keahliannya di luar PS,  dalam satu tahun akademik terakhir di PS ini dengan mengikuti format tabel berikut:
			<br>
			<table class="tg">
			  <tr>
			  		<th><p class="text-center">No</p></th>
					<th><p class="text-center">Nama Dosen Tetap</p></th>
					<th><p class="text-center">Bidang Keahlian</p></th>
					<th><p class="text-center">Kode Mata Kuliah</p></th>
					<th><p class="text-center">Nama Mata Kuliah</p></th>
					<th><p class="text-center">Jumlah Kelas</p></th>
					<th><p class="text-center">Jumlah Pertemuan Yang di Rencanakan</p></th>
					<th><p class="text-center">Jumlah Pertemuan Yang di Laksanakan</p></th>
			  </tr>
			 <?php $no=1; 
					$total=0;
					$total1=0; ?>
					@foreach($data5 as $key => $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td>{{$value->nama}}</td>
							<td>{{$value->bidangKeahlian}}</td>
							<td align="center">{{$value->idmatakuliah}}</td>
							<td>{{$value->namaMataKuliah}}</td>
							<td align="center">{{$value->jumlahKelas}}</td>
							<td align="center">{{$value->jumlahRencanaPertemuan}}</td>
							<td align="center">{{$value->jumlahRealisasiPertemuan}}</td>
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
			<br>
			4.4  Dosen Tidak Tetap
			<br>
			4.4.1  Tuliskan data dosen tidak tetap pada PS dengan mengikuti format tabel berikut:<br>
			<table class="tg">
			  <tr>
			   
			    	<th><p class="text-center">No</p></th>
					<th><p class="text-center">Nama Dosen Tidak Tetap</p></th>
					<th><p class="text-center">NIDN</p></th>
					<th><p class="text-center">Tgl. Lahir</p></th>
					<th><p class="text-center">Jabatan Akademik</p></th>
					<th><p class="text-center">Gelar Akademik</p></th>
					<th><p class="text-center">Pendidikan S1, S2, S3  dan Asal PT</p></th>
					<th><p class="text-center">Bidang Keahlian untuk Setiap Jenjang Pendidikan</p></th>
			  </tr>
			<?php $no=1; ?>
					@foreach($data6 as $key => $value)
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
			<br>
			<br>
			4.4.2  Tuliskan data aktivitas mengajar dosen tidak tetap pada satu tahun terakhir di PS ini dengan mengikuti format tabel berikut:<br>
			<table class="tg">
			  <tr>
			   		<th><p class="text-center">No</p></th>
					<th><p class="text-center">Nama Dosen  Tidak Tetap</p></th>
					<th><p class="text-center">Bidang Keahlian</p></th>
					<th><p class="text-center">Kode Mata Kuliah</p></th>
					<th><p class="text-center">Nama Mata Kuliah</p></th>
					<th><p class="text-center">Jumlah Kelas</p></th>
					<th><p class="text-center">Jumlah Pertemuan Yang di Rencanakan</p></th>
					<th><p class="text-center">Jumlah Pertemuan Yang di Laksanakan</p></th>
					
			  </tr>
			 <?php $no=1;
					$total=0;
					$total1=0; ?>
					
					@foreach($data7 as $key => $value)
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
			<br>
			4.5   Upaya Peningkatan Sumber Daya Manusia (SDM) dalam tiga tahun terakhir
			<br>
			4.5.1  Kegiatan tenaga ahli/pakar sebagai pembicara dalam seminar/pelatihan, pembicara tamu, dsb, dari luar PT sendiri (tidak termasuk dosen tidak tetap)<br>
			<table class="tg">
			  <tr>
			   		<th width="50px"><p class="text-center">No</p></th>
					<th width="200px"><p class="text-center">Nama Tenaga Ahli</p></th>
					<th width="200px"><p class="text-center">Nama Kegiatan</p></th>
					<th width="100px"><p class="text-center">Waktu</p></th>
			  </tr>
			<?php $no=1; ?>
					@foreach($data8 as $key => $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td>{{$value->namaTenagaAhli}}</td>
							<td>{{$value->namaKegiatan}}</td>
							<td align="center">{{$value->waktu}}</td>
							
						</tr>

					@endforeach
			</table>
			<br>
			<br>
			4.5.2  Peningkatan kemampuan dosen tetap melalui program tugas belajar dalam bidang yang sesuai dengan bidang PS
			<br>
			<table class="tg">
			  <tr>
			   
			    	<th><p class="text-center">No</p></th>
					<th><p class="text-center">Nama Dosen</p></th>
					<th><p class="text-center">Jenjang Pendidikan Lanjut</p></th>
					<th><p class="text-center">Bidang Studi</p></th>
					<th><p class="text-center">Perguruan Tinggi</p></th>
					<th><p class="text-center">Negara</p></th>
					<th><p class="text-center">Tahun Mulai</p></th>
			  </tr>
			 <?php $no=1; ?>
					@foreach($data9 as $key => $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td>{{$value->nama}}</td>
							<td align="center">{{$value->jenjang}}</td>
							<td>{{$value->bidangStudi}}</td>
							<td>{{$value->perguruanTinggi}}</td>
							<td>{{$value->negara}}</td>
							<td align="center">{{$value->tahunMulai}}</td>
							
						</tr>
					@endforeach
			</table>
			<br>
			<br>
			4.5.3.   Kegiatan dosen tetap yang bidang keahliannya sesuai dengan PS dalam seminar ilmiah/lokakarya/penataran/workshop/ pagelaran/ pameran/peragaan yang tidak hanya melibatkan dosen PT sendiri<br>
			<table class="tg">
			  <tr>
			   		<th rowspan="2" ><p class="text-center">No</p></th>
					<th rowspan="2" ><p class="text-center">Nama Dosen</p></th>
					<th rowspan="2" ><p class="text-center">Jenis Kegiatan</p></th>
					<th rowspan="2" ><p class="text-center">Tempat</p></th>
					<th rowspan="2" ><p class="text-center">Waktu</p></th>
					<th colspan="2" ><p class="text-center">Sebagai</p></th>
				 
					<tr>
					<th align="center"><p class="text-center">Peserta</p></th>
					<th align="center"><p class="text-center">Penyaji</p></th>
			  </tr>

			 <?php $no=1; ?>
			 					@foreach($data10 as $key => $value)
			 						<tr>
			 							<td>{{$no++}}</td>
			 							<td>{{$value->nama}}</td>
			 							<td>{{$value->jenisKegiatan}}</td>
			 							<td>{{$value->tempat}}</td>
			 							<td>{{$value->waktu}}</td>
			 							<?php 

			 								if($value->sebagai=='Peserta'){
			 									echo "<td align=center>".$value->sebagai."</td>";
			 									echo "<td align=center><center>--</center></td>"; 
			 								} 
			 								else{
			 									echo "<td align=center><center>--</center></td>"; 
			 									echo "<td align=center>".$value->sebagai."</td>";
			 								}
			 								?>					
			 						</tr>
			 					@endforeach
			</table>
			* Jenis kegiatan : Seminar ilmiah, Lokakarya, Penataran/Pelatihan, Workshop, Pagelaran, Pameran, Peragaan dll
			<br>
			<br>
			<br>
			4.5.4    Sebutkan pencapaian prestasi/reputasi dosen (misalnya prestasi dalam pendidikan, penelitian dan pelayanan/pengabdian kepada masyarakat).
			<br>
			<table class="tg">
			  <tr>
			   		<th ><p class="text-center">No</p></th>
					<th ><p class="text-center">Nama Dosen</p></th>
					<th ><p class="text-center">Prestasi Yang di Capai</p></th>
					<th ><p class="text-center">Waktu Pencapaian</p></th>
					<th ><p class="text-center">Tingkat</p></th>
			  </tr>
			 <?php $no=1; ?>
					@foreach($data11 as $key => $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td>{{$value->nama}}</td>
							<td>{{$value->prestasi}}</td>
							<td align="center">{{$value->waktu}}</td>
							<td>{{$value->tingkat}}</td>
							
						</tr>
					@endforeach
			</table>
			* Sediakan dokumen pendukung pada saat asesmen lapangan.
			<br>
			<br>
			4.5.5  Sebutkan keikutsertaan dosen tetap dalam organisasi keilmuan atau organisasi profesi.
			<br>
			<table class="tg">
			  <tr>
			  		<th><p class="text-center">No</p></th>
					<th><p class="text-center">Nama Dosen</p></th>
					<th><p class="text-center">Nama Organisasi Keilmuan atau Organisasi Profesi</p></th>
					<th><p class="text-center">Kurun Waktu</p></th>
					<th><p class="text-center">Tingkat</p></th>
					
			  </tr>
			 <?php $no=1; ?>
					@foreach($data12 as $key => $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td>{{$value->nama}}</td>
							<td>{{$value->namaOrganisasi}}</td>
							<td>
							<?php
								$selisih = ((abs(strtotime($value->waktuMulai) - strtotime($value->waktuSelesai)))/(60*60*24));
								echo $selisih." hari" ; 
							?>
							</td>
							<td>{{$value->tingkat}}</td>
							
						</tr>
					@endforeach
			</table>
			<br>
			* Sediakan dokumen pendukung pada saat asesmen lapangan.
			<br>
			<br>

			4.6  Tenaga kependidikan
			<p align='justify'>4.6.1 Tuliskan data tenaga kependidikan  yang ada di PS, Jurusan, Fakultas atau PT yang melayani mahasiswa PS dengan mengikuti format tabel berikut:</p>
			<table class="tg">
			  <tr>
			   <th rowspan="2" ><p class="text-center">No</p></th>
					<th rowspan="2"><p class="text-center">Jenis Tenaga Kependidikan</p></th>
					<th colspan="8" ><p class="text-center">Jumlah Tenaga Kependidikan dengan Pendidikan Terakhir</p></th>
					<th rowspan="2"><p class="text-center">Unit Kerja</p></th>

					<tr>
					<th ><p class="text-center">S3</p></th>
					<th ><p class="text-center">S2</p></th>
					<th ><p class="text-center">S1</p></th>
					<th ><p class="text-center">D4</p></th>
					<th ><p class="text-center">D3</p></th>
					<th ><p class="text-center">D2</p></th>
					<th ><p class="text-center">D1</p></th>
					<th width="50px"><p class="text-center">SMA/SMK</p></th>
			  
			 <?php $no=1;
					$datajenis = "";
					$totals3 =0;
					$totals2 =0;
					$totals1 =0;
					$totald4 =0;
					$totald3 =0;
					$totald2 =0;
					$totald1 =0;
					$totalsma =0;
					?>
					@foreach($data13 as $key => $value)
						<?php
						if($datajenis!=$value->jenis){
						?>
						<tr>
							
							<td align="center">{{$no++}}</td>
							<td>{{$value->jenis}}</td>
							<td align="center">
							<?php $S3 = Fungsi::getData($value->jenis, 'S3') ;
								  $totals3 = $totals3 + $S3;
								  if($S3 > 0)
									  echo $S3; ?>
							</td>
							<td align="center">
								<?php $S2 = Fungsi::getData($value->jenis, 'S2') ;
								if($S2 > 0)
									  echo $S2;
									   $totals2 = $totals2 + $S2;
								?>
							</td><td align="center">
								<?php $S1 = Fungsi::getData($value->jenis, 'S1') ;
								if($S1 > 0)
									  echo $S1;
									   $totals1 = $totals1 + $S1;
								?>
							</td>
							<td align="center">
								<?php $d4 = Fungsi::getData($value->jenis, 'D4') ;
								if($d4 > 0)
									  echo $d4;
									   $totald4 = $totald4 + $d4;
								?>
							</td>
							<td align="center">
								<?php $D3 = Fungsi::getData($value->jenis, 'D3') ;
								if($D3 > 0)
									  echo $D3; 
									  $totald3 = $totald3 + $D3;
								?>
							</td>
							<td align="center">
								<?php $D2 = Fungsi::getData($value->jenis, 'D2') ;
								if($D2 > 0)
									  echo $D2;
									   $totald2 = $totald2 + $D2;
								?>
							</td>
							<td align="center">
								<?php $D1 = Fungsi::getData($value->jenis, 'D1') ;
								if($D1 > 0)
									  echo $D1;
									   $totald1 = $totald1 + $D1;
								?>
							</td>
							<td align="center">
								<?php $SMA = Fungsi::getData($value->jenis, 'SMA/SMK') ;
								if($SMA > 0)
									  echo $SMA;
									   $totalsma = $totalsma + $SMA;
								?>
							</td>
							<td>{{$value->unitKerja}}</td>
						</tr>
						<?php 
						} $datajenis = $value->jenis ; ?>
					@endforeach
					<tr>
					<th colspan="2">Total</th> 
					<td align="center"><?php echo $totals3 ; ?></td>
					<td align="center"><?php echo $totals2 ; ?></td>
					<td align="center"><?php echo $totals1 ; ?></td>
					<td align="center"><?php echo $totald4 ; ?></td>
					<td align="center"><?php echo $totald3 ; ?></td>
					<td align="center"><?php echo $totald2 ; ?></td>
					<td align="center"><?php echo $totald1 ; ?></td>
					<td align="center"><?php echo $totalsma ; ?></td>
					<th bgcolor="grey"></th>
			</table>
			<br>
			* Hanya yang memiliki pendidikan formal dalam bidang perpustakaan
			<br>
			<br>

			<p align='justify'>4.6.2  Jelaskan upaya yang telah dilakukan PS dalam meningkatkan kualifikasi dan kompetensi tenaga kependidikan, dalam hal pemberian kesempatan belajar/pelatihan, pemberian fasilitas termasuk dana, dan jenjang karir.</p>
			<table class="tg">
			  <tr>
			   <th><p class="text-center">Laporan Upaya Peningkatan Tenaga Kependidikan</p></th>
			  </tr>
			@foreach($data14 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->upayaTenagaKependidikan}}</td>
                            
                        </tr>
                    @endforeach
			</table>
			@endif
		</body>
	</head>
</html>