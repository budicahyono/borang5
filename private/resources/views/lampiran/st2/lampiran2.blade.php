 @extends('template.app')
 @section('content')
<?php 
if (Session::has('tab_lampiran2')) {
	$tab_lampiran2 = Session::get('tab_lampiran2');
} else {
	$tab_lampiran2 = "tatapamong";
}
?>	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Lampiran Standar Akademik</b> 
		</h3>
		<ul class="nav nav-tabs " >
    <li class="<?php if ($tab_lampiran2 == "tatapamong") echo 'active'; ?>" ><a href="#tab1"><b>Dokumen Tata Pamong</b></a></li>
    <li class="<?php if ($tab_lampiran2 == "umpanbalik") echo 'active'; ?>"><a href="#tab2"><b>Dokumen Umpan Balik</b></a></li>
  </ul>
	<div class="tab-content">
		<div id="tab1" class="tab-pane fade <?php if ($tab_lampiran2 == "tatapamong") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar II Dokumen Tata Pamong
			</div>
			@if(Session::has('statuspamong'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('statuspamong') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar lampiran dokumen tata pamong <br></p>
			<div class="form-group">	
			<a class="btn btn-primary" href="addlampirantatapamong"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
						<th class="text-center middle" style="width:100px">Program Studi</th>
						<th class="text-center middle">Jenis Lampiran</th>
						<th class="text-center middle">Tata Pamong</th>
						<th class="text-center middle">Dokumen Tata Pamong</th>
						<th width="80px" class="text-center middle">Action</th>

				</thead>
				<tbody class="text-center">
						
						@foreach($tbdokumentatapamongs as $value)
							<tr class="daftar soft">
								
								<td >{!!$value->namaProdi!!}</td>
								
							
								<td class="text-left">{!! $value->jenis_lampiran !!}</td>
								<td class="text-left">{!! substr($value->tataPamong,0,100) !!}...</td>
								<td class="text-left">
								<a  target="blank" href="{{URL::to('lampiran/tatapamong')}}/{!! $value->dokumen_tatapamong !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->dokumen_tatapamong !!}</a>
								</td>
								<td  class="text-center">
								
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Hapus" href="dellampirantatapamong/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
								</span>
								</td>
							</tr>
						@endforeach
						
				</tbody>
			</table>
		</div>
		
		
		<div id="tab2" class="tab-pane fade <?php if ($tab_lampiran2 == "umpanbalik") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar II Dokumen Umpan Balik
			</div>
			@if(Session::has('statusumpan'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('statusumpan') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut adalah daftar lampiran dokumen (kuesioner dan hasil) umpan balik tiap sumber</p>
			
			<p></p>
			<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">Sumber</th>
					<th class="text-center middle">Dokumen Umpan Balik</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
				
					@foreach($tbumpanbaliks as $value)
						<tr class="daftar soft">
							<td  style="width:150px">{!!$value->masterprodis->namaProdi!!}</td>
							<td class="text-left text-capitalize">{!!$value->sumber!!}</td>
							<td class="text-left" style="width:250px">
							@if ($value->dokumen_umpanbalik != "")
								<a target="blank" href="{{URL::to('lampiran/umpanbalik')}}/{!! $value->dokumen_umpanbalik !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->dokumen_umpanbalik !!}</a>
							@else 
								Tidak Ada Dokumen yang Diunggah
							@endif
							</td>
							
								
							<td  class="text-center">
							@if ($value->dokumen_umpanbalik == "")
							<span>
							<a   data-toggle="tooltip" data-placement="top" title="Upload" href="addlampiranumpanbalik/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-upload"></i></a>
							</span>
							@else 
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="dellampiranumpanbalik/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							@endif
							</td>
						</tr>
					@endforeach
				
			</tbody>
			</table>
		</div>
          
	</div>
	</div>
	 
</div>



@stop 

