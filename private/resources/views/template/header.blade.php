 <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=".">
					<img class="img img-responsive"  src="{{URL::to('assets/img/logo_panjang.png')}}">
				</a>
            </div>
            <!-- Top Menu Items -->
			
            <ul class="nav navbar-right top-nav" >
                <li class="dropdown ">
                    <a id="w1"  href="#" class="dropdown-toggle soft" data-toggle="dropdown">
					@if (Auth::user()->level == "admin" and Auth::user()->idprodi != "000")
					<img class="profile   img-responsive" src="{{URL::to('assets/img/admin.png')}}"/>
					@elseif (Auth::user()->level == "admin" and Auth::user()->idprodi == "000")
					<img class="profile   img-responsive" src="{{URL::to('assets/img/superadmin.png')}}"/>
					@elseif (Auth::user()->level == "fakultas" )
					<img class="profile   img-responsive" src="{{URL::to('assets/img/fakultas.png')}}"/>
					@elseif (Auth::user()->level == "prodi" )
					<img class="profile   img-responsive" src="{{URL::to('assets/img/prodi.png')}}"/>
					@endif
					<span class="text-capitalize">	Login Sebagai {{ Auth::user()->firstname }} {{ Auth::user()->lastname }} <b class="caret"></b></span>
						
					</a>
					
                    <ul id="w2" class="dropdown-menu">
                        <li>
                            <a  href="{{URL::to('editpassword')}}"><i class="fa fa-fw fa-user soft"></i>Edit Akun</a>
                        </li>
                        <li>
                            <a  href="{{URL::to('auth/logout')}}"><i class="fa fa-fw fa-power-off soft"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
			