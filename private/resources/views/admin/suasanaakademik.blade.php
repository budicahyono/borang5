
@extends('layouts.master')
@section('content')
	<br>
	<div class="col-lg-12">
		<h2>Standar V. Upaya Peningkatan Suasana Akademik</h2><br><br>
			<ul class="nav nav-tabs" id="myTab">
			  <li class="active"><a href="#peningkatansuasanaakademik">Peningkatan Suasana Akademik</a></li>
			</ul>



			@if(Session::get('level')=='')
			<div class="tab-content">
			  <div class="tab-pane <?php if(isset($aktif)) echo $aktif ;?>" id="peningkatansuasanaakademik" name="peningkatansuasanaakademik">
			  		<br>
			  		<br>
			  		<div class="alert alert-info">
                          <strong>Peningkatan Suasana Akademik</strong><br/>
                          Berikan gambaran yang jelas mengenai upaya dan kegiatan untuk menciptakan suasana akademik yang kondusif di lingkungan PS, khususnya mengenai hal-hal berikut:
                          <br>
                          <br>
                          <p><strong>Setiap Prodi Hanya Boleh Memasukan Satu Data Saja !</strong></p>
                        </div>
					<br>
					<table class="table  table-bordered data" >
					<thead>
					<th width="20px"><p class="text-center">No</p></th>
					<th width="50px"><p class="text-center">ID Prodi</p></th>
					<th width="100px"><p class="text-center">Kebijakan Suasana Akademik</p></th>
					

			</thead>
			<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data as $key => $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td align="center">{{$value->idprodi}}</td>
							<td align="justify">{{$value->kebijakanSuasanaAkademik}}</td>
							

						</tr>
					@endforeach
			</tbody>
			</table>
			<br>
			<br>

			<table class="table  table-bordered data" >
					<thead>
					<th width="20px"><p class="text-center">No</p></th>
					<th width="50px"><p class="text-center">ID Prodi</p></th>
					<th width="100px"><p class="text-center">Ketersediaan Sarana Prasarana</p></th>
					
			</thead>
			<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data as $key => $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td align="center">{{$value->idprodi}}</td>
							<td align="justify">{{$value->ketersediaanSaranaPrasarana}}</td>
							
						</tr>
					@endforeach
			</tbody>
			</table>
			<br>
			<br>

			<table class="table  table-bordered data" >
					<thead>
					<th width="20px"><p class="text-center">No</p></th>
					<th width="50px"><p class="text-center">ID Prodi</p></th>
					<th width="100px"><p class="text-center">Kegiatan Luar Pembelajaran</p></th>
					
			</thead>
			<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data as $key => $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td align="center">{{$value->idprodi}}</td>
							<td align="justify">{{$value->ketersediaanSaranaPrasarana}}</td>
							
						</tr>
					@endforeach
			</tbody>
			</table>
			<br>
			<br>

			<table class="table  table-bordered data" >
					<thead>
					<th width="20px"><p class="text-center">No</p></th>
					<th width="50px"><p class="text-center">ID Prodi</p></th>
					<th width="100px"><p class="text-center">Interaksi Akademik</p></th>
					
			</thead>
			<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data as $key => $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td align="center">{{$value->idprodi}}</td>
							<td align="justify">{{$value->interaksiAkademik}}</td>
							
						</tr>
					@endforeach
			</tbody>
			</table>
			<br>
			<br>

			<table class="table  table-bordered data" >
					<thead>
					<th width="20px"><p class="text-center">No</p></th>
					<th width="50px"><p class="text-center">ID Prodi</p></th>
					<th width="100px"><p class="text-center">Pengembangan Perilaku Kecendekiawan</p></th>

			</thead>
			<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data as $key => $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td align="center">{{$value->idprodi}}</td>
							<td align="justify">{{$value->pengembanganPerilakuKecendekiawan}}</td>
						
						</tr>
					@endforeach
			</tbody>
			</table>

			  </div>
			   @endif


			   @if(Session::get('level')=='admin')
			<div class="tab-content">
			  <div class="tab-pane <?php if(isset($aktif)) echo $aktif ;?>" id="peningkatansuasanaakademik" name="peningkatansuasanaakademik">
			  		<br>
			  		<br>
			  		<div class="alert alert-info">
                          <strong>Peningkatan Suasana Akademik</strong><br/>
                          Berikan gambaran yang jelas mengenai upaya dan kegiatan untuk menciptakan suasana akademik yang kondusif di lingkungan PS, khususnya mengenai hal-hal berikut:
                           <br>
                          <br>
                          <p><strong>Setiap Prodi Hanya Boleh Memasukan Satu Data Saja !</strong></p>
                        </div>
					<br>
					<table class="table  table-bordered data" >
					<thead>
					<th width="20px"><p class="text-center">No</p></th>
					<th width="50px"><p class="text-center">ID Prodi</p></th>
					<th width="100px"><p class="text-center">Kebijakan Suasana Akademik</p></th>
					<th width="50px"><p class="text-center">Action</p></th>

			</thead>
			<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data as $key => $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td align="center">{{$value->idprodi}}</td>
							<td align="justify">{{$value->kebijakanSuasanaAkademik}}</td>
							<td align="center"><a href="editsuasanaakademik/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="suasanaakademik/delete/{{$value->id}}" class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></a></td>

						</tr>
					@endforeach
			</tbody>
			</table>
			<br>
			<br>

			<table class="table  table-bordered data" >
					<thead>
					<th width="20px"><p class="text-center">No</p></th>
					<th width="50px"><p class="text-center">ID Prodi</p></th>
					<th width="100px"><p class="text-center">Ketersediaan Sarana Prasarana</p></th>
					<th width="50px"><p class="text-center">Action</p></th>

			</thead>
			<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data as $key => $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td align="center">{{$value->idprodi}}</td>
							<td align="justify">{{$value->ketersediaanSaranaPrasarana}}</td>
							<td align="center"><a href="editsuasanaakademik/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="suasanaakademik/delete/{{$value->id}}" class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></a></td>
						</tr>
					@endforeach
			</tbody>
			</table>
			<br>
			<br>

			<table class="table  table-bordered data" >
					<thead>
					<th width="20px"><p class="text-center">No</p></th>
					<th width="50px"><p class="text-center">ID Prodi</p></th>
					<th width="100px"><p class="text-center">Kegiatan Luar Pembelajaran</p></th>
					<th width="50px"><p class="text-center">Action</p></th>

			</thead>
			<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data as $key => $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td align="center">{{$value->idprodi}}</td>
							<td align="justify">{{$value->ketersediaanSaranaPrasarana}}</td>
							<td align="center"><a href="editsuasanaakademik/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="suasanaakademik/delete/{{$value->id}}" class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></a></td>
						</tr>
					@endforeach
			</tbody>
			</table>
			<br>
			<br>

			<table class="table  table-bordered data" >
					<thead>
					<th width="20px"><p class="text-center">No</p></th>
					<th width="50px"><p class="text-center">ID Prodi</p></th>
					<th width="100px"><p class="text-center">Interaksi Akademik</p></th>
					<th width="50px"><p class="text-center">Action</p></th>

			</thead>
			<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data as $key => $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td align="center">{{$value->idprodi}}</td>
							<td align="justify">{{$value->interaksiAkademik}}</td>
							<td align="center"><a href="editsuasanaakademik/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="suasanaakademik/delete/{{$value->id}}" class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></a></td>
						</tr>
					@endforeach
			</tbody>
			</table>
			<br>
			<br>

			<table class="table  table-bordered data" >
					<thead>
					<th width="20px"><p class="text-center">No</p></th>
					<th width="50px"><p class="text-center">ID Prodi</p></th>
					<th width="100px"><p class="text-center">Pengembangan Perilaku Kecendekiawan</p></th>
					<th width="50px"><p class="text-center">Action</p></th>

			</thead>
			<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data as $key => $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td align="center">{{$value->idprodi}}</td>
							<td align="justify">{{$value->pengembanganPerilakuKecendekiawan}}</td>
							<td align="center"><a href="editsuasanaakademik/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="suasanaakademik/delete/{{$value->id}}" class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></a></td>
						</tr>
					@endforeach
			</tbody>
			</table>

				<a href="addsuasanaakademik"><button type="button" class='btn btn-primary'><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
				
			</div>
			   @endif

			@if(Session::get('level')=='user')
			<div class="tab-content">
			  <div class="tab-pane <?php if(isset($aktif)) echo $aktif ;?>" id="peningkatansuasanaakademik" name="peningkatansuasanaakademik">
			  		<br>
			  		<br>
			  		<div class="alert alert-info">
                          <strong>Peningkatan Suasana Akademik</strong><br/>
                          Berikan gambaran yang jelas mengenai upaya dan kegiatan untuk menciptakan suasana akademik yang kondusif di lingkungan PS, khususnya mengenai hal-hal berikut:
                           <br>
                          <br>
                          <p><strong>Setiap Prodi Hanya Boleh Memasukan Satu Data Saja !</strong></p>
                        </div>
					<br>
					<table class="table  table-bordered data" >
					<thead>
					<th width="100px"><p class="text-center">Kebijakan Suasana Akademik</p></th>
					
			</thead>
			<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data as $key => $value)
						<tr>
							<td align="justify">{{$value->kebijakanSuasanaAkademik}}</td>
							
						</tr>
					@endforeach
			</tbody>
			</table>
			<br>
			<br>

			<table class="table  table-bordered data" >
					<thead>
					<th width="100px"><p class="text-center">Ketersediaan Sarana Prasarana</p></th>
					

			</thead>
			<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data as $key => $value)
						<tr>
							<td align="justify">{{$value->ketersediaanSaranaPrasarana}}</td>
							
						</tr>
					@endforeach
			</tbody>
			</table>
			<br>
			<br>

			<table class="table  table-bordered data" >
					<thead>
					<th width="100px"><p class="text-center">Kegiatan Luar Pembelajaran</p></th>
					
			</thead>
			<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data as $key => $value)
						<tr>
							<td align="justify">{{$value->kegiatanLuarPembelajaran}}</td>
						
						</tr>
					@endforeach
			</tbody>
			</table>
			<br>
			<br>

			<table class="table  table-bordered data" >
					<thead>
					<th width="100px"><p class="text-center">Interaksi Akademik</p></th>
					
			</thead>
			<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data as $key => $value)
						<tr>
							<td align="justify">{{$value->interaksiAkademik}}</td>
						</tr>
					@endforeach
			</tbody>
			</table>
			<br>
			<br>

			<table class="table  table-bordered data" >
					<thead>
					<th width="100px"><p class="text-center">Pengembangan Perilaku Kecendekiawan</p></th>
					

			</thead>
			<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data as $key => $value)
						<tr>
							<td align="justify">{{$value->pengembanganPerilakuKecendekiawan}}</td>
							
						</tr>
					@endforeach
			</tbody>
			</table>

				@if (count($data) < 1)
				<a href="addsuasanaakademik"><button type="button" class='btn btn-primary'><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
				@endif
				@foreach($data as $key => $value)
				<tr>
				<td align="center"><a href="editsuasanaakademik/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="suasanaakademik/delete/{{$value->id}}" class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></a></td>
				</tr>
				@endforeach

			  </div>
			   @endif

			<script>
			$('#myTab a').click(function (e) {
			  e.preventDefault()
			  $(this).tab('show')
			});
			</script>

	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 