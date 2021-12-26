
@extends('template.app')
@section('content')
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik V</b> 
		</h3>
		
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Upaya Peningkatan Suasana Akademik
		</div>

		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p align="justify">Berikan gambaran yang jelas mengenai upaya dan kegiatan untuk menciptakan suasana akademik yang kondusif di lingkungan Program Studi, khususnya mengenai hal-hal berikut.<br>
	   <b>Setiap Prodi Hanya Boleh Memasukan Satu Data Saja !</b>
		</p>
		@if ((Auth::user()->level  == 'admin') or ($suasanaakademik->count() != $masterprodis->count())  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addsuasanaakademik"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">Kebijakan Suasana Akademik</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($suasanaakademik as $value)
						<tr class="daftar soft">
							<td >{!!$value->masterprodis->namaProdi!!}</td>
							<td class="text-left">{!! substr($value->kebijakanSuasanaAkademik,0,200) !!}...</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editsuasanaakademik/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delsuasanaakademik/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
				
			</tbody>
		</table>
			
			
	</div>
	 
</div>




@stop 