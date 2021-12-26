 @extends('template.app')
 @section('content')
<?php 
if (Session::has('tab_lampiran3')) {
	$tab_lampiran3 = Session::get('tab_lampiran3');
} else {
	$tab_lampiran3 = "daftarlulusan";
}
?>	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Lampiran Standar Akademik</b> 
		</h3>
		<ul class="nav nav-tabs " >
    <li class="<?php if ($tab_lampiran3 == "daftarlulusan") echo 'active'; ?>" ><a href="#tab1"><b>Daftar Lulusan</b></a></li>
    <li class="<?php if ($tab_lampiran3 == "layananmhs") echo 'active'; ?>" ><a href="#tab2"><b>Dokumen Layanan Mahasiswa</b></a></li>
    <li class="<?php if ($tab_lampiran3 == "evaluasilulusan") echo 'active'; ?>"><a href="#tab3"><b>Dokumen Evaluasi Lulusan</b></a></li>
    <li class="<?php if ($tab_lampiran3 == "alumni") echo 'active'; ?>"><a href="#tab4"><b>Laporan Alumni</b></a></li>
  </ul>
	<div class="tab-content">
		<div id="tab1" class="tab-pane fade <?php if ($tab_lampiran3 == "daftarlulusan") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar III Daftar Lulusan
			</div>
			@if(Session::has('statusmhsreg'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('statusmhsreg') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah lampiran daftar lulusan mahasiswa reguler dalam lima tahun terakhir (termasuk IPK). <br></p>
			
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
						<th class="text-center middle" style="width:100px">Program Studi</th>
						<th class="text-center middle">Tahun Akademik</th>
						<th class="text-center middle">Daftar Lulusan</th>
						<th width="80px" class="text-center middle">Action</th>

				</thead>
				<tbody class="text-center">
						
						@foreach($tbmhsregulers as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!!$value->tahunAkademik!!}</td>
								<td class="text-left">
								@if ($value->daftar_lulusan != "")
								<a  target="blank" href="{{URL::to('lampiran/daftarlulusan')}}/{!! $value->daftar_lulusan !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->daftar_lulusan !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
								</td>
								<td  class="text-center">
								@if ($value->daftar_lulusan == "")
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Upload" href="addlampiranmhsreg/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-upload"></i></a>
							</span>
							@else 
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="dellampiranmhsreg/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							@endif
								</td>
							</tr>
						@endforeach
						
				</tbody>
			</table>
		</div>
		
		
		<div id="tab2" class="tab-pane fade <?php if ($tab_lampiran3 == "layananmhs") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar III Dokumen Layanan Mahasiswa
			</div>
			@if(Session::has('statuslayananmhs'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('statuslayananmhs') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar lampiran dokumen pendukung pelayanan kepada mahasiswa</p>
			 
			<p></p>
			<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th width="150px" class="text-center middle">Jenis Kegiatan</th>
					<th width="150px" class="text-center middle">Isi Kegiatan</th>
					<th width="450px" class="text-center middle">Dokumen Layanan Mahasiswa</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
				@foreach($tblayananmahasiswas as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td class="text-left">{!!$value->jenisKegiatan!!}</td>
								<td class="text-left">{!! substr($value->isiKegiatan,0,100) !!}...</td>
								<td class="text-left">
								@if ($value->dokumen_layanan != "")
								<a target="blank" href="{{URL::to('lampiran/layananmhs')}}/{!! $value->dokumen_layanan !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->dokumen_layanan !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
								</td>
								<td  class="text-center">
								@if ($value->dokumen_layanan == "")
								<span>
								<a   data-toggle="tooltip" data-placement="top" title="Upload" href="addlampiranlayananmhs/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-upload"></i></a>
								</span>
								@else 
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Hapus" href="dellampiranlayananmhs/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
								</span>
								@endif
								</td>
							</tr>
						@endforeach
					
				
			</tbody>
			</table>
		</div>
		
		<div id="tab3" class="tab-pane fade <?php if ($tab_lampiran3 == "evaluasilulusan") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar III Dokumen Evaluasi Lulusan
			</div>
			@if(Session::has('statusevaluasilulusan'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('statusevaluasilulusan') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar lampiran dokumen pendukung (kuesioner dan hasil) kinerja lulusan oleh pihak pengguna</p>
			 
			<p></p>
			<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th width="150px" class="text-center middle">Jenis Kemampuan</th>
					<th width="350px" class="text-center middle">Dokumen Evaluasi Lulusan</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
				@foreach($tbevaluasilulusans as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td class="text-left">{!!$value->jenisKemampuan!!}</td>
								<td class="text-left">
								@if ($value->dokumen_evaluasilulusan != "")
								<a target="blank"  href="{{URL::to('lampiran/evaluasilulusan')}}/{!! $value->dokumen_evaluasilulusan !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->dokumen_evaluasilulusan !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
								</td>
								<td  class="text-center">
								@if ($value->dokumen_evaluasilulusan == "")
								<span>
								<a  data-toggle="tooltip" data-placement="top" title="Upload" href="addlampiranevaluasilulusan/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-upload"></i></a>
								</span>
								@else 
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Hapus" href="dellampiranevaluasilulusan/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
								</span>
								@endif
								</td>
							</tr>
						@endforeach
					
				
			</tbody>
			</table>
		</div>
		
		<div id="tab4" class="tab-pane fade <?php if ($tab_lampiran3 == "alumni") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar III Laporan Alumni
			</div>
			@if(Session::has('statusalumni'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('statusalumni') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar laporan kegiatan himpunan alumni</p>
			 
			<p></p>
			<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th width="150px" class="text-center middle">Waktu Tunggu Lulusan (Bulan)</th>
					<th width="450px" class="text-center middle">Dokumen Laporan Alumni</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
				@foreach($tbalumnis as $value)
					<tr class="daftar soft">
						<td >{!!$value->masterprodis->namaProdi!!}</td>
						<td class="text-center">{!!$value->waktuTungguLulusan!!} Bulan</td>
						<td class="text-left">
						@if ($value->laporan_alumni != "")
						<a target="blank" href="{{URL::to('lampiran/laporan_alumni')}}/{!! $value->laporan_alumni !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->laporan_alumni !!}</a>
					@else 
						Tidak Ada Dokumen yang Diunggah
					@endif
						</td>
						<td  class="text-center">
						@if ($value->laporan_alumni == "")
						<span>
						<a   data-toggle="tooltip" data-placement="top" title="Upload" href="addlampiranalumni/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-upload"></i></a>
						</span>
						@else 
						<span>
						<a data-toggle="tooltip" data-placement="top" title="Hapus" href="dellampiranalumni/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
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

