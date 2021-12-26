 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik V</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-edit fa-fw"></i>Form Edit Proses Pembimbingan Akademik
		</div>
		
		<div class="form-group">	
			<a href="{{URL::to('pembelajaran')}}" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		<p></p>
		
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'editprosespembimbinganakademik','method' => 'post')) !!}
              <div class="box-body ">
				@foreach($pembimbingan as $item)
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
					@if($errors->has('Hal'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('Hal')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Perihal</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                   <select name="Hal" class="form-control" placeholder="">
						<option value="">--Silakan Pilih Perihal-- </option>
						<option value="Tujuan Pembimbingan"  <?php if ($item->Hal == "Tujuan Pembimbingan") echo 'selected="selected"' ?> >Tujuan Pembimbingan</option> 		
						<option value="Pelaksanaan Pembimbingan"  <?php if ($item->Hal == "Pelaksanaan Pembimbingan") echo 'selected="selected"' ?>>Pelaksanaan Pembimbingan</option> 	
						<option value="Masalah yang dibicarakan dalam pembimbingan"  <?php if ($item->Hal == "Masalah yang dibicarakan dalam pembimbingan") echo 'selected="selected"' ?> >Masalah yang dibicarakan dalam pembimbingan</option> 		
						<option value="Kesulitan dalam pembimbingan dan upaya untuk mengatasinya"  <?php if ($item->Hal == "Kesulitan dalam pembimbingan dan upaya untuk mengatasinya") echo 'selected="selected"' ?> >Kesulitan dalam pembimbingan dan upaya untuk mengatasinya</option> 		
						<option value="Manfaat yang diperoleh mahasiswa dari pembimbingan"  <?php if ($item->Hal == "Manfaat yang diperoleh mahasiswa dari pembimbingan") echo 'selected="selected"' ?> >Manfaat yang diperoleh mahasiswa dari pembimbingan</option> 		
					</select>
                  </div>
				  
                </div>
				
				 <div class="form-group">
				   <div class="col-sm-3 nopad-left" >	
					@if($errors->has('penjelasan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('penjelasan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>penjelasan</div>
					@endif
				  </div>
				 
                  <div class="col-sm-9 nopad-right" >
                    <textarea name="penjelasan" class="form-control ckeditor" id="penjelasan" placeholder="Silakan isi penjelasan disini">{{$item->penjelasan}}</textarea>
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