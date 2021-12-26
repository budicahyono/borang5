 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik II</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-plus-square fa-fw"></i>Form Tambah Keberlanjutan Prodi
		</div>		
		<div class="form-group">	
			<a href="keberlanjutanprodi" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		<p class="text-justify">
		Jelaskan upaya untuk menjamin keberlanjutan (sustainability) program studi ini, khususnya dalam hal:
		<ul style="padding-left:15px">
			<li>Upaya untuk peningkatan animo calon mahasiswa</li>
			<li>Upaya peningkatan mutu manajemen</li>
			<li>Upaya untuk peningkatan mutu lulusan</li>
			<li>Upaya untuk pelaksanaan dan hasil kerjasama kemitraan</li>
			<li>Upaya dan prestasi memperoleh dana hibah kompetitif</li>
		</ul>
		</p>
		
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
					@if($errors->has('jenisUpaya'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jenisUpaya')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>jenis upaya</div>
					@endif
				  </div>
				 
                  <div class="col-sm-9 nopad-right" >
						<select name="jenisUpaya" class="form-control" placeholder="">
						<option value="">--Silakan Pilih Jenis Upaya-- </option>
						<option value="Upaya untuk peningkatan animo calon mahasiswa"  <?php if (old("jenisUpaya") == "Upaya untuk peningkatan animo calon mahasiswa") echo 'selected="selected"' ?> >Upaya untuk peningkatan animo calon mahasiswa</option> 	
						<option value="Upaya peningkatan mutu manajemen"  <?php if (old("jenisUpaya") == "Upaya peningkatan mutu manajemen") echo 'selected="selected"' ?> >Upaya peningkatan mutu manajemen</option> 	
						<option value="Upaya untuk peningkatan mutu lulusan"  <?php if (old("jenisUpaya") == "Upaya untuk peningkatan mutu lulusan") echo 'selected="selected"' ?> >Upaya untuk peningkatan mutu lulusan</option> 	
						<option value="Upaya untuk pelaksanaan dan hasil kerjasama kemitraan"  <?php if (old("jenisUpaya") == "Upaya untuk pelaksanaan dan hasil kerjasama kemitraan") echo 'selected="selected"' ?> >Upaya untuk pelaksanaan dan hasil kerjasama kemitraan</option> 	
						<option value="Upaya dan prestasi memperoleh dana hibah kompetitif"  <?php if (old("jenisUpaya") == "Upaya dan prestasi memperoleh dana hibah kompetitif") echo 'selected="selected"' ?> >Upaya dan prestasi memperoleh dana hibah kompetitif</option> 	
						</select>
                  </div>
				 
                </div>
				
				
                <div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('upaya'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('upaya')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>upaya</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <textarea name="upaya" class="form-control ckeditor" id="upaya" placeholder="Silakan isi upaya disini">{{Input::old('upaya')}}</textarea>
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