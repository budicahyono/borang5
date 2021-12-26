 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Data Master</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-file fa-fw"></i>Master Data Ketenagapendidikan
		</div>
		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p class="text-justify">Data Ketenagapendidikan.<br><b>Silahkan masukkan data Ketenagapendidikan.</b></p>
		
		@if ((Auth::user()->level !='prodi') or ($masterketenagapendidikan->count()== 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addmasterketenagapendidikan"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th class="text-center middle">Fakultas</th>
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">NIP</th>
					<th class="text-center middle">Nama</th>
					<th class="text-center middle">Alamat</th>
					<th class="text-center middle">Tempat Lahir</th>
					<th class="text-center middle">Tanggal Lahir</th>
					<th class="text-center middle">Jenis Kelamin</th>
					<th class="text-center middle">Jenis</th>	
					<th class="text-center middle">Jenjang Pendidikan Terakhir</th>
					<th class="text-center middle">Unit Kerja</th>
					<th width="80px" class="text-center middle">Action</th>

			</thead>
			<tbody class="text-center">
					@if ($masterketenagapendidikan->count() > 0)
					@foreach($masterketenagapendidikan as $value)
						<tr class="daftar soft">
							<td >{!!$value->masterfakultas->namaFakultas!!}</td>
							<td >{!!$value->masterprodis->namaProdi!!}</td>
							<td >{!!$value->nip!!}</td>
							<td >{!!$value->nama!!}</td>
							<td >{!!$value->alamat!!}</td>
							<td >{!!$value->tempatLahir!!}</td> 	
							<td >{!!$value->tanggalLahir!!}</td> 	
							<td >@if ($value->jenisKelamin == "L") {!!  "Laki-Laki" !!} @else {!! "Perempuan" !!} @endif</td>
							<td >{!!$value->jenis!!}</td> 	
							<td >{!!$value->jenjangPendidikanTerakhir!!}</td> 	
							<td >{!!$value->unitKerja!!}</td> 
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editmasterketenagapendidikan/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delmasterketenagapendidikan//{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
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