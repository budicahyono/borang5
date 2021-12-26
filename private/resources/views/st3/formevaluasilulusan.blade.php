 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik III</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-plus-square fa-fw"></i>Form Tambah Evaluasi Lulusan
		</div>		
		<div class="form-group">	
			<a href="lulusan" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
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
					@if($errors->has('jenisKemampuan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jenisKemampuan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Jenis Kemampuan</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
					<select name="jenisKemampuan" class="form-control" placeholder="">
					@if ($level == 'admin')
					<option value="">--Silakan Pilih Jenis Kemampuan-- </option>
					@endif
					@foreach($masterjeniskemampuans as $item)
					<option value="{{$item->jenisKemampuan}}"  <?php if (old("jenisKemampuan") == $item->jenisKemampuan) echo 'selected="selected"' ?> >{{$item->jenisKemampuan}}</option> 		
					@endforeach
                    </select>
                  </div>
				 
                </div>
				
				 <div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('tanggapanSangatBaik'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('tanggapanSangatBaik')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Tanggapan Sangat Baik</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="tanggapanSangatBaik" type="text" class="form-control" id="tanggapanSangatBaik" placeholder="Silakan isi tanggapan sangat baik dalam persentase (%)" value="{{Input::old('tanggapanSangatBaik')}}" />
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('tanggapanBaik'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('tanggapanBaik')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Tanggapan Baik</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="tanggapanBaik" type="text" class="form-control" id="tanggapanBaik" placeholder="Silakan isi tanggapan baik dalam persentase (%)" value="{{Input::old('tanggapanBaik')}}" />
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('tanggapanCukup'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('tanggapanCukup')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Tanggapan Cukup</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="tanggapanCukup" type="text" class="form-control" id="tanggapanCukup" placeholder="Silakan isi tanggapan cukup dalam persentase (%)" value="{{Input::old('tanggapanCukup')}}" />
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('tanggapanKurang'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('tanggapanKurang')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Tanggapan Kurang</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="tanggapanKurang" type="text" class="form-control" id="tanggapanKurang" placeholder="Silakan isi tanggapan kurang dalam persentase (%)" value="{{Input::old('tanggapanKurang')}}" />
                  </div>
				 
                </div>
                
				  <div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('tindakLanjut'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('tindakLanjut')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Tindak Lanjut</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<textarea name="tindakLanjut" class="form-control ckeditor" id="tindakLanjut" placeholder="Silakan isi tindak lanjut disini">{{Input::old('tindakLanjut')}}</textarea>
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