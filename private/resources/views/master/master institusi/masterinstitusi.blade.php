 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Data Master</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-file fa-fw"></i>Master Institusi
		</div>
		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p class="text-justify">Data Institusi.<br><b>Silahkan masukkan data institusi.</b></p>
		
		@if ((Auth::user()->level !='prodi') or ($masterinstitut->count()== 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addmasterInstitusi"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th class="text-center middle">ID Institusi</th>
					<th class="text-center middle">Nama Institusi</th>
					<th class="text-center middle">Tingkat Institusi</th>
					<th class="text-center middle">Jenis</th>
					<th width="80px" class="text-center middle">Action</th>

			</thead>
			<tbody class="text-center">
					@if ($masterinstitut->count() > 0)
					@foreach($masterinstitut as $value)
						<tr class="daftar soft">
							<td >{!!$value->idinstitusi!!}</td>
							<td >{!!$value->namaInstitusi!!}</td>
							<td >{!!$value->tingkat!!}</td>
							<td >{!!$value->jenis!!}</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editmasterinstitusi/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delmasterinstitusi//{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
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