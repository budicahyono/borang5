 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik V</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-plus-square fa-fw"></i>Form Tambah Praktikum
		</div>
		
		<div class="form-group">	
			<a href="kurikulum" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		<p></p>
		
		{!!Form::open(array('class' =>'form-horizontal line')) !!}
              <div class="box-body ">

                <div class="form-group ">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                    <select name="idprodi" class="form-control" >
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
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('idmatakuliah'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idmatakuliah')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Kode dan Nama Mata Kuliah</div>
					@endif
				  </div>

                  <div class="col-sm-3 nopad-right" >
                    <input name="idmatakuliah" type="text" class="form-control text-capitalize" id="idmatakuliah" placeholder="Kode Mata Kuliah" value="{{Input::old('idmatakuliah')}}" />
                  </div>
				  
				  <div class="col-sm-5 nopad-right" >
                    <input readonly name="namaMataKuliah" type="text" class="form-control " id="namaMataKuliah"  placeholder="Nama Mata Kuliah" value="{{Input::old('namaMataKuliah')}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('namaPraktikum'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('namaPraktikum')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>nama Praktikum</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="namaPraktikum" type="text" class="form-control" id="namaPraktikum" placeholder="Silakan isi nama praktikum disini" value="{{Input::old('namaPraktikum')}}" />
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('judulModul'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('judulModul')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>judul modul</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="judulModul" type="text" class="form-control" id="judulModul" placeholder="Silakan isi judul modul disini" value="{{Input::old('judulModul')}}" />
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('jamPelaksanaan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jamPelaksanaan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>jam Pelaksanaan</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="jamPelaksanaan" type="text" class="form-control" id="jamPelaksanaan" placeholder="Silakan isi jam pelaksanaan disini" value="{{Input::old('jamPelaksanaan')}}" />
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('lokasi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('lokasi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>lokasi</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="lokasi" type="text" class="form-control" id="lokasi" placeholder="Silakan isi lokasi disini" value="{{Input::old('lokasi')}}" />
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