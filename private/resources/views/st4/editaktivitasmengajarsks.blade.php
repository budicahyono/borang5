 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik IV</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-edit fa-fw"></i>Form Edit Aktivitas Mengajar Dosen dalam SKS
		</div>		
		<div class="form-group">	
			<a href="{{URL::to('datadosen')}}" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'editaktivitasmengajarsks','method' => 'post')) !!}
              <div class="box-body ">
				@foreach($aktivitassks as $item)
				<input type="hidden" name="id" value="{{$item->id}}"/>
                <div class="form-group ">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                   <select disabled name="idprodi" class="form-control" placeholder="">
					<option value="{{$item->idprodi}}"  <?php if (old("idprodi") == $item->idprodi) echo 'selected="selected"' ?> >{{$item->masterprodis->namaProdi}}</option> 		
                    </select>
					<input type="hidden" name="idprodi" value="{{$item->masterprodis->namaProdi}}"/>
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
                    <input name="tahunAkademik" type="text" class="form-control" id="tahunAkademik" placeholder="Silakan isi tahun akademik disini" value="{{$item->tahunAkademik}}" />
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
                    <input disabled name="nip" type="text" class="form-control" id="nip" placeholder="NIP dosen" value="{{$item->nip}}" />
                    <input  name="nip" type="hidden" class="form-control" id="nip" placeholder="NIP dosen" value="1" />
                  </div>
				  
				  <div class="col-sm-5 nopad-right" >
                    <input disabled name="namaDosen" type="text" class="form-control" id="namaDosen"  placeholder="Nama dosen" value="{{$item->masterdosens->nama}}" />
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
                    <input name="sks_PSsendiri" type="text" class="form-control" id="sks_PSsendiri" placeholder="Silakan isi SKS Prodi Sendiri disini" value="{{$item->sks_PSsendiri}}" />
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
                    <input name="sks_PSLainPTsendiri" type="text" class="form-control" id="sks_PSLainPTsendiri" placeholder="Silakan isi SKS PS Lain PT Sendiri disini" value="{{$item->sks_PSLainPTsendiri}}" />
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
                    <input name="sks_PTLain" type="text" class="form-control" id="sks_PTLain" placeholder="Silakan isi SKS PT Lain disini" value="{{$item->sks_PTLain}}" />
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
                    <input name="sks_penelitian" type="text" class="form-control" id="sks_penelitian" placeholder="Silakan isi SKS Penelitian disini" value="{{$item->sks_penelitian}}" />
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
                    <input name="sks_Pengabdian" type="text" class="form-control" id="sks_Pengabdian" placeholder="Silakan isi SKS Pengabdian disini" value="{{$item->sks_Pengabdian}}" />
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
                    <input name="sks_man_PSsendiri" type="text" class="form-control" id="sks_man_PSsendiri" placeholder="Silakan isi SKS Manajemen PS Sendiri disini" value="{{$item->sks_man_PSsendiri}}" />
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
                    <input name="sks_man_PTlain" type="text" class="form-control" id="sks_man_PTlain" placeholder="Silakan isi SKS Manajemen PT Lain disini" value="{{$item->sks_man_PTlain}}" />
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