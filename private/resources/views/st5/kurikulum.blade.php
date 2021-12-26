
@extends('template.app')
@section('content')
<?php 
if (Session::has('tab_kurikulum')) {
	$tab_kurikulum = Session::get('tab_kurikulum');
} else {
	$tab_kurikulum = "kompetensi";
}
?>	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik V</b> 
		</h3>
		<ul class="nav nav-tabs " >
    <li class="<?php if ($tab_kurikulum == "kompetensi") echo 'active'; ?>"><a href="#tab1"><b>Kompetensi</b></a></li>
    <li  class="<?php if ($tab_kurikulum == "matkulpil") echo 'active'; ?>"><a href="#tab2"><b>Mata Kuliah Pilihan</b></a></li>
    <li  class="<?php if ($tab_kurikulum == "praktikum") echo 'active'; ?>"><a href="#tab3"><b>Praktikum</b></a></li>
    <li  class="<?php if ($tab_kurikulum == "peninjauan") echo 'active'; ?>"><a href="#tab4"><b>Peninjauan Kurikulum</b></a></li>
    <li  class="<?php if ($tab_kurikulum == "hasil") echo 'active'; ?>"><a href="#tab5"><b>Hasil Peninjauan Kurikulum</b></a></li>

  </ul>
<div class="tab-content"> 	
	<div id="tab1" class="tab-pane fade <?php if ($tab_kurikulum == "kompetensi") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>kompetensi
		</div>

		@if(Session::has('status-kompetensi'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status-kompetensi') }}</b>
		</div>
		@endif
		<p align="justify">Kurikulum pendidikan tinggi adalah seperangkat rencana dan pengaturan mengenai isi, bahan kajian, maupun bahan pelajaran serta cara penyampaiannya, dan penilaian yang digunakan sebagai pedoman penyelenggaraan kegiatan pembelajaran di perguruan tinggi.Kurikulum seharusnya memuat standar kompetensi lulusan yang terstruktur dalam kompetensi utama, pendukung dan lainnya yang mendukung  tercapainya tujuan, terlaksananya misi, dan terwujudnya visi program studi. Kurikulum memuat mata kuliah/modul/blok yang mendukung pencapaian kompetensi lulusan dan memberikan keleluasaan pada mahasiswa untuk memperluas wawasan dan memperdalam keahlian sesuai dengan minatnya, serta dilengkapi dengan deskripsi mata kuliah/modul/blok, silabus, rencana pembelajaran dan evaluasi. Kurikulum harus dirancang berdasarkan relevansinya dengan tujuan, cakupan dan kedalaman materi, pengorganisasian yang mendorong terbentuknya hard skills dan keterampilan kepribadian dan perilaku (soft skills) yang dapat diterapkan dalam berbagai situasi dan kondisi. Jelaskan masing-masing kompetensi di bawah ini!
		<br><b>Setiap Prodi Hanya Boleh Memasukan Satu Data Saja !</b></p>
		
		@if ((Auth::user()->level  =='admin') or ($kompetensi->count()!= $masterprodis->count())  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addkompetensi"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center">Program Studi</th>
					<th class="text-center middle">Kompetensi Utama</th>
					<th class="text-center middle">Kompetensi Pendukung</th>
					<th class="text-center middle">Kompetensi Lain</th>
					<th width="80px" class="text-center">Action</th>
			</thead>
			<tbody class="text-center">
		
					@foreach($kompetensi as $value)
						<tr class="daftar soft">
							<td >{!!$value->masterprodis->namaProdi!!}</td>
							<td class="text-left">{!! substr($value->kompetensiUtama,0,100) !!}</td>
							<td class="text-left">{!! substr($value->kompetensiPendukung,0,100) !!}</td>
							<td class="text-left">{!! substr($value->kompetensiLain,0,100) !!}</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editkompetensi/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delkompetensi/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
					
			</tbody>
		</table>

	</div>
	
	<div id="tab2" class="tab-pane fade <?php if ($tab_kurikulum == "matkulpil") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Mata Kuliah Pilihan
		</div>

		@if(Session::has('status-matkulpil'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status-matkulpil') }}</b>
		</div>
		@endif
		<p align="justify">Berikut merupakan data mata kuliah pilihan yang ada di Program Studi.</b></p>
		
		@if ((Auth::user()->level !='prodi') or ($matkulpil->count()>= 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addmatkulpil"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th  width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">Tahun Akademik</th>
					<th  width="250px" class="text-center middle">Nama Mata Kuliah Pilihan</th>
					<th class="text-center middle">Bobot SKS</th>
					<th class="text-center middle">Bobot Tugas</th>
					<th width="150px" class="text-center middle">Unit/ Jur/ Fak Pengelola</th>
					<th class="text-center middle">Semester</th>
					<th width="80px" class="text-center">Action</th>
			</thead>
			<tbody class="text-center">
				
					@foreach($matkulpil as $value)
						<tr class="daftar soft">
							<td >{!! $value->masterprodis->namaProdi!!}</td>
							<td >{!! $value->tahunAkademik !!}</td>
							<td >{!! $value->namaMKPilihan !!}</td>
							<td >{!! $value->bobotsks !!}</td>
							<td >{!! $value->bobottugas !!}</td>
							<td >{!! $value->Unit !!}</td>
							<td >{!! $value->Semester !!}</td>
							
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editmatkulpil/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delmatkulpil/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
					
			</tbody>
		</table>

	</div>
	
	<div id="tab3" class="tab-pane fade <?php if ($tab_kurikulum == "praktikum") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Praktikum
		</div>

		@if(Session::has('status-praktikum'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status-praktikum') }}</b>
		</div>
		@endif
		<p align="justify">Masukan substansi praktikum/praktek yang mandiri ataupun yang merupakan bagian dari mata kuliah tertentu, dengan mengikuti format di bawah ini pada setiap program studi</b></p>
		
		@if ((Auth::user()->level !='prodi') or ($praktikum->count()>= 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addpraktikum"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th  width="150px" class="text-center middle">Program Studi</th>
					<th width="120px" class="text-center middle">Id Mata Kuliah</th>
					<th width="150px" class="text-center middle">Nama Praktikum</th>
					<th width="250px" class="text-center middle">Judul Modul</th>
					<th class="text-center middle">Jam Pelaksanaan</th>
					<th class="text-center middle">Lokasi</th>
					<th width="80px" class="text-center">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($praktikum as $value)
						<tr class="daftar soft">
							<td >{!! $value->masterprodis->namaProdi!!}</td>
							<td >{!! $value->mastermatakuliahs->idmatakuliah !!}</td>
							<td >{!! $value->mastermatakuliahs->namaMataKuliah !!}</td>
							<td >{!! $value->judulModul !!}</td>
							<td >{!! $value->jamPelaksanaan !!} Jam</td>
							<td >{!! $value->lokasi !!}</td>
							
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editpraktikum/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delpraktikum/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
					
			</tbody>
		</table>

	</div>
	
	<div id="tab4" class="tab-pane fade <?php if ($tab_kurikulum == "peninjauan") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Peninjauan Kurikulum
		</div>

		@if(Session::has('status-peninjauan'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status-peninjauan') }}</b>
		</div>
		@endif
		<p align="justify"> Berikut merupakan data dari penjelasan tentang mekanisme peninjauan kurikulum.<br><b>Setiap Prodi Hanya Boleh Memasukan Satu Data Saja !</b></p>
		@if ((Auth::user()->level == 'admin') or ($peninjauan->count() != $masterprodis->count())  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addpeninjauankurikulum"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th  class="text-center middle">Tahun</th>
					<th width="150px" class="text-center middle">Kurikulum</th>
					<th width="450px" class="text-center middle">Mekanisme Kurikulum</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($peninjauan as $value)
						<tr class="daftar soft">
							<td >{!! $value->masterprodis->namaProdi!!}</td>
							<td >{!! $value->Tahun !!}</td>
							<td >{!! $value->masterkurikulums->deskripsi !!}</td>
							<td class="text-left">{!! substr($value->mekanisme,0,200) !!}...</td>
							
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editpeninjauankurikulum/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delpeninjauankurikulum/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
					
			</tbody>
		</table>

	</div>
	
	<div id="tab5" class="tab-pane fade <?php if ($tab_kurikulum == "hasil") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Hasil Peninjauan Kurikulum
		</div>

		@if(Session::has('status-hasil'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status-hasil') }}</b>
		</div>
		@endif
		<p align="justify">Berikut merupakan hasil peninjauan kurikulum berdasarkan peninjauan kurikulum disebelah.</p>
		
		@if ((Auth::user()->level !='prodi') or ($hasil->count()>= 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addhasilpeninjauankurikulum"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">ID Peninjauan</th>
					<th  class="text-center middle">Nama Mata Kuliah</th>
					<th class="text-center middle">Status Mata Kuliah</th>
					<th  class="text-center middle">Perubahan Pada</th>
					<th width="150px" class="text-center middle">Isi Perubahan</th>
					<th width="150px" class="text-center middle">Alasan Peninjauan</th>
					<th class="text-center middle">Atas Usulan</th>
					<th class="text-center middle">Semester Berlaku</th>
					<th class="text-center middle">Tahun Berlaku</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($hasil as $value)
						<tr class="daftar soft">
							<td >{!! $value->masterprodis->namaProdi!!}</td>
							<td >{!! $value->tbpeninjauankurikulums->id !!}</td>
							<td >{!! $value->mastermatakuliahs->namaMataKuliah !!}</td>
							<td >{!! $value->statusMK !!}</td>
							<td >{!! $value->perubahanPada !!}</td>
							<td class="text-left">{!! $value->isiPerubahan !!}</td>
							<td class="text-left">{!! $value->alasanPeninjauan !!}</td>
							<td >{!! $value->atasUsulan !!}</td>
							<td >{!! $value->semesterBerlaku !!}</td>
							<td >{!! $value->tahunBerlaku !!}</td>
							
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="edithasilpeninjauankurikulum/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delhasilpeninjauankurikulum/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
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