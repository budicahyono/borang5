 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik IV</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-plus-square fa-fw"></i>Form Tambah Aktivitas Mengajar Dosen dalam SKS
		</div>		
		<div class="form-group">	
			<a href="datadosen" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
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
					@if($errors->has('nip'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('nip')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>NIP dan Nama Dosen</div>
					@endif
				  </div>

                  <div class="col-sm-3 nopad-right" >
                    <input name="nip" type="text" class="form-control" id="nip" placeholder="NIP dosen" value="{{Input::old('nip')}}" />
                  </div>
				  
				  <div class="col-sm-5 nopad-right" >
                    <input readonly name="namaDosen" type="text" class="form-control" id="namaDosen"  placeholder="Nama dosen" value="{{Input::old('namaDosen')}}" />
                  </div>
				  
                </div>
			
				
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('sks_PSsendiri'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('sks_PSsendiri')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>SKS PS Sendiri</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input name="sks_PSsendiri" type="text" class="form-control" id="sks_PSsendiri" placeholder="Silakan isi SKS Prodi Sendiri disini" value="{{Input::old('sks_PSsendiri')}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('sks_PSLainPTsendiri'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('sks_PSLainPTsendiri')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>SKS PS Lain PT Sendiri</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input name="sks_PSLainPTsendiri" type="text" class="form-control" id="sks_PSLainPTsendiri" placeholder="Silakan isi SKS PS Lain PT Sendiri disini" value="{{Input::old('sks_PSLainPTsendiri')}}" />
                  </div>
				  
                </div>	
				
				 <div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('sks_PTLain'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('sks_PTLain')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>SKS PT Lain</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input name="sks_PTLain" type="text" class="form-control" id="sks_PTLain" placeholder="Silakan isi SKS PT Lain disini" value="{{Input::old('sks_PTLain')}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('sks_penelitian'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('sks_penelitian')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>SKS Penelitian</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input name="sks_penelitian" type="text" class="form-control" id="sks_penelitian" placeholder="Silakan isi SKS Penelitian disini" value="{{Input::old('sks_penelitian')}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('sks_Pengabdian'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('sks_Pengabdian')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>SKS Pengabdian</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input name="sks_Pengabdian" type="text" class="form-control" id="sks_Pengabdian" placeholder="Silakan isi SKS Pengabdian disini" value="{{Input::old('sks_Pengabdian')}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('sks_man_PSsendiri'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('sks_man_PSsendiri')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>SKS Manajemen PS Sendiri</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input name="sks_man_PSsendiri" type="text" class="form-control" id="sks_man_PSsendiri" placeholder="Silakan isi SKS Manajemen PS Sendiri disini" value="{{Input::old('sks_man_PSsendiri')}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('sks_man_PTlain'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('sks_man_PTlain')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>SKS Manajemen PT Lain</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input name="sks_man_PTlain" type="text" class="form-control" id="sks_man_PTlain" placeholder="Silakan isi SKS Manajemen PT Lain disini" value="{{Input::old('sks_man_PTlain')}}" />
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