 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik I</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-edit fa-fw"></i>Form Edit Visi Misi
		</div>
		<p>Jelaskan mekanisme penyusunan visi, misi, tujuan dan sasaran program studi, serta pihak-pihak yang dilibatkan.</p>
		
		<div class="form-group">	
			<a href="{{URL::to('visimisitujuan')}}" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		<p></p>
		
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'editvisimisitujuan','method' => 'post')) !!}
              <div class="box-body ">
				@foreach($tbvises as $item)
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
					@if($errors->has('mekanisme'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('mekanisme')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Mekanisme</div>
					@endif
				  </div>
				 
                  <div class="col-sm-9 nopad-right" >
					
                    <textarea name="mekanisme" class="form-control ckeditor" id="mekanisme" placeholder="Silakan isi Mekanisme disini">{{$item->mekanisme}}</textarea>
                  </div>
				 
                </div>
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('visi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('visi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Visi</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <textarea name="visi" class="form-control ckeditor" id="Visi" placeholder="Silakan isi Visi disini">{{$item->visi}}</textarea>
                  </div>
				  
                </div>
               <div class="form-group">
                   <div class="col-sm-3 nopad-left" >	
					@if($errors->has('misi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('misi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Misi</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <textarea name="misi" class="form-control ckeditor" id="Misi" placeholder="Silakan isi misi disini">{{$item->misi}}</textarea>
                  </div>
				 
                </div>
				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('tujuan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('tujuan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Tujuan</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <textarea name="tujuan" class="form-control ckeditor" id="Tujuan" placeholder="Silakan isi tujuan disini">{{$item->tujuan}}</textarea>
                  </div>
				  
                </div>

				<div class="form-group">
                   <div class="col-sm-3 nopad-left" >	
					@if($errors->has('sasaran'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('sasaran')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Sasaran</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <textarea name="sasaran" class="form-control ckeditor" id="Sasaran" placeholder="Silakan isi sasaran disini">{{$item->sasaran}}</textarea>
                  </div>
				 
                </div>

				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('strategi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('strategi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Sistem Pengelolaan</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <textarea name="strategi" class="form-control ckeditor" id="StrategiPencapaian" placeholder="Silakan isi strategi pencapaian disini">{{$item->strategi}}</textarea>
                  </div>
				  
                </div>

				<div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('sosialisasi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('sosialisasi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Sosialisasi</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <textarea name="sosialisasi" class="form-control ckeditor" id="Sosialisasi" placeholder="Silakan uraikan upaya penyebaran/sosialisasi visi, misi dan tujuan program studi serta pemahaman sivitas akademika (dosen dan mahasiswa) dan tenaga kependidikan.">{{$item->sosialisasi}}</textarea>
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