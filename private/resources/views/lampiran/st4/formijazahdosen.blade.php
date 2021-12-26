 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Lampiran Standar Akademik</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-folder-open fa-fw"></i>Form Lampiran Standar IV Ijazah Dosen
		</div>
		<p>Silakan unggah lampiran ijazah dan sertifikat dosen </p>
		
		<div class="form-group">	
			<a href="lampiran4" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		<p></p>
		
		{!!Form::open(array('class' =>'form-horizontal line','files' => 'true')) !!}
              <div class="box-body ">
				
			   <div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('nip'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('nip')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>NIP dan Nama Dosen</div>
					@endif
				  </div>

                  <div class="col-sm-4 nopad-right" >
                    <input name="nip" type="text" class="form-control" id="nip" placeholder="NIP dosen" value="{{Input::old('nip')}}" />
                  </div>
				  
				  <div class="col-sm-5 nopad-right" >
                    <input readonly name="namaDosen" type="text" class="form-control" id="namaDosen"  placeholder="Nama dosen" value="{{Input::old('namaDosen')}}" />
                  </div>
				  
                </div>		
               
               <div class="form-group ">
				   <div class="col-sm-3 nopad-left" >	
					@if($errors->has('jenis_lampiran'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jenis_lampiran')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Jenis Lampiran</div>
					@endif
				  </div>
				  
                  <div class="col-sm-9 nopad-right" >
                    <select name="jenis_lampiran" class="form-control" >
					<option value=""  >--Silakan Pilih Jenis Lampiran--</option> 		
					<option value="Ijazah Dosen"  <?php if (old("jenis_lampiran") == "Ijazah Dosen") echo 'selected="selected"' ?> > Ijazah Dosen</option> 		
					<option value="Sertifikat Dosen"  <?php if (old("jenis_lampiran") == "Sertifikat Dosen") echo 'selected="selected"' ?> >Sertifikat Dosen</option> 		
					
                    </select>
                  </div>
                </div>
				
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('ijazah_dosen'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('ijazah_dosen')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Nama File Lampiran</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
						<div class="col-xs-2" style="padding-right:15px;padding-left:0;">
							<div class="file-upload btn btn-block btn-primary">		
								<span><i class="fa fa-upload"></i>&nbsp;&nbsp;<b>Browse</b></span>
								<input  id="uploadBtn" name="ijazah_dosen" type="file" class="upload" />
							</div>
						</div>
						<div class="col-xs-10" style="padding-left:0px;padding-right:0;">
							<input class="form-control" id="uploadFile" placeholder="Unggah File Max 10MB" value="{{Input::old('ijazah_dosen')}}" disabled />
						</div>
						
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