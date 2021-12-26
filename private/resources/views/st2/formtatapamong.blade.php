 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik II</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-plus-square fa-fw"></i>Form Tambah Tatapamong
		</div>		
		<div class="form-group">	
			<a href="tatapamong" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		<p></p>
		{!!Form::open(array('class' =>'form-horizontal line')) !!}
              <div class="box-body ">
				
                <div class="form-group ">
				   <div class="col-sm-3 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-9 nopad-right" >
                    <select name="idprodi" class="form-control" placeholder="">
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
				Sistem tata pamong berjalan secara efektif melalui mekanisme yang disepakati bersama,serta dapat memelihara dan mengakomodasi semua unsur, fungsi, dan peran dalam program studi. Tata pamong didukung dengan budaya organisasi yang dicerminkan dengan ada dan tegaknya aturan, tatacara pemilihan pimpinan, etika dosen, etika mahasiswa, etika tenaga kependidikan, sistem penghargaan dan sanksi serta pedoman dan prosedur pelayanan (administrasi, perpustakaan, laboratorium, dan studio). Sistem tata pamong (input, proses, output dan outcome serta lingkungan eksternal yang menjamin terlaksananya tata pamong yang baik) harus diformulasikan, disosialisasikan, dilaksanakan,  dipantau dan dievaluasi dengan peraturan dan prosedur yang jelas.<br><br>
				Uraikan secara ringkas sistem dan pelaksanaan tata pamong di Program Studi untuk  membangun sistem tata pamong yang kredibel, transparan,akuntabel, bertanggung jawab dan adil.
				 </div>
				
                <div class="form-group">
				   <div class="col-sm-3 nopad-left" >	
					@if($errors->has('tataPamong'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('tataPamong')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>tatapamong</div>
					@endif
				  </div>
				 
                  <div class="col-sm-9 nopad-right" >
                    <textarea name="tataPamong" class="form-control ckeditor" id="tataPamong" placeholder="Silakan isi tatapamong disini">{{Input::old('tataPamong')}}</textarea>
                  </div>
				 
                </div>
				
				<div class="form-group text-justify">
				Kepemimpinan efektif mengarahkan dan mempengaruhi perilaku semua unsur dalam program studi, mengikuti nilai, norma, etika, dan budaya organisasi yang disepakati bersama, serta mampu membuat keputusan yang tepat dan cepat.Kepemimpinan mampu memprediksi masa depan, merumuskan dan mengartikulasi visi yang realistik, kredibel, serta mengkomunikasikan visi ke depan, yang menekankan pada keharmonisan hubungan manusia dan mampu menstimulasi secara intelektual dan arif bagi anggota untuk mewujudkan visi organisasi, serta mampu memberikan arahan, tujuan, peran, dan tugas kepada seluruh unsur dalam perguruan tinggi. Dalam menjalankan fungsi kepemimpinan dikenal kepemimpinan operasional, kepemimpinan organisasi, dan kepemimpinan publik. Kepemimpinan operasional berkaitan dengan kemampuan menjabarkan visi, misi ke dalam kegiatan operasional program studi.  Kepemimpinan organisasi berkaitan dengan pemahaman tata kerja antar unit dalam organisasi perguruan tinggi.  Kepemimpinan publik berkaitan dengan kemampuan menjalin kerjasama dan menjadi rujukan bagi publik.<br><br>
				Jelaskan pola kepemimpinan dalam Program Studi.
				 </div>
				
                <div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('kepemimpinan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('kepemimpinan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>kepemimpinan</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <textarea name="kepemimpinan" class="form-control ckeditor" id="kepemimpinan" placeholder="Silakan isi kepemimpinan disini">{{Input::old('kepemimpinan')}}</textarea>
                  </div>
				  
                </div>
				
                <div class="form-group text-justify">
					Sistem pengelolaan fungsional dan operasional program studi mencakup <i>planning, organizing, staffing, leading, controlling</i> dalam kegiatan internal maupun eksternal.<br>
					Jelaskan sistem pengelolaan Program Studi serta dokumen pendukungnya.
				 </div>
				
                <div class="form-group">
                   <div class="col-sm-3 nopad-left" >	
					@if($errors->has('sistemPengelolaan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('sistemPengelolaan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Sistem Pengelolaan</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <textarea name="sistemPengelolaan" class="form-control ckeditor" id="sistemPengelolaan" placeholder="Silakan isi sistemPengelolaan disini">{{Input::old('sistemPengelolaan')}}</textarea>
                  </div>
				 
                </div>
				
				<div class="form-group text-justify">
					Bagaimanakah pelaksanaan penjaminan mutu pada Program Studi? Jelaskan.
				 </div>
				
                <div class="form-group">
                  <div class="col-sm-3 nopad-left" >	
					@if($errors->has('penjaminanMutu'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('penjaminanMutu')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Penjaminan Mutu</div>
					@endif
				  </div>

                  <div class="col-sm-9 nopad-right" >
                    <textarea name="penjaminanMutu" class="form-control ckeditor" id="penjaminanMutu" placeholder="Silakan isi penjaminanMutu disini">{{Input::old('penjaminanMutu')}}</textarea>
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