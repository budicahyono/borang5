 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik V</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-edit fa-fw"></i>Form Edit Kompetensi
		</div>
		
		<div class="form-group">	
			<a href="{{URL::to('kurikulum')}}" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		<p></p>
		
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'editkompetensi','method' => 'post')) !!}
              <div class="box-body ">
				@foreach($kompetensi as $item)
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
					@if($errors->has('kompetensiUtama'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('kompetensiUtama')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>kompetensi Utama</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
                    <textarea name="kompetensiUtama" class="form-control ckeditor" id="kompetensiUtama" placeholder="Silakan isi kompetensi utama disini">{{$item->kompetensiUtama}}</textarea>
                  </div>
				 
                </div>
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('kompetensiPendukung'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('kompetensiPendukung')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>kompetensi Pendukung</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                   <textarea name="kompetensiPendukung"  class="form-control ckeditor" id="kompetensiPendukung" placeholder="Silakan isi kompetensi pendukung disini">{{$item->kompetensiPendukung}}</textarea>
                  </div>
				  
                </div>
               <div class="form-group">
                   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('kompetensiLain'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('kompetensiLain')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>kompetensi Lain</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <textarea name="kompetensiLain" class="form-control ckeditor" id="kompetensiLain" placeholder="Silakan isi kompetensi Lain disini">{{$item->kompetensiLain}}</textarea>
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