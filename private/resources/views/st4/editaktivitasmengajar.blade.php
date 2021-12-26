 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik IV</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-edit fa-fw"></i>Form Edit Aktivitas Mengajar Dosen
		</div>		
		<div class="form-group">	
			<a href="{{URL::to('datadosen')}}" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'editaktivitasmengajar','method' => 'post')) !!}
              <div class="box-body ">
				@foreach($aktivitas as $item)
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
					@if($errors->has('nip'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('nip')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>NIP dan Nama Dosen</div>
					@endif
				  </div>

                  <div class="col-sm-3 nopad-right" >
                    <input name="nip" type="text" class="form-control" id="nip" placeholder="NIP dosen" value="{{$item->nip}}" />
                  </div>
				  
				  <div class="col-sm-5 nopad-right" >
                    <input readonly name="namaDosen" type="text" class="form-control" id="namaDosen"  placeholder="Nama dosen" value="{{$item->masterdosens->nama}}" />
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
                    <input name="tahunAkademik" type="text" class="form-control" id="tahunAkademik" placeholder="Silakan isi tahun akademik disini" value="{{$item->tahunAkademik}}" />
                  </div>
				  
                </div> 
				
				 <div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('idmatakuliah'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idmatakuliah')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Kode dan Nama Mata Kuliah</div>
					@endif
				  </div>

                  <div class="col-sm-3 nopad-right" >
                    <input name="idmatakuliah" type="text" class="form-control text-capitalize" id="idmatakuliah" placeholder="Kode Mata Kuliah" value="{{$item->idmatakuliah}}" />
                  </div>
				  
				  <div class="col-sm-5 nopad-right" >
                    <input readonly name="namaMataKuliah" type="text" class="form-control " id="namaMataKuliah"  placeholder="Nama Mata Kuliah" value="{{$item->mastermatakuliahs->namaMataKuliah}}" />
                  </div>
				  
                </div>
				
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('jumlahKelas'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jumlahKelas')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Jumlah Kelas</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input name="jumlahKelas" type="text" class="form-control" id="jumlahKelas" placeholder="Silakan isi jumlah kelas disini" value="{{$item->jumlahKelas}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('jumlahRencanaPertemuan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jumlahRencanaPertemuan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Jumlah Rencana Pertemuan</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input name="jumlahRencanaPertemuan" type="text" class="form-control" id="jumlahRencanaPertemuan" placeholder="Silakan isi Jumlah Rencana Pertemuan disini" value="{{$item->jumlahRencanaPertemuan}}" />
                  </div>
				  
                </div>
				
				 <div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('jumlahRealisasiPertemuan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jumlahRealisasiPertemuan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Jumlah Realisasi Pertemuan</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input name="jumlahRealisasiPertemuan" type="text" class="form-control" id="jumlahRealisasiPertemuan" placeholder="Silakan isi Jumlah Realisasi Pertemuan disini" value="{{$item->jumlahRealisasiPertemuan}}" />
                  </div>
				  
                </div>
				
				
				  @endforeach
				
				
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