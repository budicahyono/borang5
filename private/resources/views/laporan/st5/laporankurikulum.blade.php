
@extends('template.app')
@section('content')
<?php 
if (Session::has('tab_kurikulum')) {
	$tab_kurikulum = Session::get('tab_kurikulum');
} else {
	$tab_kurikulum = "umum";
}
?>	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik V</b> 
		</h3>
		<ul class="nav nav-tabs " >
   <li class="dropdown active">
			<a href="#" data-toggle="dropdown">Kompetensi &nbsp;&nbsp;<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li class="active"><a href="#tab1">Kompetensi Utama</a></li>
				<li><a href="#tab2">Kompetensi Pendukung</a></li>
				<li><a href="#tab3">Kompetensi Lain</a></li>
			</ul>
		</li>
		 <li class="dropdown">
			<a href="#" data-toggle="dropdown">Struktur Kurikulum &nbsp;&nbsp;<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li><a href="#tab4">Jumlah SKS PS</a></li>
				<li><a href="#tab5">Struktur Kurikulum MK</a></li>
				<li><a href="#tab6">Mata Kuliah Pilihan</a></li>
			</ul>
		</li>
		
		 <li class="dropdown">
			<a href="#" data-toggle="dropdown">Peninjauan &nbsp;&nbsp;<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li><a href="#tab7">Peninjauan Kurikulum</a></li>
				<li><a href="#tab8">Hasil Peninjauan Kurikulum</a></li>
			</ul>
		</li>
		
  </ul>
<div class="tab-content"> 	
	<div id="tab1" class="tab-pane fade <?php if ($tab_kurikulum == "umum") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Laporan Kompetensi Utama
		</div>
		<p class="text-justify">Laporan Kompetensi Utama</p>
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
	
	<div id="tab2" class="tab-pane fade <?php if ($tab_kurikulum == "pendukukung") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Laporan Kompetensi Pendukung
		</div>
		<p class="text-justify">Laporan Kompetensi Pendukung</p>
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
	
	<div id="tab3" class="tab-pane fade <?php if ($tab_kurikulum == "lain") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Laporan Kompetensi Lain
		</div>
		<p class="text-justify">Laporan Kompetensi Lain</p>
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
	
	<div id="tab4" class="tab-pane fade <?php if ($tab_kurikulum == "jumlasks") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Laporan Jumlah SKS PS
		</div>
		<p class="text-justify">Laporan Jumlah SKS PS (minimum untuk kelulusan) : … sks yang tersusun sebagai berikut:</p>
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
	
	<div id="tab5" class="tab-pane fade <?php if ($tab_kurikulum == "struktur") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Laporan  Struktur Kurikulum MK
		</div>
		<p class="text-justify">Laporan struktur kurikulum berdasarkan urutan mata kuliah (MK) semester demi semester:</p>
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
	
	<div id="tab6" class="tab-pane fade <?php if ($tab_kurikulum == "matkulpil") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Laporan Mata Kuliah Pilihan
		</div>
		<p class="text-justify">Laporan mata kuliah pilihan yang dilaksanakan dalam tiga tahun terakhir, pada tabel berikut:</p>
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
	
	<div id="tab7" class="tab-pane fade <?php if ($tab_kurikulum == "peninjauan") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Laporan Peninjauan Kurikulum
		</div>
		<p class="text-justify">Laporan mekanisme peninjauan kurikulum dan pihak-pihak yang dilibatkan dalam proses peninjauan tersebut:</p>
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
	
	<div id="tab8" class="tab-pane fade <?php if ($tab_kurikulum == "hasilpeninjauan") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Laporan Hasil Peninjauan Kurikulum
		</div>
		<p class="text-justify">Laporan Monitoring dan Evaluasi adalah Laporan Hasil Peninjauan.!</p>
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
	
	<div id="tab5" class="tab-pane fade <?php if ($tab_kurikulum == "hasil") echo 'in active'; ?> ">	
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Laporan Hasil Peninjauan Kurikulum
		</div>
		<p class="text-justify">Laporan Monitoring dan Evaluasi adalah laporan tentang penjelasan sistem monitoring dan evaluasi, serta rekam jejak kinerja akademik dosen dan kinerja tenaga kependidikan (termasuk informasi tentang ketersediaan pedoman tertulis, dan monitoring dan evaluasi kinerja dosen dalam tridarma serta dokumentasinya).</p>
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