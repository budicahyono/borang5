<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Standar III</title>
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
				<h3>STANDAR 3. KEMAHASISWAAN DAN LULUSAN</h3>	
			
			<br>

3.1  Profil Mahasiswa dan Lulusan <br>
<br>
3.1.1 Tuliskan data seluruh mahasiswa reguler(1) dan lulusannya dalam lima tahun terakhir dengan mengikuti format tabel berikut: <br>
<br>
			<table class="tg">
			  <tr>
			            <th rowspan="2">Tahun Akademik</th>
			            <th rowspan="2">Daya Tampung</th>
			            <th colspan="2">Jumlah Calon Mahasiswa Reguler</th>
			            <th colspan="2">Jumlah Mahasiswa Baru</th>
			            <th colspan="2">Jumlah Total Mahasiswa </th>
			            <th colspan="2">Jumlah Lulusan</th>
			            <th colspan="3">IPK Lulusan Reguler</th>
			            <th colspan="3">Persentase Lulusan Reguler dengan IPK :</th>        
       				 
        	
        	<tr>
       
            <th>Ikut Seleksi</th>
            <th>Lulus Seleksi</th>
            <th>Reguler Bukan Transfer</th>
            <th>Transfer</th>
            <th>Reguler Bukan Transfer</th>
            <th>Transfer</th>
            <th>Reguler Bukan Transfer</th>
            <th>Transfer</th>
            <th>Min</th>
            <th>Rat</th>
            <th>Mak</th>
            <th>2.75</th>
            <th>2.75-3.50</th>
            <th>>3.50</th>   
        	</tr>
       
		   <?php 
			$jmldayatampung = 0;
			$jmlikut = 0;
			$jmllulus = 0;
			$jmlbarureguler = 0;
			$jmlbarutransfer = 0;
			$jmlmhsreguler = 0;
			$jmlmhstransfer = 0;
			$lulusreguler = 0;
			$lulustransfer = 0;
			
		   ?>
           @foreach($data5 as $key => $value)
			<tr>
				<td>{{$value->tahunAkademik}}</td>
				<td>{{$value->dayaTampung}}</td>
				<td>{{$value->calonMahasiswaIkut}}</td>
				<td>{{$value->calonMahasiswaLulus}}</td>
				<td>{{$value->mahasiswaBaruReguler}}</td>
				<td>{{$value->mahasiswaBaruTransfer}}</td>
				<td>{{$value->totalMahasiswaReguler}}</td>
				<td>{{$value->totalMahasiswaTransfer}}</td>
				<td>{{$value->mahasiswaLulusReguler}}</td>
				<td>{{$value->mahasiswaLulusTransfer}}</td>
				<td>{{$value->ipkLulusMinimum}}</td>
				<td>{{$value->ipkLulusRerata}}</td>
				<td>{{$value->ipkLulusMaksimum}}</td>
				<td>{{$value->persenIPK1}}</td>
				<td>{{$value->persenIPK2}}</td>
				<td>{{$value->persenIPK3}}</td>
				<?php
					$jmldayatampung = $value->dayaTampung + $jmldayatampung;
					$jmlikut = $value->calonMahasiswaIkut + $jmlikut;
					$jmllulus = $value->calonMahasiswaLulus + $jmllulus;
					$jmlbarureguler = $value->mahasiswaBaruReguler+$jmlbarureguler;
					$jmlbarutransfer = $value->mahasiswaBaruTransfer+$jmlbarutransfer;
					$jmlmhsreguler = $value->totalMahasiswaReguler+$jmlmhsreguler;
					$jmlmhstransfer = $value->totalMahasiswaTransfer+$jmlmhstransfer;
					$lulusreguler = $value->mahasiswaLulusReguler+$lulusreguler;
					$lulustransfer = $value->mahasiswaLulusTransfer + $lulustransfer;
				?>
			</tr>
		   @endforeach
       
         <tr>
            <th scope="row">Jumlah</th>
            <td><?php echo $jmldayatampung ; ?></td>
            <td><?php echo $jmlikut; ?></td>
            <td><?php echo $jmllulus; ?></td>
            <td><?php echo $jmlbarureguler; ?></td>
            <td><?php echo $jmlbarutransfer; ?></td>
            <td><?php echo $jmlmhsreguler; ?></td>
            <td><?php echo $jmlmhstransfer; ?></td>
            <td><?php echo $lulusreguler; ?></td>
            <td><?php echo $lulustransfer; ?></td>
            <td bgcolor="grey"></td>
            <td bgcolor="grey"></td>
            <td bgcolor="grey"></td>
            <td bgcolor="grey"></td>
            <td bgcolor="grey"></td>
            <td bgcolor="grey"></td>
        </tr>
        

