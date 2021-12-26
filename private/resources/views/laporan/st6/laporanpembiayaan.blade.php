
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
    <li class="<?php if ($tab_pembiayaan == "pengabdian") echo 'active'; ?>"><a href="#tab5"><b>Dana Kegiatan Pelayanan / PKM</b></a></li>

  </ul>
  <div class="tab-content"> 	
	<div id="tab1" class="tab-pane fade <?php if ($tab_pembiayaan == "pengelolaan") echo 'in active'; ?>">
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Laporan Pengelolaan Dana
		</div>
		<p class="text-justify">Laporan Pengelolaan Dana</p>
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

	<div id="tab2" class="tab-pane fade <?php if ($tab_pembiayaan == "sumber") echo 'in active'; ?>">
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Laporan Sumber Dana
		</div>
		<p class="text-justify">Laporan Sumber Dana</p>
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
	
	<div id="tab3" class="tab-pane fade <?php if ($tab_pembiayaan == "penggunaan") echo 'in active'; ?>">
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Laporan Penggunaan Dana
		</div>
		<p class="text-justify">Laporan Penggunaan Dana</p>
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
	
	<div id="tab4" class="tab-pane fade <?php if ($tab_pembiayaan == "penelitian") echo 'in active'; ?>">
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Laporan Dana Penelitian
		</div>
		<p class="text-justify">Laporan Dana Penelitian</p>
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
	
	<div id="tab5" class="tab-pane fade <?php if ($tab_pembiayaan == "pengabdian") echo 'in active'; ?>">
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Laporan Dana Kegiatan Pelayanan / PKM
		</div>
		
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




@stop 