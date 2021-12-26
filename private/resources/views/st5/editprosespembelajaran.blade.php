 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik V</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-edit fa-fw"></i>Form Edit Proses Pembelajaran
		</div>
		
		<div class="form-group">	
			<a href="{{URL::to('pembelajaran')}}" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		<p></p>
		
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'editprosespembelajaran','method' => 'post')) !!}
              <div class="box-body ">
				@foreach($pembelajaran as $item)
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
                    <select disabled name="idprodi" class="form-control" placeholder="">
					<option value="{{$item->idprodi}}"  <?php if (old("idprodi") == $item->idprodi) echo 'selected="selected"' ?> >{{$item->masterprodis->namaProdi}}</option> 		
                    </select>
					<input type="hidden" name="idprodi" value="{{$item->masterprodis->namaProdi}}"/>
                  </div>
                </div>
				
               
				 <div class="form-group text-justify">
				Jelaskan mekanisme penyusunan materi kuliah dan monitoring perkuliahan, antara lain kehadiran dosen dan mahasiswa, serta materi kuliah.
				 </div>
				
                <div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('mekanismePenyusunan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('mekanismePenyusunan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Mekanisme Penyusunan</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
                    <textarea name="mekanismePenyusunan" class="form-control ckeditor" id="mekanismePenyusunan" placeholder="Silakan isi mekanisme penyusunan disini">{{$item->mekanismePenyusunan}}</textarea>
                  </div>
				 
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('lampiranSoal1'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('lampiranSoal1')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>lampiran Soal 1</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
						<input id="Ada-1"  type="radio" name="lampiranSoal1" value="Ada" <?php if ($item->lampiranSoal1 == "Ada") echo "checked"; ?> >
						<label for="Ada-1" style="margin-right:20px" >Ada</label>
						<input id="Tidak Ada-1"  type="radio" name="lampiranSoal1" value="Tidak Ada" <?php if ($item->lampiranSoal1 == "Tidak Ada") echo "checked"; ?>>
						<label for="Tidak Ada-1"  style="margin-right:20px">Tidak Ada</label>
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('lampiranSoal2'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('lampiranSoal2')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>lampiran Soal 2</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
						<input id="Ada-2"  type="radio" name="lampiranSoal2" value="Ada" <?php if ($item->lampiranSoal2 == "Ada") echo "checked"; ?> >
						<label for="Ada-2" style="margin-right:20px" >Ada</label>
						<input id="Tidak Ada-2"  type="radio" name="lampiranSoal2" value="Tidak Ada" <?php if ($item->lampiranSoal2 == "Tidak Ada") echo "checked"; ?>>
						<label for="Tidak Ada-2"  style="margin-right:20px">Tidak Ada</label>
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('lampiranSoal3'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('lampiranSoal3')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>lampiran Soal 3</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
						<input id="Ada-3"  type="radio" name="lampiranSoal3" value="Ada" <?php if ($item->lampiranSoal3 == "Ada") echo "checked"; ?> >
						<label for="Ada-3" style="margin-right:20px" >Ada</label>
						<input id="Tidak Ada-3"  type="radio" name="lampiranSoal3" value="Tidak Ada" <?php if ($item->lampiranSoal3 == "Tidak Ada") echo "checked"; ?>>
						<label for="Tidak Ada-3"  style="margin-right:20px">Tidak Ada</label>
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('lampiranSoal4'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('lampiranSoal4')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>lampiran Soal 4</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
						<input id="Ada-4"  type="radio" name="lampiranSoal4" value="Ada" <?php if ($item->lampiranSoal4 == "Ada") echo "checked"; ?> >
						<label for="Ada-4" style="margin-right:20px" >Ada</label>
						<input id="Tidak Ada-4"  type="radio" name="lampiranSoal4" value="Tidak Ada" <?php if ($item->lampiranSoal4 == "Tidak Ada") echo "checked"; ?>>
						<label for="Tidak Ada-4"  style="margin-right:20px">Tidak Ada</label>
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('lampiranSoal5'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('lampiranSoal5')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>lampiran Soal 5</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
						<input id="Ada-5"  type="radio" name="lampiranSoal5" value="Ada" <?php if ($item->lampiranSoal5 == "Ada") echo "checked"; ?> >
						<label for="Ada-5" style="margin-right:20px" >Ada</label>
						<input id="Tidak Ada-5"  type="radio" name="lampiranSoal5" value="Tidak Ada" <?php if ($item->lampiranSoal5 == "Tidak Ada") echo "checked"; ?>>
						<label for="Tidak Ada-5"  style="margin-right:20px">Tidak Ada</label>
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