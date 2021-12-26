 @extends('template.app')
 @section('content')
<?php 
if (Session::has('tab_lampiran6')) {
	$tab_lampiran6 = Session::get('tab_lampiran6');
} else {
	$tab_lampiran6 = "pengelolaandana";
}
?>	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Lampiran Standar Akademik</b> 
		</h3>
		<ul class="nav nav-tabs " >
    <li class="<?php if ($tab_lampiran6 == "pengelolaandana") echo 'active'; ?>" ><a href="#tab1"><b>Pengelolaan Dana</b></a></li>
    <li class="<?php if ($tab_lampiran6 == "danapenelitian") echo 'active'; ?>" ><a href="#tab2"><b>Kontrak Penelitian</b></a></li>
    <li class="<?php if ($tab_lampiran6 == "prestasidosen") echo 'active'; ?>"><a href="#tab3"><b>Daftar Pustaka</b></a></li>
    <li class="<?php if ($tab_lampiran6 == "organisasi") echo 'active'; ?>"><a href="#tab4"><b>Daftar Software</b></a></li>
  </ul>
	<div class="tab-content">
		<div id="tab1" class="tab-pane fade <?php if ($tab_lampiran6 == "pengelolaandana") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar VI Pengelolaan Dana
			</div>
			@if(Session::has('statusdana'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('statusdana') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar dokumen (notulen) rapat / bukti keterlibatan program studi dalam perencanaan anggaran dan pengelolaan dana <br></p>
			<div class="form-group">	
			<a class="btn btn-primary" href="addlampiran6"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
						<th class="text-center middle" style="width:100px">Program Studi</th>
						<th class="text-center middle">Pengelolaan Dana</th>
						<th class="text-center middle">Bukti Pengelolaan Dana</th>
						<th width="80px" class="text-center middle">Action</th>

				</thead>
				<tbody class="text-center">
					@foreach($tbpengelolaandanas as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td class="text-left">{!! substr($value->pengelolaanDana,0,100) !!}</td>
								<td class="text-left">
								@if ($value->bukti_pengelolaandana != "")
								<a target="blank" href="{{URL::to('lampiran/pengelolaan_dana')}}/{!! $value->bukti_pengelolaandana !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->bukti_pengelolaandana !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
								</td>
								<td  class="text-center">
								@if ($value->bukti_pengelolaandana == "")
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Upload" href="addlampiranpengelolaandana/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-upload"></i></a>
							</span>
							@else 
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="dellampiranpengelolaandana/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							@endif
								</td>
							</tr>
						@endforeach	
						
				</tbody>
			</table>
		</div>
		
		
		<div id="tab2" class="tab-pane fade <?php if ($tab_lampiran6 == "danapenelitian") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar VI Kontrak Penelitian
			</div>
			@if(Session::has('status'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar lampiran kontrak penelitian</p>
			<div class="form-group">	
			<a class="btn btn-primary" href="addlampiran6"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			<p></p>
			<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">Nama Dosen</th>
					<th class="text-center middle">Jenis Kegiatan</th>
					<th class="text-center middle">Judul</th>
					<th class="text-center middle">Kontrak Penelitian</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
				@foreach($tbdanapenelitians as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!!$value->masterdosens->nama !!}</td>
								<td >{!!$value->jenisKegiatan !!}</td>
								<td >{!!$value->judul !!}</td>
								<td class="text-left">
								@if ($value->kontrak_penelitian != "")
								<a target="blank" href="{{URL::to('lampiran/kontrak')}}/{!! $value->kontrak_penelitian !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->kontrak_penelitian !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
								</td>
								<td  class="text-center">
								@if ($value->kontrak_penelitian == "")
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Upload" href="addlampirankontrak/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-upload"></i></a>
							</span>
							@else 
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="dellampirankontrak/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							@endif
								</td>
							</tr>
						@endforeach	
						
					
				
			</tbody>
			</table>
		</div>
		
		<div id="tab3" class="tab-pane fade <?php if ($tab_lampiran6 == "daftarpustaka") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar VI Daftar Pustaka
			</div>
			@if(Session::has('status'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar pustaka yang relevan dengan program studi, yang dipilah berdasarkan kategori / jenisnya</p>
			<div class="form-group">	
			<a class="btn btn-primary" href="addlampiran6"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			<p></p>
			<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">Jenis Pustaka</th>
					<th class="text-center middle">File Daftar Pustaka</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
				@foreach($tbpustakas as $value)
							<tr class="daftar soft">
								<td width="150px">{!!$value->masterprodis->namaProdi!!}</td>
								<td width="150px">{!!$value->masterjenispustakas->jenisPustaka !!}</td>
								<td class="text-left" width="200px">
								@if ($value->daftar_pustaka != "")
								<a target="blank" href="{{URL::to('lampiran/pustaka')}}/{!! $value->daftar_pustaka !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->daftar_pustaka !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
								</td>
								<td  class="text-center">
								@if ($value->daftar_pustaka == "")
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Upload" href="addlampiranpustaka/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-upload"></i></a>
							</span>
							@else 
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="dellampiranpustaka/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							@endif
								</td>
							</tr>
						@endforeach	
					
				
			</tbody>
			</table>
		</div>
		
		<div id="tab4" class="tab-pane fade <?php if ($tab_lampiran6 == "daftarsoftware") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar VI Daftar Software
			</div>
			@if(Session::has('status'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar software berlisensi dan petunjuk pemanfaatannya yang digunakan oleh program studi untuk proses pembelajaran</p>
			<div class="form-group">	
			<a class="btn btn-primary" href="addlampiran6"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			<p></p>
			<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">Deskripsi</th>
					<th class="text-center middle">Daftar Software</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
				@foreach($tbsisteminformases as $value)
							<tr class="daftar soft">
								<td width="150px">{!!$value->masterprodis->namaProdi!!}</td>
								<td width="150px" class="text-left">{!!$value->deskripsi !!}</td>
								<td class="text-left" width="200px">
								@if ($value->daftar_software != "")
								<a target="blank" href="{{URL::to('lampiran/software')}}/{!! $value->daftar_software !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->daftar_software !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
								</td>
								<td  class="text-center">
								@if ($value->daftar_software == "")
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Upload" href="addlampiransoftware/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-upload"></i></a>
							</span>
							@else 
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="dellampiransoftware/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
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

