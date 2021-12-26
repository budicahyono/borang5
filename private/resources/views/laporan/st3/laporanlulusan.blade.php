
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
				   <i class="fa fa-th-list fa-fw"></i>Laporan Mekanisme
			</div>
			<p class="text-justify">Berikut merupakan laporan Mekanisme evaluasi lulusan (jika ada)</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakmekanisme','method' => 'post')) !!}
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
		
		
		<div id="tab2" class="tab-pane fade <?php if ($tab_lulus == "evaluasi") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Laporan Evaluasi Lulusan
			</div>
			<p class="text-justify">Berikut merupakan laporan Evaluasi Lulusan</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakevaluasi','method' => 'post')) !!}
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


		<div id="tab3" class="tab-pane fade <?php if ($tab_lulus == "alumni") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Laporan Alumni
			</div>
			<p class="text-justify">Berikut merupakan laporan himpunan alumni</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakalumni','method' => 'post')) !!}
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