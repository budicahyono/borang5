 @extends('template.app')
 @section('content')
 <!-- Page Heading -->
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
		
			<b>Dashboard</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-file fa-fw"></i> Welcome
		</div>
		<div class="alert-box alert-purple text-center">
			<b >Selamat Datang di Sistem Informasi Borang Akademik Universitas Papua</b>
		</div>
		 <p class="text-justify">
			
		Sistem Informasi Borang Akademik UNIPA merupakan aplikasi untuk mengisi data-data sesuai dengan borang akademik 3A. Aplikasi ini memudahkan setiap prodi untuk mengisi data-data secara komputerisasi.Cara penggunaan sistem informasi ini dapat anda ketahui dengan membaca tata cara pemakaian sistem informasi dibawah ini, terima kasih.
		</p>
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-lock fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge">{{$hitung_login }}</div>
								<div>User</div>
							</div>
						</div>
					</div>
					
						<div class="panel-footer">
						<a class="btn btn-block btn-default clearfix" href="registrasi">
							<span class="pull-left">Lihat User</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						</a>	
						   
						</div>
					
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-tasks fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge">{{ $hitung_prodi }}</div>
								<div>Program Studi</div>
							</div>
						</div>
					</div>
					 <div class="panel-footer">
						<a class="btn btn-block btn-default clearfix" href="masterprodi">
							<span class="pull-left">Lihat Program Studi</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						</a>	
						   
						</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-user fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge">{{ $hitung_dosen }}</div>
								<div>Dosen</div>
							</div>
						</div>
					</div>
					 <div class="panel-footer">
						<a class="btn btn-block btn-default clearfix" href="masterdosen">
							<span class="pull-left">Lihat Dosen</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						</a>	
						   
						</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3">
								<i class="fa fa-users fa-5x"></i>
							</div>
							<div class="col-xs-9 text-right">
								<div class="huge">{{ $hitung_mhs }}</div>
								<div>Mahasiswa</div>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<a class="btn btn-block btn-default clearfix" href="mastermahasiswa">
							<span class="pull-left">Lihat Mahasiswa</span>
							<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						</a>	
						   
						</div>
				</div>
			</div>
		</div>
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i> Kelengkapan Data
		</div>
		 <p class="text-justify">
		 @if ($level == "admin") 
			Pada Bagian ini Admin dapat melihat kelengkapan data berdasarkan jumlah Program Studi yang terdaftar pada aplikasi ini.
			Setiap Standar Akademik dilihat jumlah data yang masuk dan membandingkannya dengan jumlah Program Studi, berapa banyak Program Studi yang sudah menginput data Standar Akademik tersebut. 
			<br><b>Saat ini ada {{$hitung_prodi}} Program Studi yang terdaftar pada aplikasi ini!!</b>
		@else 
			Pada Bagian ini Program Studi maupun Fakultas dapat melihat kelengkapan data pada aplikasi ini.
			Setiap Standar Akademik dilihat jumlah data yang masuk dari total maksimal data yang diinput. 	
		@endif		
		</p>
		{!!Form::open(array('class' =>'form-horizontal line')) !!}
              <div class="box-body ">
			  
				 <div class="form-group">
				 
                  <div class="col-sm-2 nopad-left" >	
						<div class=" label  alert-default text-capitalize"><i class="fa fa-university fa-fw"></i>Standar 1 </div>
				  </div>
				  
				  <div class="col-sm-10 nopad-right" >
					<div class="progress">
					  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{$standar1}}"
					  aria-valuemin="0" aria-valuemax="100" style="width:{{$standar1}}%">
					  {{$standar1}}% ({{$tbvises}} data dari max {{$max1}} data)
					  </div>
					</div>
                  </div>
				  
                </div>
				
				<div class="form-group">
				 
                  <div class="col-sm-2 nopad-left" >	
						<div class=" label  alert-default text-capitalize"><i class="fa fa-graduation-cap fa-fw"></i>Standar 2 </div>
				  </div>
				  
				  <div class="col-sm-10 nopad-right" >
					<div class="progress">
					  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{$standar2}}"
					  aria-valuemin="0" aria-valuemax="100" style="width:{{$standar2}}%">
					  {{$standar2}}% ({{$jumlah2}} data dari max {{$max2}} data)
					  </div>
					</div>
                  </div>
				  
                </div>
				
				<div class="form-group">
				 
                  <div class="col-sm-2 nopad-left" >	
						<div class=" label  alert-default text-capitalize"><i class="fa fa-users fa-fw"></i>Standar 3 </div>
				  </div>
				  
				  <div class="col-sm-10 nopad-right" >
					<div class="progress">
					  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{$standar3}}"
					  aria-valuemin="0" aria-valuemax="100" style="width:{{$standar3}}%">
					  {{$standar3}}% ({{$jumlah3}} data dari max {{$max3}} data)
					  </div>
					</div>
                  </div>
				  
                </div>
				
				<div class="form-group">
				 
                  <div class="col-sm-2 nopad-left" >	
						<div class=" label  alert-default text-capitalize"><i class="fa fa-user fa-fw"></i>Standar 4 </div>
				  </div>
				  
				  <div class="col-sm-10 nopad-right" >
					<div class="progress">
					  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{$standar4}}"
					  aria-valuemin="0" aria-valuemax="100" style="width:{{$standar4}}%">
					 {{$standar4}}% ({{$jumlah4}} data dari max {{$max4}} data)
					  </div>
					</div>
                  </div>
				  
                </div>
				
				<div class="form-group">
				 
                  <div class="col-sm-2 nopad-left" >	
						<div class=" label  alert-default text-capitalize"><i class="fa fa-tasks fa-fw"></i>Standar 5 </div>
				  </div>
				  
				  <div class="col-sm-10 nopad-right" >
					<div class="progress">
					  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{$standar5}}"
					  aria-valuemin="0" aria-valuemax="100" style="width:{{$standar5}}%">
					  {{$standar5}}% ({{$jumlah5}} data dari max {{$max5}} data)
					  </div>
					</div>
                  </div>
				  
                </div>
				
				<div class="form-group">
				 
                  <div class="col-sm-2 nopad-left" >	
						<div class=" label  alert-default text-capitalize"><i class="fa fa-building fa-fw"></i>Standar 6 </div>
				  </div>
				  
				  <div class="col-sm-10 nopad-right" >
					<div class="progress">
					  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{$standar6}}"
					  aria-valuemin="0" aria-valuemax="100" style="width:{{$standar6}}%">
					  {{$standar6}}% ({{$jumlah6}} data dari max {{$max6}} data)
					  </div>
					</div>
                  </div>
				  
                </div>
				
				<div class="form-group">
				 
                  <div class="col-sm-2 nopad-left" >	
						<div class=" label  alert-default text-capitalize"><i class="fa fa-globe fa-fw"></i>Standar 7 </div>
				  </div>
				  
				  <div class="col-sm-10 nopad-right" >
					<div class="progress">
					  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{$standar7}}"
					  aria-valuemin="0" aria-valuemax="100" style="width:{{$standar7}}%">
					 {{$standar7}}% ({{$jumlah7}} data dari max {{$max7}} data)
					  </div>
					</div>
                  </div>
				  
                </div>
				
              </div>
			    {!!Form::close() !!}
			
		
	</div>
	 
</div>
                <!-- /.row -->

               
                   
               

               
@endsection				