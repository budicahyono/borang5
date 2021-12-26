 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik V</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-edit fa-fw"></i>Form Edit Hasil Peninjauan Kurikulum
		</div>
		
		<div class="form-group">	
			<a href="{{URL::to('kurikulum')}}" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		<p></p>
		
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'edithasilpeninjauankurikulum','method' => 'post')) !!}
              <div class="box-body ">
				@foreach($hasilpeninjauan as $item)
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
		
				
				 <div class="form-group ">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('idpeninjauan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idpeninjauan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Peninjauan</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                    <select disabled name="idpeninjauan" class="form-control" >
					<option value="">--Silakan Pilih Peninjauan-- </option>
					@foreach($peninjauan as $items)
					<option value="{{$items->id}}"  <?php if ($item->idpeninjauan == $items->id) echo 'selected="selected"' ?> >Ini Peninjauan Kurikulum {{ $items->masterprodis->namaProdi }} </option> 		
					@endforeach
                    </select>
					<input type="hidden" name="idpeninjauan" value="999"/>
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
                    <input disabled name="idmatakuliah" type="text" class="form-control text-capitalize" id="idmatakuliah" placeholder="Kode Mata Kuliah" value="{{$item->idmatakuliah}}" />
                    <input  name="idmatakuliah" type="hidden" value="999" />
                  </div>
				  
				  <div class="col-sm-5 nopad-right" >
                    <input disabled name="namaMataKuliah" type="text" class="form-control " id="namaMataKuliah"  placeholder="Nama Mata Kuliah" value="{{$item->mastermatakuliahs->namaMataKuliah}}" />
                  </div>
				  
                </div>
				
				 <div class="form-group ">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('statusMK'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('statusMK')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Status Mata Kuliah</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                    <select name="statusMK" class="form-control" >
					<option value="">--Silakan Pilih Status Mata Kuliah-- </option>
					<option value="Baru"  <?php if ($item->statusMK == "Baru") echo 'selected="selected"' ?> >Baru</option> 		
					<option value="Lama"  <?php if ($item->statusMK == "Lama") echo 'selected="selected"' ?> >Lama</option> 		
					<option value="Hapus"  <?php if ($item->statusMK == "Hapus") echo 'selected="selected"' ?> >Hapus</option> 		
					
                    </select>
                  </div>
                </div>
				
				<div class="form-group ">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('perubahanPada'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('perubahanPada')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Perubahan Pada</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                    <select name="perubahanPada" class="form-control" >
					<option value="">--Perubahan Pada-- </option>
					<option value="Silabus/SAP"  <?php if ($item->perubahanPada == "Silabus/SAP") echo 'selected="selected"' ?> >Silabus/SAP</option> 		
					<option value="Buku Ajar"  <?php if ($item->perubahanPada == "Buku Ajar") echo 'selected="selected"' ?> >Buku Ajar</option> 	
                    </select>
                  </div>
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('isiPerubahan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('isiPerubahan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>isi Perubahan</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
                    <textarea name="isiPerubahan" class="form-control ckeditor" id="isiPerubahan" placeholder="Input isi Perubahan disini">{{$item->isiPerubahan}}</textarea>
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('alasanPeninjauan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('alasanPeninjauan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>alasan Peninjauan</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
                    <textarea name="alasanPeninjauan" class="form-control ckeditor" id="alasanPeninjauan" placeholder="Input alasan Peninjauan disini">{{$item->alasanPeninjauan}}</textarea>
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('atasUsulan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('atasUsulan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>atas Usulan</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
					<input name="atasUsulan" type="text" class="form-control" id="atasUsulan" placeholder="Silakan isi atas usulan disini" value="{{$item->atasUsulan}}" />
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('semesterBerlaku'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('semesterBerlaku')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>semester berlaku</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
					<input name="semesterBerlaku" type="text" class="form-control" id="semesterBerlaku" placeholder="Silakan isi semester berlaku disini" value="{{$item->semesterBerlaku}}" />
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('tahunBerlaku'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('tahunBerlaku')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>tahun berlaku</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
					<input name="tahunBerlaku" type="text" class="form-control" id="tahunBerlaku" placeholder="Silakan isi tahun berlaku disini" value="{{$item->tahunBerlaku}}" />
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