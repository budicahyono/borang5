 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Data Master</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-file fa-fw"></i>Master Dosen
		</div>
		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p class="text-justify">Data Dosen.<br><b>Silahkan masukkan data dosen.</b></p>
		
		@if ((Auth::user()->level !='prodi') or ($masterdosen->count()== 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addmasterdosen"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">NIP</th>
					<th class="text-center middle">Nama Dosen</th>
					<th class="text-center middle">Status Kerja</th>
					<th class="text-center middle">Pangkat Terakhir</th>
					<th class="text-center middle">Fungsional Terakhir</th>
					<th width="80px" class="text-center middle">Action</th>

			</thead>
			<tbody class="text-center">
					@if ($masterdosen->count() > 0)
					@foreach($masterdosen as $value)
						<tr class="daftar soft">
							<td >{!!$value->masterprodis->namaProdi!!}</td>
							<td >{!!$value->nip!!}</td>
							<td >{!!$value->nama!!}</td>
							<td >{!!$value->statusKerja!!}</td>
							<td >{!!$value->pangkatTerakhir!!}</td>
							<td >{!!$value->fungsionalTerakhir!!}</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editmasterdosen/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delmasterdosen//{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
					@else
						<tr class="daftar soft">
							<td colspan="9" class="text-center"><b>TIDAK ADA DATA</b></td>
							
						</tr>
					@endif	
			</tbody>
			</table>
			
			
	</div>
	 
</div>

@stop 