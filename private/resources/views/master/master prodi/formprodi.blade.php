 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Data Master</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-plus-square fa-fw"></i>Form Tambah Master Prodi
		</div>
		
		<div class="form-group">	
			<a href="masterprodi" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		<p></p>
		
		{!!Form::open(array('class' =>'form-horizontal line')) !!}
              <div class="box-body ">
				 <div class="form-group ">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('idprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Id Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                    <input name="idprodi" type="text" class="form-control" id="idprodi" placeholder="Silakan isi Id Prodi disini" value="{{Input::old('idprodi')}}" />
                  </div>
				  
                </div>	
				<div class="form-group ">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('namaProdi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('namaProdi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Nama Prodi</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                    <input name="namaProdi" type="text" class="form-control" id="namaProdi" placeholder="Silakan isi nama prodi disini" value="{{Input::old('namaProdi')}}" />
                  </div>
				  
                </div>	
                <div class="form-group ">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('idfakultas'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('idfakultas')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Fakultas</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                    <select name="idfakultas" class="form-control" >
					@if ($level == 'admin')
					<option value="">--Silakan Pilih Fakultas-- </option>
					@endif
					@foreach($masterfakultas as $item)
					<option value="{{$item->idfakultas}}"  <?php if (old("idfakultas") == $item->idfakultas) echo 'selected="selected"' ?> >{{$item->namaFakultas}}</option> 		
					@endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('jenjang'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jenjang')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Jenjang</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
                    <input name="jenjang" type="text" class="form-control" id="jenjang" placeholder="Silakan isi jenjang disini" value="{{Input::old('jenjang')}}" />
                  </div>
				 
                </div>
				<div class="form-group">
                  <div class="col-sm-4 nopad-left" >	
					@if($errors->has('kaprodi'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('kaprodi')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Ketua Program Studi</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                    <input name="kaprodi" type="text" class="form-control" id="kaprodi" placeholder="Silakan isi Ketua Program Studi disini" value="{{Input::old('kaprodi')}}" />
                  </div>
				  
                </div>
               <div class="form-group">
                   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('minSksLulus'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('minSksLulus')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Minimal SKS Kelulusan</div>
					@endif
				  </div>

                  <div class="col-sm-8 nopad-right" >
                     <input name="minSksLulus" type="text" class="form-control" id="minSksLulus" placeholder="Silakan isi Minimal SKS Kelulusan disini" value="{{Input::old('minSksLulus')}}" />
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