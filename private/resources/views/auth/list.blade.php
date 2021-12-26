 @extends('template.app')
 @section('content')
	
<div class="row">	
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Manajemen User</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-users fa-fw"></i>Daftar User
		</div>
		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p class="text-justify">Berikut adalah daftar user yang telah dibuat.
		@if(Auth::user()->idprodi == "000" )
		<b>Khusus untuk Super Admin bisa membuat user Admin biasa, dan bisa menjadikannya Super Admin.</b>
		@endif
		</p>
		
		<div class="form-group">	
		<a class="btn btn-primary" href="addregistrasi"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi / Fakultas</th>
					<th width="150px" class="text-center middle">First Name</th>
					<th class="text-center middle">Last Name</th>
					<th class="text-center middle">Username</th>
					<th  width="80px" class="text-center middle">Level</th>
					<th width="80px" class="text-center middle">Action</th>

			</thead>
			<tbody class="text-center">
					
					@foreach($datalogin as $value)
						<?php if ( $value->id != Auth::user()->id  ) { ?>
						<tr class="daftar soft <?php if ($value->idprodi == "000") echo "tanda" ?>" >
							<td>
							<?php if ($value->level == "prodi") { 
								$pilihprodi = DB::select("SELECT * FROM logins, masterprodis WHERE logins.idprodi = masterprodis.idprodi and logins.id='".$value->id."'"); 
								foreach ($pilihprodi as $row) { ?> 
								{!!$row->namaProdi!!}
								 <?php }
							} else if ($value->level == "fakultas") {
								$pilihfakultas = DB::select("SELECT * FROM logins, masterfakultas WHERE logins.idprodi = masterfakultas.idfakultas and logins.id='".$value->id."'"); 
								foreach ($pilihfakultas as $row) { ?> 
								{!!$row->namaFakultas!!}
								
								<?php }	
							} else if ($value->level == "admin") { ?>
								Semua Program Studi
							<?php }	
							?>
							</td>
							<td >{!!$value->firstname!!}</td>
							<td >{!!$value->lastname!!}</td>
							<td >{!!$value->username!!}</td>
							<td > <?php if ($value->idprodi == "000") {
											echo "Superadmin"; 
										} else if ($value->level == "prodi" ) {
											echo "<span class='labels bg-aqua btn-block btn-md'>Prodi</span>"; 
										} else if ($value->level == "fakultas" ) {
											echo "<span class='labels bg-orange btn-block btn-md'>Fakultas</span>"; 
										} else if ($value->level == "admin" and $value->idprodi == "" ) {
											echo "<span class='labels bg-gray btn-block btn-md text-capitalize'>".$value->level."</span>"; 
										} ?></td>
							<td  class="text-center">
							@if($value->level == "prodi")
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hak Akses" href="hakakses/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-lock"></i></a>
							</span>
							@elseif ($value->level == "fakultas")
							<span style="margin-right:20px;">
							</span>
							@else
							<?php if ($value->idprodi != "000") { ?>	
							<span>
							<a  data-toggle="tooltip" data-placement="top" title="Super Admin"  href="superadmin/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-user" onclick="return confirm('Ingin jadikan Super Admin ?')"></i></a>
							</span>
							<?php } else { ?>
							<span>
							<a  data-toggle="tooltip" data-placement="top" title="Admin"  href="admin/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-chevron-down" onclick="return confirm('Ingin jadikan Admin Biasa?')"></i></a>
							</span>
							<?php }; ?>
							@endif
							
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editregistrasi/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delregistrasi/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
						<?php } ?>
					@endforeach
					
			</tbody>
			</table>
		
	</div>
	 
</div>

@stop 