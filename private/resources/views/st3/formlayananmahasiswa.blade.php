 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik III</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-plus-square fa-fw"></i>Form Tambah Layanan Mahasiswa
		</div>		
		<div class="form-group">	
			<a href="mahasiswa" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
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
					@if($errors->has('jenisKegiatan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jenisKegiatan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Jenis Layanan</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<select name="jenisKegiatan" class="form-control" placeholder="">
						<option value="">--Silakan Pilih Jenis Layanan-- </option>
						<option value="Bimbingan & Konseling"  <?php if (old("jenisKegiatan") == "Bimbingan & Konseling") echo 'selected="selected"' ?> >Bimbingan & Konseling</option> 		
						<option value="Ekstrakurikuler"  <?php if (old("jenisKegiatan") == "Ekstrakurikuler") echo 'selected="selected"' ?> >Ekstrakurikuler</option> 		
						<option value="Pembinaan Soft Skill"  <?php if (old("jenisKegiatan") == "Pembinaan Soft Skill") echo 'selected="selected"' ?> >Pembinaan Soft Skill</option> 		
						<option value="Beasiswa"  <?php if (old("jenisKegiatan") == "Beasiswa") echo 'selected="selected"' ?> >Beasiswa</option> 		
						<option value="Kesehatan"  <?php if (old("jenisKegiatan") == "Kesehatan") echo 'selected="selected"' ?> >Kesehatan</option> 		
						</select>
                  </div>
				 
                </div>
				
                 <div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('isiKegiatan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('isiKegiatan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Isi Kegiatan</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
					<textarea name="isiKegiatan" class="form-control ckeditor" id="isiKegiatan" placeholder="Silakan isi Kegiatan disini">{{Input::old('isiKegiatan')}}</textarea>
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