</table>
<br>
Catatan :
<br>
TS:Tahun akademik penuh terakhir saat pengisian borang
<br>
Min: IPK Minimum; Rat:IPK Rata-rata; Mak:IPK Maksimum 
<br>
<br>
Catatan: 
<br>
(1)  Mahasiswa <b>program reguler</b> adalah mahasiswa yang mengikuti program pendidikan secara penuh waktu (baik kelas pagi, siang, sore, malam, 
     dan diseluruh kampus). <br>
(2)  Mahasiswa <b>program non-reguler</b> adalah mahasiswa yang mengikuti program pendidikan secara paruh waktu. <br>
(3)  Mahasiswa <b>transfer</b> adalah mahasiswa yang masuk ke program studi dengan mentransfer mata kuliah yang telah diperolehnya dari PS lain, baik dari dalam PT maupun luar PT. <br>
<br>

3.1.2 Tuliskan data mahasiswa non-reguler(2) dalam lima tahun terakhir dengan mengikuti format tabel berikut:<br>
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
					@foreach($data6 as $key => $value)
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
<br>
				</table>

3.1.3   Sebutkan pencapaian prestasi/reputasi mahasiswa dalam tiga tahun terakhir di bidang akademik dan non-akademik (misalnya prestasi dalam penelitian dan lomba karya ilmiah, olahraga, dan seni). <br>
<br>

			<table class="tg">
			  <tr>
					<th><p class="text-center">No</p></th>
			  		<th><p class="text-center">Nama Kegiatan</p></th>
					<th><p class="text-center">Waktu Penyelenggaraan</p></th>
					<th><p class="text-center">Tingkat (Lokal, Wilayah, Nasional, atau Internasional)</p></th>
					<th><p class="text-center">Prestasi yang Dicapai</p></th>
			   
			  </tr>
			<?php $no=1; ?>
					@foreach($data7 as $key => $value)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$value->namaKegiatan}}</td>
							<td>{{$value->waktu}}</td>
							<td>{{$value->tingkat}}</td>
							<td>{{$value->prestasi}}</td>
						</tr>
					@endforeach
			 </table>
<br>

3.1.4 Tuliskan data jumlah mahasiswa reguler tujuh tahun terakhir dengan mengikuti format tabel berikut: <br>
<br>
			<table class="tg">

<tr>
			            <th rowspan="3"><p class="text-center">Tahun Masuk</th></p>
			            <th colspan="7"><p class="text-center">Jumlah Mahasiswa Reguler per Angkatan pada Tahun*</th></p>
			            <th rowspan="3"><p class="text-center">Jumlah Lulusan sampai dengan TS</th></p>
           
       				
        

        <tr>
             <th rowspan="2"><p class="text-center">TS-6</th></p>
             <th rowspan="2"><p class="text-center">TS-5</th></p>
             <th rowspan="2"><p class="text-center">TS-4</th></p>
             <th rowspan="2"><p class="text-center">TS-3</th></p>
             <th rowspan="2"><p class="text-center">TS-2</th></p>
             <th rowspan="2"><p class="text-center">TS-1</th></p>
             <th rowspan="2"><p class="text-center">TS</th></p>
            <tr>
           
           
        </tr>
			<?php
			$nourut= 7 ;
			$Ynow = date ('Y');
			?>
			@foreach($data8 as $key => $value)
			
				<?php 
				$nourut--;
				 ?>
					 <tr>
						<td><?php echo "TS".$nourut; ?></td>
						<td align="center">
							<?php
							$jmlh = Fungsi::getjmlMhs($value->angkatan, $Ynow-6);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = Fungsi::getjmlMhs($value->angkatan, $Ynow-5);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = Fungsi::getjmlMhs($value->angkatan, $Ynow-4);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = Fungsi::getjmlMhs($value->angkatan, $Ynow-3);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = Fungsi::getjmlMhs($value->angkatan, $Ynow-2);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = Fungsi::getjmlMhs($value->angkatan, $Ynow-1);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = Fungsi::getjmlMhs($value->angkatan, $Ynow);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = Fungsi::getlulusanMhs($value->angkatan);
							echo $jmlh;
							?>
						</td>
					 </tr>
				
			@endforeach
  
    </table>
