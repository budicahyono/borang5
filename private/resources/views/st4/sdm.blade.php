
@extends('template.app')
@section('content')
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik IV</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Sistem Seleksi dan Pengembangan & Monitoring dan Evaluasi
		</div>

		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p class="text-justify">Berikut merupakan data mengenai Sistem Seleksi dan Pengembangan & Monitoring dan Evaluasi.<br><b> Setiap Prodi Hanya Boleh Memasukan Satu Data Saja !</b></p>

		@if ((Auth::user()->level =='admin') or ($sdm->count() != $masterprodis->count())  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addsdm"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">Sistem Seleksi dan Pengembangan</th>
					<th class="text-center middle">Monitoring dan Evaluasi</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
						
					@foreach($sdm as $value)
						<tr class="daftar soft">
							<td >{!!$value->masterprodis->namaProdi!!}</td>
							<td class="text-left">{!!substr($value->sistemSeleksi,0,200)!!}...</td>
							<td class="text-left">{!!substr($value->monev,0,200)!!}...</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editsdm/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delsdm/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
			</tbody>
		</table>
			
			
	</div>
	 
</div>




@stop 