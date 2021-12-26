 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik IV</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-plus-square fa-fw"></i>Form Tambah Pendidikan Dosen 
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
					@if($errors->has('jenjang'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jenjang')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>jenjang</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <select name="jenjang" class="form-control" placeholder="">
						<option value="">--Silakan Pilih Jenjang-- </option>
						<option value="S1"  <?php if (old("jenjang") == "S1") echo 'selected="selected"' ?> >S1</option> 		
						<option value="S2"  <?php if (old("jenjang") == "S2") echo 'selected="selected"' ?> >S2</option> 		
						<option value="S3"  <?php if (old("jenjang") == "S3") echo 'selected="selected"' ?> >S3</option> 		
					</select>
                  </div>
				  
                </div>
				
				
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('namaSekolah'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('namaSekolah')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Nama Sekolah</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
					<input name="namaSekolah" type="text" class="form-control" id="namaSekolah" placeholder="Silakan isi nama sekolah disini" value="{{Input::old('namaSekolah')}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('bidangKeahlian'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('bidangKeahlian')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>bidangKeahlian</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                   <select name="bidangKeahlian" class="form-control" placeholder="">
						<option value="">--Silakan Pilih bidang Keahlian-- </option>
						@foreach($keahlian as $item)
						<option value="{{$item->bidangKeahlian}}"  <?php if (old("bidangKeahlian") == $item->bidangKeahlian) echo 'selected="selected"' ?> >{{$item->bidangKeahlian}}</option> 		
					@endforeach	
					</select>
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('gelar'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('gelar')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Nama Sekolah</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
					<input name="gelar" type="text" class="form-control" id="gelar" placeholder="Silakan isi gelar disini" value="{{Input::old('gelar')}}" />
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