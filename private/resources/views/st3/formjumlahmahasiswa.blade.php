 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik III</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-plus-square fa-fw"></i>Form Tambah Jumlah Mahasiswa
		</div>		
		<div class="form-group">	
			<a href="mahasiswa" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
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
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('angkatan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('angkatan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Angkatan</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="angkatan" type="text" class="form-control" id="angkatan" placeholder="Silakan isi angkatan disini" value="{{Input::old('angkatan')}}" />
                  </div>
				 
                </div>
				
                 <div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('tahunAkademikBerjalan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('tahunAkademikBerjalan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>tahun akademik berjalan</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="tahunAkademikBerjalan" type="text" class="form-control" id="tahunAkademikBerjalan" placeholder="Silakan isi tahun akademik berjalan disini" value="{{Input::old('tahunAkademikBerjalan')}}" />
                  </div>
				 
                </div>
				
				
                <div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('jumlah'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jumlah')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>jumlah mahasiswa</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input name="jumlah" type="text" class="form-control" id="jumlah" placeholder="Silakan isi jumlah mahasiswa disini" value="{{Input::old('jumlah')}}" />
                  </div>
				  
                </div>
				
				 <div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('jumlahLulusan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jumlahLulusan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>jumlah lulusan</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input name="jumlahLulusan" type="text" class="form-control" id="jumlah" placeholder="Silakan isi jumlah lulusan disini" value="{{Input::old('jumlahLulusan')}}" />
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