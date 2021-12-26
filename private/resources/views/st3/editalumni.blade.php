 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik III</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-edit fa-fw"></i>Form Edit Alumni
		</div>		
		<div class="form-group">	
			<a href="{{URL::to('lulusan')}}" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'editalumni','method' => 'post')) !!}
              <div class="box-body ">
				@foreach($alumni as $item)
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
                    <select  disabled ="idprodi" class="form-control" placeholder="">
					<option value="{{$item->idprodi}}"  <?php if (old("idprodi") == $item->idprodi) echo 'selected="selected"' ?> >{{$item->masterprodis->namaProdi}}</option> 		
                    </select>
					<input type="hidden" name="idprodi" value="{{$item->masterprodis->namaProdi}}"/>
                  </div>
                </div>
				
				<div class="form-group">
					Rata-rata waktu tunggu lulusan untuk memperoleh pekerjaan yang pertama (bulan).
				</div>
				
				 <div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('waktuTungguLulusan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('waktuTungguLulusan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Waktu Tunggu Lulusan</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="waktuTungguLulusan" type="text" class="form-control" id="waktuTungguLulusan" placeholder="Silakan isi waktu tunggu lulusan dalam bulan" value="{{$item->waktuTungguLulusan}}" />
                  </div>
				 
                </div>
				
				<div class="form-group">
					Persentase lulusan yang bekerja pada bidang yang sesuai dengan keahliannya (%).
				</div>
				
                 <div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('kerjaSesuaiBidang'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('kerjaSesuaiBidang')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Kerja Sesuai Bidang</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="kerjaSesuaiBidang" type="text" class="form-control" id="kerjaSesuaiBidang" placeholder="Silakan isi Kerja Sesuai Bidang dalam persentase" value="{{$item->kerjaSesuaiBidang}}" />
                  </div>
				 
                </div>
				
				<div class="form-group text-justify">
					Jelaskan apakah lulusan program studi memiliki himpunan alumni. Jika memiliki, jelaskan aktivitas dan hasil kegiatan dari himpunan alumni untuk kemajuan program studi dalam kegiatan akademik dan non akademik, meliputi sumbangan dana, sumbangan fasilitas, keterlibatan dalam kegiatan, pengembangan jejaring, dan penyediaan fasilitas
				</div>
				
                <div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('himpunanAlumni'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('himpunanAlumni')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Himpunan Alumni</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                     <textarea name="himpunanAlumni" class="form-control ckeditor" id="himpunanAlumni" placeholder="Silakan isi penjelasan himpunan alumni disini">{{$item->himpunanAlumni}}</textarea>
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