 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik V</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-edit fa-fw"></i>Form Edit Peninjauan Kurikulum
		</div>
		
		<div class="form-group">	
			<a href="{{URL::to('kurikulum')}}" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		<p></p>
		
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'editpeninjauankurikulum','method' => 'post')) !!}
              <div class="box-body ">
				@foreach($peninjauan as $item)
				<input type="hidden" name="id" value="{{$item->id}}"/>
                <div class="form-group ">
				   <div class="col-sm-3 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-9 nopad-right" >
                    <select disabled name="idprodi" class="form-control" placeholder="">
					<option value="{{$item->idprodi}}"  <?php if (old("idprodi") == $item->idprodi) echo 'selected="selected"' ?> >{{$item->masterprodis->namaProdi}}</option> 		
                    </select>
					<input type="hidden" name="idprodi" value="{{$item->masterprodis->namaProdi}}"/>
                  </div>
                </div>
		
				
				<div class="form-group">
				   <div class="col-sm-3 nopad-left" >	
					@if($errors->has('Tahun'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('Tahun')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Tahun</div>
					@endif
				  </div>
				 
                  <div class="col-sm-9 nopad-right" >
						<input name="Tahun" type="text" class="form-control" id="Tahun" placeholder="Silakan isi Tahun disini" value="{{$item->Tahun}}" />
                  </div>
				 
                </div>
				
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('idkurikulum'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idkurikulum')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Kurikulum</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                   <select name="idkurikulum" class="form-control" placeholder="">
						<option value="">--Silakan Pilih Kurikulum-- </option>
						@foreach($kurikulum as $items)
						<option value="{{$items->idkurikulum}}"  <?php if ( $item->idkurikulum == $items->idkurikulum) echo 'selected="selected"' ?> >{{$items->deskripsi}}</option> 		
						@endforeach
					</select>
                  </div>
				  
                </div>
				
				<div class="form-group text-justify">
				Jelaskan mekanisme peninjauan kurikulum dan pihak-pihak yang dilibatkan dalam proses peninjauan tersebut dimana kegiatan tersebut tidak hanya melibatkan dosen Perguruan Tinggi sendiri.
				 </div>
				
                <div class="form-group">
				   <div class="col-sm-3 nopad-left" >	
					@if($errors->has('mekanisme'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('mekanisme')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>mekanisme</div>
					@endif
				  </div>
				 
                  <div class="col-sm-9 nopad-right" >
                    <textarea name="mekanisme" class="form-control ckeditor" id="mekanisme" placeholder="Silakan isi mekanisme disini">{{$item->mekanisme}}</textarea>
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