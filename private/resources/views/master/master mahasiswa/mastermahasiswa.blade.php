 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Data Master</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-file fa-fw"></i>Master Mahasiswa
		</div>
		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p class="text-justify">Data Mahasiswa.<br><b>Silahkan masukkan data mahasiswa.</b></p>
		
		@if ((Auth::user()->level !='prodi') or ($mastermahasiswa->count()== 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addmastermahasiswa"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					
					<th class="text-center middle">NIM</th>
					<th class="text-center middle">Nama Mahasiswa</th>
					<th class="text-center middle">Jenis Kelamin</th>
					<th class="text-center middle">Alamat</th>
					<th class="text-center middle">Angkatan</th>
					<th class="text-center middle">Status</th>
					<th class="text-center middle">Status Reguler</th>
					<th width="150px" class="text-center middle">Program Studi</th>
					<th width="80px" class="text-center middle">Action</th>

			</thead>
			<tbody class="text-center">
					@if ($mastermahasiswa->count() > 0)
					@foreach($mastermahasiswa as $value)
						<tr class="daftar soft">
							
							<td >{!!$value->nim!!}</td>
							<td >{!!$value->namaMahasiswa!!}</td>
							<td >@if ($value->jenisKelamin == "L") {!!  "Laki-Laki" !!} @else {!! "Perempuan" !!} @endif</td>
							<td >{!!$value->alamat!!}</td>
							<td >{!!$value->angkatan!!}</td>
							<td >@if ($value->status == "TA")  {!!  "Tidak Aktif" !!}  @else {!! "Aktif" !!} @endif</td>
							<td >@if ($value->statusReguler == "1") {!!  "Reguler" !!}  @else {!! "Non Reguler" !!} @endif</td>
							<td >{!!$value->masterprodis->namaProdi!!}</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editmastermahasiswa/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delmastermahasiswa//{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
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