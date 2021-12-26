 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik III</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-list-alt fa-fw"></i>Detail Mahasiswa Reguler
		</div>		
		<div class="form-group">	
			<a href="{{URL::to('mahasiswa')}}" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'editmahasiswareg','method' => 'post')) !!}
              <div class="box-body ">
				@foreach($mahasiswareg as $item)
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
				
                <div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('tahunAkademik'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('tahunAkademik')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Tahun Akademik</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input disabled name="tahunAkademik" type="text" class="form-control" id="tahunAkademik" placeholder="Silakan isi tahun akademik disini" value="{{$item->tahunAkademik}}" />
                  </div>
				 
                </div>
				
				
                <div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('dayaTampung'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('dayaTampung')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Daya Tampung</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input disabled name="dayaTampung" type="text" class="form-control" id="dayaTampung" placeholder="Silakan isi daya tampung disini" value="{{$item->dayaTampung}} Orang" />
                  </div>
				  
                </div>
            
				
                <div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('calonMahasiswaIkut'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('calonMahasiswaIkut')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Calon Mahasiswa terdaftar</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input disabled name="calonMahasiswaIkut" type="text" class="form-control" id="dayaTampung" placeholder="Silakan isi jumlah calon mahasiswa terdaftar disini" value="{{$item->calonMahasiswaIkut}} Orang" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('calonMahasiswaLulus'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('calonMahasiswaLulus')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Calon Mahasiswa Lulus</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input disabled name="calonMahasiswaLulus" type="text" class="form-control" id="calonMahasiswaLulus" placeholder="Silakan isi jumlah calon mahasiswa lulus disini" value="{{$item->calonMahasiswaLulus}} Orang" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('mahasiswaBaruReguler'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('mahasiswaBaruReguler')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Mahasiswa Baru Reguler</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input disabled name="mahasiswaBaruReguler" type="text" class="form-control" id="mahasiswaBaruReguler" placeholder="Silakan isi jumlah mahasiswa baru reguler disini" value="{{$item->mahasiswaBaruReguler}} Orang" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('mahasiswaBaruTransfer'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('mahasiswaBaruTransfer')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Mahasiswa Baru Transfer</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input disabled name="mahasiswaBaruTransfer" type="text" class="form-control" id="mahasiswaBaruTransfer" placeholder="Silakan isi jumlah mahasiswa baru transfer disini" value="{{$item->mahasiswaBaruTransfer}} Orang" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('totalMahasiswaReguler'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('totalMahasiswaReguler')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Total Mahasiswa Reguler</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input disabled name="totalMahasiswaReguler" type="text" class="form-control" id="totalMahasiswaReguler" placeholder="Silakan isi total mahasiswa reguler disini" value="{{$item->totalMahasiswaReguler}} Orang" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('totalMahasiswaTransfer'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('totalMahasiswaTransfer')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Total Mahasiswa transfer</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input disabled name="totalMahasiswaTransfer" type="text" class="form-control" id="totalMahasiswaTransfer" placeholder="Silakan isi total mahasiswa transfer disini" value="{{$item->totalMahasiswaTransfer}} Orang" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('mahasiswaLulusReguler'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('mahasiswaLulusReguler')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Mahasiswa lulus reguler</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input disabled name="mahasiswaLulusReguler" type="text" class="form-control" id="mahasiswaLulusReguler" placeholder="Silakan isi jumlah mahasiswa lulus reguler disini" value="{{$item->mahasiswaLulusReguler}} Orang" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('mahasiswaLulusTransfer'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('mahasiswaLulusTransfer')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Mahasiswa lulus transfer</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input disabled name="mahasiswaLulusTransfer" type="text" class="form-control" id="mahasiswaLulusTransfer" placeholder="Silakan isi jumlah mahasiswa lulus transfer disini" value="{{$item->mahasiswaLulusTransfer}} Orang" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('ipkLulusMinimum'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('ipkLulusMinimum')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>IPK lulus minimum</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input disabled name="ipkLulusMinimum" type="text" class="form-control" id="ipkLulusMinimum" placeholder="Silakan isi IPK lulus minimum disini" value="{{$item->ipkLulusMinimum}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('ipkLulusRerata'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('ipkLulusRerata')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>IPK lulus Rata-Rata</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input disabled name="ipkLulusRerata" type="text" class="form-control" id="ipkLulusRerata" placeholder="Silakan isi IPK lulus rata-rata disini" value="{{$item->ipkLulusRerata}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('ipkLulusMaksimum'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('ipkLulusMaksimum')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>IPK lulus maksimum</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input disabled name="ipkLulusMaksimum" type="text" class="form-control" id="ipkLulusMaksimum" placeholder="Silakan isi IPK lulus maksimum disini" value="{{$item->ipkLulusMaksimum}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('persenIPK1'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('persenIPK1')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Persentase IPK < 2.75</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input disabled name="persenIPK1" type="text" class="form-control" id="persenIPK1" placeholder="Silakan isi Persentase Lulusan Reguler dengan IPK < 2.75" value="{{$item->persenIPK1}} %" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('persenIPK2'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('persenIPK2')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Persentase IPK 2.75 - 3.00</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input disabled name="persenIPK2" type="text" class="form-control" id="persenIPK2" placeholder="Silakan isi Persentase Lulusan Reguler dengan IPK  2.75 - 3.00" value="{{$item->persenIPK2}} %" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('persenIPK3'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('persenIPK3')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Persentase IPK > 3.00</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input disabled name="persenIPK3" type="text" class="form-control" id="persenIPK3" placeholder="Silakan isi Persentase Lulusan Reguler dengan IPK > 3.00" value="{{$item->persenIPK3}} %" />
                  </div>
				  
                </div>
				
				@endforeach	
				
              </div>
              <!-- /.box-body -->
              <div class="form-group ">
                <a href="{{URL::to('mahasiswa')}}" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
              </div>
              <!-- /.box-footer -->
            {!!Form::close() !!}
		
	</div>
	 
</div>

@stop 