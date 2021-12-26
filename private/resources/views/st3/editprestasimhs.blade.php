 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik III</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-edit fa-fw"></i>Form Edit Prestasi Mahasiswa
		</div>		
		<div class="form-group">	
			<a href="{{URL::to('mahasiswa')}}" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'editprestasimhs','method' => 'post')) !!}
              <div class="box-body ">
				@foreach($prestasimhs as $item)
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
                    <select  disabled ="idprodi" class="form-control" placeholder="">
					<option value="{{$item->idprodi}}"  <?php if (old("idprodi") == $item->idprodi) echo 'selected="selected"' ?> >{{$item->masterprodis->namaProdi}}</option> 		
                    </select>
					<input type="hidden" name="idprodi" value="{{$item->masterprodis->namaProdi}}"/>
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
                    <input name="namaKegiatan" type="text" class="form-control" id="namaKegiatan" placeholder="Silakan isi nama kegiatan disini" value="{{$item->namaKegiatan}}" />
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
                    <input data-date-format="yyyy/mm/dd" name="waktu" readonly type="text" class="form-control datepicker" id="calendar" placeholder="Pilih Tanggal Kegiatan" value="{{ date('Y-m-d', strtotime($item->waktu)) }}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('tingkat'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('tingkat')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Tingkat Prestasi</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                   <select name="tingkat" class="form-control" placeholder="">
						<option value="">--Silakan Pilih Tingkat Prestasi-- </option>
						<option value="Lokal"  <?php if ($item->tingkat  == "Lokal") echo 'selected="selected"' ?> >Lokal</option> 		
						<option value="Wilayah" <?php if ($item->tingkat  == "Wilayah") echo 'selected="selected"' ?> >Wilayah</option> 		
						<option value="Nasional"  <?php if ($item->tingkat  == "Nasional") echo 'selected="selected"' ?> >Nasional</option> 		
						<option value="Internasional" <?php if ($item->tingkat  == "Internasional") echo 'selected="selected"' ?>  >Internasional</option> 		
					</select>
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('prestasi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('prestasi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Prestasi Mahasiswa</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <input name="prestasi" type="text" class="form-control" id="prestasi" placeholder="Silakan isi prestasi mahasiswa disini" value="{{$item->prestasi}}" />
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