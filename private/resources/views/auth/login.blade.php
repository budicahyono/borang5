
@include('html.head')
@include('html.preloader')

	<body style="background:#fff">
	<!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="md-preloader pl-size-md" >
                <svg viewbox="0 0 75 75">
                    <circle cx="37.5" cy="37.5" r="33.5" class="pl-unipa" stroke-width="7" />
                </svg>
            </div>
			
            <p class="unipa">Loading...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
	 @if (count($errors) > 0)
			<div id="fade_out" class="alert-box alert-login text-capitalize text-center">
				<strong>Error!	
					@foreach ($errors->all() as $error)
						{{ $error }}
					@endforeach
				</strong>	
			</div>
		@endif
		<div class="container-fluid" style="margin-top:12.5%;width:70%">
			<img class=" img-responsive"   src="{{URL::to('assets/img/logo_panjang.png')}}"/>
		</div>
<div class="container-fluid text-center" style="margin-top:25px;width:70%" >
	
	<div class="login-box">

    {!!Form::open() !!}
    
      <div class="row">
		<div class="col-sm-5 col-xs-12 form">
		  <div class="has-feedback">
			<input type="text" name="username" class="form-control" placeholder="Ketikkan Username Anda"  value="{{Input::old('username')}}"/>
			<span class="glyphicon glyphicon-user form-control-feedback" ></span>
		  </div>
		</div>
		<div class="col-sm-5 col-xs-12 form">
		  <div class=" has-feedback ">
			<input type="password" name="password"  class="form-control" placeholder="Ketikkan Password Anda" value="{{Input::old('password')}}"/>
			<span class="glyphicon glyphicon-lock form-control-feedback" ></span>
		  </div>
		</div>
        <div class="col-sm-2 col-xs-12">
          <button type="submit" class="btn btn-login btn-block soft"><b>Login</b></button>
        </div>
        <!-- /.col -->
      </div>
    {!!Form::close() !!}

    </div>
   

   

  </div>
 <div id="h2" class="navbar-login visible-md visible-lg visible-sm ">
  
      <p class="text-center" style="margin:5px">Borang Akademik Ver.2.0.0. Developed & Designed by Budizen, Powered by UNIPA. Copyright &copy {{ date('Y') }} Manokwari, Papua Barat.</p>

</div>

    @include('html.script') 
		
	</body>
</html>	
