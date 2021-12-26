@extends('layouts.master')
@section('content')
	<br>
	<div class="col-lg-12">
		<h2>Standar VII. Laporan Penelitian</h2>
		<br>
		<br>
			<ul class="nav nav-tabs">
				<li><a href="lappenelitian">Laporan Penelitian</a></li>
				<li><a href="lapmhspenelitian">Laporan Penelitian Mahasiswa</a></li>
				<li><a href="lappenelitiandosen">Laporan Penelitian Dosen</a></li>
            	<li><a href="laphaki">Laporan HAKI</a></li>
			</ul>
			<br>
			<br>

				<div class="tab-content">
				<div class="tab-pane<?php if (isset($ko)) echo $ko ;?>" id="penelitian" name="Penelitian">
			  	<div class="alert alert-info">
			  		<strong>Laporan Penelitian </strong>
			  		<br>
			  		<br>
			  			<p>Judul penelitian yang sesuai dengan bidang keilmuan PS, yang dilakukan oleh dosen tetap yang bidang keahliannya sesuai dengan PS selama tiga tahun terakhir.
			  			</p>
			  		</div>
			  		<?php if (isset($dataprodi) and Session::get('level')!='user') {?>
                        	 <form method="post" action="">
						{{Form::label('idprodi', 'Pilih Prodi :') }} <br>
 						 <select name="idprodi">
						@foreach($dataprodi as $key => $row)
						<option value="{{$row->idprodi}}">{{$row->namaProdi}}</option> 		
						@endforeach
 						 </select>
						<input type="submit" name="submitidprodi" value="Cari" />
						<?php }?>
					</form>
					<?php
					if(isset($hasilpencarian) ) 
					{
					echo $hasilpencarian;?>
			  		<br>
			  		<br>
						<table class="table  table-bordered data" >
					<thead>
						<th width="100"><p class="text-center">Sumber Pembiayaan</p></th>
						<th width="100"><p class="text-center">TS-2</p></th>
						<th width="100"><p class="text-center">TS-1</p></th>
						<th width="100"><p class="text-center">TS</p></th>
					</thead>
					<tbody class="text-center">
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
					</tbody>
					</table>
					<div >
			  			<p>Catatan: (*) sediakan data pendukung pada saat asesmen lapangan</p>
			  		</div>
			  		<?php
					}
					
					if(Session::get('level')=='user')
					{?>
					<table class="table  table-bordered data" >
					<thead>
						<th width="100"><p class="text-center">Sumber Pembiayaan</p></th>
						<th width="100"><p class="text-center">TS-2</p></th>
						<th width="100"><p class="text-center">TS-1</p></th>
						<th width="100"><p class="text-center">TS</p></th>
					</thead>
					<tbody class="text-center">
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
					</tbody>
					</table>
					
					<div >
			  			<p>Catatan: (*) sediakan data pendukung pada saat asesmen lapangan</p>
			  			<br>
			  			
			  			<a class="btn btn-primary" href="{{ url('PDF/pdfpenelitian') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
			  		</div>

					<?php }?>
			  	</div>

			  	<div class="tab-pane<?php if (isset($oye)) echo $oye ;?>" id="mhspenelitian" name="Penelitian Mahasiswa">
			  	<div class="alert alert-info">
			  		<strong>Laporan Penelitian Mahasiswa </strong>
			  		<br>
			  		<br>
			  			<p>Jumlah mahasiswa PS yang ikut serta dalam penelitian dosen untuk menyelesaikan tugas akhir atau  skripsi.
			  			</p>
			  		</div>
			  		<?php if (isset($dataprodi) and Session::get('level')!='user') {?>
                        	 <form method="post" action="">
						{{Form::label('idprodi', 'Pilih Prodi :') }} <br>
 						 <select name="idprodi">
						@foreach($dataprodi as $key => $row)
						<option value="{{$row->idprodi}}">{{$row->namaProdi}}</option> 		
						@endforeach
 						 </select>
						<input type="submit" name="submitidprodi" value="Cari" />
						<?php }?>
					</form>
					<?php
					if(isset($hasilpencarian) ) 
					{
					echo $hasilpencarian;?>
			  		<br>
			  		<br>
				<thead>
					<th><strong>Jumlah Mahasiswa TA:</strong></th>
				</thead>
				<tbody class="text-center">
				<?php?>
				@foreach($data2 as $key => $value)
				<tr>
					<td>{{$value->jumlahMahasiswaTA}}</td>
				</tr>
				@endforeach
				</tbody>	
				<br>
				<br>
				<br>
				<div >
			  			<p>Catatan: (*) Banyaknya mahasiswa PS yang mengikuti penelitian dosen dalam menyelesaikan TA/Skripsi dalam tiga tahun terakhir</p>
			  	</div>
			  	<?php
					}
					
					if(Session::get('level')=='user')
					{?>
					<thead>
					<th><strong>Jumlah Mahasiswa TA:</strong></th>
				</thead>
				<tbody class="text-center">
				<?php?>
				@foreach($data2 as $key => $value)
				<tr>
					<td>{{$value->jumlahMahasiswaTA}}</td>
				</tr>
				@endforeach
				</tbody>
				<br>
				<div >
			  			<p>Catatan: (*) Banyaknya mahasiswa PS yang mengikuti penelitian dosen dalam menyelesaikan TA/Skripsi dalam tiga tahun terakhir</p>
			  	<br>
			  	<br>
			  	<a class="btn btn-primary" href="{{ url('PDF/pdfpenelitianmhs') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
			  	</div>
					<?php }?>
				</div>

				<div class="tab-content">
				<div class="tab-pane<?php if (isset($yey)) echo $yey ;?>" id="penelitiandosen" name="Penelitian Dosen">
			  	<div class="alert alert-info">
			  		<strong>Laporan Penelitian Dosen</strong>
			  		<br>
			  		<br>
			  			<p>Judul artikel ilmiah/karya seni/buku yang dihasilkan selama tiga tahun terakhir oleh dosen tetap yang bidang keahliannya sesuai dengan PS.
			  			</p>
			  		</div>
			  		<?php if (isset($dataprodi) and Session::get('level')!='user') {?>
                        	 <form method="post" action="">
						{{Form::label('idprodi', 'Pilih Prodi :') }} <br>
 						 <select name="idprodi">
						@foreach($dataprodi as $key => $row)
						<option value="{{$row->idprodi}}">{{$row->namaProdi}}</option> 		
						@endforeach
 						 </select>
						<input type="submit" name="submitidprodi" value="Cari" />
						<?php }?>
					</form>
					<?php
					if(isset($hasilpencarian) ) 
					{
					echo $hasilpencarian;?>
			  		<br>
			  		<br>
						<table class="table  table-bordered data" >
					<thead>
						<th rowspan="2" width="30"><p class="text-center">No</p></th>
						<th rowspan="2" width="100"><p class="text-center">Judul</p></th>
						<th rowspan="2" width="100"><p class="text-center">Nama Dosen</p></th>
						<th rowspan="2" width="100"><p class="text-center">Tahun Publikasi</p></th>
						<th colspan="3" style='border:1px'><p class="text-center">Tingkat</th>
					<tr>
						<th width="100"><p class="text-center">Lokal</p></th>
						<th width="100"><p class="text-center">Nasional</p></th>
						<th width="100"><p class="text-center">Internasional</p></th>
					</thead>
					<tbody class="text-center">
					<?php $no=1;
					$total = 0;
					$total1 = 0;
					$total2 = 0;
					  ?>
					@foreach($data3 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->judul}}</td>
						<td>{{$value->nama}}</td>
						<td>{{$value->tahunPublikasi}}</td>
					<?php
						if($value->tingkat == "Lokal"){
							echo "<td>".$value->tingkat."</td><td></td><td></td>";
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
					<th colspan="4">Total</th>
					<td>{{$total}}</td>
					<td>{{$total1}}</td>
					<td>{{$total2}}</td>
					</tbody>
					</table>
					<div >
			  			<p>Catatan: * = Tuliskan banyaknya dosen pada sel yang sesuai</p>
			  		</div>
			  		<?php
					}
					
					if(Session::get('level')=='user')
					{?>
					<table class="table  table-bordered data" >
					<thead>
						<th rowspan="2" width="30"><p class="text-center">No</p></th>
						<th rowspan="2" width="100"><p class="text-center">Judul</p></th>
						<th rowspan="2" width="100"><p class="text-center">Nama Dosen</p></th>
						<th rowspan="2" width="100"><p class="text-center">Tahun Publikasi</p></th>
						<th colspan="3" style='border:1px'><p class="text-center">Tingkat</th>
					<tr>
						<th width="100"><p class="text-center">Lokal</p></th>
						<th width="100"><p class="text-center">Nasional</p></th>
						<th width="100"><p class="text-center">Internasional</p></th>
					</thead>
					<tbody class="text-center">
					<?php $no=1;
					$total = 0;
					$total1 = 0;
					$total2 = 0;
					  ?>
					@foreach($data3 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->judul}}</td>
						<td>{{$value->nama}}</td>
						<td>{{$value->tahunPublikasi}}</td>
					<?php
						if($value->tingkat == "Lokal"){
							echo "<td>".$value->tingkat."</td><td></td><td></td>";
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
					<th colspan="4">Total</th>
					<td>{{$total}}</td>
					<td>{{$total1}}</td>
					<td>{{$total2}}</td>
					</tbody>
					</table>
					
					<div >
			  			<p>Catatan: * = Tuliskan banyaknya dosen pada sel yang sesuai</p>
			  			<br>
			  			<br>
			  			<a class="btn btn-primary" href="{{ url('PDF/pdfpenelitiandosen') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
			  		</div>
					<?php }?>
			  	</div>

			  	<div class="tab-pane<?php if (isset($yo)) echo $yo ;?>" id="haki" name="HAKI">
			  		<div class="alert alert-info">
			  		<strong>Laporan Hak atas Kekayaan Intelektual </strong>
			  		<br>
			  		<br>
			  			<p>Karya dosen dan atau mahasiwa PS yang telah memperoleh/sedang memproses perlindungan Hak atas Kekayaan Intelektual (HAKI) selama tiga tahun terakhir.
			  			</p>
			  		</div>
			  		<?php if (isset($dataprodi) and Session::get('level')!='user') {?>
                        	 <form method="post" action="">
						{{Form::label('idprodi', 'Pilih Prodi :') }} <br>
 						 <select name="idprodi">
						@foreach($dataprodi as $key => $row)
						<option value="{{$row->idprodi}}">{{$row->namaProdi}}</option> 		
						@endforeach
 						 </select>
						<input type="submit" name="submitidprodi" value="Cari" />
						<?php }?>
					</form>
					<?php
					if(isset($hasilpencarian) ) 
					{
					echo $hasilpencarian;?>
			  		<br>
			  		<br>
						<table class="table  table-bordered data" >
					<thead>
						<th width="50"><p class="text-center">No</p></th>
						<th width=""><p class="text-center">Nama Karya</p></th>
					</thead>
					<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data4 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->namaKarya}}</td>
					</tr>
					@endforeach
					</tbody>	
					</table>
					<div >
			  			<p> * Lampirkan surat paten HaKI atau keterangan sejenis</p>
			  		</div>
			  		<?php
					}
					
					if(Session::get('level')=='user')
					{?>
					<table class="table  table-bordered data" >
					<thead>
						<th width="50"><p class="text-center">No</p></th>
						<th width=""><p class="text-center">Nama Karya</p></th>
					</thead>
					<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data4 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->namaKarya}}</td>
					</tr>
					@endforeach
					</tbody>	
					</table>
					
					<div >
			  			<p> * Lampirkan surat paten HaKI atau keterangan sejenis</p>
			  			<br>
			  			<br>
			  			<a class="btn btn-primary" href="{{ url('PDF/pdfhaki') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
			  		</div>
					<?php }?>
				</div>
			</div>
<br>

<script>
	$('#myTab a').click(function (e) {
	e.preventDefault()
	$(this).tab('show')
	});
</script>

<script>
	<input type="text" class="form-control">
   	$('#sandbox-container input').datepicker({
   	});
</script>

</div>
</div><!--/#content.span10-->
<div><!--/fluid-row-->

@stop 