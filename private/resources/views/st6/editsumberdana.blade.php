 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik VI</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-edit fa-fw"></i>Form Edit Sumber Dana
		</div>
		
		<div class="form-group">	
			<a href="{{URL::to('pembiayaan')}}" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		<p></p>
		
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'editsumberdana','method' => 'post')) !!}
              <div class="box-body ">
				@foreach($sumber as $item)
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
					@if($errors->has('sumberDana'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('sumberDana')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Sumber Dana</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
                    <select name="sumberDana" class="form-control" >
					<option value="">--Silakan Pilih Sumber Dana-- </option>
					<option value="PTsendiri" <?php if ($item->sumberDana == "PTsendiri") echo 'selected="selected"' ?>>PT Sendiri</option>
					<option value="yayasan" <?php if ($item->sumberDana == "yayasan") echo 'selected="selected"' ?>>Yayasan</option>
					<option value="diknas" <?php if ($item->sumberDana == "diknas") echo 'selected="selected"' ?>>Diknas</option>
					<option value="sumberlain" <?php if ($item->sumberDana == "sumberlain") echo 'selected="selected"' ?>>Sumber Lain</option>
                    </select>
                  </div>
                </div>
				
				<div class="form-group">
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('jenisDana'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('jenisDana')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Jenis Dana</div>
					@endif
				  </div>
				 
                  <div class="col-sm-8 nopad-right" >
						<input name="jenisDana" type="text" class="form-control" id="jenisDana" placeholder="Silakan isi  jenis Dana disini" value="{{$item->jenisDana}}" />
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