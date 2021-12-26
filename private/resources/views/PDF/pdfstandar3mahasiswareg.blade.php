<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Mahasiswa Reguler</title>
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
				<h3>STANDAR 3. KEMAHASISWAAN DAN LULUSAN</h3>	
			</div>
			<br>

3.1  Profil Mahasiswa dan Lulusan <br>
<br>
3.1.1 Tuliskan data seluruh mahasiswa reguler(1) dan lulusannya dalam lima tahun terakhir dengan mengikuti format tabel berikut: <br>
<br>
			<table class="tg">
			  <tr>
			            <th rowspan="2"><p class="text-center"> Tahun Akademik</th></p>
			            <th rowspan="2"><p class="text-center"> Daya Tampung</th></p>
			            <th colspan="2"><p class="text-center">Jumlah Calon Mahasiswa Reguler</th></p>
			            <th colspan="2"><p class="text-center">Jumlah Mahasiswa Baru</th></p>
			            <th colspan="2"><p class="text-center">Jumlah Total Mahasiswa </th></p>
			            <th colspan="2"><p class="text-center">Jumlah Lulusan</th></p>
			            <th colspan="3"><p class="text-center">IPK Lulusan Reguler</th></p>
			            <th colspan="3"><p class="text-center">Persentase Lulusan Reguler dengan IPK :</th></p>        
       				 
        	
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
           @foreach($data as $key => $value)
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
		</body>
	</head>
</html>