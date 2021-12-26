
@extends('template.app')
@section('content')
<?php 
if (Session::has('tab_pembelajaran')) {
	$tab_pembelajaran = Session::get('tab_pembelajaran');
} else {
	$tab_pembelajaran = "pembelajaran";
}
?>	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik V</b> 
		</h3>
		<ul class="nav nav-tabs " >
    <li class="<?php if ($tab_pembelajaran == "pembelajaran") echo 'active'; ?>"><a href="#tab1"><b>Proses Pembelajaran</b></a></li>
    <li class="<?php if ($tab_pembelajaran == "pembimbing") echo 'active'; ?>"><a href="#tab2"><b>Pembimbing Akademik</b></a></li>
    <li class="<?php if ($tab_pembelajaran == "pembimbingan") echo 'active'; ?>"><a href="#tab3"><b>Proses Pembimbingan Akademik</b></a></li>
    <li class="<?php if ($tab_pembelajaran == "skripsi") echo 'active'; ?>"><a href="#tab4"><b>Pembimbingan Skripsi</b></a></li>
    <li class="<?php if ($tab_pembelajaran == "panduan") echo 'active'; ?>"><a href="#tab5"><b>Panduan Pembimbingan Skripsi</b></a></li>
    <li class="<?php if ($tab_pembelajaran == "upaya") echo 'active'; ?>"><a href="#tab6"><b>Upaya Perbaikan Pembelajaran</b></a></li>

  </ul>
  <div class="tab-content"> 	
	<div id="tab1" class="tab-pane fade <?php if ($tab_pembelajaran == "pembelajaran") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Proses Pembelajaran
		</div>

		@if(Session::has('status-pembelajaran'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status-pembelajaran') }}</b>
		</div>
		@endif
		<p align="justify"><b>Pelaksanaan Proses Pembelajaran</b><br/>
        Sistem pembelajaran dibangun berdasarkan perencanaan yang relevan dengan tujuan, ranah belajar dan hierarkinya. Pembelajaran dilaksanakan menggunakan berbagai strategi dan teknik yang menantang, mendorong mahasiswa untuk berpikir kritis bereksplorasi, berkreasi dan bereksperimen dengan memanfaatkan aneka sumber.Pelaksanaan pembelajaran memiliki mekanisme untuk memonitor, mengkaji, dan memperbaiki secara periodik kegiatan perkuliahan (kehadiran dosen dan mahasiswa), penyusunan materi perkuliahan, serta penilaian hasil belajar.<br>
						  
	    <p><b>Setiap Prodi Hanya Boleh Memasukan Satu Data Saja !</b><br>
		Berikut merupakan penjelasan tentang Mekanisme Penyusunan Materi Kuliah dan Monitoring Perkuliahan.
		</p>
		@if ((Auth::user()->level == 'admin') or ($prosespembelajaran->count() != $masterprodis->count())  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addprosespembelajaran"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">Mekanisme Penyusunan</th>
					<th class="text-center middle">Lampiran Soal 1</th>
					<th class="text-center middle">Lampiran Soal 2</th>
					<th class="text-center middle">Lampiran Soal 3</th>
					<th class="text-center middle">Lampiran Soal 4</th>
					<th class="text-center middle">Lampiran Soal 5</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($prosespembelajaran as $value)
						<tr class="daftar soft">
							<td >{!!$value->masterprodis->namaProdi!!}</td>
							<td class="text-left">{!! substr($value->mekanismePenyusunan,0,100) !!}</td>
							<td >{!! $value->lampiranSoal1 !!}</td>
							<td >{!! $value->lampiranSoal2 !!}</td>
							<td >{!! $value->lampiranSoal3 !!}</td>
							<td >{!! $value->lampiranSoal4 !!}</td>
							<td >{!! $value->lampiranSoal5 !!}</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editprosespembelajaran/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delpembelajaran/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
					
			</tbody>
		</table>
	</div>

	<div id="tab2" class="tab-pane fade <?php if ($tab_pembelajaran == "pembimbing") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Pembimbing Akademik
		</div>

		@if(Session::has('status-pembimbing'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status-pembimbing') }}</b>
		</div>
		@endif
		<p align="justify">Berikut merupakan data nama dosen pembimbing akademik dan jumlah mahasiswa yang dibimbingnya<br><b>Setiap Prodi Hanya Boleh Memasukan Satu Data Pada Setiap Dosen Saja !</b>
		</p>
		
		@if ((Auth::user()->level !='prodi') or ($pembimbing->count()== 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addpembimbingakademik"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th width="120px" class="text-center middle">NIP</th>
					<th width="150px" class="text-center middle">Nama Dosen</th>
					<th class="text-center middle">Jumlah Mahasiswa</th>
					<th class="text-center middle">Jumlah Pertemuan</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($pembimbing as $value)
						<tr class="daftar soft">
							<td >{!!$value->masterprodis->namaProdi!!}</td>
							<td >{!! $value->masterdosens->nip !!}</td>
							<td >{!! $value->masterdosens->nama !!}</td>
							<td >{!! $value->jumlahMahasiswa !!} Orang</td>
							<td >{!! $value->jumlahPertemuan !!} Kali</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editpembimbingakademik/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delpembimbingakademik/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
					
			</tbody>
		</table>
	</div>
	
	<div id="tab3" class="tab-pane fade <?php if ($tab_pembelajaran == "pembimbingan") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Proses Pembimbingan Akademik
		</div>

		@if(Session::has('status-pembimbingan'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status-pembimbingan') }}</b>
		</div>
		@endif
		<p align="justify">
        Berikut merupakan penjelasan tentang proses pembimbingan akademik yang diterapkan pada Program Studi.
		</p>
		
		@if ((Auth::user()->level !='prodi') or ($pembimbingan->count()>= 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addprosespembimbinganakademik"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th width="150px" class="text-center middle">Perihal</th>
					<th width="350px" class="text-center middle">Penjelasan</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($pembimbingan as $value)
						<tr class="daftar soft">
							<td >{!! $value->masterprodis->namaProdi!!}</td>
							<td >{!! $value->Hal !!}</td>
							<td class="text-left">{!! substr($value->penjelasan,0,100) !!}...</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editprosespembimbinganakademik/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delprosespembimbinganakademik/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
				
			</tbody>
		</table>
	</div>
	
	<div id="tab4" class="tab-pane fade <?php if ($tab_pembelajaran == "skripsi") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Pembimbingan Skripsi
		</div>

		@if(Session::has('status-skripsi'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status-skripsi') }}</b>
		</div>
		@endif
		<p align="justify">Berikut merupakan penjelasan tentang pembimbingan skripsi/tugas akhir pada setiap program studi.
		<br><b>Setiap Prodi Hanya Boleh Memasukan Satu Data Pada Setiap Dosen Saja !</b>
		</p>
		
		@if ((Auth::user()->level !='prodi') or ($bimbingan->count()== 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addpembimbinganskripsi"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th width="150px" class="text-center middle">NIP</th>
					<th width="150px" class="text-center middle">Nama Dosen </th>
					<th class="text-center middle">Jumlah Mahasiswa</th>
					<th class="text-center middle">Jumlah Pertemuan</th>
					<th class="text-center middle">Lama Penyelesaian (Bulan)</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($bimbingan as $value)
						<tr class="daftar soft">
							<td >{!!$value->masterprodis->namaProdi!!}</td>
							<td >{!! $value->masterdosens->nip !!}</td>
							<td >{!! $value->masterdosens->nama !!}</td>
							<td >{!! $value->jumlahMahasiswa !!} Orang</td>
							<td >{!! $value->jumlahPertemuan !!} Kali</td>
							<td >{!! $value->lamaPenyelesaian !!} Bulan</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editpembimbinganskripsi/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delpembimbinganskripsi/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
					
			</tbody>
		</table>
	</div>
	
	<div id="tab5" class="tab-pane fade <?php if ($tab_pembelajaran == "panduan") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Panduan Pembimbingan Skripsi
		</div>

		@if(Session::has('status-panduan'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status-panduan') }}</b>
		</div>
		@endif
		<p align="justify">Berikut merupakan penjelaskan cara sosialisasi dan pelaksanaannya.<br>
		<b>Setiap Prodi Hanya Boleh Memasukan Satu Data Saja !</b>
		</p>
		
		@if ((Auth::user()->level == 'admin') or ($panduan->count() != $masterprodis->count())  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addpanduanpembimbinganskripsi"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th width="150px" class="text-center middle">Panduan</th>
					<th width="450px" class="text-center middle">Sosialisasi Panduan</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($panduan as $value)
						<tr class="daftar soft">
							<td >{!!$value->masterprodis->namaProdi!!}</td>
							<td >{!! $value->Panduan !!}</td>
							<td class="text-left">{!! substr($value->sosialisasiPanduan,0,200) !!}...</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editpanduanpembimbinganskripsi/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delpanduanpembimbinganskripsi/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
					
			</tbody>
		</table>
	</div>
	
	<div id="tab6" class="tab-pane fade <?php if ($tab_pembelajaran == "upaya") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Upaya Perbaikan Pembelajaran
		</div>

		@if(Session::has('status-upaya'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status-upaya') }}</b>
		</div>
		@endif
		<p align="justify">Berikut merupakan uraian upaya perbaikan pembelajaran serta hasil yang telah dilakukan dan dicapai serta hasilnya.</b>
		</p>
		
		@if ((Auth::user()->level !='prodi') or ($upaya->count()== 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addupayaperbaikanpembelajaran"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th width="150px" class="text-center middle">Item</th>
					<th width="350px" class="text-center middle">Tindakan Perbaikan</th>
					<th width="350px" class="text-center middle">Hasil Perbaikan</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
				
					@foreach($upaya as $value)
						<tr class="daftar soft">
							<td >{!!$value->masterprodis->namaProdi!!}</td>
							<td >{!! $value->item !!}</td>
							<td class="text-left">{!! substr($value->tindakanPerbaikan,0,100) !!}...</td>
							<td class="text-left">{!! substr($value->hasilPerbaikan,0,100) !!}...</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editupayaperbaikanpembelajaran/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delupayaperbaikanpembelajaran/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
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