 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik III</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-plus-square fa-fw"></i>Form Tambah Mahasiswa Non Reguler
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
					@if($errors->has('tahunAkademik'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('tahunAkademik')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Tahun Akademik</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="tahunAkademik" type="text" class="form-control" id="tahunAkademik" placeholder="Silakan isi tahun akademik disini" value="{{Input::old('tahunAkademik')}}" />
                  </div>
				 
                </div>
				
				
                <div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('dayaTampung'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('dayaTampung')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Daya Tampung</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input name="dayaTampung" type="text" class="form-control" id="dayaTampung" placeholder="Silakan isi daya tampung disini" value="{{Input::old('dayaTampung')}}" />
                  </div>
				  
                </div>
            
				
                <div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('calonMahasiswaIkut'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('calonMahasiswaIkut')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Calon Mahasiswa terdaftar</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input name="calonMahasiswaIkut" type="text" class="form-control" id="calonMahasiswaIkut" placeholder="Silakan isi jumlah calon mahasiswa terdaftar disini" value="{{Input::old('calonMahasiswaIkut')}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('calonMahasiswaLulus'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('calonMahasiswaLulus')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Calon Mahasiswa Lulus</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input name="calonMahasiswaLulus" type="text" class="form-control" id="calonMahasiswaLulus" placeholder="Silakan isi jumlah calon mahasiswa lulus disini" value="{{Input::old('calonMahasiswaLulus')}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('mahasiswaBaruNonReguler'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('mahasiswaBaruNonReguler')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Mahasiswa Baru Non Reguler</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input name="mahasiswaBaruNonReguler" type="text" class="form-control" id="mahasiswaBaruNonReguler" placeholder="Silakan isi jumlah mahasiswa baru non reguler disini" value="{{Input::old('mahasiswaBaruNonReguler')}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('mahasiswaBaruTransfer'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('mahasiswaBaruTransfer')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Mahasiswa Baru Transfer</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input name="mahasiswaBaruTransfer" type="text" class="form-control" id="mahasiswaBaruTransfer" placeholder="Silakan isi jumlah mahasiswa baru transfer disini" value="{{Input::old('mahasiswaBaruTransfer')}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('totalMahasiswaNonReguler'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('totalMahasiswaNonReguler')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Total Mahasiswa Non Reguler</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input name="totalMahasiswaNonReguler" type="text" class="form-control" id="totalMahasiswaNonReguler" placeholder="Silakan isi total mahasiswa reguler disini" value="{{Input::old('totalMahasiswaNonReguler')}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('totalMahasiswaTransfer'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('totalMahasiswaTransfer')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Total Mahasiswa transfer</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input name="totalMahasiswaTransfer" type="text" class="form-control" id="totalMahasiswaTransfer" placeholder="Silakan isi total mahasiswa transfer disini" value="{{Input::old('totalMahasiswaTransfer')}}" />
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