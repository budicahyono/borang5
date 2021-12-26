 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Data Master</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-file fa-fw"></i>Master Mata Kuliah
		</div>
		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p class="text-justify">Data Mata Kuliah.<br><b>Silahkan masukkan data mata kuliah tiap prodi.</b></p>
		
		@if ((Auth::user()->level !='prodi') or ($mastermatakuliah->count()== 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addmastermatakuliah"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th class="text-center middle">Semester</th>
					<th class="text-center middle">ID Mata Kuliah</th>
					<th class="text-center middle">Nama Mata Kuliah</th>
					<th class="text-center middle">Jenis Mata Kuliah</th>
					<th class="text-center middle">SKS</th>
					<th class="text-center middle">Bobot Tugas</th>
					<th class="text-center middle">Kurikulum</th>
					<th width="150px" class="text-center middle">Program Studi</th>
					<th width="80px" class="text-center middle">Action</th>

			</thead>
			<tbody class="text-center">
					@if ($mastermatakuliah->count() > 0)
					@foreach($mastermatakuliah as $value)
						<tr class="daftar soft">
							<td >{!!$value->semester!!}</td>
							<td >{!!$value->idmatakuliah!!}</td>
							<td >{!!$value->namaMataKuliah!!}</td>
							<td >{!!$value->jenisMataKuliah!!}</td>
							<td >{!!$value->sks!!}</td>
							<td >{!!$value->bobot_tugas!!}</td> 							
							<td >{!!$value->masterkurikulums->deskripsi!!}</td>
							<td >{!!$value->masterprodis->namaProdi!!}</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editmastermatakuliah/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delmastermatakuliah//{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
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