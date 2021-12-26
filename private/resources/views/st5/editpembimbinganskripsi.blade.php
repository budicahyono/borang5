 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik V</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-edit fa-fw"></i>Form Edit Pembimbingan Skripsi
		</div>
		
		<div class="form-group">	
			<a href="{{URL::to('pembelajaran')}}" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		<p></p>
		
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'editpembimbinganskripsi','method' => 'post')) !!}
              <div class="box-body ">
				@foreach($skripsi as $item)
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
                    <input disabled name="nip" type="text" class="form-control" id="nip" placeholder="NIP dosen" value="{{$item->nip}}" />
					<input type="hidden" name="nip" value="999"/>
                  </div>
				  
				  <div class="col-sm-5 nopad-right" >
                    <input disabled name="namaDosen" type="text" class="form-control" id="namaDosen"  placeholder="Nama dosen" value="{{$item->masterdosens->nama}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('jumlahMahasiswa'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jumlahMahasiswa')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>jumlah Mahasiswa</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
					<input name="jumlahMahasiswa" type="text" class="form-control" id="jumlahMahasiswa" placeholder="Silakan isi jumlah mahasiswa disini" value="{{$item->jumlahMahasiswa}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('jumlahPertemuan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jumlahPertemuan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>jumlah Pertemuan</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
					<input name="jumlahPertemuan" type="text" class="form-control" id="jumlahPertemuan" placeholder="Silakan isi jumlah Pertemuan disini" value="{{$item->jumlahPertemuan}}" />
                  </div>
				  
                </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('lamaPenyelesaian'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('lamaPenyelesaian')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>lama Penyelesaian</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
					<input name="lamaPenyelesaian" type="text" class="form-control" id="lamaPenyelesaian" placeholder="Silakan isi lama Penyelesaian disini" value="{{$item->lamaPenyelesaian}}" />
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