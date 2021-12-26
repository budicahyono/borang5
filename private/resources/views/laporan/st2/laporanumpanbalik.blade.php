 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik II</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-file fa-fw"></i>Laporan Umpan Balik 
		</div>
		<p class="text-justify">Berikut merupakan Laporan Umpan Balik</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakumpanbalik','method' => 'post')) !!}
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

