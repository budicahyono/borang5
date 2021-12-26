@include('html.print')
<?php 

header("Content-Type: application/vnd.ms-word; name='word'");
header("Content-disposition: attachment;filename=\"$filename.doc\"");

?>
<body >
	<div style="width:700px;" class="preview">
		<div class="title">
			<h3>{!!$title!!}</h3>		
		</div>
		 <br>
		  <h3>Standar I Visi Misi</h3>
		  <br>
		@foreach($tbvises as $value)
		  <table class="table1">
			<tr >
			<th class="text-left">Mekanisme</th>
			</tr>
			<tr>
			<td align="justify">{!!$value->mekanisme!!}</td>
			</tr>
			<tr>
			<th class="text-left">Visi</th>
			</tr>
			<tr>
			<td align="justify">{!!$value->visi!!}</td>
			</tr>
			<tr>
			<th class="text-left">Misi</th>
			</tr>
			<tr>
			<td align="justify">{!!$value->misi!!}</td>
			</tr>
			<tr>
			<th class="text-left">Tujuan</th>
			</tr>
			<tr >
			<td align="justify">{!!$value->tujuan!!}</td>
			</tr>
			<tr>
			<th class="text-left">Sasaran dan Strategi Pencapaian</th>
			</tr>
			<tr>
			<td align="justify">{!!$value->sasaran!!}{!!$value->strategi!!}</td>
			</tr>
			<tr>
			<th class="text-left">Sosialisasi</th>
			</tr>
			<tr>
			<td align="justify">{!!$value->sosialisasi!!}</td>
			</tr>
		  </table>
		  @endforeach
		  <br>
		  <h3>Standar II Tata Pamong</h3>
		  <br>
		  @foreach($tbtatapamongs as $value)
		  <table class="table1">
			<tr >
			<th class="text-left">Tata Pamong</th>
			</tr>
			<tr>
			<td align="justify">{!!$value->tataPamong!!}</td>
			</tr>
			<tr>
			<th class="text-left">Kepemimpinan</th>
			</tr>
			<tr>
			<td align="justify">{!!$value->kepemimpinan!!}</td>
			</tr>
			<tr>
			<th class="text-left">Sistem Pengelolaan</th>
			</tr>
			<tr>
			<td align="justify">{!!$value->sistemPengelolaan!!}</td>
			</tr>
			<tr>
			<th class="text-left">Penjaminan Mutu</th>
			</tr>
			<tr >
			<td align="justify">{!!$value->penjaminanMutu!!}</td>
			</tr>
		  </table>
		  @endforeach
		  <br>
		  <h3>Standar II Umpan Balik</h3>
		  <br>
		  <table class="table table-bordered">
					<thead>
					
					<th><p class="text-center">Sumber</p></th>
					<th><p class="text-center">Isi</p></th>
					<th><p class="text-center">Tindak Lanjut</p></th>
					
			</thead>
			<tbody>
				
					@foreach($tbumpanbaliks as $value)
						<tr>
							
							<td >{!! $value->sumber !!}</td>
							<td >{!! $value->isi !!}</td>
							<td >{!! $value->tindakLanjut !!}</td>
							
						</tr>
					@endforeach
			</tbody>
			</table>
			 <br>
		  <h3>Standar II Keberlanjutan Program Studi</h3>
		  <br>
			<table class="table table-bordered">
					<thead>
					
					<th><p class="text-center">Jenis Upaya</p></th>
					<th><p class="text-center">Upaya</p></th>
					
			</thead>
			<tbody>
				
					@foreach($tbkeberlanjutanprodis as $value)
						<tr>
							
							<td >{!! $value->jenisUpaya !!}</td>
							<td >{!! $value->upaya !!}</td>
							
						</tr>
					@endforeach
			</tbody>
			</table>
			 <br>
		  <h3>Standar III Mahasiswa Reguler</h3>
		  <br>
			<table class="table table-bordered">
					<body>
      				  <tr>
			            <th rowspan="2"><p class="text-center"> Tahun Akademik</th></p>
			            <th rowspan="2"><p class="text-center"> Daya Tampung</th></p>
			            <th colspan="2"><p class="text-center">Jumlah Calon Mahasiswa Reguler</th></p>
			            <th colspan="2"><p class="text-center">Jumlah Mahasiswa Baru</th></p>
			            <th colspan="2"><p class="text-center">Jumlah Total Mahasiswa </th></p>
			            <th colspan="2"><p class="text-center">Jumlah Lulusan</th></p>
			            <th colspan="3"><p class="text-center">IPK Lulusan Reguler</th></p>
			            <th colspan="3"><p class="text-center">Persentase Lulusan Reguler dengan IPK :</th></p>        
       				 </tr>
        	
        	<tr>
            <th><p class="text-center">Ikut Seleksi</p></th>
            <th><p class="text-center">Lulus Seleksi</p></th>
            <th><p class="text-center">Reguler Bukan Transfer</p></th>
            <th><p class="text-center">Transfer</p></th>
            <th><p class="text-center">Reguler Bukan Transfer</p></th>
            <th><p class="text-center">Transfer</p></th>
            <th><p class="text-center">Reguler Bukan Transfer</p></th>
            <th><p class="text-center">Transfer</p></th>
            <th><p class="text-center">Min</p></th>
            <th><p class="text-center">Rat</p></th>
            <th><p class="text-center">Mak</p></th>
            <th><2.75</th>
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
           @foreach($tbmhsregulers as $value)
			<tr>
				<td align="center">{{$value->tahunAkademik}}</td>
				<td align="center">{{$value->dayaTampung}}</td>
				<td align="center">{{$value->calonMahasiswaIkut}}</td>
				<td align="center">{{$value->calonMahasiswaLulus}}</td>
				<td align="center">{{$value->mahasiswaBaruReguler}}</td>
				<td align="center">{{$value->mahasiswaBaruTransfer}}</td>
				<td align="center">{{$value->totalMahasiswaReguler}}</td>
				<td align="center">{{$value->totalMahasiswaTransfer}}</td>
				<td align="center">{{$value->mahasiswaLulusReguler}}</td>
				<td align="center">{{$value->mahasiswaLulusTransfer}}</td>
				<td align="center">{{$value->ipkLulusMinimum}}</td>
				<td align="center">{{$value->ipkLulusRerata}}</td>
				<td align="center">{{$value->ipkLulusMaksimum}}</td>
				<td align="center">{{$value->persenIPK1}}</td>
				<td align="center">{{$value->persenIPK2}}</td>
				<td align="center">{{$value->persenIPK3}}</td>
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
            <td align="center"><?php echo $jmldayatampung ; ?></td>
            <td align="center"><?php echo $jmlikut; ?></td>
            <td align="center"><?php echo $jmllulus; ?></td>
            <td align="center"><?php echo $jmlbarureguler; ?></td>
            <td align="center"><?php echo $jmlbarutransfer; ?></td>
            <td align="center"><?php echo $jmlmhsreguler; ?></td>
            <td align="center"><?php echo $jmlmhstransfer; ?></td>
            <td align="center"><?php echo $lulusreguler; ?></td>
            <td align="center"><?php echo $lulustransfer; ?></td>
            <td bgcolor="white"></td>
            <td bgcolor="white"></td>
            <td bgcolor="white"></td>
            <td bgcolor="white"></td>
            <td bgcolor="white"></td>
            <td bgcolor="white"></td>
        </tr>
    </table>
	<br>
		  <h3>Standar III Mahasiswa Non Reguler</h3>
		  <br>
	 <table class="table table-bordered">
					
					<body>
						<tr>
						<th rowspan="2"><p class="text-center"> Tahun Akademik</th></p>
						<th rowspan="2"><p class="text-center"> Daya Tampung</th></p>
						<th colspan="2"><p class="text-center">Jumlah Calon Mahasiswa</p></th>
						<th colspan="2"><p class="text-center">Jumlah Mahasiswa Baru</p></th>
						<th colspan="2"><p class="text-center">Jumlah Total Mahasiswa</p></th>
						</tr>
			
						<tr>
						<th><p class="text-center">Ikut Seleksi</p></th>
						<th><p class="text-center">Lulus Seleksi</p></th>
						<th><p class="text-center">Non Reguler</p></th>
						<th><p class="text-center">Transfer</p></th>
						<th><p class="text-center">Non Reguler</p></th>
						<th><p class="text-center">Transfer</p></th>
						</tr>
					

					@foreach($tbmhsnonregulers as $value)
						<tr>
							<td align="center">{{$value->tahunAkademik}}</td>
							<td align="center">{{$value->dayaTampung}}</td>
							<td align="center">{{$value->calonMahasiswaIkut}}</td>
							<td align="center">{{$value->calonMahasiswaLulus}}</td>
							<td align="center">{{$value->mahasiswaBaruNonReguler}}</td>
							<td align="center">{{$value->mahasiswaBaruTransfer}}</td>
							<td align="center">{{$value->totalMahasiswaNonReguler}}</td>
							<td align="center">{{$value->totalMahasiswaTransfer}}</td>
							
						</tr>
					@endforeach
				
				</body>
				</table>
		<br>
		  <h3>Standar III Prestasi Mahasiswa</h3>
		  <br>	
		 <table class="table table-bordered">
					<thead>
					<th><p class="text-center">No</p></th>
					<th><p class="text-center">Nama Kegiatan</p></th>
					<th><p class="text-center">Waktu Penyelenggaraan</p></th>
					<th><p class="text-center">Tingkat (Lokal, Wilayah, Nasional, atau Internasional)</p></th>
					<th><p class="text-center">Prestasi yang Dicapai</p></th>
					

			</thead>
			<tbody>
					<?php $no=1; ?>
					@foreach($tbprestasimahasiswas as $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td>{{$value->namaKegiatan}}</td>
							<td align="center">{{$value->waktu}}</td>
							<td align="center">{{$value->tingkat}}</td>
							<td>{{$value->prestasi}}</td>
						</tr>
					@endforeach
			</tbody>
			</table>
		<br>
		  <h3>Standar III Jumlah Mahasiswa</h3>
		  <br>		
		 <table class="table table-bordered">
					
           
					<body>
   
      				  <tr>
			            <th rowspan="2"><p class="text-center">Tahun Masuk</th></p>
			            <th colspan="7"><p class="text-center">Jumlah Mahasiswa Reguler per Angkatan pada Tahun*</th></p>
			            <th rowspan="2"><p class="text-center">Jumlah Lulusan sampai dengan TS</th></p>
           
       				 </tr>
        

        <tr>
            
            <th><p class="text-center">TS-6</p></th>
            <th><p class="text-center">TS-5</p></th>
            <th><p class="text-center">TS-4</p></th>
            <th><p class="text-center">TS-3</p></th>
            <th><p class="text-center">TS-2</p></th>
            <th><p class="text-center">TS-1</p></th>
            <th><p class="text-center">TS</p></th>
           
           
        </tr>
			<?php
			$nourut= 7 ;
			$Ynow=date('Y');
			
			$sum = new App\Libraries\Fungsi;
			?>
			@foreach($tbjumlahmahasiswas as $value)
			
				<?php 
				$nourut--;
				 ?>
					 <tr>
						<td align="center"><?php echo "TS".$nourut; ?></td>
						<td align="center">
							<?php

							$jmlh = $sum->getjmlMhs($value->angkatan, $Ynow-6);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = $sum->getjmlMhs($value->angkatan, $Ynow-5);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = $sum->getjmlMhs($value->angkatan, $Ynow-4);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = $sum->getjmlMhs($value->angkatan, $Ynow-3);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = $sum->getjmlMhs($value->angkatan, $Ynow-2);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = $sum->getjmlMhs($value->angkatan, $Ynow-1);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = $sum->getjmlMhs($value->angkatan, $Ynow);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = $sum->getlulusanMhs($value->angkatan);
							echo $jmlh;
							?>
						</td>
					 </tr>
				
			@endforeach
        
    </table>
	<br>
		  <h3>Standar III Layanan Mahasiswa</h3>
		  <br>	
	<table class="table table-bordered">
					<thead>
					<th>No</th>
					<th><p class="text-center">Jenis Layanan Kepada Mahasiswa</p></th>
					<th><p class="text-center">Bentuk Kegiatan, Pelaksanaan, dan Hasilnya</th></p>
					
					

			</thead>
			<tbody>
					<?php $no=1; ?>
					@foreach($tblayananmahasiswas as  $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td align="justify">{{$value->jenisKegiatan}}</td>
							<td align="justify">{{$value->isiKegiatan}}</td>
							
						</tr>
					@endforeach
			</tbody>
			</table>	
	<br>
		  <h3>Standar III Mekanisme Lulusan</h3>
		  <br>	
	 @foreach($tbmekanismes as $value)
		  <table class="table1">
			<tr >
			<th class="text-left">Mekanisme</th>
			</tr>
			<tr>
			<td align="justify">{!!$value->mekanisme!!}</td>
			</tr>
		  </table>
		  @endforeach
	<br>
		  <h3>Standar III Evaluasi Lulusan</h3>
		  <br>		  
	 <table>
					<tr>
						<th rowspan="2"><p class="text-center">No</p></th>
						<th rowspan="2"><p class="text-center">Jenis Kemampuan</th></p>
						<th colspan="4"><p class="text-center">Tanggapan Pihak Pengguna</th></p>
						<th rowspan="2"><p class="text-center">Tindak Lanjut</th></p>
					</tr>
					

					
					<tr>
						
						<th><p class="text-center">Sangat Baik (%)</p></th>
						<th><p class="text-center">Baik (%)</p></th>
						<th><p class="text-center">Cukup (%)</p></th>
						<th><p class="text-center">Kurang (%)</p></th>
						
					</tr>	
					
				<tbody>
					<?php $no=1; 
					$total=0;
					$total1=0;
					$total2=0;
					$total3=0;?>
					@foreach($tbevaluasilulusans as $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td>{{$value->jenisKemampuan}}</td>
							<td align="center">{{$value->tanggapanSangatBaik}}</td>
							<td align="center">{{$value->tanggapanBaik}}</td>
							<td align="center">{{$value->tanggapanCukup}}</td>
							<td align="center">{{$value->tanggapanKurang}}</td>
							<td>{{$value->tindakLanjut}}</td>
							
							<?php
							$total = $value->tanggapanSangatBaik + $total;
							$total1 = $value->tanggapanBaik + $total1;
							$total2 = $value->tanggapanCukup + $total2;
							$total3 = $value->tanggapanKurang + $total3;

							?>
						</tr>
					@endforeach
							<th colspan="2"><p class="text-center">Total</th></p>
							<td align="center">{{$total}}</td>
							<td align="center">{{$total1}}</td>
							<td align="center">{{$total2}}</td>
							<td align="center">{{$total3}}</td>
							<td></td>
				</tbody>
				</table>	
	<br>
		  <h3>Standar III Himpunan Lulusan</h3>
		  <br>			
			<table class="table table-bordered">
					<thead>
					
					<th><p class="text-center">Waktu Tunggu Lulusan</p></th>
					<th><p class="text-center">Kerja Sesuai Bidang</p></th>
					<th><p class="text-center">Himpunan Alumni</p></th>
					
			</thead>
			<tbody>
					<?php ?>
					@foreach($tbalumnis as $value)
						<tr>
							
							<td align="center">{{$value->waktuTungguLulusan}}</td>
							<td align="center">{{$value->kerjaSesuaiBidang}}</td>
							<td align="center">{!! $value->himpunanAlumni !!}</td>
							
						</tr>
					@endforeach
			</tbody>
			</table>	
	</div>	  
</body>