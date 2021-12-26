 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik IV</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-edit fa-fw"></i>Form Edit Organisasi Profesi 
		</div>		
		<div class="form-group">	
			<a href="{{URL::to('datadosen')}}" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'editorganisasiprofesi','method' => 'post')) !!}
              <div class="box-body ">
				@foreach($organisasiprof as $item)
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
					@if($errors->has('Tahun'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('Tahun')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Tahun</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <input name="Tahun" type="text" class="form-control" id="Tahun" placeholder="Silakan isi tahun kegiatan disini" value="{{$item->Tahun}}" />
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
                    <input name="nip" type="text" class="form-control" id="nip" placeholder="NIP dosen" value="{{$item->nip}}" />
                  </div>
				  
				  <div class="col-sm-5 nopad-right" >
                    <input readonly name="namaDosen" type="text" class="form-control" id="namaDosen"  placeholder="Nama dosen" value="{{$item->masterdosens->nama}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('namaOrganisasi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('namaOrganisasi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Nama Organisasi</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
					<input name="namaOrganisasi" type="text" class="form-control" id="namaOrganisasi" placeholder="Silakan isi nama organisasi disini" value="{{$item->namaOrganisasi}}" />
                  </div>
				  
                </div>
				
				
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('waktuMulai'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('waktuMulai')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Waktu Mulai</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <input  name="waktuMulai"  type="text" class="form-control datepicker" id="calendar" placeholder="Pilih Waktu Mulai" value="{{$item->waktuMulai}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('waktuSelesai'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('waktuSelesai')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Waktu Selesai</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <input  name="waktuSelesai"  type="text" class="form-control datepicker" id="calendar1" placeholder="Pilih waktu selesai" value="{{$item->waktuSelesai}}" />
                  </div>
				  
                </div>
				
				
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('tingkat'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('tingkat')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>tingkat</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                   <select name="tingkat" class="form-control" placeholder="">
						<option value="">--Silakan Pilih Tingkat Prestasi-- </option>
						<option value="Lokal"  <?php if ($item->tingkat == "Lokal") echo 'selected="selected"' ?> >Lokal</option> 		
						<option value="Nasional"  <?php if ($item->tingkat == "Nasional") echo 'selected="selected"' ?>>Nasional</option> 	
						<option value="Internasional"  <?php if ($item->tingkat == "Internasional") echo 'selected="selected"' ?> >Internasional</option> 		
					</select>
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