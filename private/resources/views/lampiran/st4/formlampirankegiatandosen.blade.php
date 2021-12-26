 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Lampiran Standar Akademik</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-folder-open fa-fw"></i>Form Lampiran Standar IV Bukti Kegiatan Dosen
		</div>
		<p>Silakan unggah lampiran bukti kegiatan dosen tetap dalam seminar ilmiah / lokakarya / penataran / workshop / pagelaran / pameran / peragaan</p>
		
		<div class="form-group">	
			<a href="{{URL::to('lampiran4')}}" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'addlampirankegiatandosen','method' => 'post','files' => 'true')) !!}
              <div class="box-body ">
				@foreach($tbkegiatandosens as $item)
				<input type="hidden" name="id" value="{{$item->id}}"/>
                <div class="form-group ">
				   <div class="col-sm-3 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-9 nopad-right" >
                   <select disabled name="idprodi" class="form-control" placeholder="">
					<option value="{{$item->idprodi}}"  <?php if (old("idprodi") == $item->idprodi) echo 'selected="selected"' ?> >{{$item->masterprodis->namaProdi}}</option> 		
                    </select>
					<input type="hidden" name="idprodi" value="{{$item->masterprodis->namaProdi}}"/>
                  </div>
                </div>
              
				  <div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('nip'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('nip')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>NIP dan Nama Dosen</div>
					@endif
				  </div>

                  <div class="col-sm-4 nopad-right" >
                    <input disabled name="nip" type="text" class="form-control" id="nip" placeholder="NIP dosen" value="{{$item->nip}}" />
                  </div>
				  
				  <div class="col-sm-5 nopad-right" >
                    <input disabled name="namaDosen" type="text" class="form-control" id="namaDosen"  placeholder="Nama dosen" value="{{$item->masterdosens->nama}}" />
                  </div>
				  
                </div>	
				
				 <div class="form-group ">
				   <div class="col-sm-3 nopad-left" >	
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Jenis Kegiatan</div>
				  </div>
				  
                  <div class="col-sm-9 nopad-right" >
                   <input class="form-control" placeholder="" value="{{ $item->jenisKegiatan }}" disabled />
                  </div>
                </div>
				
				 <div class="form-group ">
				   <div class="col-sm-3 nopad-left" >	
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Nama Kegiatan</div>
				  </div>
				  
                  <div class="col-sm-9 nopad-right" >
                   <input class="form-control" placeholder="" value="{{ $item->namaKegiatan }}" disabled />
                  </div>
                </div>
				
			  
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('bukti_kegiatandosen'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('bukti_kegiatandosen')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Nama File Lampiran</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
						<div class="col-xs-2" style="padding-right:15px;padding-left:0;">
							<div class="file-upload btn btn-block btn-primary">		
								<span><i class="fa fa-upload"></i>&nbsp;&nbsp;<b>Browse</b></span>
								<input  id="uploadBtn" name="bukti_kegiatandosen" type="file" class="upload" />
							</div>
						</div>
						<div class="col-xs-10" style="padding-left:0px;padding-right:0;">
							<input class="form-control" id="uploadFile" placeholder="Unggah File Max 10MB" value="{{Input::old('bukti_kegiatandosen')}}" disabled />
						</div>
						
                  </div>
				  
                </div>
               @endforeach
               



                
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