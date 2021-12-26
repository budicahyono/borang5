
@extends('template.app')
@section('content')
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik VII</b> 
		</h3>
<ul class="nav nav-tabs " >
    <li class="active"><a href="#tab1"><b>Penelitian</b></a></li>
    <li><a href="#tab2"><b>Penelitian Mahasiswa</b></a></li>
    <li><a href="#tab3"><b>Penelitian Dosen</b></a></li>
    <li><a href="#tab4"><b>HAKI</b></a></li>
  </ul>
  <div class="tab-content"> 	
	<div id="tab1" class="tab-pane fade in active">
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Penelitian
		</div>

		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p align="justify">Jumlah judul penelitian yang sesuai dengan bidang keilmuan Program Studi, yang dilakukan oleh dosen tetap yang bidang keahliannya sesuai dengan Program Studi.</p>
		
		@if ((Auth::user()->level !='prodi') or ($penelitian->count()>= 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addtatapamong"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">Sumber Biaya</th>
					<th class="text-center middle">Tahun</th>
					<th class="text-center middle">Jumlah</th>
					<th class="text-center middle">Jenis Kegiatan</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($penelitian as $value)
						<tr class="daftar soft">
							<td >{!! $value->masterprodis->namaProdi!!}</td>
							<td >{!! $value->masterbiayapenelitians->sumberBiaya !!}</td>
							<td >{!! $value->tahun !!}</td>
							<td >{!! $value->jumlah !!}</td>
							<td >{!! $value->jenisKegiatan !!}</td>
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
			   <i class="fa fa-th-list fa-fw"></i>Penelitian Mahasiswa
		</div>

		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p align="justify">Jumlah mahasiswa PS yang ikut serta dalam penelitian dosen untuk menyelesaikan tugas akhir atau  skripsi</p>
		
		@if ((Auth::user()->level !='prodi') or ($mhs->count()>= 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addtatapamong"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th width="150px" class="text-center middle">Jumlah Mahasiswa</th>
					<th width="150px" class="text-center middle">Jumlah Mahasiswa TA</th>
					<th width="250px" class="text-center middle">Jenis Kegiatan</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($mhs as $value)
						<tr class="daftar soft">
							<td >{!! $value->masterprodis->namaProdi!!}</td>
							<td >{!! $value->jumlahMahasiswa !!}</td>
							<td >{!! $value->jumlahMahasiswaTA !!}</td>
							<td >{!! $value->jenisKegiatan !!}</td>
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
	
	<div id="tab3" class="tab-pane fade">
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Penelitian Dosen
		</div>

		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p align="justify">Judul artikel ilmiah/karya seni/buku yang dihasilkan oleh dosen tetap yang bidang keahliannya sesuai dengan PS.</p>
		
		@if ((Auth::user()->level !='prodi') or ($dosen->count()>= 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addtatapamong"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th width="120px" class="text-center middle">NIP</th>
					<th width="150px" class="text-center middle">Nama Dosen</th>
					<th width="150px" class="text-center middle">Judul</th>
					<th width="150px" class="text-center middle">Jurnal</th>
					<th class="text-center middle">Tahun Publikasi</th>
					<th class="text-center middle">Tingkat</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($dosen as $value)
						<tr class="daftar soft">
							<td >{!! $value->masterprodis->namaProdi!!}</td>
							<td >{!! $value->nip !!}</td>
							<td >{!! $value->masterdosens->nama !!}</td>
							<td >{!! $value->judul !!}</td>
							<td >{!! $value->jurnal !!}</td>
							<td >{!! $value->tahunPublikasi !!}</td>
							<td >{!! $value->tingkat !!}</td>
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
	
	<div id="tab4" class="tab-pane fade">
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Hak Atas Kekayaan Intelektual
		</div>

		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p align="justify">Karya dosen dan atau mahasiwa PS yang telah memperoleh/sedang memproses perlindungan Hak atas Kekayaan Intelektual (HAKI).</p>
		
		@if ((Auth::user()->level !='prodi') or ($haki->count()>= 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addtatapamong"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th width="450px" class="text-center middle">Nama Karya</th>
					<th class="text-center middle">Tahun</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($haki as $value)
						<tr class="daftar soft">
							<td >{!! $value->masterprodis->namaProdi!!}</td>
							<td class="text-left">{!! $value->namaKarya !!}</td>
							<td >{!! $value->tahun !!}</td>
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