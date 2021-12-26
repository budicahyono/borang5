 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik IV</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-plus-square fa-fw"></i>Form Tambah Kegiatan Tenaga Ahli
		</div>		
		<div class="form-group">	
			<a href="datadosen" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line')) !!}
              <div class="box-body ">
				
                <div class="form-group ">
				   <div class="col-sm-3 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-9 nopad-right" >
                    <select name="idprodi" class="form-control" placeholder="">
					@if ($level == 'admin')
					<option value="">--Silakan Pilih Prodi-- </option>
					@endif
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if (old("idprodi") == $item->idprodi) echo 'selected="selected"' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
                  </div>
                </div>
				
				
				
                <div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('Tahun'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('Tahun')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Tahun</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <input name="Tahun" type="text" class="form-control" id="Tahun" placeholder="Silakan isi tahun kegiatan disini" value="{{Input::old('Tahun')}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('namaTenagaAhli'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('namaTenagaAhli')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Nama Tenaga Ahli</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <input name="namaTenagaAhli" type="text" class="form-control" id="namaTenagaAhli" placeholder="Silakan isi nama tenaga ahli disini" value="{{Input::old('namaTenagaAhli')}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('namaKegiatan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('namaKegiatan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Nama Kegiatan</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <input name="namaKegiatan" type="text" class="form-control" id="namaKegiatan" placeholder="Silakan isi nama kegiatan disini" value="{{Input::old('namaKegiatan')}}" />
                  </div>
				  
                </div>
				
				
				 <div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('waktu'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('waktu')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Tanggal Kegiatan</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <input  name="waktu"  type="text" class="form-control datepicker" id="calendar" placeholder="Pilih Tanggal Kegiatan" value="{{Input::old('waktu')}}" />
                  </div>
				  
                </div>
				
				
              </div>
              <!-- /.box-body -->
               <div class="form-group ">
                <button type="submit" class="btn btn-primary "><i class="fa fa-save fa-fw"></i>Save</button><span style="padding-right:10px" ></span>
				<button type="reset" class="btn btn-warning"><i class="fa fa-remove fa-fw"></i>Reset</button><span style="padding-right:10px" ></span>
				
              </div>
              <!-- /.box-footer -->
            {!!Form::close() !!}
		
	</div>
	 
</div>

@stop 