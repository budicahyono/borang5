
@extends('template.app')
@section('content')
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik V</b> 
		</h3>
		
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Laporan Upaya Peningkatan Suasana Akademik
		</div>

		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
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




@stop 