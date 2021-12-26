 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik V</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-plus-square fa-fw"></i>Form Tambah Suasana Akademik
		</div>
		
		<div class="form-group">	
			<a href="suasanaakademik" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
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
                    <select name="idprodi" class="form-control" >
					@if ($level == 'admin')
					<option value="">--Silakan Pilih Prodi-- </option>
					@endif
					@foreach($masterprodis as $item)
					<option value="{{$item->idprodi}}"  <?php if (old("idprodi") == $item->idprodi) echo 'selected="selected"' ?> >{{$item->namaProdi}}</option> 		
					@endforeach
                    </select>
                  </div>
                </div>
				
                <div class="form-group text-justify">
				Kebijakan tentang suasana akademik (otonomi keilmuan, kebebasan akademik, kebebasan mimbar akademik)
				 </div>
				
                <div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('kebijakanSuasanaAkademik'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('kebijakanSuasanaAkademik')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>kebijakan Suasana Akademik</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
                    <textarea name="kebijakanSuasanaAkademik" class="form-control ckeditor" id="kebijakanSuasanaAkademik" placeholder="Silakan isi kebijakan suasana akademik disini">{{Input::old('kebijakanSuasanaAkademik')}}</textarea>
                  </div>
				 
                </div>
				
				<div class="form-group text-justify">
				Program dan kegiatan di dalam dan di luar proses pembelajaran, yang dilaksanakan baik di dalam maupun di luar kelas,  untuk menciptakan suasana akademik yang kondusif (misalnya seminar, simposium, lokakarya, bedah buku, penelitian bersama, pengenalan kehidupan kampus, dan temu dosen-mahasiswa-alumni)
				 </div>
				
                <div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('kegiatanLuarPembelajaran'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('kegiatanLuarPembelajaran')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>kegiatan Luar Pembelajaran</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
                    <textarea name="kegiatanLuarPembelajaran" class="form-control ckeditor" id="kegiatanLuarPembelajaran" placeholder="Silakan isi kegiatan luar pembelajaran disini">{{Input::old('kegiatanLuarPembelajaran')}}</textarea>
                  </div>
				 
                </div>
				
                <div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('pengembanganPerilakuKecendekiawan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('pengembanganPerilakuKecendekiawan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>pengembangan Perilaku Kecendekiawan</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
                    <textarea name="pengembanganPerilakuKecendekiawan" class="form-control ckeditor" id="pengembanganPerilakuKecendekiawan" placeholder="Silakan isi pengembangan perilaku kecendekiawan disini">{{Input::old('pengembanganPerilakuKecendekiawan')}}</textarea>
                  </div>
				 
                </div>
				
				
				<div class="form-group text-justify">
				Ketersediaan dan jenis prasarana, sarana dan dana yang memungkinkan terciptanya interaksi akademik antara sivitas akademika
				 </div>
				
                <div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('ketersediaanSaranaPrasarana'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('ketersediaanSaranaPrasarana')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>ketersediaan Sarana Prasarana</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
                    <textarea name="ketersediaanSaranaPrasarana" class="form-control ckeditor" id="ketersediaanSaranaPrasarana" placeholder="Silakan isi ketersediaan Sarana Prasarana disini">{{Input::old('ketersediaanSaranaPrasarana')}}</textarea>
                  </div>
				 
                </div>
				
				
				<div class="form-group text-justify">
				Interaksi akademik antara dosen-mahasiswa, antar mahasiswa, serta antar dosen.
				 </div>
				
                <div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('interaksiAkademik'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('interaksiAkademik')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>interaksi Akademik Pembelajaran</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
                    <textarea name="interaksiAkademik" class="form-control ckeditor" id="interaksiAkademik" placeholder="Silakan isi interaksi Akademik disini">{{Input::old('interaksiAkademik')}}</textarea>
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