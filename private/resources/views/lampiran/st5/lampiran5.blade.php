 @extends('template.app')
 @section('content')
<?php 
if (Session::has('tab_lampiran5')) {
	$tab_lampiran5 = Session::get('tab_lampiran5');
} else {
	$tab_lampiran5 = "cthsoalujian";
}
?>	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Lampiran Standar Akademik</b> 
		</h3>
		<ul class="nav nav-tabs " >
    <li class="<?php if ($tab_lampiran5 == "cthsoalujian") echo 'active'; ?>" ><a href="#tab1"><b>Contoh Soal Ujian</b></a></li>
    <li class="<?php if ($tab_lampiran5 == "silabusdansap") echo 'active'; ?>" ><a href="#tab2"><b>Silabus dan SAP</b></a></li>
    <li class="<?php if ($tab_lampiran5 == "modulpraktikum") echo 'active'; ?>"><a href="#tab3"><b>Modul Praktikum</b></a></li>
    <li class="<?php if ($tab_lampiran5 == "kurikulum") echo 'active'; ?>"><a href="#tab4"><b>Dokumen Kurikulum</b></a></li>
    <li class="<?php if ($tab_lampiran5 == "pembelajaran") echo 'active'; ?>"><a href="#tab5"><b>Dokumen Proses Pembelajaran</b></a></li>
    <li class="<?php if ($tab_lampiran5 == "skripsi") echo 'active'; ?>"><a href="#tab6"><b>Panduan Pembimbingan Skripsi</b></a></li>
  </ul>
	<div class="tab-content">
		<div id="tab1" class="tab-pane fade <?php if ($tab_lampiran5 == "cthsoalujian") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar V Contoh Soal Ujian
			</div>
			@if(Session::has('statuscontohsoal'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('statuscontohsoal') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar contoh soal ujian dalam satu tahun terakhir untuk 5 mata kuliah keahlian beserta silabusnya. <br><b>Segera diunggah untuk dikirim bersama borang!!</b></p>
			<div class="form-group">	
			<a class="btn btn-primary" href="addcontohsoal"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
						<th class="text-center middle" style="width:100px">Program Studi</th>
						<th class="text-center middle">Mekanisme Penyusunan</th>
						<th class="text-center middle">Tahun</th>
						<th class="text-center middle">Contoh Soal Ujian</th>
						<th width="80px" class="text-center middle">Action</th>

				</thead>
				<tbody class="text-center">
						@foreach($tbcontohsoalujians as $value)
							<tr class="daftar soft">
								<td >{!!$value->tbprosespembelajarans->masterprodis->namaProdi!!}</td>
								<td >{!!substr($value->tbprosespembelajarans->mekanismePenyusunan,0,100)!!}...</td>
								<td >{!!$value->tahun!!}</td>
								<td class="text-left">
								@if ($value->contoh_soal_ujian != "")
								<a target="blank" href="{{URL::to('lampiran/contoh_soal')}}/{!! $value->contoh_soal_ujian !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->contoh_soal_ujian !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
								</td>
								<td  class="text-center">
								
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delcontohsoal/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
						
								</td>
							</tr>
						@endforeach
						
						
				</tbody>
			</table>
		</div>
		
		
		<div id="tab2" class="tab-pane fade <?php if ($tab_lampiran5 == "silabusdansap") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar V Silabus dan SAP
			</div>
			@if(Session::has('statussilabus'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('statussilabus') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar lampiran dokumen silabus dan SAP tiap mata kuliah</p>
			
			<p></p>
			<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">ID Mata Kuliah</th>
					<th class="text-center middle">Nama Mata Kuliah</th>
					<th class="text-center middle">Dokumen Silabus dan SAP</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
				@foreach($mastermatakuliahs as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!!$value->idmatakuliah!!}</td>
								<td >{!!$value->namaMataKuliah!!}</td>
								<td class="text-left">
								@if ($value->dokumen_silabusdansap != "")
								<a target="blank" href="{{URL::to('lampiran/silabusdansap')}}/{!! $value->dokumen_silabusdansap !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->dokumen_silabusdansap !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
								</td>
								<td  class="text-center">
								@if ($value->dokumen_silabusdansap == "")
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Upload" href="addsilabusdansap/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-upload"></i></a>
							</span>
							@else 
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delsilabusdansap/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							@endif
								</td>
							</tr>
						@endforeach
					
				
			</tbody>
			</table>
		</div>
		
		<div id="tab3" class="tab-pane fade <?php if ($tab_lampiran5 == "modulpraktikum") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar V Modul Praktikum
			</div>
			@if(Session::has('statussilabus'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('statussilabus') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar lampiran modul praktikum setiap kegiatan praktikum / praktek</p>
			
			<p></p>
			<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">ID Mata Kuliah</th>
					<th class="text-center middle">Nama Praktikum</th>
					<th class="text-center middle">Modul Praktikum</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
				@foreach($tbpraktikums as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!!$value->idmatakuliah!!}</td>
								<td >{!!$value->namaPraktikum!!}</td>
								<td class="text-left">
								@if ($value->modul_praktikum != "")
								<a target="blank" href="{{URL::to('lampiran/praktikum')}}/{!! $value->modul_praktikum !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->modul_praktikum !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
								</td>
								<td  class="text-center">
								@if ($value->bukti_kegiatandosen == "")
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Upload" href="addlampiranpraktikum/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-upload"></i></a>
							</span>
							@else 
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="dellampiranpraktikum/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							@endif
								</td>
							</tr>
						@endforeach
					
				
			</tbody>
			</table>
		</div>
		
		<div id="tab4" class="tab-pane fade <?php if ($tab_lampiran5 == "kurikulum") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar V Dokumen Kurikulum
			</div>
			@if(Session::has('statussilabus'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('statussilabus') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar lampiran dokumen pendukung kegiatan peninjauan kurikulum dalam 5 tahun terakhir</p>
			
			<p></p>
			<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">Tahun</th>
					<th class="text-center middle">Dokumen Kurikulum</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
				@foreach($tbpeninjauankurikulums as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!!$value->Tahun!!}</td>
								<td class="text-left">
								@if ($value->dokumen_kurikulum != "")
								<a target="blank" href="{{URL::to('lampiran/kurikulum')}}/{!! $value->dokumen_kurikulum !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->dokumen_kurikulum !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
								</td>
								<td  class="text-center">
								@if ($value->dokumen_kurikulum == "")
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Upload" href="addlampirankurikulum/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-upload"></i></a>
							</span>
							@else 
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="dellampirankurikulum/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							@endif
								</td>
							</tr>
						@endforeach
					
				
			</tbody>
			</table>
		</div>
		
		<div id="tab5" class="tab-pane fade <?php if ($tab_lampiran5 == "pembelajaran") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar V Dokumen Proses Pembelajaran
			</div>
			@if(Session::has('statuspembelajaran'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('statuspembelajaran') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar lampiran dokumen pendukung monitoring perkuliahan</p>
		
			<p></p>
			<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">Mekanisme Penyusunan</th>
					<th class="text-center middle">Dokumen Pembelajaran</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
				@foreach($tbprosespembelajarans as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!! substr($value->mekanismePenyusunan,0,100) !!}</td>
								<td class="text-left">
								@if ($value->dokumen_pembelajaran != "")
								<a target="blank" href="{{URL::to('lampiran/pembelajaran')}}/{!! $value->dokumen_pembelajaran !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->dokumen_pembelajaran !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
								</td>
								<td  class="text-center">
								@if ($value->dokumen_pembelajaran == "")
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Upload" href="addlampiranpembelajaran/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-upload"></i></a>
							</span>
							@else 
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="dellampiranpembelajaran/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							@endif
								</td>
							</tr>
						@endforeach
					
				
			</tbody>
			</table>
		</div>
		
		<div id="tab6" class="tab-pane fade <?php if ($tab_lampiran5 == "skripsi") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar V Panduan Pembimbingan Skripsi
			</div>
			@if(Session::has('statusskripsi'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('statusskripsi') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar panduan pembimbingan skripsi / tugas akhir</p>
			
			<p></p>
			<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">Panduan Skripsi</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
				@foreach($tbpanduanpembimbinganskripsis as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td class="text-left">
								@if ($value->panduan_skripsi != "")
								<a target="blank" href="{{URL::to('lampiran/panduan_skripsi')}}/{!! $value->panduan_skripsi !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->panduan_skripsi !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
								</td>
								<td  class="text-center">
								@if ($value->panduan_skripsi == "")
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Upload" href="addpanduanskripsi/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-upload"></i></a>
							</span>
							@else 
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delpanduanskripsi/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							@endif
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

