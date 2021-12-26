 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik V</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-plus-square fa-fw"></i>Form Tambah Hasil Peninjauan Kurikulum
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
		
				
				 <div class="form-group ">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('idpeninjauan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idpeninjauan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Peninjauan</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                    <select name="idpeninjauan" class="form-control" >
					<option value="">--Silakan Pilih Peninjauan-- </option>
					@foreach($peninjauan as $item)
					<option value="{{$item->id}}"  <?php if (old("idpeninjauan") == $item->id) echo 'selected="selected"' ?> >Ini Peninjauan Kurikulum {{ $item->masterprodis->namaProdi }} </option> 		
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
				
				 <div class="form-group ">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('statusMK'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('statusMK')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Status Mata Kuliah</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                    <select name="statusMK" class="form-control" >
					<option value="">--Silakan Pilih Status Mata Kuliah-- </option>
					<option value="Baru"  <?php if (old("statusMK") == "Baru") echo 'selected="selected"' ?> >Baru</option> 		
					<option value="Lama"  <?php if (old("statusMK") == "Lama") echo 'selected="selected"' ?> >Lama</option> 		
					<option value="Hapus"  <?php if (old("statusMK") == "Hapus") echo 'selected="selected"' ?> >Hapus</option> 		
					
                    </select>
                  </div>
                </div>
				
				<div class="form-group ">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('perubahanPada'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('perubahanPada')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Perubahan Pada</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                    <select name="perubahanPada" class="form-control" >
					<option value="">--Perubahan Pada-- </option>
					<option value="Silabus/SAP"  <?php if (old("perubahanPada") == "Silabus/SAP") echo 'selected="selected"' ?> >Silabus/SAP</option> 		
					<option value="Buku Ajar"  <?php if (old("perubahanPada") == "Buku Ajar") echo 'selected="selected"' ?> >Buku Ajar</option> 	
                    </select>
                  </div>
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('isiPerubahan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('isiPerubahan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>isi Perubahan</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
                    <textarea name="isiPerubahan" class="form-control ckeditor" id="isiPerubahan" placeholder="Input isi Perubahan disini">{{Input::old('isiPerubahan')}}</textarea>
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('alasanPeninjauan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('alasanPeninjauan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>alasan Peninjauan</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
                    <textarea name="alasanPeninjauan" class="form-control ckeditor" id="alasanPeninjauan" placeholder="Input alasan Peninjauan disini">{{Input::old('alasanPeninjauan')}}</textarea>
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('atasUsulan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('atasUsulan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>atas Usulan</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
					<input name="atasUsulan" type="text" class="form-control" id="atasUsulan" placeholder="Silakan isi atas usulan disini" value="{{Input::old('atasUsulan')}}" />
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('semesterBerlaku'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('semesterBerlaku')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>semester berlaku</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
					<input name="semesterBerlaku" type="text" class="form-control" id="semesterBerlaku" placeholder="Silakan isi semester berlaku disini" value="{{Input::old('semesterBerlaku')}}" />
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('tahunBerlaku'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('tahunBerlaku')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>tahun berlaku</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
					<input name="tahunBerlaku" type="text" class="form-control" id="tahunBerlaku" placeholder="Silakan isi tahun berlaku disini" value="{{Input::old('tahunBerlaku')}}" />
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