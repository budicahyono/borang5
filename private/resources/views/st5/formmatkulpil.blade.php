 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik V</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-plus-square fa-fw"></i>Form Tambah Mata Kuliah Pilihan
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
					@if($errors->has('idmatakuliah'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idmatakuliah')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Kode Mata Kuliah</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input name="idmatakuliah" type="text" class="form-control text-capitalize"  placeholder="Kode Mata Kuliah" value="{{Input::old('idmatakuliah')}}" />
                  </div>
				  
				  
				  
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('namaMKPilihan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('namaMKPilihan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Nama Mata Kuliah Pilihan</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="namaMKPilihan" type="text" class="form-control" id="namaMKPilihan" placeholder="Silakan isi nama mata kuliah pilihan disini" value="{{Input::old('namaMKPilihan')}}" />
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('bobotsks'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('bobotsks')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>bobot SKS</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="bobotsks" type="text" class="form-control" id="bobotsks" placeholder="Silakan isi bobot SKS disini" value="{{Input::old('bobotsks')}}" />
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('bobottugas'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('bobottugas')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>bobot tugas</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="bobottugas" type="text" class="form-control" id="bobottugas" placeholder="Silakan isi bobot tugas disini" value="{{Input::old('bobottugas')}}" />
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('Unit'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('Unit')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Unit/ Jur/ Fak Pengelola</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="Unit" type="text" class="form-control" id="Unit" placeholder="Silakan isi Unit disini" value="{{Input::old('Unit')}}" />
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('Semester'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('Semester')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Semester</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="Semester" type="text" class="form-control" id="Semester" placeholder="Silakan isi Semester disini" value="{{Input::old('Semester')}}" />
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