<br>
 * Tidak memasukkan mahasiswa transfer. <br> 


			</table>
<br>
    </table>
3.2 Layanan kepada Mahasiswa  
Lengkapilah tabel berikut untuk setiap jenis pelayanan kepada mahasiswa PS.
<br>
<br>
			<table class="tg">
			  <tr>
					<th><p class="text-center">No</p></th>
			  		<th><p class="text-center">Jenis Layanan Kepada Mahasiswa</p></th>
					<th><p class="text-center">Bentuk Kegiatan, Pelaksanaan, dan Hasilnya</p></th>
					
			   
			  </tr>
			<?php $no=1; ?>
					@foreach($data9 as $key => $value)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$value->jenisKegiatan}}</td>
							<td>{{$value->isiKegiatan}}</td>
							
						</tr>
					@endforeach
			 </table>
</table>
<br>
3.3    Evaluasi Lulusan <br>
<br>
3.3.1  Evaluasi Kinerja lulusan oleh Pihak Pengguna Lulusan <br>
Adakah studi pelacakan (tracer study) untuk mendapatkan hasil evaluasi kinerja lulusan dengan pihak pengguna? <br>
<br>
&lt; &gt; tidak ada<br>
&lt; &gt; ada <br>
<br>
Jika ada, uraikan metode, proses dan mekanisme kegiatan studi pelacakan tersebut.  Jelaskan pula bentuk tindak lanjut dari hasil kegiatan ini.<br>
<br>
			<table class="tg">
			  <tr> 

			 @foreach($data12 as $key => $value)
			  	<td>{{$value->mekanisme}}</td> 	
			 @endforeach
			 </tr>
			 </table>
			 <br>
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
					@foreach($data11 as $key => $value)
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
			
Catatan :  Sediakan dokumen pendukung pada saat asesmen lapangan <br>
<br>
(*) persentase tanggapan pihak pengguna = [(jumlah tanggapan pada peringkat) : (jumlah tanggapan yang ada)] x 100<br>
<br>
3.3.2  Rata-rata waktu tunggu lulusan untuk memperoleh pekerjaan yang pertama = … bulan (Jelaskan bagaimana data ini diperoleh)<br>
<br>
3.3.3  Persentase lulusan yang bekerja pada bidang yang sesuai dengan keahliannya = … % (Jelaskan bagaimana data ini diperoleh) <br>
<br>
			

3.4   	Himpunan Alumni <br>
Jelaskan apakah lulusan program studi memiliki himpunan alumni. Jika memiliki, jelaskan aktivitas dan hasil kegiatan dari himpunan alumni untuk kemajuan program studi dalam kegiatan akademik dan non akademik, meliputi sumbangan dana, sumbangan fasilitas, keterlibatan dalam kegiatan, pengembangan jejaring, dan penyediaan fasilitas.
			<table class="tg">
			  <tr>
					<th><p class="text-center">Waktu Tunggu Lulusan</p></th>
			  		<th><p class="text-center">Kerja Sesuai Bidang</p></th>
					<th><p class="text-center">Himpunan Alumni</p></th>
					
			   
			  </tr>
			<?php ?>
					@foreach($data10 as $key => $value)
						<tr>
							<td>{{$value->waktuTungguLulusan}}</td>
							<td>{{$value->kerjaSesuaiBidang}}</td>
							<td>{{$value->himpunanAlumni}}</td>
							
						</tr>
					@endforeach
			 </table>
		</body>
	</head>
</html>