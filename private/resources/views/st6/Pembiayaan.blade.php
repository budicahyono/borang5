
@extends('template.app')
@section('content')
<?php 
if (Session::has('tab_pembiayaan')) {
	$tab_pembiayaan = Session::get('tab_pembiayaan');
} else {
	$tab_pembiayaan = "pengelolaan";
}
?>	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik VI</b> 
		</h3>
		<ul class="nav nav-tabs " >
    <li class="<?php if ($tab_pembiayaan == "pengelolaan") echo 'active'; ?>"><a href="#tab1"><b>Pengelolaan dana</b></a></li>
    <li class="<?php if ($tab_pembiayaan == "sumber") echo 'active'; ?>"><a href="#tab2"><b>Sumber dana</b></a></li>
    <li class="<?php if ($tab_pembiayaan == "penggunaan") echo 'active'; ?>"><a href="#tab3"><b>Penggunaan Dana</b></a></li>
    <li class="<?php if ($tab_pembiayaan == "penelitian") echo 'active'; ?>"><a href="#tab4"><b>Dana Penelitian</b></a></li>

  </ul>
  <div class="tab-content"> 	
	<div id="tab1" class="tab-pane fade <?php if ($tab_pembiayaan == "pengelolaan") echo 'in active'; ?>">
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Pengelolaan Dana
		</div>

		@if(Session::has('status-pengelolaan'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status-pengelolaan') }}</b>
		</div>
		@endif
		<p align="justify">Keterlibatan aktif program studi harus tercerminkan dalam dokumen tentang proses perencanaan, pengelolaan dan pelaporan serta pertanggungjawaban penggunaan dana kepada pemangku kepentingan melalui mekanisme yang transparan dan akuntabel.
		<br><b>Setiap Prodi Hanya Boleh Memasukan Satu Data Saja !</b></p>
		@if ((Auth::user()->level  == 'admin') or ($pengelolaandana->count() != $masterprodis->count())  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addpengelolaan"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">Pengelolaan Dana</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($pengelolaandana as $value)
						<tr class="daftar soft">
							<td >{!!$value->masterprodis->namaProdi!!}</td>
							<td class="text-left">{!! substr($value->pengelolaanDana,0,200) !!}...</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editpengelolaan/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delpengelolaan/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
					
			</tbody>
		</table>
	</div>	

	<div id="tab2" class="tab-pane fade <?php if ($tab_pembiayaan == "sumber") echo 'in active'; ?>">
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Sumber Dana
		</div>

		@if(Session::has('status-sumber'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status-sumber') }}</b>
		</div>
		@endif
		<p align="justify"> Tuliskan realisasi perolehan dan alokasi dana (termasuk hibah) dalam juta rupiah termasuk gaji, pada tabel berikut.</p>
		
		@if ((Auth::user()->level !='prodi') or ($sumberdana->count()== 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addsumberdana"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th width="150px" class="text-center middle">Sumber Dana</th>
					<th width="150px" class="text-center middle">Jenis Dana</th>
					<th class="text-center middle">Tahun</th>
					<th class="text-center middle">Jumlah Dana</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($sumberdana as $value)
						<tr class="daftar soft">
							<td >{!!$value->masterprodis->namaProdi!!}</td>
							<td >{!!$value->sumberDana!!}</td>
							<td >{!!$value->jenisDana!!}</td>
							<td >{!!$value->tahun!!}</td>
							<td >Rp {!!number_format($value->jumlahDana)!!},-</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editsumberdana/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delsumberdana/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
					
			</tbody>
		</table>
	</div>	
	
	<div id="tab3" class="tab-pane fade <?php if ($tab_pembiayaan == "penggunaan") echo 'in active'; ?>">
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Penggunaan Dana
		</div>

		@if(Session::has('status-penggunaan'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status-penggunaan') }}</b>
		</div>
		@endif
		<p align="justify">Berikut adalah penggunaan dana setiap prodi.</p>
		
		@if ((Auth::user()->level !='prodi') or ($penggunaandana->count()== 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addpenggunaandana"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th width="150px" class="text-center middle">Jenis Penggunaan</th>
					<th class="text-center middle">Tahun</th>
					<th class="text-center middle">Jumlah Dana</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
				
					@foreach($penggunaandana as $value)
						<tr class="daftar soft">
							<td >{!!$value->masterprodis->namaProdi!!}</td>
							<td >{!!$value->jenisPenggunaan!!}</td>
							<td >{!!$value->tahun!!}</td>
							<td >Rp {!!number_format($value->jumlahDana)!!},-</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editpenggunaandana/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delpenggunaandana/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
					
			</tbody>
		</table>
	</div>
	
	<div id="tab4" class="tab-pane fade <?php if ($tab_pembiayaan == "penelitian") echo 'in active'; ?>">
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Dana Penelitian
		</div>

		@if(Session::has('status-penelitian'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status-penelitian') }}</b>
		</div>
		@endif
		<p align="justify">Tuliskan dana untuk kegiatan penelitian pada tiga tahun terakhir yang melibatkan dosen yang bidang keahliannya sesuai dengan program studi, dengan mengikuti form tabel berikut.</p>
		
		@if ((Auth::user()->level !='prodi') or ($danapenelitian->count()== 0)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="adddanapenelitian"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th width="120px" class="text-center middle">NIP</th>
					<th width="150px" class="text-center middle">Nama Dosen</th>
					<th width="150px" class="text-center middle">Jenis Kegiatan</th>
					<th width="150px" class="text-center middle">Judul</th>
					<th width="150px" class="text-center middle">Jenis Dana</th>
					<th class="text-center middle">Jumlah Dana</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
					
					@foreach($danapenelitian as $value)
						<tr class="daftar soft">
							<td >{!!$value->masterprodis->namaProdi!!}</td>
							<td >{!!$value->nip!!}</td>
							<td >{!!$value->masterdosens->nama!!}</td>
							<td >{!!$value->jenisKegiatan!!}</td>
							<td >{!!$value->judul!!}</td>
							<td >{!!$value->jenisDana!!}</td>
							<td >Rp{!!number_format($value->jumlahDana)!!},-</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Lihat" href="detaildanapenelitian/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-list-alt"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editdanapenelitian/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="deldanapenelitian/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
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