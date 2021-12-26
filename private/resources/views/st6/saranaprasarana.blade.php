
@extends('template.app')
@section('content')
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik VI</b> 
		</h3>
		<ul class="nav nav-tabs " >
    <li class="active"><a href="#tab1"><b>Ruang Kerja Dosen</b></a></li>
    <li><a href="#tab2"><b>Prasarana</b></a></li>
    <li><a href="#tab3"><b>Pustaka</b></a></li>
    <li><a href="#tab4"><b>Jurnal</b></a></li>
    <li><a href="#tab5"><b>Sumber Pustaka</b></a></li>
    <li><a href="#tab6"><b>Peralatan LAB</b></a></li>

  </ul>
  <div class="tab-content"> 	
	<div id="tab1" class="tab-pane fade in active">
		<div class="breadcrumb">
			   <i class="fa fa-file fa-fw"></i>Ruang Kerja Dosen
		</div>

		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p align="justify">Data ruang kerja dosen tetap yang bidang keahliannya sesuai dengan program studi.</p>
		
		@if ((Auth::user()->level !='prodi') or ($ruangkerjadosen->count()>= 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addtatapamong"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead>
					<th width="150px" class="text-center middle">Program Studi</th>
					<th width="250px" class="text-center middle">Jenis Ruang</th>
					<th class="text-center middle">Jumlah Ruang</th>
					<th class="text-center middle">Jumlah Luas</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($ruangkerjadosen as $value)
						<tr class="daftar soft">
							<td >{!! $value->masterprodis->namaProdi!!}</td>
							<td >{!! $value->jenisRuang !!}</td>
							<td >{!! $value->jumlahRuang !!}</td>
							<td >{!! $value->jumlahLuas !!}</td>
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
			   <i class="fa fa-file fa-fw"></i>Prasarana
		</div>

		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p align="justify">Tuliskan data prasarana (kantor, ruang kelas, ruang laboratorium, studio, ruang perpustakaan, kebun percobaan, dsb kecuali ruang dosen) yang dipergunakan PS dalam proses belajar mengajar dengan mengikuti format tabel berikut.</p>
		
		@if ((Auth::user()->level !='prodi') or ($prasarana->count()>= 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addtatapamong"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">Nama</th>
					<th class="text-center middle">Jenis Prasarana</th>
					<th class="text-center middle">Jumlah Unit</th>
					<th class="text-center middle">Luas</th>
					<th class="text-center middle">Kepemilikan</th>
					<th class="text-center middle">Kondisi</th>
					<th class="text-center middle">Utilisasi Jam/Minggu</th>
					<th class="text-center middle">Pengelola</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($prasarana as $value)
						<tr class="daftar soft">
							<td >{!! $value->masterprodis->namaProdi!!}</td>
							<td >{!! $value->nama !!}</td>
							<td >{!! $value->jenisPrasarana !!}</td>
							<td >{!! $value->jumlahUnit !!}</td>
							<td >{!! $value->luas !!}</td>
							<td >{!! $value->kepemilikan !!}</td>
							<td >{!! $value->kondisi !!}</td>
							<td >{!! $value->utilisasi !!}</td>
							<td >{!! $value->pengelola !!}</td>
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
			   <i class="fa fa-file fa-fw"></i>Pustaka
		</div>

		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p align="justify">Pustaka (buku, teks, karya ilmiah, dan jurnal; termasuk juga dalam bentuk CD ROM dan media lainnya.
			  			Tuliskan rekapitulasi jumlah ketersediaan pustaka yang relevan dengan bidang PS dengan mengikuti format pada tabel berikut.</p>
		
		@if ((Auth::user()->level !='prodi') or ($pustaka->count()>= 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addtatapamong"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th width="150px" class="text-center middle">Jenis Pustaka</th>
					<th class="text-center middle">Jumlah Judul</th>
					<th class="text-center middle">Jumlah Copy</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($pustaka as $value)
						<tr class="daftar soft">
							<td >{!! $value->masterprodis->namaProdi!!}</td>
							<td >{!! $value->masterjenispustakas->jenisPustaka !!}</td>
							<td >{!! $value->jumlahJudul !!}</td>
							<td >{!! $value->jumlahCopy !!}</td>
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
			   <i class="fa fa-file fa-fw"></i>Jurnal
		</div>

		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p align="justify">Isikan jurnal/prosiding seminar yang tersedia/yang diterima secara teratur (lengkap), dengan mengikuti format tabel berikut.</p>
		
		@if ((Auth::user()->level !='prodi') or ($jurnal->count()>= 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addtatapamong"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th width="150px" class="text-center middle">Nama Jurnal</th>
					<th class="text-center middle">Tahun</th>
					<th class="text-center middle">Nomor</th>
					<th class="text-center middle">Jumlah</th>
					<th class="text-center middle">Akreditasi</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($jurnal as $value)
						<tr class="daftar soft">
							<td >{!! $value->masterprodis->namaProdi!!}</td>
							<td >{!! $value->namaJurnal !!}</td>
							<td >{!! $value->tahun !!}</td>
							<td >{!! $value->nomor !!}</td>
							<td >{!! $value->jumlah !!}</td>
							<td >{!! $value->akreditasi !!}</td>
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
	
	<div id="tab5" class="tab-pane fade">
		<div class="breadcrumb">
			   <i class="fa fa-file fa-fw"></i>Sumber Pustaka
		</div>

		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p align="justify">Sebutkan Sumber-sumber pustaka di lembaga lain (lembaga perpustakaan/ sumber dari internet beserta alamat website) yang bisa diakses/dimanfaatkan oleh dosen dan mahasiswa program studi ini.</p>
		
		@if ((Auth::user()->level !='prodi') or ($sumber->count()>= 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addtatapamong"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th width="450px" class="text-center middle">Sumber</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
				
					@foreach($sumber as $value)
						<tr class="daftar soft">
							<td >{!! $value->masterprodis->namaProdi!!}</td>
							<td >{!! $value->sumberpustaka !!}</td>
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
	
	<div id="tab6" class="tab-pane fade">
		<div class="breadcrumb">
			   <i class="fa fa-file fa-fw"></i>Peralatan LAB
		</div>

		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p align="justify">Tuliskan peralatan utama yang digunakan di laboratorium (tempat praktikum, bengkel, studio, ruang simulasi, rumah sakit, puskesmas/balai kesehatan, green house, lahan untuk pertanian dan sejenisnya) yang di pergunakan dalam proses pembelajaran di jurusan/fakultas dengan mengikuti format tabel berikut.</p>
		
		@if ((Auth::user()->level !='prodi') or ($lab->count()>= 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addtatapamong"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th width="150px" class="text-center middle">Nama Laboratorium</th>
					<th class="text-center middle">Id Peralatan</th>
					<th class="text-center middle">Nama Peralatan</th>
					<th class="text-center middle">Jumlah Unit</th>
					<th class="text-center middle">Kepemilikan</th>
					<th class="text-center middle">Kondisi</th>
					<th class="text-center middle">Utilisasi Jam/Minggu</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($lab as $value)
						<tr class="daftar soft">
							<td >{!! $value->masterprodis->namaProdi!!}</td>
							<td >{!! $value->namaLaboratorium !!}</td>
							<td >{!! $value->idperalatan !!}</td>
							<td >{!! $value->namaPeralatan !!}</td>
							<td >{!! $value->jumlahUnit !!}</td>
							<td >{!! $value->kepemilikan !!}</td>
							<td >{!! $value->kondisi !!}</td>
							<td >{!! $value->utilisasi !!}</td>
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