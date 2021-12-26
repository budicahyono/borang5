
@extends('template.app')
@section('content')
<?php 
if (Session::has('tab_lulus')) {
	$tab_lulus = Session::get('tab_lulus');
} else {
	$tab_lulus = "mekanisme";
}
?>
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik III</b> 
		</h3>
		<ul class="nav nav-tabs " >
    <li class="<?php if ($tab_lulus == "mekanisme") echo 'active'; ?>"><a href="#tab1"><b>Mekanisme</b></a></li>
    <li class="<?php if ($tab_lulus == "evaluasi") echo 'active'; ?>"><a href="#tab2"><b>Evaluasi Lulusan</b></a></li>
    <li class="<?php if ($tab_lulus == "alumni") echo 'active'; ?>"><a href="#tab3"><b>Alumni</b></a></li>

  </ul>
    <div class="tab-content"> 
		<div id="tab1" class="tab-pane fade <?php if ($tab_lulus == "mekanisme") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Mekanisme
			</div>

			@if(Session::has('status-mekanisme'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status-mekanisme') }}</b>
			</div>
			@endif
			<p class="text-justify"> Masukkan data mekanisme evaluasi lulusan (jika ada) pada tabel dibawah ini.<br><b> Setiap Prodi Hanya Boleh Memasukan Satu Data Saja !</b></p>
			

			@if ((Auth::user()->level =='admin') or ($mekanisme->count() != $masterprodis->count())  )
			<div class="form-group">	
			<a class="btn btn-primary" href="addmekanisme"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			@endif
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
						<th width="150px" class="text-center middle">Program Studi</th>
						<th class="text-center middle">Mekanisme</th>
						<th width="80px" class="text-center middle">Action</th>
				</thead>
				<tbody class="text-center">
						
						@foreach($mekanisme as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td class="text-left">{!!$value->mekanisme!!}</td>
								<td  class="text-center">
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Edit" href="editmekanisme/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
								</span>
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delmekanisme/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
								</span>
								</td>
							</tr>
						@endforeach
						
				</tbody>
			</table>
		</div>	
		
		
		<div id="tab2" class="tab-pane fade <?php if ($tab_lulus == "evaluasi") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Evaluasi Lulusan
			</div>

			@if(Session::has('status-evaluasi'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status-evaluasi') }}</b>
			</div>
			@endif
			<p class="text-justify">Isi evaluasi lulusan disini.</b></p>
			
			@if ((Auth::user()->level !='prodi') or ($evaluasilulusan->count()>= 0)  )
			<div class="form-group">	
			<a class="btn btn-primary" href="addevaluasilulusan"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			@endif
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
						<th width="150px" class="text-center middle">Program Studi</th>
						<th class="text-center middle">Jenis Kemampuan</th>
						<th class="text-center middle">Tanggapan Sangat Baik (%)</th>
						<th class="text-center middle">Tanggapan Baik (%)</th>
						<th class="text-center middle">Tanggapan Cukup (%)</th>
						<th class="text-center middle">Tanggapan Kurang (%)</th>
						<th class="text-center middle">Tindak Lanjut</th>
						<th width="80px" class="text-center middle">Action</th>
				</thead>
				<tbody class="text-center">
						
						@foreach($evaluasilulusan as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!!$value->jenisKemampuan!!}</td>
								<td >{!!$value->tanggapanSangatBaik!!} %</td>
								<td >{!!$value->tanggapanBaik!!} %</td>
								<td >{!!$value->tanggapanCukup!!} %</td>
								<td >{!!$value->tanggapanKurang!!} %</td>
								<td >{!!$value->tindakLanjut!!}</td>
								<td  class="text-center">
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Edit" href="editevaluasilulusan/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
								</span>
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delevaluasilulusan/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
								</span>
								</td>
							</tr>
						@endforeach
						
				</tbody>
			</table>
		</div>


		<div id="tab3" class="tab-pane fade <?php if ($tab_lulus == "alumni") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Alumni
			</div>

			@if(Session::has('status-alumni'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status-alumni') }}</b>
			</div>
			@endif
			<p class="text-justify">Masukkan data himpunan alumni pada tabel dibawah ini</p>
			
			@if ((Auth::user()->level !='prodi') or ($alumni->count()>= 0)  )
			<div class="form-group">	
			<a class="btn btn-primary" href="addalumni"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			@endif
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
						<th width="150px" class="text-center middle">Program Studi</th>
						<th class="text-center middle">Waktu Tunggu Lulusan (Bulan)</th>
						<th class="text-center middle">Kerja Sesuai Bidang (%)</th>
						<th class="text-center middle">Himpunan Alumni</th>
						<th width="80px" class="text-center middle">Action</th>
				</thead>
				<tbody class="text-center">
						
						@foreach($alumni as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!!$value->waktuTungguLulusan!!} Bulan</td>
								<td >{!!$value->kerjaSesuaiBidang!!} %</td>
								<td >{!!$value->himpunanAlumni!!}</td>
								<td  class="text-center">
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Edit" href="editalumni/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
								</span>
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delalumni/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
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