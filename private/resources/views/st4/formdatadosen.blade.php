 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik IV</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-plus-square fa-fw"></i>Form Tambah Kegiatan Dosen
		</div>		
		<div class="form-group">	
			<a href="datadosen" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line')) !!}
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
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('Tahun'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('Tahun')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Tahun</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <input name="Tahun" type="text" class="form-control" id="Tahun" placeholder="Silakan isi tahun kegiatan disini" value="{{Input::old('Tahun')}}" />
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
                    <input name="nip" type="text" class="form-control" id="nip" placeholder="NIP dosen" value="{{Input::old('nip')}}" />
                  </div>
				  
				  <div class="col-sm-5 nopad-right" >
                    <input readonly name="namaDosen" type="text" class="form-control" id="namaDosen"  placeholder="Nama dosen" value="{{Input::old('namaDosen')}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('jenisKegiatan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jenisKegiatan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Jenis Kegiatan</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                   <select name="jenisKegiatan" class="form-control" placeholder="">
						<option value="">--Silakan Pilih Jenis Kegiatan-- </option>
						<option value="Seminar Ilmiah" <?php if (old("jenisKegiatan") == "Seminar Ilmiah") echo 'selected="selected"' ?> >Seminar Ilmiah</option> 		
						<option value="Lokakarya"  <?php if (old("jenisKegiatan") == "Lokakarya") echo 'selected="selected"' ?>>Lokakarya</option> 		
						<option value="Penataran/Pelatihan" <?php if (old("jenisKegiatan") == "Penataran/Pelatihan") echo 'selected="selected"' ?> >Penataran/Pelatihan</option> 		
						<option value="Workshop" <?php if (old("jenisKegiatan") == "Workshop") echo 'selected="selected"' ?> >Workshop</option> 		
						<option value="Pagelaran" <?php if (old("jenisKegiatan") == "Pagelaran") echo 'selected="selected"' ?> >Pagelaran</option> 		
						<option value="Pameran" <?php if (old("jenisKegiatan") == "Pameran") echo 'selected="selected"' ?> >Pameran</option> 		
						<option value="Peragaan"  <?php if (old("jenisKegiatan") == "Peragaan") echo 'selected="selected"' ?>>Peragaan</option> 		
						<option value="dll"<?php if (old("jenisKegiatan") == "dll") echo 'selected="selected"' ?>  >dll</option> 		
					</select>
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('namaKegiatan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('namaKegiatan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Nama Kegiatan</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <input name="namaKegiatan" type="text" class="form-control" id="namaKegiatan" placeholder="Silakan isi nama kegiatan disini" value="{{Input::old('namaKegiatan')}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('tempat'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('tempat')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Tempat</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <input name="tempat" type="text" class="form-control" id="tempat" placeholder="Silakan isi tempat kegiatan disini" value="{{Input::old('tempat')}}" />
                  </div>
				  
                </div>
				
				 <div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('waktu'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('waktu')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Tanggal Kegiatan</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <input  name="waktu"  type="text" class="form-control datepicker" id="calendar" placeholder="Pilih Tanggal Kegiatan" value="{{Input::old('waktu')}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('sebagai'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('sebagai')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Peran Dosen</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                   <select name="sebagai" class="form-control" placeholder="">
						<option value="">--Silakan Pilih Peran Dosen-- </option>
						<option value="Penyaji"  <?php if (old("sebagai") == "Penyaji") echo 'selected="selected"' ?> >Penyaji</option> 		
						<option value="Peserta"  <?php if (old("sebagai") == "Peserta") echo 'selected="selected"' ?>>Peserta</option> 		
					</select>
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