 @extends('template.app')
 @section('content')
<?php 
if (Session::has('tab_lampiran7')) {
	$tab_lampiran7 = Session::get('tab_lampiran7');
} else {
	$tab_lampiran7 = "suratpaten";
}
?>	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Lampiran Standar Akademik</b> 
		</h3>
		<ul class="nav nav-tabs " >
    <li class="<?php if ($tab_lampiran7 == "suratpaten") echo 'active'; ?>" ><a href="#tab1"><b>Surat Paten</b></a></li>
    <li class="<?php if ($tab_lampiran7 == "penelitian") echo 'active'; ?>" ><a href="#tab2"><b>Dokumen Penelitian</b></a></li>
    <li class="<?php if ($tab_lampiran7 == "penelitiandosen") echo 'active'; ?>"><a href="#tab3"><b>Dokumen Penelitian Dosen</b></a></li>
    <li class="<?php if ($tab_lampiran7 == "kerjasama") echo 'active'; ?>"><a href="#tab4"><b>Dokumen Kerja Sama</b></a></li>
  </ul>
	<div class="tab-content">
		<div id="tab1" class="tab-pane fade <?php if ($tab_lampiran7 == "suratpaten") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar VII Surat Paten
			</div>
			@if(Session::has('status'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar lampiran surat paten atau keterangan sejenis tentang HAKI suatu karya.<br><b>Segera diunggah untuk dikirim bersama borang!!</b></p>
			<div class="form-group">	
			<a class="btn btn-primary" href="addlampiran7"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
						<th class="text-center middle" style="width:100px">Program Studi</th>
						<th class="text-center middle">Nama Karya</th>
						<th class="text-center middle">Surat Paten</th>
						<th width="80px" class="text-center middle">Action</th>

				</thead>
				<tbody class="text-center">
					@foreach($tbhakis as $value)
							<tr class="daftar soft">
								<td width="150px">{!!$value->masterprodis->namaProdi!!}</td>
								<td width="150px" class="text-left">{!!$value->namaKarya !!}</td>
								<td class="text-left" width="200px">
								@if ($value->surat_paten != "")
								<a target="blank" href="{{URL::to('lampiran/haki')}}/{!! $value->surat_paten !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->surat_paten !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
								</td>
								<td  class="text-center">
								@if ($value->surat_paten == "")
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Upload" href="addlampiranhaki/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-upload"></i></a>
							</span>
							@else 
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="dellampiranhaki/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							@endif
								</td>
							</tr>
						@endforeach		
						
				</tbody>
			</table>
		</div>
		
		
		<div id="tab2" class="tab-pane fade <?php if ($tab_lampiran7 == "penelitian") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar VII Dokumen Penelitian
			</div>
			@if(Session::has('status'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar lampiran dokumen hasil penelitian (rekapitulasi judul dan dokumen laporan) yang jumlah judulnya ada dalam borang</p>
			<div class="form-group">	
			<a class="btn btn-primary" href="addlampiran7"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			<p></p>
			<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">Tahun</th>
					<th class="text-center middle">Jumlah</th>
					<th class="text-center middle">Jenis Kegiatan</th>
					<th class="text-center middle">Dokumen Penelitian</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
				@foreach($tbpenelitians as $value)
							<tr class="daftar soft">
								<td width="150px">{!!$value->masterprodis->namaProdi!!}</td>
								<td  class="text-left">{!!$value->tahun !!}</td>
								<td >{!!$value->jumlah !!}</td>
								<td >{!!$value->jenisKegiatan !!}</td>
								<td class="text-left" width="200px">
								@if ($value->dokumen_penelitian != "")
								<a target="blank" href="{{URL::to('lampiran/penelitian')}}/{!! $value->dokumen_penelitian !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->dokumen_penelitian !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
								</td>
								<td  class="text-center">
								@if ($value->dokumen_penelitian == "")
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Upload" href="addlampiranpenelitian/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-upload"></i></a>
							</span>
							@else 
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="dellampiranpenelitian/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							@endif
								</td>
							</tr>
						@endforeach
					
				
			</tbody>
			</table>
		</div>
		
		<div id="tab3" class="tab-pane fade <?php if ($tab_lampiran7 == "penelitiandosen") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar VII Dokumen Penelitian Dosen
			</div>
			@if(Session::has('status'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar lampiran nama mahasiswa, dosen dan judul tugas akhir yang dilibatkan dalam penelitian dosen</p>
			<div class="form-group">	
			<a class="btn btn-primary" href="addlampiran7"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			<p></p>
			<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">NIP</th>
					<th class="text-center middle">Nama Dosen</th>
					<th class="text-center middle">Judul</th>
					<th class="text-center middle">Dokumen Penelitian Dosen</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
				@foreach($tbpenelitiandosens as $value)
							<tr class="daftar soft">
								<td width="150px">{!!$value->masterprodis->namaProdi!!}</td>
								<td  class="text-left">{!!$value->nip !!}</td>
								<td >{!!$value->masterdosens->nama !!}</td>
								<td >{!!$value->judul !!}</td>
								<td class="text-left" width="200px">
								@if ($value->dokumen_penelitiandosen != "")
								<a target="blank" href="{{URL::to('lampiran/penelitiandosen')}}/{!! $value->dokumen_penelitiandosen !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->dokumen_penelitiandosen !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
								</td>
								<td  class="text-center">
								@if ($value->dokumen_penelitiandosen == "")
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Upload" href="addlampiranpenelitiandosen/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-upload"></i></a>
							</span>
							@else 
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="dellampiranpenelitiandosen{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							@endif
								</td>
							</tr>
						@endforeach
					
				
			</tbody>
			</table>
		</div>
		
		<div id="tab4" class="tab-pane fade <?php if ($tab_lampiran7 == "kerjasama") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar VII Kerja Sama
			</div>
			@if(Session::has('status'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar lampiran dokumen pendukung kerja sama dengan instansi lain yang terkait dengan program studi</p>
			<div class="form-group">	
			<a class="btn btn-primary" href="addlampiran7"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			<p></p>
			<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">Nama Institut</th>
					<th class="text-center middle">Jenis Kegiatan</th>
					<th class="text-center middle">Nama Kegiatan</th>
					<th class="text-center middle">Dokumen Kerja Sama</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
				@foreach($tbkerjasamas as $value)
							<tr class="daftar soft">
								<td width="150px">{!!$value->masterprodis->namaProdi!!}</td>
								<td  class="text-left">{!!$value->masterinstituses->namaInstitusi !!}</td>
								<td >{!!$value->jenisKegiatan !!}</td>
								<td >{!!$value->namaKegiatan !!}</td>
								<td class="text-left" width="200px">
								@if ($value->dokumen_kerjasama != "")
								<a target="blank" href="{{URL::to('lampiran/kerjasama')}}/{!! $value->dokumen_kerjasama !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->dokumen_kerjasama !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
								</td>
								<td  class="text-center">
								@if ($value->dokumen_kerjasama == "")
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Upload" href="addlampirankerjasama/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-upload"></i></a>
							</span>
							@else 
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="dellampirankerjasama{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
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

