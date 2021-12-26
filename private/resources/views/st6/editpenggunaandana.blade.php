 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik VI</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-edit fa-fw"></i>Form Edit Penggunaan Dana
		</div>
		
		<div class="form-group">	
			<a href="{{URL::to('pembiayaan')}}" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		<p></p>
		
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'editpenggunaandana','method' => 'post')) !!}
              <div class="box-body ">
				@foreach($penggunaan as $item)
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
					@if($errors->has('jenisPenggunaan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jenisPenggunaan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Jenis Penggunaan</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                    <select name="jenisPenggunaan" class="form-control" >
					<option value="">--Silakan Pilih Jenis Penggunaan-- </option>
					<option value="Pendidikan" <?php if ($item->jenisPenggunaan == "Pendidikan") echo 'selected="selected"' ?> >Pendidikan</option>
					<option value="Penelitian" <?php if ($item->jenisPenggunaan == "Penelitian") echo 'selected="selected"' ?> >Penelitian</option>
					<option value="Pengabdian Kepada Masyarakat" <?php if ($item->jenisPenggunaan == "Pengabdian Kepada Masyarakat") echo 'selected="selected"' ?> >Pengabdian Kepada Masyarakat</option>
					<option value="Investasi Prasarana" <?php if ($item->jenisPenggunaan == "Investasi Prasaran") echo 'selected="selected"' ?> >Investasi Prasarana</option>
					<option value="Investasi Sarana" <?php if ($item->jenisPenggunaan == "Investasi Sarana") echo 'selected="selected"' ?> >Investasi Sarana</option>
					<option value="Investasi SDM" <?php if ($item->jenisPenggunaan == "Investasi SDM") echo 'selected="selected"' ?>>Investasi SDM</option>
					<option value="dll"  <?php if ($item->jenisPenggunaan == "dll") echo 'selected="selected"' ?> >Atau yang Lainnya</option>
                    </select>
                  </div>
                </div>
				
				
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('tahun'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('tahun')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>tahun</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="tahun" type="text" class="form-control" id="tahun" placeholder="Silakan isi tahun disini" value="{{$item->tahun}}" />
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('jumlahDana'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jumlahDana')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>jumlah Dana</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="jumlahDana" type="text" class="form-control" id="jumlahDana" placeholder="Silakan isi jumlah Dana disini" value="{{$item->jumlahDana}}" />
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