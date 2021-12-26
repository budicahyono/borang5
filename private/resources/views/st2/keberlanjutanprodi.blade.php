
@extends('template.app')
@section('content')
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik II</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Keberlanjutan Prodi
		</div>
		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p class="text-justify">Silahkan masukkan data keberlanjutan prodi disini.</p>
		
		@if ((Auth::user()->level !='prodi') or ($keberlanjutanprodi->count()>= 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addkeberlanjutanprodi"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">Jenis Upaya</th>
					<th class="text-center middle">Upaya</th>					
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($keberlanjutanprodi as $value)
						<tr class="daftar soft">
							<td >{!!$value->masterprodis->namaProdi!!}</td>
							<td class="text-left">{!!$value->jenisUpaya!!}</td>
							<td class="text-left">{!!substr($value->upaya,0,100)!!}...</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editkeberlanjutanprodi/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delkeberlanjutanprodi/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
					
			</tbody>
			</table>
			
			
	</div>
	 
</div>




@stop 