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
		
	</div>	  
</body>