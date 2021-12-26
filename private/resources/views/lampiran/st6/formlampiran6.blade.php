 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Lampiran Standar Akademik</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-folder-open fa-fw"></i>Form Lampiran Standar VI
		</div>
		<p>Silakan unggah lampiran SK Pendirian dan SK Izin Operasional Program Studi </p>
		
		<div class="form-group">	
			<a href="lampiran1" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		<p></p>
		
		{!!Form::open(array('class' =>'form-horizontal line','files' => 'true')) !!}
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
					<option value="SK Pendirian Prodi"  <?php if (old("jenis_lampiran") == "SK Pendirian Prodi") echo 'selected="selected"' ?> >SK Pendirian Prodi</option> 		
					<option value="SK Izin Operasional Prodi"  <?php if (old("jenis_lampiran") == "SK Izin Operasional Prodi") echo 'selected="selected"' ?> >SK Izin Operasional Prodi</option> 		
					
                    </select>
                  </div>
                </div>
				
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('sk_prodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('sk_prodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Nama File Lampiran</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
						<div class="col-xs-2" style="padding-right:15px;padding-left:0;">
							<div class="file-upload btn btn-block btn-primary">		
								<span><i class="fa fa-upload"></i>&nbsp;&nbsp;<b>Browse</b></span>
								<input  id="uploadBtn" name="sk_prodi" type="file" class="upload" />
							</div>
						</div>
						<div class="col-xs-10" style="padding-left:0px;padding-right:0;">
							<input class="form-control" id="uploadFile" placeholder="Unggah File Max 10MB" value="{{Input::old('sk_prodi')}}" disabled />
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