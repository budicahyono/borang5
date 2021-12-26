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
		
	</div>	  
</body>