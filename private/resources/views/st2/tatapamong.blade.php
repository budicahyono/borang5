
@extends('template.app')
@section('content')
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik II</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Tata Pamong
		</div>
		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p class="text-justify">Silahkan masukkan data tata pamong disini.<br><b>Setiap Prodi Hanya Boleh Memasukan Satu Data Saja!!</b></p>
		
		@if ((Auth::user()->level =='admin') or ($tatapamong->count() != $masterprodis->count())  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addtatapamong"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">Tata Pamong</th>
					<th class="text-center middle">Kepemimpinan</th>
					<th class="text-center middle">Sistem Pengelolaan</th>
					<th class="text-center middle">Penjaminan Mutu</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					@foreach($tatapamong as $value)
						<tr class="daftar soft">
							<td >{!!$value->masterprodis->namaProdi!!}</td>
							<td class="text-left">{!!substr($value->tataPamong,0,100)!!}..</td>
							<td class="text-left">{!!substr($value->kepemimpinan,0,100)!!}...</td>
							<td class="text-left">{!!substr($value->sistemPengelolaan,0,100)!!}...</td>
							<td class="text-left">{!!substr($value->penjaminanMutu,0,100)!!}...</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="edittatapamong/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="deltatapamong/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
					
			</tbody>
			</table>
			
			
	</div>
	 
</div>




@stop 