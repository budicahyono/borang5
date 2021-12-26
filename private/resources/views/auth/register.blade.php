 @extends('template.app')
 @section('content')
	<!-- script ajax user -->	
<script>
	
</script>	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Manajemen User</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-file-text fa-fw"></i>Registrasi User
		</div>
		<p class="text-justify">Silakan input user yang akan menggunakan aplikasi ini.</p>
		<div class="form-group">	
			<a href="registrasi" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		<p></p>
		
		{!!Form::open(array('class' =>'form-horizontal line')) !!}
              <div class="box-body ">
				
				<div class="form-group">
                   <div class="col-sm-3 nopad-left" >	
					@if($errors->has('level'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('level')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Jenis User</div>
					@endif
				  </div>
				
                  <div class="col-sm-9 nopad-right" >
                    <select required id="jenis_user" name="level" class="form-control" placeholder="" onchange="opsi_user()">
					
					<?php if (Auth::user()->level == "fakultas") { ?>
					<option value="prodi"  <?php if (old("level") == "prodi") echo 'selected="selected"' ?>  >Prodi</option>
					<?php } else if (Auth::user()->level == "admin")  { ?> 	
					<option value="">--Silakan Pilih Jenis User -- </option>
					<option value="prodi"  <?php if (old("level") == "prodi") echo 'selected="selected"' ?>  >Prodi</option>
					<option value="fakultas"  <?php if (old("level") == "fakultas") echo 'selected="selected"' ?> >Fakultas</option>
					<?php } ?>
					@if(Auth::user()->idprodi == "000") <!-- superadmin bisa membuat user admin -->
					<option value="admin"  <?php if (old("level") == "admin") echo 'selected="selected"' ?> >Admin</option> 	
					@endif	
                    </select>
                  </div>
                </div> 
				 <div class="form-group">
				<p align="justify">
				<ul>
				<?php if (Auth::user()->level == "admin") { ?>
				<li><b>Prodi</b> : User hanya dapat mengelola standar akademik program studinya sendiri.</li>
				<li><b>Fakultas</b> : User hanya dapat mengelola semua standar akademik program studi dalam fakultas tersebut dan juga bisa menambah user Prodi.</li>
				@if(Auth::user()->idprodi == "000")
				<li><b>Admin</b> : User dapat mengelola semua standar akademik pada semua program studi dan dapat menambah user Prodi dan Fakultas.</li>
				@endif	
				<?php } else  if (Auth::user()->level == "fakultas") { ?>
				<li><b>Prodi</b> : User hanya dapat mengelola standar akademik program studinya sendiri.</li>	
				<?php } ?>
				</ul>
				</p>
				 </div>
				<div class="form-group " >
				   <div class="col-sm-3 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-9 nopad-right" >
					<?php if (Auth::user()->level == "admin") { ?>
                    <select <?php if (old("idprodi") != null) echo 'required'; else echo 'disabled'; ?> id="dataprodi"  name="idprodi" class="form-control" placeholder="">
					<option value="">--Silakan Pilih Prodi-- </option>
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if (old("idprodi") == $item->idprodi) echo 'selected' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
					<?php } else { ?>
					 <select required id="dataprodi"  name="idprodi" class="form-control" placeholder="">
					<option value="">--Silakan Pilih Prodi-- </option>
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if (old("idprodi") == $item->idprodi) echo 'selected' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
					<?php }  ?>
                  </div>
                </div>
				
				<div class="form-group " >
				   <div class="col-sm-3 nopad-left" >	
					@if($errors->has('idfakultas'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idfakultas')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Fakultas</div>
					@endif
				  </div>
				  
                  <div class="col-sm-9 nopad-right" >
                    <select <?php if (old("idfakultas") != null) echo 'required'; else echo 'disabled'; ?> id="datafakultas"  name="idfakultas" class="form-control" placeholder="">
					<option value="">--Silakan Pilih Fakultas-- </option>
					@foreach($masterfakultas as $item)
					<option value="{{$item->idfakultas}}"  <?php if (old("idfakultas") == $item->idfakultas) echo 'selected' ?> >{{$item->namaFakultas}}</option> 		
					@endforeach
                    </select>
                  </div>
                </div>
				 <div class="form-group">
				<p align="justify">Fakultas yang dimunculkan dalam pilihan di atas adalah fakultas yang sudah diinput program studinya</p>
				 </div>
                <div class="form-group">
				   <div class="col-sm-3 nopad-left" >	
					@if($errors->has('firstname'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('firstname')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>First Name</div>
					@endif
				  </div>
				 
                  <div class="col-sm-9 nopad-right" >
                    <input name="firstname" class="form-control ckeditor" id="firstname" value="{{Input::old('firstname')}}" placeholder="Silakan isi First Name disini"/>
                  </div>
				 
                </div>
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('lastname'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('lastname')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Last Name</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <input name="lastname" class="form-control ckeditor" id="lastname" value="{{Input::old('lastname')}}" placeholder="Silakan isi Last Name disini"/>
                  </div>
				  
                </div>
               <div class="form-group">
                   <div class="col-sm-3 nopad-left" >	
					@if($errors->has('username'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('username')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Username</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <input name="username" class="form-control ckeditor" id="username" value="{{Input::old('username')}}" placeholder="Silakan isi Username disini"/>
                  </div>
				 
                </div>
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('password'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('password')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Password</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <input name="password" class="form-control ckeditor" id="password" value="{{Input::old('password')}}" placeholder="Silakan isi Password disini"/>
                  </div>
				  
                </div>

				

				
              </div>
              <!-- /.box-body -->
              <div class="box-footer form-group center-block">
                <button type="submit" class="btn btn-primary "><i class="fa fa-save fa-fw"></i>Save</button><span style="padding-right:10px" ></span>
				<button type="reset" class="btn btn-warning"><i class="fa fa-remove fa-fw"></i>Reset</button><span style="padding-right:10px" ></span>
				
              </div>
              <!-- /.box-footer -->
            {!!Form::close() !!}
		
	</div>
	 
</div>

@stop 