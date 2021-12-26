 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik III</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-plus-square fa-fw"></i>Form Tambah Mahasiswa Reguler
		</div>		
		<div class="form-group">	
			<a href="mahasiswa" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
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
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('tahunAkademik'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('tahunAkademik')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Tahun Akademik</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="tahunAkademik" type="text" class="form-control" id="tahunAkademik" placeholder="Silakan isi tahun akademik disini" value="{{Input::old('tahunAkademik')}}" />
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
                    <input name="dayaTampung" type="text" class="form-control" id="dayaTampung" placeholder="Silakan isi daya tampung disini" value="{{Input::old('dayaTampung')}}" />
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
                    <input name="calonMahasiswaIkut" type="text" class="form-control" id="calonMahasiswaIkut" placeholder="Silakan isi jumlah calon mahasiswa terdaftar disini" value="{{Input::old('calonMahasiswaIkut')}}" />
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
                    <input name="calonMahasiswaLulus" type="text" class="form-control" id="calonMahasiswaLulus" placeholder="Silakan isi jumlah calon mahasiswa lulus disini" value="{{Input::old('calonMahasiswaLulus')}}" />
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
                    <input name="mahasiswaBaruReguler" type="text" class="form-control" id="mahasiswaBaruReguler" placeholder="Silakan isi jumlah mahasiswa baru reguler disini" value="{{Input::old('mahasiswaBaruReguler')}}" />
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
                    <input name="mahasiswaBaruTransfer" type="text" class="form-control" id="mahasiswaBaruTransfer" placeholder="Silakan isi jumlah mahasiswa baru transfer disini" value="{{Input::old('mahasiswaBaruTransfer')}}" />
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
                    <input name="totalMahasiswaReguler" type="text" class="form-control" id="totalMahasiswaReguler" placeholder="Silakan isi total mahasiswa reguler disini" value="{{Input::old('totalMahasiswaReguler')}}" />
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
                    <input name="totalMahasiswaTransfer" type="text" class="form-control" id="totalMahasiswaTransfer" placeholder="Silakan isi total mahasiswa transfer disini" value="{{Input::old('totalMahasiswaTransfer')}}" />
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
                    <input name="mahasiswaLulusReguler" type="text" class="form-control" id="mahasiswaLulusReguler" placeholder="Silakan isi jumlah mahasiswa lulus reguler disini" value="{{Input::old('mahasiswaLulusReguler')}}" />
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
                    <input name="mahasiswaLulusTransfer" type="text" class="form-control" id="mahasiswaLulusTransfer" placeholder="Silakan isi jumlah mahasiswa lulus transfer disini" value="{{Input::old('mahasiswaLulusTransfer')}}" />
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
                    <input name="ipkLulusMinimum" type="text" class="form-control" id="ipkLulusMinimum" placeholder="Silakan isi IPK lulus minimum disini" value="{{Input::old('ipkLulusMinimum')}}" />
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
                    <input name="ipkLulusRerata" type="text" class="form-control" id="ipkLulusRerata" placeholder="Silakan isi IPK lulus rata-rata disini" value="{{Input::old('ipkLulusRerata')}}" />
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
                    <input name="ipkLulusMaksimum" type="text" class="form-control" id="ipkLulusMaksimum" placeholder="Silakan isi IPK lulus maksimum disini" value="{{Input::old('ipkLulusMaksimum')}}" />
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
                    <input name="persenIPK1" type="text" class="form-control" id="persenIPK1" placeholder="Silakan isi Persentase Lulusan Reguler dengan IPK < 2.75" value="{{Input::old('persenIPK1')}}" />
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
                    <input name="persenIPK2" type="text" class="form-control" id="persenIPK2" placeholder="Silakan isi Persentase Lulusan Reguler dengan IPK  2.75 - 3.00" value="{{Input::old('persenIPK2')}}" />
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
                    <input name="persenIPK3" type="text" class="form-control" id="persenIPK3" placeholder="Silakan isi Persentase Lulusan Reguler dengan IPK > 3.00" value="{{Input::old('persenIPK3')}}" />
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