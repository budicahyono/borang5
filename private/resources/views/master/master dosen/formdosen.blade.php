 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Data Master</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-plus-square fa-fw"></i>Form Tambah Master Dosen
		</div>
		
		<div class="form-group">	
			<a href="masterdosen" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
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
					@if($errors->has('nip'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('nip')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>NIP Dosen</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                    <input name="nip" type="text" class="form-control" id="nip" placeholder="Silakan isi NIP Dosen disini" value="{{Input::old('nip')}}" />
                  </div>
				  
                </div>	
				<div class="form-group ">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('nama'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('nama')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Nama Dosen</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Silakan isi Nama Dosen disini" value="{{Input::old('nama')}}" />
                  </div>
				  
                </div>	
				<div class="form-group ">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('nidn'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('nidn')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Nomor Induk Dosen Nasional</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                    <input name="nidn" type="text" class="form-control" id="nidn" placeholder="Silakan isi NIDN disini" value="{{Input::old('nidn')}}" />
                  </div>
				  
                </div>	
                <div class="form-group ">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('alamat'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('alamat')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Alamat Dosen</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                     <input name="alamat" type="text" class="form-control" id="alamat" placeholder="Silakan isi alamat dosen disini" value="{{Input::old('alamat')}}" />
                  </div>
                </div>
                <div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('tempatLahir'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('tempatLahir')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Tempat Lahir</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
                    <input name="tempatLahir" type="text" class="form-control" id="tempatLahir" placeholder="Silakan isi tempat lahir dosen disini" value="{{Input::old('tempatLahir')}}" />
                  </div>
				 
                </div>
				 <div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('tanggalLahir'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('tanggalLahir')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Tanggal Lahir</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input data-date-format="yyyy/mm/dd" name="tanggalLahir" readonly type="text" class="form-control datepicker" id="calendar" placeholder="Pilih Tanggal Lahir" value="{{Input::old('tanggalLahir')}}" />
                  </div>
				  
                </div>
               <div class="form-group">
                   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('jenisKelamin'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jenisKelamin')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Jenis Kelamin</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                     <input id="L"  type="radio" name="jenisKelamin" value="L" <?php if (old("jenisKelamin") == "L") echo "checked"; ?> >
						<label for="L" style="margin-right:20px" >Laki-Laki</label>
						<input id="P"  type="radio" name="jenisKelamin" value="P" <?php if (old("jenisKelamin") == "P") echo "checked"; ?>>
						<label for="P"  style="margin-right:20px">Perempuan</label>
                  </div>
				 
                </div>
				
				<div class="form-group">
                   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('statusKerja'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('statusKerja')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Status Kerja</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                     <input id="Tetap"  type="radio" name="statusKerja" value="Tetap" <?php if (old("statusKerja") == "Tetap") echo "checked"; ?> >
						<label for="Tetap" style="margin-right:20px" >Tetap</label>
						<input id="Tidak Tetap"  type="radio" name="statusKerja" value="P" <?php if (old("statusKerja") == "Tidak Tetap") echo "checked"; ?>>
						<label for="Tidak Tetap"  style="margin-right:20px">Tidak Tetap</label>
                  </div>
				 
                </div>
				<div class="form-group ">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('pendidikanTerakhir'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('pendidikanTerakhir')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pendidikan Terakhir</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                    <input name="pendidikanTerakhir" type="text" class="form-control" id="pendidikanTerakhir" placeholder="Silakan isi pendidikan terakhir disini" value="{{Input::old('pendidikanTerakhir')}}" />
                  </div>
				  
                </div>	
				
				<div class="form-group ">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('pangkatTerakhir'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('pangkatTerakhir')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pangkat Terakhir</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                    <select name="pangkatTerakhir" class="form-control" >
					<option value="">--Silakan Pilih Pangkat Terakhir-- </option>
					<option value="Penata Muda"  <?php if (old("pangkatTerakhir") == "Penata Muda") echo 'selected="selected"' ?> >Penata Muda</option> 		
					<option value="TK. 1"  <?php if (old("pangkatTerakhir") == "TK. 1") echo 'selected="selected"' ?> >TK. 1</option> 		
					<option value="Pembina"  <?php if (old("pangkatTerakhir") == "Pembina") echo 'selected="selected"' ?> >Pembina</option> 		
					<option value="Pembina Muda"  <?php if (old("pangkatTerakhir") == "Pembina Muda") echo 'selected="selected"' ?> >Pembina</option> 		
                    </select>
                  </div>
				  
                </div>	
				
				<div class="form-group ">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('fungsionalTerakhir'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('fungsionalTerakhir')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Fungsional Terakhir</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                    <select name="fungsionalTerakhir" class="form-control" >
					<option value="">--Silakan Pilih Fungsional Terakhir-- </option>
					<option value="AA"  <?php if (old("fungsionalTerakhir") == "AA") echo 'selected="selected"' ?> >Asisten Ahli</option> 		
					<option value="L"  <?php if (old("fungsionalTerakhir") == "L") echo 'selected="selected"' ?> >L</option> 		
					<option value="LK"  <?php if (old("fungsionalTerakhir") == "LK") echo 'selected="selected"' ?> >LK</option> 		
					<option value="GB"  <?php if (old("fungsionalTerakhir") == "GB") echo 'selected="selected"' ?> >GB</option> 		
					<option value="TP"  <?php if (old("fungsionalTerakhir") == "TP") echo 'selected="selected"' ?> >TP</option> 		
                    </select>
                  </div>
				  
                </div>	
				
				<div class="form-group">
                   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('sesuaiBidangPS'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('sesuaiBidangPS')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Sesuai Bidang Program Studi</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                     <input id="Ya"  type="radio" name="sesuaiBidangPS" value="Ya" <?php if (old("sesuaiBidangPS") == "Ya") echo "checked"; ?> >
						<label for="Ya" style="margin-right:20px" >Ya</label>
						<input id="Tidak"  type="radio" name="sesuaiBidangPS" value="Tidak" <?php if (old("sesuaiBidangPS") == "Tidak") echo "checked"; ?>>
						<label for="Tidak"  style="margin-right:20px">Tidak</label>
                  </div>
				 
                </div>
				
				<div class="form-group ">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('bidangKeahlian'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('bidangKeahlian')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Bidang Keahlian</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                    <input name="bidangKeahlian" type="text" class="form-control" id="bidangKeahlian" placeholder="Silakan isi bidang keahlian disini" value="{{Input::old('bidangKeahlian')}}" />
                  </div>
				  
                </div>	
				
				<div class="form-group">
                   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('sertifikatDosen'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('sertifikatDosen')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Sertifikat Dosen</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                     <input id="Ada"  type="radio" name="sertifikatDosen" value="Ada" <?php if (old("sertifikatDosen") == "Ada") echo "checked"; ?> >
						<label for="Ada" style="margin-right:20px" >Ada</label>
						<input id="Tidak"  type="radio" name="sertifikatDosen" value="Tidak" <?php if (old("sertifikatDosen") == "Tidak") echo "checked"; ?>>
						<label for="Tidak"  style="margin-right:20px">Tidak</label>
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