@extends('layouts.master')
@section('content')
	<br>
	<div class="col-lg-12">
		<h2>Satandar VI. Laporan Sistem Informasi</h2>
		<br>
		<br>
			<ul class="nav nav-tabs">
				<li><a href="lapsisteminformasi">Sistem Informasi</a></li>
            	<li><a href="lapaksesibilitas">Aksesibilitas</a></li>
			</ul>

				<div class="tab-content">
				<div class="tab-pane<?php if (isset($sistem)) echo $sistem ;?>" id="lapsisteminformasi" name="Sistem Informasi">
			  	<div class="alert alert-info">
			  		<strong>Laporan Sistem Informasi </strong>
			  		<br>
			  		<br>
			  			<p>Data sistem informasi dan fasilitas yang digunakan oleh program studi untuk proses pembelajaran (hardware, software, e-learning, perpustakaan, dll.)
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
						<th width="100"><p class="text-center">No</p></th>
						<th><p class="text-center">Deskripsi</p></th>
					</thead>
					<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->deskripsi}}</td>
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
						<th width="100"><p class="text-center">No</p></th>
						<th><p class="text-center">Deskripsi</p></th>
					</thead>
					<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->deskripsi}}</td>
					</tr>
					@endforeach
					</tbody>
					</table>
					<a class="btn btn-primary" href="{{ url('PDF/pdfsisteminformasi') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
					<?php }?>
			  	</div>

			  	<div class="tab-pane<?php if (isset($yeah)) echo $yeah ;?>" id="aksesibilitas" name="Aksesibilitas">
			  	<div class="alert alert-info">
			  		<strong>Laporan Aksesibilitas</strong>
			  		<br>
			  		<br>
			  			<p>
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
					<th rowspan="2" width="100"><p class="text-center">Jenis Data</p></th>
					<th colspan="4" style='border:1px'><p class="text-center">Sistem Pengelolaan Data</p></th>
				<tr>
						<th width="100"><p class="text-center">Secara Manual</p></th>
						<th width="100"><p class="text-center">Dengan Komputer Tanpa Jaringan</p></th>
						<th width="100"><p class="text-center">Dengan Komputer Jaringan Lokal (LAN)</p></th>
						<th width="100"><p class="text-center">Dengan Komputer Jaringan LUAS (WAN)</p></th>
				</thead>
				<tbody class="text-center">
				<?php $no=1; ?>
				@foreach($data2 as $key => $value)
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
				</tbody>	
				</table>
				<?php
					}
					
					if(Session::get('level')=='user')
					{?>
					<table class="table  table-bordered data" >
				<thead>
					<th rowspan="2" width="30"><p class="text-center">No</p></th>
					<th rowspan="2" width="100"><p class="text-center">Jenis Data</p></th>
					<th colspan="4" style='border:1px'><p class="text-center">Sistem Pengelolaan Data</p></th>
				<tr>
						<th width="100"><p class="text-center">Secara Manual</p></th>
						<th width="100"><p class="text-center">Dengan Komputer Tanpa Jaringan</p></th>
						<th width="100"><p class="text-center">Dengan Komputer Jaringan Lokal (LAN)</p></th>
						<th width="100"><p class="text-center">Dengan Komputer Jaringan LUAS (WAN)</p></th>
				</thead>
				<tbody class="text-center">
				<?php $no=1; ?>
				@foreach($data2 as $key => $value)
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
				</tbody>	
				</table>
				<a class="btn btn-primary" href="{{ url('PDF/pdfaksesibilitasdata') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
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