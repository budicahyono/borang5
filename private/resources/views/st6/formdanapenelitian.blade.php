 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik VI</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-plus-square fa-fw"></i>Form Dana Penelitian
		</div>
		
		<div class="form-group">	
			<a href="pembiayaan" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
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
				
                 <div class="form-group ">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('jenisKegiatan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jenisKegiatan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Jenis Kegiatan</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                    <select name="jenisKegiatan" class="form-control" >
					<option value="">--Pilih Jenis Kegiatan-- </option>
					<option value="Penelitian" <?php if (old("jenisKegiatan") == "Penelitian") echo 'selected="selected"' ?>>Penelitian</option>
					<option value="Pengabdian Kepada Masyarakat" <?php if (old("jenisKegiatan") == "Pengabdian Kepada Masyarakat") echo 'selected="selected"' ?> >Pengabdian Kepada Masyarakat</option>
                    </select>
                  </div>
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('judul'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('judul')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Judul</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="judul" type="text" class="form-control" id="jenisDana" placeholder="Silakan isi Judul" value="{{Input::old('judul')}}" />
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('tahun'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('tahun')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Tahun</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="tahun" type="text" class="form-control" id="jenisDana" placeholder="Silakan isi Tahun" value="{{Input::old('tahun')}}" />
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('penulisLainnya'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('penulisLainnya')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Penulis Lainnya</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="penulisLainnya" type="text" class="form-control" id="penulisLainnya" placeholder="Silakan Penulis Lainnya" value="{{Input::old('penulisLainnya')}}" />
                  </div>
				 
                </div>
				
				<div class="form-group ">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('idbiaya'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idbiaya')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Sumber Biaya</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                    <select name="idbiaya" class="form-control" >
					<option value="">--Pilih Sumber Biaya-- </option>
					<?php foreach ($idbiaya as $item ) { ?>
					<option value="<?php echo $item->idbiaya ?>" <?php if (old("idbiaya") == "$item->idbiaya") echo 'selected="selected"' ?> ><?php echo $item->sumberBiaya ?></option>
					<?php } ?>
                    </select>
					
                  </div>
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('jenisDana'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jenisDana')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Jenis Dana</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="jenisDana" type="text" class="form-control" id="jenisDana" placeholder="Silakan isi jenis Dana" value="{{Input::old('jenisDana')}}" />
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('jumlahDana'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jumlahDana')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Jumlah Dana</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="jumlahDana" type="text" class="form-control" id="jumlahDana" placeholder="Silakan isi Jumlah Dana" value="{{Input::old('jumlahDana')}}" />
                  </div>
				 
                </div>
				
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('jumlahMahasiswa'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jumlahMahasiswa')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Jumlah Mahasiswa</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="jumlahMahasiswa" type="text" class="form-control" id="jumlahMahasiswa" placeholder="Silakan isi jumlah Mahasiswa" value="{{Input::old('jumlahMahasiswa')}}" />
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('jumlahMahasiswaTA'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jumlahMahasiswaTA')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Jumlah Mahasiswa TA</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="jumlahMahasiswaTA" type="text" class="form-control" id="jumlahMahasiswaTA" placeholder="Silakan Isi Jumlah Mahasiswa TA" value="{{Input::old('jumlahMahasiswaTA')}}" />
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('deskripsiPartisipasiMahasiswa'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('deskripsiPartisipasiMahasiswa')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Deskripsi Partisipasi Mahasiswa</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="deskripsiPartisipasiMahasiswa" type="text" class="form-control" id="deskripsiPartisipasiMahasiswa" placeholder="Silakan Isi Deskripsi Partisipasi Mahasiswa" value="{{Input::old('deskripsiPartisipasiMahasiswa')}}" />
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