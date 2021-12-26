 @extends('template.app')
 @section('content')
	
<div class="row">	
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Manajemen User</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-users fa-fw"></i>Hak Akses User
		</div>
		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p class="text-justify">Berikut adalah hak akses dari User <b class="text-capitalize">{{ $user }}</b></p>
		<div class="form-group">	
			<a href="{{URL::to('registrasi')}}" class="btn btn-info"><i class="fa fa-arrow-left fa-fw"></i>Back</a>
		</div>
		<p></p>
		<div class="col-lg-3" style="padding-left:0">
		<table class="table  table-bordered " >
			<thead >
					<th width="150px" class="text-center middle">Modul</th>
					<th width="80px" class="text-center middle">Action</th>

			</thead>
			<tbody class="text-center">
					@if($hak_akses->count() > 0)
					  @foreach($hak_akses as $value)
						<tr class="daftar soft">
						<?php 
						$modul = $value->modul;
						switch ($modul) {
							case "st1": $modul = "Standar 1"; break;
							case "st2": $modul = "Standar 2"; break;
							case "st3": $modul = "Standar 3"; break;
							case "st4": $modul = "Standar 4"; break;
							case "st5": $modul = "Standar 5"; break;
							case "st6": $modul = "Standar 6"; break;
							case "st7": $modul = "Standar 7"; break;
						}
						?>
							<td >{!! $modul !!}</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="{{URL::to('delhakakses/'.$value->id)}}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					  @endforeach
					  @else 
						<tr class="daftar soft">
							<td colspan="2">Tidak Ada Data</td>
						</tr>	
					  @endif	
					
			</tbody>
		</table>
		</div>
		<div class="col-lg-9" style="padding-right:0">
		<?php if ($hak_akses->count() < 7 ) { ?>
		{!!Form::open(array('class' =>'form-horizontal line','url'=>'hakakses','method' => 'post')) !!}
              <div class="box-body ">
				<div class="form-group " >
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('id_logins'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('id_logins')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Nama User </div>
					@endif
				    </div>
				  
                  <div class="col-sm-8 nopad-right" >
                    <select disabled  name="id_logins" class="form-control text-capitalize" placeholder="">
					<option value="{{$id_user}}"   >{{$username}} (<?php echo $user ?>) </option> 		
                    </select>
					<input type="hidden" name="id_logins" value="{{$id_user}}"/>
                  </div>
                </div>
				
				<div class="form-group " >
				   <div class="col-sm-4 nopad-left" >	
					@if($errors->has('modul'))
						<div class=" label  alert-danger text-capitalize"><i class="fa fa-exclamation-triangle fa-fw"></i>{{$errors->first('modul')}}</div>
				    @else 
						<div class=" label  alert-default text-capitalize"><i class="fa fa-pencil fa-fw"></i>Pilih Modul Hak Akses</div>
					@endif
				  </div>
				  
                  <div class="col-sm-8 nopad-right" >
				  @if ($add_akses->where('modul','st1') == '[]') 
					<span style="display:inline-block"> 
                    <input  id="st1"  type="checkbox" name="modul[]" value="st1" <?php if (old("modul") == "st1") echo "checked"; ?> >
					<label for="st1" style="margin-right:20px" >Standar 1</label>
					</span>
				  @endif	
				  @if ($add_akses->where('modul','st2') == '[]') 
					<span style="display:inline-block">   
					<input  id="st2"  type="checkbox" name="modul[]" value="st2" <?php if (old("modul") == "st2") echo "checked"; ?> >
					<label for="st2" style="margin-right:20px" >Standar 2</label>
					</span>
				  @endif	
				  @if ($add_akses->where('modul','st3') == '[]')
					<span style="display:inline-block"> 		
					<input  id="st3"  type="checkbox" name="modul[]" value="st3" <?php if (old("modul") == "st3") echo "checked"; ?> >
					<label for="st3" style="margin-right:20px" >Standar 3</label>
					</span>
				  @endif	
				  @if ($add_akses->where('modul','st4') == '[]')
					<span style="display:inline-block"> 		
					<input  id="st4"  type="checkbox" name="modul[]" value="st4" <?php if (old("modul") == "st4") echo "checked"; ?> >
					<label for="st4" style="margin-right:20px" >Standar 4</label>
					</span>
				  @endif	
				  @if ($add_akses->where('modul','st5') == '[]')
					<span style="display:inline-block"> 		
					<input  id="st5"  type="checkbox" name="modul[]" value="st5" <?php if (old("modul") == "st5") echo "checked"; ?> >
					<label for="st5" style="margin-right:20px" >Standar 5</label>
					</span>
				  @endif	
				  @if ($add_akses->where('modul','st6') == '[]')
					<span style="display:inline-block"> 		
					<input  id="st6"  type="checkbox" name="modul[]" value="st6" <?php if (old("modul") == "st6") echo "checked"; ?> >
					<label for="st6" style="margin-right:20px" >Standar 6</label>
					</span>
				  @endif	
				  @if ($add_akses->where('modul','st7') == '[]')
					<span style="display:inline-block"> 	
					<input  id="st7"  type="checkbox" name="modul[]" value="st7" <?php if (old("modul") == "st7") echo "checked"; ?> >
					<label for="st7" style="margin-right:20px" >Standar 7</label>
					</span>
				@endif
					
                  </div>
                </div>
				
				

				
              </div>
              <!-- /.box-body -->
              <div class="box-footer form-group center-block">
				<button type="button" id="pilihsemua" class="btn btn-info"><i class="fa fa-check fa-fw"></i>Pilih Semua</button><span style="padding-right:10px" ></span>
				<button type="reset" class="btn btn-warning"><i class="fa fa-remove fa-fw"></i>Reset</button><span style="padding-right:10px" ></span>
                <button type="submit" class="btn btn-primary "><i class="fa fa-save fa-fw"></i>Save</button><span style="padding-right:10px" ></span>
				
				
				
              </div>
              <!-- /.box-footer -->
            {!!Form::close() !!}
		<?php } else { ?>	
			<div class="alert-box alert-danger text-center">
				<b>Hak Akses Sudah Dipilih Semua!!</b>
			</div>
		<?php } ?>	
		</div>
		
	</div>
	 
</div>


@stop 