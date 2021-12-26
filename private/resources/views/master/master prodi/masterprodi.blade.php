 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Data Master</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-file fa-fw"></i>Master Data Program Studi
		</div>
		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p class="text-justify">Data program studi.<br><b>Silahkan masukkan data program studi.</b></p>
		
		@if ((Auth::user()->level !='prodi') or ($masterprodi->count()== 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addmasterprodi"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th class="text-center middle">ID Prodi</th>
					<th class="text-center middle">Nama Prodi</th>
					<th class="text-center middle">Fakultas</th>
					<th class="text-center middle">Jenjang</th>
					<th class="text-center middle">Ketua Program Studi</th>
					<th class="text-center middle">Minimal SKS Lulus</th>
					<th width="80px" class="text-center middle">Action</th>

			</thead>
			<tbody class="text-center">
					@if ($masterprodi->count() > 0)
					@foreach($masterprodi as $value)
						<tr class="daftar soft">
							<td >{!!$value->idprodi!!}</td>
							<td >{!!$value->namaProdi!!}</td>
							<td >{!!$value->masterfakultas->namaFakultas!!}</td>
							<td >{!!$value->jenjang!!}</td>
							<td >{!!$value->kaprodi!!}</td>
							<td >{!!$value->minSksLulus!!}</td> 	
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editmasterprodi/{!!$value->idprodi!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delmasterprodi/{!!$value->idprodi!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
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