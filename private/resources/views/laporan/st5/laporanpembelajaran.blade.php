
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
    <li class="dropdown">
			<a href="#" data-toggle="dropdown">Sistem Pembimbingan Akademik &nbsp;&nbsp;<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li ><a href="#tab2">Pembimbing Akademik</a></li>
				<li><a href="#tab3">Proses Pembimbingan Akademik</a></li>
			</ul>
		</li>
	<li class="dropdown">
			<a href="#" data-toggle="dropdown">Pembimbingan Tugas Akhir / Skripsi &nbsp;&nbsp;<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li ><a href="#tab4">Pelaksanaan Pembimbingan Tugas Akhir / Skripsi</a></li>
				<li><a href="#tab5">Panduan Pembimbingan Skripsi</a></li>
			</ul>
		</li>	
    <li class="<?php if ($tab_pembelajaran == "upaya") echo 'active'; ?>"><a href="#tab6"><b>Upaya Perbaikan Pembelajaran</b></a></li>

  </ul>
  <div class="tab-content"> 	
	<div id="tab1" class="tab-pane fade <?php if ($tab_pembelajaran == "pembelajaran") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Laporan Proses Pembelajaran
		</div>
		<p class="text-justify">Sistem pembelajaran dibangun berdasarkan perencanaan yang relevan dengan tujuan, ranah belajar dan hierarkinya. Pembelajaran dilaksanakan menggunakan berbagai strategi dan teknik yang menantang, mendorong mahasiswa untuk berpikir kritis bereksplorasi, berkreasi dan bereksperimen dengan memanfaatkan aneka sumber. Pelaksanaan pembelajaran memiliki mekanisme untuk memonitor, mengkaji, dan memperbaiki secara periodik kegiatan perkuliahan (kehadiran dosen dan mahasiswa), penyusunan materi perkuliahan, serta penilaian hasil belajar.</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakvisimisi','method' => 'post')) !!}
              <div class="box-body ">

                <div class="form-group ">
				   <div class="col-sm-2 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-3 nopad-right" >
                    <select required name="idprodi" class="form-control" >
					<option value="">--Silakan Pilih Prodi-- </option>
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if ($idprodi == $item->idprodi) echo 'selected="selected"' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
                  </div>
				  
				  <div class="col-sm-1 nopad-right" >
                     <button name="cari" type="submit" class="btn btn-primary" onclick="newWindow()"><i class="fa fa-print fa-fw"></i>Cetak</button>
                  </div>
                </div>
				
				
              </div>
              
			<!-- /.box-footer -->
            {!!Form::close() !!}	
		
	</div>

	<div id="tab2" class="tab-pane fade <?php if ($tab_pembelajaran == "pembimbing") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Laporan Pembimbing Akademik
		</div>
		<p class="text-justify"><b>Laporan Dosen Pembimbing Akademik</b><br> 
		Laporan nama dosen pembimbing akademik dan jumlah mahasiswa yang dibimbingnya :</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakvisimisi','method' => 'post')) !!}
              <div class="box-body ">

                <div class="form-group ">
				   <div class="col-sm-2 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-3 nopad-right" >
                    <select required name="idprodi" class="form-control" >
					<option value="">--Silakan Pilih Prodi-- </option>
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if ($idprodi == $item->idprodi) echo 'selected="selected"' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
                  </div>
				  
				  <div class="col-sm-1 nopad-right" >
                     <button name="cari" type="submit" class="btn btn-primary" onclick="newWindow()"><i class="fa fa-print fa-fw"></i>Cetak</button>
                  </div>
                </div>
				
				
              </div>
              
			<!-- /.box-footer -->
            {!!Form::close() !!}	
		
	</div>
	
	<div id="tab3" class="tab-pane fade <?php if ($tab_pembelajaran == "pembimbingan") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Laporan Proses Pembimbingan Akademik
		</div>
		<p class="text-justify">Laporan penjelasan proses pembimbingan akademik yang diterapkan pada Program Studi ini dalam hal-hal berikut:</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakvisimisi','method' => 'post')) !!}
              <div class="box-body ">

                <div class="form-group ">
				   <div class="col-sm-2 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-3 nopad-right" >
                    <select required name="idprodi" class="form-control" >
					<option value="">--Silakan Pilih Prodi-- </option>
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if ($idprodi == $item->idprodi) echo 'selected="selected"' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
                  </div>
				  
				  <div class="col-sm-1 nopad-right" >
                     <button name="cari" type="submit" class="btn btn-primary" onclick="newWindow()"><i class="fa fa-print fa-fw"></i>Cetak</button>
                  </div>
                </div>
				
				
              </div>
              
			<!-- /.box-footer -->
            {!!Form::close() !!}	
		
	</div>
	
	<div id="tab4" class="tab-pane fade <?php if ($tab_pembelajaran == "skripsi") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Laporan Pembimbingan Tugas Akhir / Skripsi
		</div>
		<p class="text-justify">
		<ul>
		<li>Rata-rata banyaknya mahasiswa per dosen pembimbing tugas akhir (TA) mahasiswa/dosen TA</li>
		<li>Rata-rata jumlah pertemuan dosen-mahasiswa untuk menyelesaikan tugas akhir : .... kali mulai dari saat mengambil TA hingga menyelesaikan TA</li>
		<li>Laporan nama-nama dosen yang menjadi pembimbing tugas akhir atau skripsi, dan jumlah mahasiswa yang bimbingan</li>
		</ul>
		</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakvisimisi','method' => 'post')) !!}
              <div class="box-body ">

                <div class="form-group ">
				   <div class="col-sm-2 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-3 nopad-right" >
                    <select required name="idprodi" class="form-control" >
					<option value="">--Silakan Pilih Prodi-- </option>
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if ($idprodi == $item->idprodi) echo 'selected="selected"' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
                  </div>
				  
				  <div class="col-sm-1 nopad-right" >
                     <button name="cari" type="submit" class="btn btn-primary" onclick="newWindow()"><i class="fa fa-print fa-fw"></i>Cetak</button>
                  </div>
                </div>
				
				
              </div>
              
			<!-- /.box-footer -->
            {!!Form::close() !!}	
		
	</div>
	
	<div id="tab5" class="tab-pane fade <?php if ($tab_pembelajaran == "panduan") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Laporan Panduan Pembimbingan Skripsi
		</div>
		<p class="text-justify">Laporan penjelasan cara sosialisasi dan pelaksanaannya.</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakvisimisi','method' => 'post')) !!}
              <div class="box-body ">

                <div class="form-group ">
				   <div class="col-sm-2 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-3 nopad-right" >
                    <select required name="idprodi" class="form-control" >
					<option value="">--Silakan Pilih Prodi-- </option>
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if ($idprodi == $item->idprodi) echo 'selected="selected"' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
                  </div>
				  
				  <div class="col-sm-1 nopad-right" >
                     <button name="cari" type="submit" class="btn btn-primary" onclick="newWindow()"><i class="fa fa-print fa-fw"></i>Cetak</button>
                  </div>
                </div>
				
				
              </div>
              
			<!-- /.box-footer -->
            {!!Form::close() !!}	
		
	</div>
	
	<div id="tab6" class="tab-pane fade <?php if ($tab_pembelajaran == "upaya") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Laporan Upaya Perbaikan Pembelajaran
		</div>
		<p class="text-justify">Laporan upaya perbaikan pembelajaran serta hasil yang telah dilakukan dan dicapai dalam tiga tahun terakhir dan hasilnya :</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakvisimisi','method' => 'post')) !!}
              <div class="box-body ">

                <div class="form-group ">
				   <div class="col-sm-2 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-3 nopad-right" >
                    <select required name="idprodi" class="form-control" >
					<option value="">--Silakan Pilih Prodi-- </option>
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if ($idprodi == $item->idprodi) echo 'selected="selected"' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
                  </div>
				  
				  <div class="col-sm-1 nopad-right" >
                     <button name="cari" type="submit" class="btn btn-primary" onclick="newWindow()"><i class="fa fa-print fa-fw"></i>Cetak</button>
                  </div>
                </div>
				
				
              </div>
              
			<!-- /.box-footer -->
            {!!Form::close() !!}	
		
	</div>
	
  </div>		
	</div>
	 
</div>




@stop 