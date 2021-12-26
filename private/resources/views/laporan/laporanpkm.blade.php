@extends('layouts.master')
@section('content')
	<br>
	<div class="col-lg-12">
		<h2>Standar VII. Laporan Pelayanan/Pengabdian Kepada Masyarakat</h2>
		<br>
		<br>
			<ul class="nav nav-tabs">
				<li><a href="laporanpkm">Laporan Kegiatan PKM</a></li>
				<li><a href="lappkmmhs">Laporan PKM Mahasiswa</a></li>
			</ul>
			<br>
			<br>

				<div class="tab-content">
				<div class="tab-pane<?php if (isset($ko)) echo $ko ;?>" id="penelitian" name="Penelitian">
			  	<div class="alert alert-info">
			  		<strong>Laporan Kegiatan PKM</strong>
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
						<th width="100"><p class="text-center">Sumber Dana Kegiatan<br>Pelayana/Pengabdian Kepada<br>Masyarakat</p></th>
						<th width="100"><p class="text-center">TS-2</p></th>
						<th width="100"><p class="text-center">TS-1</p></th>
						<th width="100"><p class="text-center">TS</p></th>
					</thead>
					
					<tbody class="text-center">
					<?php  
					$Ynow=date('Y');
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
			  			<p>Catatan: (*) Pelayana/Pengabdian Kepada Masyarakat adalah penerapan bidang ilmu untuk menyelesaikan masalah di masyarakat(termasuk masyarakat industri, pemerintah, dsb)</p>
			  		</div>
			  		<?php
					}
					
					if(Session::get('level')=='user')
					{?>
					<table class="table  table-bordered data" >
					<thead>
						<th width="100"><p class="text-center">Sumber Dana Kegiatan<br>Pelayana/Pengabdian Kepada<br>Masyarakat</p></th>
						<th width="100"><p class="text-center">TS-2</p></th>
						<th width="100"><p class="text-center">TS-1</p></th>
						<th width="100"><p class="text-center">TS</p></th>
					</thead>
					
					<tbody class="text-center">
					<?php  
					$Ynow=date('Y');
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
			  			<p>Catatan: (*) Pelayana/Pengabdian Kepada Masyarakat adalah penerapan bidang ilmu untuk menyelesaikan masalah di masyarakat(termasuk masyarakat industri, pemerintah, dsb)</p>
			  			<br>
			  			<br>
			  			<a class="btn btn-primary" href="{{ url('PDF/pdfkegiatanpkm') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
			  		</div>
					<?php }?>
			  	</div>

			  	<div class="tab-pane<?php if (isset($oye)) echo $oye ;?>" id="mhspenelitian" name="Penelitian Mahasiswa">
			  	<div class="alert alert-info">
			  		<strong>Laporan PKM Mahasiswa </strong>
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
					<th><strong>Jumlah Mahasiswa:</strong></th>
				</thead>
				<tbody class="text-center">
				<?php?>
				@foreach($data2 as $key => $value)
				<tr>
					<td>{{$value->jumlahMahasiswa}}</td>
				</tr>
				@endforeach
				</tbody>
				<br>
				<br>
				<br>	
				<div >
			  			<p>Catatan: (*) mahasiswa yang dilibatkan dalam kegiatan pelayanan/pengabdian kepada masyarakat dalam tiga tahun terakhir</p>
			  		</div>
			  		<?php
					}
					
					if(Session::get('level')=='user')
					{?>
					<thead>
					<th><strong>Jumlah Mahasiswa:</strong></th>
				</thead>
				<tbody class="text-center">
				<?php?>
				@foreach($data2 as $key => $value)
				<tr>
					<td>{{$value->jumlahMahasiswa}}</td>
				</tr>
				@endforeach
				</tbody>
				<br>
				<br>
				
				<br>
				<br>
				<br>	
				<div >
			  			<p>Catatan: (*) mahasiswa yang dilibatkan dalam kegiatan pelayanan/pengabdian kepada masyarakat dalam tiga tahun terakhir</p>
			  			<br>
			  			<br>
			  			<a class="btn btn-primary" href="{{ url('PDF/pdfpkmmhs') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>

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