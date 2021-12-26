@extends('layouts.master')
@section('content')
	<br>
	<div class="col-lg-12">
		<h2>Standar VI. Laporan Pembiayaan</h2>
		<br>
		<br>
			<ul class="nav nav-tabs" >
				<li><a href="lappembiayaan">Pengelolaan dana</a></li>
            	<li><a href="lapsumberdana">Sumber dana</a></li>
				<li><a href="lappenggunaandana">Penggunaan Dana</a></li>
				<li><a href="lapdanapenelitian">Dana Penelitian</a></li>
				<li><a href="lappkm">Dana Kegiatan pelayanan/PKM</a></li>
			</ul>

				<div class="tab-content">
				<div class="tab-pane<?php if (isset($aktif)) echo $aktif ;?>" id="lappembiayaan" name="Pengelolaan Dana">
			  	<br>
			  		<div class="alert alert-info">
			  		<strong>Laporan Pengelolaan Dana </strong>
			  		<br>
			  		<br>
			  			<p></p>
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
			  		<br>
					<table class="table  table-bordered data" >
					<thead>
						<th><p class="text-center">Pengelolaan Dana</p></th>
					</thead>
					<tbody class="text-center">
					<?php  ?>
					@foreach($data as $key => $value)
						<tr>
						<td>{{$value->pengelolaanDana}}</td>
					</tr>
					@endforeach
					</tbody>
					</table>
					<?php
					}
					
					if(Session::get('level')=='user')
					{?>
					<table class="table  table-bordered data" >
					<thead>
						<th><p class="text-center">Pengelolaan Dana</p></th>
					</thead>
					<tbody class="text-center">
					<?php  ?>
					@foreach($data as $key => $value)
						<tr>
						<td>{{$value->pengelolaanDana}}</td>
					</tr>
					@endforeach
					</tbody>
					</table>
					<a class="btn btn-primary" href="{{ url('PDF/pdfpengelolaandana') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
					<?php }?>
			  		</div>

			  		<div class="tab-pane<?php if (isset($sip)) echo $sip ;?>" id="lapsumberdana" name=" Sumber Dana">
			  		<br>
			  		<div class="alert alert-info">
			  		<strong>Laporan Sumber Dana </strong>
			  		<br>
			  		<br>
			  			<p></p>
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
			  		<br>
						<table class="table  table-bordered data" >
						<thead>
							<th rowspan="2" width="100"><p class="text-center">Sumber Dana</p></th>
							<th rowspan="2" width="100"><p class="text-center">Jenis Dana</p></th>
							<th colspan="3" style='border:1px'><p class="text-center">Jumlah Dana</p></th>
						<tr>
							<th width="100"><p class="text-center">TS-2</p></th>
							<th width="100"><p class="text-center">TS-1</p></th>
							<th width="100"><p class="text-center">TS</p></th>
						</thead>
						<tbody class="text-center">

						<?php 
						$Ynow=date('Y');
						$no=1; 
						$sumberdana="";
						?>
						@foreach($data2 as $key => $value)
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
						</tbody>	
						</table>
						<?php
					}
					
					if(Session::get('level')=='user')
					{?>
					<table class="table  table-bordered data" >
						<thead>
							<th rowspan="2" width="100"><p class="text-center">Sumber Dana</p></th>
							<th rowspan="2" width="100"><p class="text-center">Jenis Dana</p></th>
							<th colspan="3" style='border:1px'><p class="text-center">Jumlah Dana</p></th>
						<tr>
							<th width="100"><p class="text-center">TS-2</p></th>
							<th width="100"><p class="text-center">TS-1</p></th>
							<th width="100"><p class="text-center">TS</p></th>
							
						</thead>
						<tbody class="text-center">
						<?php 
						$Ynow=date('Y');
						$no=1; 
						$sumberdana="";
						?>
						@foreach($data2 as $key => $value)
						<tr>
							<td>{{$value->sumberDana}}</td>
							<td>{{$value->jenisDana}}</td>
							<?php
								if($value->tahun==$Ynow-2)
									echo "<td>".Fungsi::buatrp($value->jumlahDana)."</td>
											<td></td>
											  <td></td>";
								if($value->tahun==$Ynow-1)
									echo "<td></td><td>".Fungsi::buatrp($value->jumlahDana)."</td>
										  <td></td>";
								if($value->tahun==$Ynow)
									echo "<td></td><td>".Fungsi::buatrp($value->jumlahDana)."</td>
										  <td></td>";
							?>
						</tr>

						@endforeach
						</tbody>	
						</table>
						<a class="btn btn-primary" href="{{ url('PDF/pdfsumberdana') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
					<?php }?>
					</div>

					<div class="tab-pane<?php if (isset($yes)) echo $yes ;?>" id="lappenggunaandana">
			  		<br>
			  		<div class="alert alert-info">
			  		<strong>Laporan Penggunaan Dana </strong>
			  		<br>
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
						<th rowspan="2" width="100"><p class="text-center">Jenis Penggunaan</p></th>
						<th colspan="3" style='border:1px'><p class="text-center">Presentase Dana</p></th>
					
					<tr>
						
						<th width="100"><p class="text-center">TS-2</p></th>
						<th width="100"><p class="text-center">TS-1</p></th>
						<th width="100"><p class="text-center">TS</p></th>
					</thead>
						<tbody class="text-center">
						<?php 
						$Ynow=date('Y');
						$no=1; 
						$penggunaandana="";
						?>
						@foreach($data3 as $key => $value)
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
						</tbody>
					</table>
					<?php
					}
					
					if(Session::get('level')=='user')
					{?>
				<table class="table  table-bordered data" >
					<thead>
						<th rowspan="2" width="30"><p class="text-center">No</p></th>
						<th rowspan="2" width="100"><p class="text-center">Jenis Penggunaan</p></th>
						<th colspan="3" style='border:1px'><p class="text-center">Presentase Dana</p></th>
					<tr>
						
						<th width="100"><p class="text-center">TS-2</p></th>
						<th width="100"><p class="text-center">TS-1</p></th>
						<th width="100"><p class="text-center">TS</p></th>

					</thead>
						<tbody class="text-center">
						<?php 
						$Ynow=date('Y');
						$no=1; 
						$penggunaandana="";
						?>
						@foreach($data3 as $key => $value)
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
						</tbody>
					</table>
					<a class="btn btn-primary" href="{{ url('PDF/pdfpenggunaandana') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
					<?php }?>
			  	</div>

			  	<div class="tab-pane<?php if (isset($ya)) echo $ya ;?>" id="lapdanapenelitian">
			  	<br>
			  		<div class="alert alert-info">
			  		<strong>Laporan Dana Penelitian</strong>
			  		<br>
			  		<br>
			  			<p></p>
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
			  		<br>
						<table class="table  table-bordered data" >
					<thead>
						<th width="100"><p class="text-center">Tahun</p></th>
						<th width="100"><p class="text-center">Judul Penelitian</p></th>
						<th width="100"><p class="text-center">Sumber dan Jenis<br> Dana</p></th>
						<th width="100"><p class="text-center">Jumlah Dana*<br>(dalam juta rupiah)</p></th>
					</thead>
					<tbody class="text-center">
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


						?></td>
					<?php
					$total = $value->jumlahDana + $total;
					?>
					</tr>
					@endforeach
					<th colspan="3"><p class="text-center">Jumlah</p></th>
					<td>
					<?php
						 echo Fungsi::buatrp($total);
					?>
					</td>
					</tbody>	
					</table>
					<div>
					<p> Catatan : * Di luar dana penelitian/penulisan skripsi, tesis, dan disertaisebagai bagian dari studi lanjut </p>
					</div>
					<?php
					}
					
					if(Session::get('level')=='user')
					{?>
					<table class="table  table-bordered data" >
					<thead>
						<th width="100"><p class="text-center">Tahun</p></th>
						<th width="100"><p class="text-center">Judul Penelitian</p></th>
						<th width="100"><p class="text-center">Sumber dan Jenis<br> Dana</p></th>
						<th width="100"><p class="text-center">Jumlah Dana*<br>(dalam juta rupiah)</p></th>
					</thead>
					<tbody class="text-center">
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


						?></td>
					<?php
					$total = $value->jumlahDana + $total;
					?>
					</tr>
					@endforeach
					<th colspan="3"><p class="text-center">Jumlah</p></th>
					<td>
					<?php
						 echo Fungsi::buatrp($total);
					?>
					</td>
					</tbody>	
					</table>
					
					<div>
					<p> Catatan : * Di luar dana penelitian/penulisan skripsi, tesis, dan disertaisebagai bagian dari studi lanjut </p>
					</div>
					<a class="btn btn-primary" href="{{ url('PDF/pdfdanapenelitian') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
					<?php }?>
			  	</div>

			  	<div class="tab-pane<?php if (isset($oye)) echo $oye ;?>" id="lappkm">
			  	<br>
			  		<div class="alert alert-info">
			  		<strong>Laporan Dana PKM</strong>
			  		<br>
			  		<br>
			  			<p></p>
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
			  		<br>
						<table class="table  table-bordered data" >
					<thead>
						<th width="100"><p class="text-center">Tahun</p></th>
						<th width="100"><p class="text-center">Judul Kegiatan<br> Pelayanan/Pengabdian<br> Kepada Masyarakat</p></th>
						<th width="100"><p class="text-center">Sumber dan Jenis<br> Dana</p></th>
						<th width="100"><p class="text-center">Jumlah Dana<br> (dalam juta rupiah)</p></th>
					</thead>
					<tbody class="text-center">
					<?php 
						$total = 0;
					?>
					@foreach($data5 as $key => $value)
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
					<th colspan="3"><p class="text-center">Jumlah</p></th>
					<td>
					<?php
						 echo Fungsi::buatrp($total);
					?>
					</td>
					</tbody>	
					</table>
					<?php
					}
					
					if(Session::get('level')=='user')
					{?>
					<table class="table  table-bordered data" >
					<thead>
						<th width="100"><p class="text-center">Tahun</p></th>
						<th width="100"><p class="text-center">Judul Kegiatan<br> Pelayanan/Pengabdian<br> Kepada Masyarakat</p></th>
						<th width="100"><p class="text-center">Sumber dan Jenis<br> Dana</p></th>
						<th width="100"><p class="text-center">Jumlah Dana<br> (dalam juta rupiah)</p></th>
					</thead>
					<tbody class="text-center">
					<?php 
						$total = 0;
					?>
					@foreach($data5 as $key => $value)
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
					<th colspan="3"><p class="text-center">Jumlah</p></th>
					<td>
					<?php
						 echo Fungsi::buatrp($total);
					?>
					</td>
					</tbody>	
					</table>
					<a class="btn btn-primary" href="{{ url('PDF/pdfdanakegiatanpkm') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
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
</div><!--/fluid-row-->

@stop 