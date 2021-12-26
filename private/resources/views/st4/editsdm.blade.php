 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik IV</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-edit fa-fw"></i>Form Edit Sumber Daya Manusia
		</div>
		
		<div class="form-group">	
			<a href="{{URL::to('sdm')}}" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		<p></p>
		
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'editsdm','method' => 'post')) !!}
              <div class="box-body ">
				@foreach($tbsdms as $item)
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
				
				<div class="form-group text-justify">
				Jelaskan sistem seleksi/perekrutan, penempatan, pengembangan, retensi, dan pemberhentian dosen dan tenaga kependidikan untuk menjamin mutu penyelenggaraan program akademik (termasuk informasi tentang ketersediaan pedoman tertulis dan konsistensi pelaksanaannya).
				 </div>
				
                <div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('sistemSeleksi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('sistemSeleksi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Sistem Seleksi dan Pengembangan</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
                    <textarea name="sistemSeleksi" class="form-control ckeditor" id="sistemSeleksi" placeholder="Silakan isi sistem seleksi dan pengembangan disini">{{$item->sistemSeleksi}}</textarea>
                  </div>
				 
                </div>
				
				<div class="form-group text-justify">
				Jelaskan sistem monitoring dan evaluasi, serta rekam jejak kinerja akademik dosen dan kinerja tenaga kependidikan (termasuk informasi tentang ketersediaan pedoman tertulis, dan monitoring dan evaluasi kinerja dosen dalam tridarma serta dokumentasinya).
				 </div>
				
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('monev'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('monev')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Monitoring dan Evaluasi</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <textarea name="monev" class="form-control ckeditor" id="monev" placeholder="Silakan isi monitoring dan evaluasi disini">{{$item->monev}}</textarea>
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