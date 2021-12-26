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
			   <i class="fa fa-user fa-fw"></i>Edit Akun
		</div>
		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p class="text-justify">Silakan edit akun user Anda.</p>
		<div class="form-group">	
			<a href="{{URL::to('registrasi')}}" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		<p></p>
		
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'editpassword','method' => 'post')) !!}
              <div class="box-body ">
				@foreach($Login as $item)
				<input type="hidden" name="id" value="{{$item->id}}"/>
				
				
				
                <div class="form-group">
				   <div class="col-sm-3 nopad-left" >	
					@if($errors->has('firstname'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('firstname')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>First Name</div>
					@endif
				  </div>
				 
                  <div class="col-sm-9 nopad-right" >
                    <input name="firstname" class="form-control ckeditor" id="firstname" value="{{$item->firstname}}" placeholder="Silakan isi First Name disini"/>
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
                    <input name="lastname" class="form-control ckeditor" id="lastname" value="{{$item->lastname}}" placeholder="Silakan isi Last Name disini"/>
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
                    <input name="username" class="form-control ckeditor" id="username" value="{{$item->username}}" placeholder="Silakan isi Username disini"/>
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
                    <input name="password" class="form-control" id="password" value="" placeholder="Silakan isi Passwordnya"/>
                    <input name="level"  type="hidden" value="{{$item->level}}" />
                  </div>
				  
                </div>
				@if(Auth::user()->idprodi == "000")
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
						<div class=" label  alert-default text-capitalize"><i class="fa fa-check-square-o fa-fw"></i>Level</div>
				  </div>
                  <div class="col-sm-7 nopad-right" >
                    <input disabled  class="form-control"  value="<?php if ($item->idprodi == "000") echo "superadmin" ?>" />
                  </div>
				   <div class="col-sm-2 nopad-right" >
                     <a type="submit" class="btn btn-info btn-block" href="admin/{!!$item->id!!}" onclick="return confirm('Ingin menjadi Admin Biasa?')"><i class="fa fa-check fa-fw"></i>Jadi Admin</a>
                  </div>
				  
                </div>
				@endif	
				
				@endforeach
				

				
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