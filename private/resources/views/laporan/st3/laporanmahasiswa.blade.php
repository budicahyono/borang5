
@extends('template.app')
@section('content')
<?php 
if (Session::has('tab_mhs')) {
	$tab_mhs = Session::get('tab_mhs');
} else {
	$tab_mhs = "mahasiswareg";
}
?>
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik III</b> 
		</h3>
		<ul class="nav nav-tabs " >
    <li class="<?php if ($tab_mhs == "mahasiswareg") echo 'active'; ?>" ><a href="#tab1"><b>Mahasiswa Reguler</b></a></li>
    <li class="<?php if ($tab_mhs == "mahasiswanonreg") echo 'active'; ?>"><a href="#tab2"><b>Mahasiswa Non Reguler</b></a></li>
    <li class="<?php if ($tab_mhs == "prestasimhs") echo 'active'; ?>"><a href="#tab3"><b>Prestasi Mahasiswa</b></a></li>
    <li class="<?php if ($tab_mhs == "jumlahmhs") echo 'active'; ?>"><a href="#tab4"><b>Jumlah Mahasiswa</b></a></li>
    <li class="<?php if ($tab_mhs == "layananmhs") echo 'active'; ?>"><a href="#tab5"><b>Layanan Mahasiswa</b></a></li>

  </ul>
	<div class="tab-content">
		<div id="tab1" class="tab-pane fade <?php if ($tab_mhs == "mahasiswareg") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Laporan Mahasiswa Reguler
			</div>
			<p class="text-justify">Berikut merupakan laporan mahasiswa reguler dan lulusannya pada tabel dibawah ini.</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakmhsreg','method' => 'post')) !!}
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
		
		<div id="tab2" class="tab-pane fade <?php if ($tab_mhs == "mahasiswanonreg") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Laporan Mahasiswa Non Reguler
			</div>
			<p class="text-justify">Berikut merupakan laporan mahasiswa non reguler pada tabel dibawah ini.</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakmhsnonreg','method' => 'post')) !!}
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
		
		<div id="tab3" class="tab-pane fade <?php if ($tab_mhs == "prestasimhs") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Laporan Prestasi Mahasiswa
			</div>
			<p class="text-justify">Berikut merupakan laporan prestasi/reputasi mahasiswa dalam tiga tahun terakhir di bidang akademik dan non-akademik (misalnya prestasi dalam penelitian dan lomba karya ilmiah, olahraga, dan seni).</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakprestasimhs','method' => 'post')) !!}
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
		
		<div id="tab4" class="tab-pane fade <?php if ($tab_mhs == "jumlahmhs") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Laporan Jumlah Mahasiswa
			</div>
			<p class="text-justify">Berikut merupakan laporan jumlah mahasiswa reguler 7 Tahun Terakhir</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakjumlahmhs','method' => 'post')) !!}
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
		
		<div id="tab5" class="tab-pane fade <?php if ($tab_mhs == "layananmhs") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Laporan Layanan Mahasiswa
			</div>
			<p class="text-justify">Berikut merupakan laporan seluruh layanan mahasiswa</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetaklayananmhs','method' => 'post')) !!}
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