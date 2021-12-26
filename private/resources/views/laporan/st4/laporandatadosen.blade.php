
@extends('template.app')
@section('content')

<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik III</b> 
		</h3>
		<ul class="nav nav-tabs " >
		 <li class="dropdown active">
			<a href="#" data-toggle="dropdown">Data Dosen Tetap &nbsp;&nbsp;<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li class="active"><a href="#tab1">Data Dosen Tetap Sesuai PS</a></li>
				<li><a href="#tab2">Data Dosen Tetap Tidak Sesuai PS</a></li>
				<li><a href="#tab3">Aktivitas Dosen Tetap Sesuai PS I</a></li>
				<li><a href="#tab4">Aktivitas Dosen Tetap Sesuai PS II</a></li> 
				<li><a href="#tab5">Aktivitas Dosen Tetap Tidak Sesuai PS </a></li> 
			</ul>
		</li>
		 <li class="dropdown">
			<a href="#" data-toggle="dropdown">Data Dosen Tidak Tetap &nbsp;&nbsp;<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li><a href="#tab6">Data Dosen Tidak Tetap di PS</a></li>
				<li><a href="#tab7">Aktivitas Data Dosen Tidak Tetap</a></li>
			</ul>
		</li>
		
		 <li class="dropdown">
			<a href="#" data-toggle="dropdown">Upaya Peningkatan SDM &nbsp;&nbsp;<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li><a href="#tab8">Kegiatan Tenaga Ahli/Pakar</a></li>
				<li><a href="#tab9">Peningkatan Kemampuan Dosen</a></li>
				<li><a href="#tab10">Kegiatan Dosen Tetap</a></li>
				<li><a href="#tab11">Pencapaian Prestasi/Reputasi Dosen</a></li>
				<li><a href="#tab12">Keikutsertaan Dosen Tetap</a></li>
			</ul>
		</li>
		
		<li class="dropdown">
			<a href="#" data-toggle="dropdown">Tenaga Kependidikan &nbsp;&nbsp;<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li><a href="#tab13">Data Tenaga Kependidikan</a></li>
				<li><a href="#tab14">Upaya Meningkatkan Kualifikasi dan Kompetensi Tenaga Kependidikan</a></li>
			</ul>
		</li>
		</ul>
	<div class="tab-content">
		<div id="tab1" class="tab-pane fade in active">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Laporan Data Dosen Tetap Sesuai PS
			</div>
			
			<p class="text-justify">Dosen tetap dalam borang akreditasi BAN-PT adalah dosen yang diangkat dan ditempatkan sebagai tenaga tetap pada PT yang bersangkutan; termasuk dosen penugasan Kopertis, dan dosen yayasan pada PTS dalam bidang yang relevan dengan keahlian bidang studinya. Seorang dosen hanya dapat menjadi dosen tetap pada satu perguruan tinggi, dan mempunyai penugasan kerja minimum 36 jam/minggu.</p>
			<p class="text-justify">Laporan data dosen tetap yang bidang keahliannya sesuai dengan bidang Program Studi</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakdosentetapps','method' => 'post')) !!}
              <div class="box-body ">

                <div class="form-group ">
				   <div class="col-sm-2 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-3 nopad-right" >
                    <select required name="idprodi" class="form-control" >
					<option value="">--Silakan Pilih Prodi-- </option>
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if ($idprodi == $item->idprodi) echo 'selected="selected"' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
                  </div>
				  
				  <div class="col-sm-1 nopad-right" >
                     <button name="cari" type="submit" class="btn btn-primary" onclick="newWindow()"><i class="fa fa-print fa-fw"></i>Cetak</button>
                  </div>
                </div>
				
				
              </div>
              
			<!-- /.box-footer -->
            {!!Form::close() !!}	
		</div>
		
		<div id="tab2" class="tab-pane fade ">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Laporan Data Dosen Tetap Tidak Sesuai PS
			</div>
			<p class="text-justify">Laporan data dosen tetap yang bidang keahliannya di luar dengan bidang Program Studi</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakdosentetaptidakps','method' => 'post')) !!}
              <div class="box-body ">

                <div class="form-group ">
				   <div class="col-sm-2 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-3 nopad-right" >
                    <select required name="idprodi" class="form-control" >
					<option value="">--Silakan Pilih Prodi-- </option>
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if ($idprodi == $item->idprodi) echo 'selected="selected"' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
                  </div>
				  
				  <div class="col-sm-1 nopad-right" >
                     <button name="cari" type="submit" class="btn btn-primary" onclick="newWindow()"><i class="fa fa-print fa-fw"></i>Cetak</button>
                  </div>
                </div>
				
				
              </div>
              
			<!-- /.box-footer -->
            {!!Form::close() !!}	
		</div>
		
		<div id="tab3" class="tab-pane fade">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Laporan Aktivitas Dosen Tetap Sesuai PS I
			</div>
			<p class="text-justify">Laporan Aktivitas dosen tetap yang bidang bidang keahliannya sesuai dengan PS dinyatakan dalam sks rata-rata per semester pada satu tahun akademik terakhir, diisi dengan perhitungan sesuai SK Dirjen DIKTI no. 48 tahun 1983 (12 sks setara dengan 36 jam kerja per minggu).</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakaktifdosen1','method' => 'post')) !!}
              <div class="box-body ">

                <div class="form-group ">
				   <div class="col-sm-2 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-3 nopad-right" >
                    <select required name="idprodi" class="form-control" >
					<option value="">--Silakan Pilih Prodi-- </option>
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if ($idprodi == $item->idprodi) echo 'selected="selected"' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
                  </div>
				  
				  <div class="col-sm-1 nopad-right" >
                     <button name="cari" type="submit" class="btn btn-primary" onclick="newWindow()"><i class="fa fa-print fa-fw"></i>Cetak</button>
                  </div>
                </div>
				
				
              </div>
              
			<!-- /.box-footer -->
            {!!Form::close() !!}	
		</div>
		
		<div id="tab4" class="tab-pane fade">				
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Laporan Aktivitas Dosen Tetap Sesuai PS II
			</div>
			<p class="text-justify"> Laporan data aktivitas mengajar dosen tetap yang bidang keahliannya sesuai dengan PS,  dalam satu tahun akademik terakhir di program studi</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakaktifdosen2','method' => 'post')) !!}
              <div class="box-body ">

                <div class="form-group ">
				   <div class="col-sm-2 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-3 nopad-right" >
                    <select required name="idprodi" class="form-control" >
					<option value="">--Silakan Pilih Prodi-- </option>
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if ($idprodi == $item->idprodi) echo 'selected="selected"' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
                  </div>
				  
				  <div class="col-sm-1 nopad-right" >
                     <button name="cari" type="submit" class="btn btn-primary" onclick="newWindow()"><i class="fa fa-print fa-fw"></i>Cetak</button>
                  </div>
                </div>
				
				
              </div>
              
			<!-- /.box-footer -->
            {!!Form::close() !!}	
		</div>
		
		<div id="tab5" class="tab-pane fade">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Laporan Aktivitas Dosen Tetap Tidak Sesuai PS 
			</div>
			<p class="text-justify"> Laporan data aktivitas mengajar dosen tetap yang bidang keahliannya di luar PS,  dalam satu tahun akademik terakhir di Program Studi ini</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakaktifdosentidakps','method' => 'post')) !!}
              <div class="box-body ">

                <div class="form-group ">
				   <div class="col-sm-2 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-3 nopad-right" >
                    <select required name="idprodi" class="form-control" >
					<option value="">--Silakan Pilih Prodi-- </option>
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if ($idprodi == $item->idprodi) echo 'selected="selected"' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
                  </div>
				  
				  <div class="col-sm-1 nopad-right" >
                     <button name="cari" type="submit" class="btn btn-primary" onclick="newWindow()"><i class="fa fa-print fa-fw"></i>Cetak</button>
                  </div>
                </div>
				
				
              </div>
              
			<!-- /.box-footer -->
            {!!Form::close() !!}	
			<p></p>
		</div>
		
		
		
		<div id="tab6" class="tab-pane fade ">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Laporan Data Dosen Tidak Tetap di PS
			</div>
			<p class="text-justify">Laporan data dosen tidak tetap pada Program Studi</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakdosentidak','method' => 'post')) !!}
              <div class="box-body ">

                <div class="form-group ">
				   <div class="col-sm-2 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-3 nopad-right" >
                    <select required name="idprodi" class="form-control" >
					<option value="">--Silakan Pilih Prodi-- </option>
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if ($idprodi == $item->idprodi) echo 'selected="selected"' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
                  </div>
				  
				  <div class="col-sm-1 nopad-right" >
                     <button name="cari" type="submit" class="btn btn-primary" onclick="newWindow()"><i class="fa fa-print fa-fw"></i>Cetak</button>
                  </div>
                </div>
				
				
              </div>
              
			<!-- /.box-footer -->
            {!!Form::close() !!}	  
		</div>
		
		<div id="tab7" class="tab-pane fade">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Laporan Aktivitas Data Dosen Tidak Tetap
			</div>
			<p class="text-justify">Laporan data aktivitas mengajar dosen tetap yang bidang keahliannya sesuai dengan PS,  dalam satu tahun akademik terakhir di program studi</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakaktifdosentidak','method' => 'post')) !!}
              <div class="box-body ">

                <div class="form-group ">
				   <div class="col-sm-2 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-3 nopad-right" >
                    <select required name="idprodi" class="form-control" >
					<option value="">--Silakan Pilih Prodi-- </option>
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if ($idprodi == $item->idprodi) echo 'selected="selected"' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
                  </div>
				  
				  <div class="col-sm-1 nopad-right" >
                     <button name="cari" type="submit" class="btn btn-primary" onclick="newWindow()"><i class="fa fa-print fa-fw"></i>Cetak</button>
                  </div>
                </div>
				
				
              </div>
              
			<!-- /.box-footer -->
            {!!Form::close() !!}	  
			<p></p>
		</div>
		
		<div id="tab8" class="tab-pane fade ">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Laporan Kegiatan Tenaga Ahli/Pakar
			</div>
			<p class="text-justify">Laporan kegiatan tenaga ahli/pakar sebagai pembicara dalam seminar/pelatihan, pembicara tamu, dsb, dari luar PT sendiri (tidak termasuk dosen tidak tetap).</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetaktenagaahli','method' => 'post')) !!}
              <div class="box-body ">

                <div class="form-group ">
				   <div class="col-sm-2 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-3 nopad-right" >
                    <select required name="idprodi" class="form-control" >
					<option value="">--Silakan Pilih Prodi-- </option>
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if ($idprodi == $item->idprodi) echo 'selected="selected"' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
                  </div>
				  
				  <div class="col-sm-1 nopad-right" >
                     <button name="cari" type="submit" class="btn btn-primary" onclick="newWindow()"><i class="fa fa-print fa-fw"></i>Cetak</button>
                  </div>
                </div>
				
				
              </div>
              
			<!-- /.box-footer -->
            {!!Form::close() !!}	  
		</div>
		
		<div id="tab9" class="tab-pane fade">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Laporan Peningkatan Kemampuan Dosen
			</div>
			<p class="text-justify">Laporan peningkatan kemampuan dosen tetap melalui program tugas belajar dalam bidang yang sesuai dengan bidang Program Studi</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakkemampuandosen','method' => 'post')) !!}
              <div class="box-body ">

                <div class="form-group ">
				   <div class="col-sm-2 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-3 nopad-right" >
                    <select required name="idprodi" class="form-control" >
					<option value="">--Silakan Pilih Prodi-- </option>
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if ($idprodi == $item->idprodi) echo 'selected="selected"' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
                  </div>
				  
				  <div class="col-sm-1 nopad-right" >
                     <button name="cari" type="submit" class="btn btn-primary" onclick="newWindow()"><i class="fa fa-print fa-fw"></i>Cetak</button>
                  </div>
                </div>
				
				
              </div>
              
			<!-- /.box-footer -->
            {!!Form::close() !!}	  
		</div>
		
		<div id="tab10" class="tab-pane fade">				
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Laporan Kegiatan Dosen Tetap
			</div>
			<p class="text-justify">Laporan Kegiatan dosen tetap yang bidang keahliannya sesuai dengan PS dalam seminar ilmiah / lokakarya / penataran / workshop / pagelaran / pameran / peragaan yang tidak hanya melibatkan dosen Perguruan Tinggi sendiri</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakkegiatandosen','method' => 'post')) !!}
              <div class="box-body ">

                <div class="form-group ">
				   <div class="col-sm-2 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-3 nopad-right" >
                    <select required name="idprodi" class="form-control" >
					<option value="">--Silakan Pilih Prodi-- </option>
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if ($idprodi == $item->idprodi) echo 'selected="selected"' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
                  </div>
				  
				  <div class="col-sm-1 nopad-right" >
                     <button name="cari" type="submit" class="btn btn-primary" onclick="newWindow()"><i class="fa fa-print fa-fw"></i>Cetak</button>
                  </div>
                </div>
				
				
              </div>
              
			<!-- /.box-footer -->
            {!!Form::close() !!}	  
		</div>
		
		<div id="tab11" class="tab-pane fade">				
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Laporan Pencapaian Prestasi/Reputasi Dosen
			</div>
			<p class="text-justify">Laporan pencapaian prestasi/reputasi dosen (misalnya prestasi dalam pendidikan, penelitian dan pelayanan/pengabdian kepada masyarakat).</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakprestasidosen','method' => 'post')) !!}
              <div class="box-body ">

                <div class="form-group ">
				   <div class="col-sm-2 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-3 nopad-right" >
                    <select required name="idprodi" class="form-control" >
					<option value="">--Silakan Pilih Prodi-- </option>
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if ($idprodi == $item->idprodi) echo 'selected="selected"' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
                  </div>
				  
				  <div class="col-sm-1 nopad-right" >
                     <button name="cari" type="submit" class="btn btn-primary" onclick="newWindow()"><i class="fa fa-print fa-fw"></i>Cetak</button>
                  </div>
                </div>
				
				
              </div>
              
			<!-- /.box-footer -->
            {!!Form::close() !!}	  
		</div>
		
		<div id="tab12" class="tab-pane fade">				
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Laporan Keikutsertaan Dosen Tetap
			</div>
			<p class="text-justify">Laporan Sebutkan keikutsertaan dosen tetap dalam organisasi keilmuan atau organisasi profesi</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakikutdosen','method' => 'post')) !!}
              <div class="box-body ">

                <div class="form-group ">
				   <div class="col-sm-2 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-3 nopad-right" >
                    <select required name="idprodi" class="form-control" >
					<option value="">--Silakan Pilih Prodi-- </option>
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if ($idprodi == $item->idprodi) echo 'selected="selected"' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
                  </div>
				  
				  <div class="col-sm-1 nopad-right" >
                     <button name="cari" type="submit" class="btn btn-primary" onclick="newWindow()"><i class="fa fa-print fa-fw"></i>Cetak</button>
                  </div>
                </div>
				
				
              </div>
              
			<!-- /.box-footer -->
            {!!Form::close() !!}	  
			<p></p>
		</div>
		
		<div id="tab13" class="tab-pane fade ">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Laporan Data Tenaga Kependidikan
			</div>
			<p class="text-justify">Laporan data tenaga kependidikan  yang ada di PS, Jurusan, Fakultas atau Perguruan Tinggi yang melayani mahasiswa Program Studi</p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetaktenagakependidikan','method' => 'post')) !!}
              <div class="box-body ">

                <div class="form-group ">
				   <div class="col-sm-2 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-3 nopad-right" >
                    <select required name="idprodi" class="form-control" >
					<option value="">--Silakan Pilih Prodi-- </option>
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if ($idprodi == $item->idprodi) echo 'selected="selected"' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
                  </div>
				  
				  <div class="col-sm-1 nopad-right" >
                     <button name="cari" type="submit" class="btn btn-primary" onclick="newWindow()"><i class="fa fa-print fa-fw"></i>Cetak</button>
                  </div>
                </div>
				
				
              </div>
              
			<!-- /.box-footer -->
            {!!Form::close() !!}	
		</div>
		
		<div id="tab14" class="tab-pane fade">				
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Laporan Upaya Meningkatkan Kualifikasi dan Kompetensi Tenaga Kependidikan
			</div>
			<p class="text-justify">Laporan upaya yang telah dilakukan PS dalam meningkatkan kualifikasi dan kompetensi tenaga kependidikan, dalam hal pemberian kesempatan belajar/pelatihan, pemberian fasilitas termasuk dana, dan jenjang karir. </p>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'cetakupaya','method' => 'post')) !!}
              <div class="box-body ">

                <div class="form-group ">
				   <div class="col-sm-2 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-3 nopad-right" >
                    <select required name="idprodi" class="form-control" >
					<option value="">--Silakan Pilih Prodi-- </option>
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if ($idprodi == $item->idprodi) echo 'selected="selected"' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
                  </div>
				  
				  <div class="col-sm-1 nopad-right" >
                     <button name="cari" type="submit" class="btn btn-primary" onclick="newWindow()"><i class="fa fa-print fa-fw"></i>Cetak</button>
                  </div>
                </div>
				
				
              </div>
              
			<!-- /.box-footer -->
            {!!Form::close() !!}	
			
			
		</div>
		
	</div>	
		
	</div>
	 
</div>




@stop 