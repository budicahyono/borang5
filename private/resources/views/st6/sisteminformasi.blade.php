
@extends('template.app')
@section('content')
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik VI</b> 
		</h3>
<ul class="nav nav-tabs " >
    <li class="active"><a href="#tab1"><b>Sistem Informasi</b></a></li>
    <li><a href="#tab2"><b>Aksesibilitas</b></a></li>
  </ul>
  <div class="tab-content"> 	
	<div id="tab1" class="tab-pane fade in active">
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Sistem Informasi
		</div>

		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p align="justify">sistem informasi dan fasilitas yang digunakan oleh program studi untuk proses pembelajaran (hardware, software, e-learning, perpustakaan, dll.)</p>
		
		@if ((Auth::user()->level !='prodi') or ($sisteminformasi->count()>= 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addtatapamong"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">Deskripsi</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($sisteminformasi as $value)
						<tr class="daftar soft">
							<td >{!! $value->masterprodis->namaProdi!!}</td>
							<td class="text-left">{!! $value->deskripsi !!}</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editmahasiswa/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delmahasiswa/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
					
			</tbody>
		</table>
	</div>

	<div id="tab2" class="tab-pane fade">
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Aksesibilitas
		</div>

		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p align="justify">Pilihlah sistem pengelolaan data dengan aksesibilitas tiap jenis data, dengan mengikuti format tabel berikut.</p>
		
		@if ((Auth::user()->level !='prodi') or ($aksesibilitas->count()>= 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addtatapamong"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th width="150px" class="text-center middle">Jenis Data</th>
					<th width="450px" class="text-center middle">Sistem Pengelolaan Data</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($aksesibilitas as $value)
						<tr class="daftar soft">
							<td >{!! $value->masterprodis->namaProdi!!}</td>
							<td >{!! $value->jenisData !!}</td>
							<td >{!! $value->sistemPengelolaanData !!}</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editmahasiswa/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delmahasiswa/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
					
			</tbody>
		</table>
	</div>	
	

			
	</div>
	 
</div>




@stop 