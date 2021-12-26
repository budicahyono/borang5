
@extends('template.app')
@section('content')
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik VII</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Kerjasama
		</div>

		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p align="justify">Berikut instansi yang menjalin kerjasama yang terkait dengan program studi/jurusan.</p>
		
		@if ((Auth::user()->level !='prodi') or ($kerjasama->count()>= 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addtatapamong"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th class="text-center">Program Studi</th>
					<th class="text-center">Nama Institusi</th>
					<th class="text-center">Jenis Kegiatan</th>
					<th class="text-center">Nama Kegiatan</th>
					<th class="text-center">Tahun Mulai</th>
					<th class="text-center">Tahun Selesai</th>
					<th class="text-center">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($kerjasama as $value)
						<tr class="daftar soft">
							<td >{!! $value->masterprodis->namaProdi!!}</td>
							<td >{!! $value->masterinstituses->namaInstitusi !!}</td>
							<td >{!! $value->jenisKegiatan !!}</td>
							<td >{!! $value->namaKegiatan !!}</td>
							<td >{!! $value->tahunMulai !!}</td>
							<td >{!! $value->tahunSelesai !!}</td>
							<td  class="text-center">
							<span>
							<a href="editmahasiswa/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a href="delmahasiswa/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
					
			</tbody>
		</table>
			
			
	</div>
	 
</div>




@stop 