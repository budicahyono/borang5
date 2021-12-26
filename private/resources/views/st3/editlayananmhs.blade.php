 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik III</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-edit fa-fw"></i>Form Edit Layanan Mahasiswa
		</div>		
		<div class="form-group">	
			<a href="{{URL::to('mahasiswa')}}" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'editlayananmhs','method' => 'post')) !!}
              <div class="box-body ">
				@foreach($layananmhs as $item)
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
                    <select  disabled ="idprodi" class="form-control" placeholder="">
					<option value="{{$item->idprodi}}"  <?php if (old("idprodi") == $item->idprodi) echo 'selected="selected"' ?> >{{$item->masterprodis->namaProdi}}</option> 		
                    </select>
					<input type="hidden" name="idprodi" value="{{$item->masterprodis->namaProdi}}"/>
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
						<option value="Bimbingan & Konseling"  <?php if ($item->jenisKegiatan == "Bimbingan & Konseling") echo 'selected="selected"' ?> >Bimbingan & Konseling</option> 		
						<option value="Ekstrakurikuler"  <?php if ($item->jenisKegiatan == "Ekstrakurikuler") echo 'selected="selected"' ?> >Ekstrakurikuler</option> 		
						<option value="Pembinaan Soft Skill"  <?php if ($item->jenisKegiatan == "Pembinaan Soft Skill") echo 'selected="selected"' ?> >Pembinaan Soft Skill</option> 		
						<option value="Beasiswa"  <?php if ($item->jenisKegiatan == "Beasiswa") echo 'selected="selected"' ?> >Beasiswa</option> 		
						<option value="Kesehatan"  <?php if ($item->jenisKegiatan == "Kesehatan") echo 'selected="selected"' ?> >Kesehatan</option> 		
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
					<textarea name="isiKegiatan" class="form-control ckeditor" id="isiKegiatan" placeholder="Silakan isi Kegiatan disini">{{$item->isiKegiatan}}</textarea>
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