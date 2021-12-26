 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik II</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-plus-square fa-fw"></i>Form Tambah Umpan Balik
		</div>		
		<div class="form-group">	
			<a href="umpanbalik" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		<p class="text-justify">
		Apakah program studi telah melakukan kajian tentang proses pembelajaran melalui umpan balik dari dosen, mahasiswa, alumni, dan pengguna lulusan mengenai harapan dan persepsi mereka?  Jika Ya, jelaskan isi umpan balik dan tindak lanjutnya.
		
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
					@if($errors->has('sumber'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('sumber')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Sumber</div>
					@endif
				  </div>
				 
                  <div class="col-sm-9 nopad-right" >
						<input id="dosen"  type="radio" name="sumber" value="dosen" <?php if (old("sumber") == "dosen") echo "checked"; ?> >
						<label for="dosen" style="margin-right:20px" >Dosen</label>
						<input id="mahasiswa"  type="radio" name="sumber" value="mahasiswa" <?php if (old("sumber") == "mahasiswa") echo "checked"; ?>>
						<label for="mahasiswa"  style="margin-right:20px">Mahasiswa</label>
						<input id="alumni"  type="radio" name="sumber" value="alumni" <?php if (old("sumber") == "alumni") echo "checked"; ?>>
						<label for="alumni" style="margin-right:20px">Alumni</label>
						<input id="pengguna lulusan"  type="radio" name="sumber" value="pengguna lulusan" <?php if (old("sumber") == "pengguna lulusan") echo "checked"; ?>>
						<label for="pengguna lulusan" >Pengguna Lulusan</label>
                  </div>
				 
                </div>
				
				
                <div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('isi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('isi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>isi</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <textarea name="isi" class="form-control ckeditor" id="isi" placeholder="Silakan isi umpan balik disini">{{Input::old('isi')}}</textarea>
                  </div>
				  
                </div>
            
				
                <div class="form-group">
                   <div class="col-sm-3 nopad-left" >	
					@if($errors->has('tindakLanjut'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('tindakLanjut')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>tindak lanjut</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
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