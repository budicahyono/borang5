 @extends('template.app')
 @section('content')
<?php 
if (Session::has('tab_lampiran4')) {
	$tab_lampiran4 = Session::get('tab_lampiran4');
} else {
	$tab_lampiran4 = "ijazahdosen";
}
?>	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Lampiran Standar Akademik</b> 
		</h3>
		<ul class="nav nav-tabs " >
    <li class="<?php if ($tab_lampiran4 == "ijazahdosen") echo 'active'; ?>" ><a href="#tab1"><b>Ijazah Dosen</b></a></li>
    <li class="<?php if ($tab_lampiran4 == "pedomansdm") echo 'active'; ?>" ><a href="#tab2"><b>Dokumen Pedoman SDM</b></a></li>
    <li class="<?php if ($tab_lampiran4 == "kegiatandosen") echo 'active'; ?>"><a href="#tab3"><b>Bukti Kegiatan Dosen</b></a></li>
    <li class="<?php if ($tab_lampiran4 == "prestasidosen") echo 'active'; ?>"><a href="#tab4"><b>Bukti Prestasi Dosen</b></a></li>
    <li class="<?php if ($tab_lampiran4 == "organisasi") echo 'active'; ?>"><a href="#tab5"><b>Bukti Organisasi Profesi</b></a></li>
  </ul>
	<div class="tab-content">
		<div id="tab1" class="tab-pane fade <?php if ($tab_lampiran4 == "ijazahdosen") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar IV Ijazah Dosen
			</div>
			@if(Session::has('statusijazah'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('statusijazah') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar lampiran ijazah dan sertifikat dosen baik dosen tetap yang bidang keahliannya sesuai program studi , dosen tetap yang bidang keahliannya diluar program studi, dan dosen yang tidak tetap. <br><b>Segera diunggah untuk dikirim bersama borang!!</b></p>
			<div class="form-group">	
			<a class="btn btn-primary" href="addijazahdosen"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
						<th width="150px" class="text-center middle">Program Studi</th>
						<th class="text-center middle">NIP</th>
						<th class="text-center middle">Nama Dosen</th>
						<th class="text-center middle">Jenis Lampiran</th>
						<th class="text-center middle">File Lampiran</th>
						<th width="80px" class="text-center middle">Action</th>

				</thead>
				<tbody class="text-center">
						@foreach($tbijazahdosens as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterdosens->masterprodis->namaProdi!!}</td>
								<td >{!!$value->nip!!}</td>
								<td >{!!$value->masterdosens->nama!!}</td>
								<td >{!!$value->jenis_lampiran!!}</td>
								<td class="text-left">
								@if ($value->ijazah_dosen != "")
								<a target="blank" href="{{URL::to('lampiran/ijazah_dosen')}}/{!! $value->ijazah_dosen !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->ijazah_dosen !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
								</td>
								<td  class="text-center">
								
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delijazahdosen/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
						
								</td>
							</tr>
						@endforeach
						
				</tbody>
			</table>
		</div>
		
		
		<div id="tab2" class="tab-pane fade <?php if ($tab_lampiran4 == "pedomansdm") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar IV Dokumen Pedoman SDM
			</div>
			@if(Session::has('statuspedoman'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('statuspedoman') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar lampiran dokumen pendukung Pedoman SDM</p>
			<div class="form-group">	
			<a class="btn btn-primary" href="addpedomansdm"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			<p></p>
			<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">SDM</th>
					<th class="text-center middle">Jenis Lampiran</th>
					<th class="text-center middle">Dokumen Pedoman SDM</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					@foreach($tbpedomansdms as $value)
							<tr class="daftar soft">
								<td >{!!$value->namaProdi!!}</td>
								<td >{!!substr($value->sistemSeleksi,0,100)!!}...</td>
								<td >{!!$value->jenis_lampiran!!}</td>
								<td class="text-left">
								@if ($value->pedoman_sdm != "")
								<a target="blank" href="{{URL::to('lampiran/pedoman_sdm')}}/{!! $value->pedoman_sdm !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->pedoman_sdm !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
								</td>
								<td  class="text-center">
								
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delpedomansdm/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
						
								</td>
							</tr>
						@endforeach
					
				
			</tbody>
			</table>
		</div>
		
		<div id="tab3" class="tab-pane fade <?php if ($tab_lampiran4 == "kegiatandosen") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar IV Bukti Kegiatan Dosen
			</div>
			@if(Session::has('statuskegiatan'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('statuskegiatan') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar lampiran bukti kegiatan dosen tetap dalam seminar ilmiah / lokakarya / penataran / workshop / pagelaran / pameran / peragaan</p>
			<p></p>
			<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">NIP</th>
					<th class="text-center middle">Nama Dosen</th>
					<th class="text-center middle">Jenis Kegiatan</th>
					<th class="text-center middle">Nama Kegiatan</th>
					<th class="text-center middle">Bukti Kegiatan</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
				@foreach($tbkegiatandosens as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!!$value->nip!!}</td>
								<td >{!!$value->masterdosens->nama!!}</td>
								<td >{!!$value->jenisKegiatan!!}</td>
								<td >{!!$value->namaKegiatan!!}</td>
								<td class="text-left">
								@if ($value->bukti_kegiatandosen != "")
								<a target="blank" href="{{URL::to('lampiran/kegiatandosen')}}/{!! $value->bukti_kegiatandosen !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->bukti_kegiatandosen !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
								</td>
								<td  class="text-center">
								@if ($value->bukti_kegiatandosen == "")
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Upload" href="addlampirankegiatandosen/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-upload"></i></a>
							</span>
							@else 
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="dellampirankegiatandosen/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							@endif
								</td>
							</tr>
						@endforeach
					
				
			</tbody>
			</table>
		</div>
		
		<div id="tab4" class="tab-pane fade <?php if ($tab_lampiran4 == "prestasidosen") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar IV Bukti Prestasi Dosen
			</div>
			@if(Session::has('statusprestasi'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('statusprestasi') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar lampiran bukti pencapaian prestasi / reputasi dosen</p>
			<div class="form-group">	
			<a class="btn btn-primary" href="addlampiran4"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			<p></p>
			<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">NIP</th>
					<th class="text-center middle">Nama Dosen</th>
					<th class="text-center middle">Tahun</th>
					<th class="text-center middle">Prestasi</th>
					<th class="text-center middle">Bukti Prestasi</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
				@foreach($tbprestasidosens as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!!$value->nip!!}</td>
								<td >{!!$value->masterdosens->nama!!}</td>
								<td >{!!$value->Tahun!!}</td>
								<td >{!!$value->prestasi!!}</td>
								<td class="text-left">
								@if ($value->bukti_prestasidosen != "")
								<a target="blank" href="{{URL::to('lampiran/prestasidosen')}}/{!! $value->bukti_prestasidosen !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->bukti_prestasidosen !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
								</td>
								<td  class="text-center">
								@if ($value->bukti_prestasidosen == "")
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Upload" href="addlampiranprestasidosen/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-upload"></i></a>
							</span>
							@else 
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="dellampiranprestasidosen/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							@endif
								</td>
							</tr>
						@endforeach
					
				
			</tbody>
			</table>
		</div>
		
		<div id="tab5" class="tab-pane fade <?php if ($tab_lampiran4 == "organisasi") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar IV Bukti Organisasi Profesi
			</div>
			@if(Session::has('statusorg'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('statusorg') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar lampiran fotokopi bukti keikutsertaan dosen tetap dalam organisasi keilmuan / profesi</p>
			
			<p></p>
			<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">NIP</th>
					<th class="text-center middle">Nama Dosen</th>
					<th class="text-center middle">Nama Organisasi</th>
					<th class="text-center middle">Bukti Organisasi</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
				@foreach($tborganisasiprofesis as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!!$value->nip!!}</td>
								<td >{!!$value->masterdosens->nama!!}</td>
								<td >{!!$value->namaOrganisasi!!}</td>
								<td class="text-left">
								@if ($value->bukti_organisasiprofesi != "")
								<a target="blank" href="{{URL::to('lampiran/organisasi')}}/{!! $value->bukti_organisasiprofesi !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->bukti_organisasiprofesi !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
								</td>
								<td  class="text-center">
								@if ($value->bukti_organisasiprofesi == "")
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Upload" href="addlampiranorgdosen/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-upload"></i></a>
							</span>
							@else 
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="dellampiranorgdosen/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
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

