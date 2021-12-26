 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Lampiran Standar Akademik</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-folder-open fa-fw"></i>Lampiran Standar I SK Program Studi
		</div>
		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p class="text-justify">Berikut adalah daftar lampiran SK pendirian dan SK izin operasional program studi <br><b>Segera diunggah untuk dikirim bersama borang!!</b></p>
		<div class="form-group">	
		<a class="btn btn-primary" href="addlampiran1"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">Jenis Lampiran</th>
					<th class="text-center middle">SK Program Studi</th>
					<th width="80px" class="text-center middle">Action</th>

			</thead>
			<tbody class="text-center">
					
					@foreach($tbskprodis as $value)
						<tr class="daftar soft">
							<td>{!!$value->masterprodis->namaProdi!!}</td>
							<td class="text-left">{!! $value->jenis_lampiran !!}</td>
							<td class="text-left">
							<a target="blank" href="{{URL::to('lampiran/sk_prodi')}}/{!! $value->sk_prodi !!}" data-toggle="tooltip" data-placement="left" title="Download File ini" class="btn btn-primary"><i class="fa fa-download fa-fw"></i>{!! $value->sk_prodi !!}</a>
							</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editlampiran1/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="dellampiran1/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
					
			</tbody>
			</table>
			
          
	</div>
	 
</div>



@stop 

