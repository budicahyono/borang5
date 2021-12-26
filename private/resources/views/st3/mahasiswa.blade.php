
@extends('template.app')
@section('content')
<?php 
if (Session::has('tab_mhs')) {
	$tab_mhs = Session::get('tab_mhs');
} else {
	$tab_mhs = "mahasiswareg";
}
?>
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik III</b> 
		</h3>
		<ul class="nav nav-tabs " >
    <li class="<?php if ($tab_mhs == "mahasiswareg") echo 'active'; ?>" ><a href="#tab1"><b>Mahasiswa Reguler</b></a></li>
    <li class="<?php if ($tab_mhs == "mahasiswanonreg") echo 'active'; ?>"><a href="#tab2"><b>Mahasiswa Non Reguler</b></a></li>
    <li class="<?php if ($tab_mhs == "prestasimhs") echo 'active'; ?>"><a href="#tab3"><b>Prestasi Mahasiswa</b></a></li>
    <li class="<?php if ($tab_mhs == "jumlahmhs") echo 'active'; ?>"><a href="#tab4"><b>Jumlah Mahasiswa</b></a></li>
    <li class="<?php if ($tab_mhs == "layananmhs") echo 'active'; ?>"><a href="#tab5"><b>Layanan Mahasiswa</b></a></li>

  </ul>
	<div class="tab-content">
		<div id="tab1" class="tab-pane fade <?php if ($tab_mhs == "mahasiswareg") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Mahasiswa Reguler
			</div>

			@if(Session::has('status-mhsreg'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status-mhsreg') }}</b>
			</div>
			@endif
			<p class="text-justify"> Masukkan data seluruh mahasiswa reguler dan lulusannya pada tabel dibawah ini.</p>
			
			
			@if ((Auth::user()->level !='prodi') or ($mahasiswareg->count()>= 0)  )
			<div class="form-group">	
			<a class="btn btn-primary" href="addmahasiswareg"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			@endif
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
						<th width="150px" class="text-center middle">Program Studi</th>
						<th class="text-center middle">Tahun Akademik</th>
						<th class="text-center middle">Daya Tampung</th>					
						<th class="text-center middle">Calon Mahasiswa Terdaftar</th>					
						<th class="text-center middle">Mahasiswa Reguler Baru</th>					
						<th class="text-center middle">Mahasiswa Transfer Baru</th>					
						<th width="80px" class="text-center middle">Action</th>
				</thead>
				<tbody class="text-center">
						
						@foreach($mahasiswareg as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!!$value->tahunAkademik!!}</td>
								<td >{!!$value->dayaTampung!!} Orang</td>
								<td >{!!$value->calonMahasiswaIkut!!} Orang</td>
								<td >{!!$value->mahasiswaBaruReguler!!} Orang</td>
								<td >{!!$value->mahasiswaBaruTransfer!!} Orang</td>
								<td  class="text-center">
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Lihat" href="detailmahasiswareg/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-list-alt"></i></a>
								</span>
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Edit" href="editmahasiswareg/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
								</span>
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delmahasiswareg/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
								</span>
								</td>
							</tr>
						@endforeach
						
				</tbody>
			</table>
		</div>
		
		<div id="tab2" class="tab-pane fade <?php if ($tab_mhs == "mahasiswanonreg") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Mahasiswa Non Reguler
			</div>

			@if(Session::has('status-mhsnonreg'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status-mhsnonreg') }}</b>
			</div>
			@endif
			<p class="text-justify"> Masukkan data seluruh mahasiswa non reguler pada tabel dibawah ini.</p>
			
			@if ((Auth::user()->level !='prodi') or ($mahasiswanonreg->count()>= 0)  )
			<div class="form-group">	
			<a class="btn btn-primary" href="addmahasiswanonreg"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			@endif
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
						<th class="text-center middle">Program Studi</th>
						<th class="text-center middle">Tahun Akademik</th>
						<th class="text-center middle">Daya Tampung</th>					
						<th class="text-center middle">Calon Mahasiswa Terdaftar</th>					
						<th class="text-center middle">Calon Mahasiswa Lulus</th>									
						<th width="80px" class="text-center middle">Action</th>
				</thead>
				<tbody class="text-center">
						
						@foreach($mahasiswanonreg as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!!$value->tahunAkademik!!}</td>
								<td >{!!$value->dayaTampung!!} Orang</td>
								<td >{!!$value->calonMahasiswaIkut!!} Orang</td>
								<td >{!!$value->calonMahasiswaLulus!!} Orang</td>
								<td  class="text-center">
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Lihat" href="detailmahasiswanonreg/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-list-alt"></i></a>
								</span>
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Edit" href="editmahasiswanonreg/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
								</span>
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delmahasiswanonreg/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
								</span>
								</td>
							</tr>
						@endforeach
						
				</tbody>
			</table>
		</div>
		
		<div id="tab3" class="tab-pane fade <?php if ($tab_mhs == "prestasimhs") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Prestasi Mahasiswa
			</div>

			@if(Session::has('status-prestasimhs'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status-prestasimhs') }}</b>
			</div>
			@endif
			<p class="text-justify">Masukkan pencapaian prestasi/reputasi mahasiswa dalam tiga tahun terakhir di bidang akademik dan non-akademik (misalnya prestasi dalam penelitian dan lomba karya ilmiah, olahraga, dan seni).</p>
			
			@if ((Auth::user()->level !='prodi') or ($prestasimhs->count()>= 0)  )
			<div class="form-group">	
			<a class="btn btn-primary" href="addprestasimhs"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			@endif
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
						<th class="text-center middle">Program Studi</th>
						<th class="text-center middle">Nama Kegiatan</th>
						<th class="text-center middle">Waktu</th>					
						<th class="text-center middle">Tingkat</th>					
						<th class="text-center middle">Prestasi</th>									
						<th width="80px" class="text-center middle">Action</th>
				</thead>
				<tbody class="text-center">
						
						@foreach($prestasimhs as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!!$value->namaKegiatan!!}</td>
								<td >{!! date('d-F-Y', strtotime($value->waktu)) !!}</td>
								<td >{!!$value->tingkat!!}</td>
								<td >{!!$value->prestasi!!}</td>
								<td  class="text-center">
								
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Edit" href="editprestasimhs/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
								</span>
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delprestasimhs/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
								</span>
								</td>
							</tr>
						@endforeach
						
				</tbody>
			</table>
		</div>
		
		<div id="tab4" class="tab-pane fade <?php if ($tab_mhs == "jumlahmhs") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Jumlah Mahasiswa
			</div>

			@if(Session::has('status-jumlahmhs'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status-jumlahmhs') }}</b>
			</div>
			@endif
			<p class="text-justify">Masukkan data jumlah mahasiswa reguler pada tabel dibawah ini.</p>
			
			@if ((Auth::user()->level !='prodi') or ($jumlahmhs->count()>= 0)  )
			<div class="form-group">	
			<a class="btn btn-primary" href="addjumlahmhs"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			@endif
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
						<th class="text-center middle">Program Studi</th>
						<th class="text-center middle">Angkatan</th>
						<th class="text-center middle">Tahun Akademik Berjalan</th>					
						<th class="text-center middle">Jumlah</th>					
						<th class="text-center middle">Jumlah Lulusan</th>									
						<th width="80px" class="text-center middle">Action</th>
				</thead>
				<tbody class="text-center">
						
						@foreach($jumlahmhs as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!!$value->angkatan!!}</td>
								<td >{!!$value->tahunAkademikBerjalan!!}</td>
								<td >{!!$value->jumlah!!} Orang</td>
								<td >{!!$value->jumlahLulusan!!} Orang</td>
								<td  class="text-center">
								
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Edit" href="editjumlahmhs/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
								</span>
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Hapus" href="deljumlahmhs/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
								</span>
								</td>
							</tr>
						@endforeach
						
				</tbody>
			</table>
		</div>
		
		<div id="tab5" class="tab-pane fade <?php if ($tab_mhs == "layananmhs") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Layanan Mahasiswa
			</div>

			@if(Session::has('status-layananmhs'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status-layananmhs') }}</b>
			</div>
			@endif
			<p class="text-justify">Masukkan data seluruh layanan mahasiswa pada tabel dibawah ini.</p>
			
			@if ((Auth::user()->level !='prodi') or ($layananmhs->count()>= 0)  )
			<div class="form-group">	
			<a class="btn btn-primary" href="addlayananmhs"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			@endif
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
						<th width="150px" class="text-center middle">Program Studi</th>
						<th width="150px" class="text-center middle">Jenis Layanan</th>
						<th width="450px" class="text-center middle">Isi Kegiatan</th>												
						<th width="80px" class="text-center middle">Action</th>
				</thead>
				<tbody class="text-center">
					
						@foreach($layananmhs as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td class="text-left">{!!$value->jenisKegiatan!!}</td>
								<td class="text-left">{!!$value->isiKegiatan!!}</td>
								<td  class="text-center">
								
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Edit" href="editlayananmhs/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
								</span>
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Hapus" href="dellayananmhs/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
								</span>
								</td>
							</tr>
						@endforeach
						
				</tbody>
			</table>
		</div>
		
		
	</div>	
		
	</div>
	 
</div>




@stop 