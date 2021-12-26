 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik V</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-edit fa-fw"></i>Form Edit Upaya Perbaikan Pembelajaran
		</div>
		
		<div class="form-group">	
			<a href="{{URL::to('pembelajaran')}}" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		<p></p>
		
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'editupayaperbaikanpembelajaran','method' => 'post')) !!}
              <div class="box-body ">
				@foreach($upaya as $item)
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
					@if($errors->has('item'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('item')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Item</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                   <select name="item" class="form-control" placeholder="">
						<option value="">--Silakan Pilih Item-- </option>
						<option value="Materi"  <?php if ($item->item == "Materi") echo 'selected="selected"' ?> >Materi</option> 		
						<option value="Metode Pembelajaran"  <?php if ($item->item == "Metode Pembelajaran") echo 'selected="selected"' ?>>Metode Pembelajaran</option> 	
						<option value="Penggunaan Teknologi Pembelajaran"  <?php if ($item->item == "Penggunaan Teknologi Pembelajaran") echo 'selected="selected"' ?> >Penggunaan Teknologi Pembelajaran</option> 		
						<option value="Cara-cara evaluasi"  <?php if ($item->item == "Cara-cara evaluasi") echo 'selected="selected"' ?> >Cara-cara evaluasi</option> 		
					</select>
                  </div>
				  
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('tindakanPerbaikan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('tindakanPerbaikan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>tindakan Perbaikan</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
                    <textarea name="tindakanPerbaikan" class="form-control ckeditor" id="tindakanPerbaikan" placeholder="Silakan isi penjelasan disini">{{$item->tindakanPerbaikan}}</textarea>
                  </div>
				 
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('hasilPerbaikan'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('hasilPerbaikan')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>hasil Perbaikan</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
                    <textarea name="hasilPerbaikan" class="form-control ckeditor" id="hasilPerbaikan" placeholder="Silakan isi penjelasan disini">{{$item->hasilPerbaikan}}</textarea>
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