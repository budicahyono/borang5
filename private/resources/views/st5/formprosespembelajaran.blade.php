 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik V</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-plus-square fa-fw"></i>Form Tambah Proses Pembelajaran
		</div>
		
		<div class="form-group">	
			<a href="pembelajaran" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
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
                    <textarea name="mekanismePenyusunan" class="form-control ckeditor" id="mekanismePenyusunan" placeholder="Silakan isi mekanisme penyusunan disini">{{Input::old('mekanismePenyusunan')}}</textarea>
                  </div>
				 
                </div>
				
				<?php for ($x = 1; $x <= 5; $x++) { ?>
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('lampiranSoal'.$x))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('lampiranSoal'.$x)}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>lampiran Soal {{$x}}</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
						<input id="Ada-{{$x}}"  type="radio" name="lampiranSoal{{$x}}" value="Ada" <?php if (old("lampiranSoal".$x) == "Ada") echo "checked"; ?> >
						<label for="Ada-{{$x}}" style="margin-right:20px" >Ada</label>
						<input id="Tidak Ada-{{$x}}"  type="radio" name="lampiranSoal{{$x}}" value="Tidak Ada" <?php if (old("lampiranSoal".$x) == "Tidak Ada") echo "checked"; ?>>
						<label for="Tidak Ada-{{$x}}"  style="margin-right:20px">Tidak Ada</label>
                  </div>
				  
                </div>
				<?php } ?>
				

                
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