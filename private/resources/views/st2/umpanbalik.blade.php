
@extends('template.app')
@section('content')
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik II</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Umpan Balik
		</div>
		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p class="text-justify">Apakah program studi telah melakukan kajian tentang proses pembelajaran melalui umpan balik dari <b>Dosen</b>, <b>Mahasiswa</b>, <b>Alumni</b>, dan <b>Pengguna Lulusan</b> mengenai harapan dan persepsi mereka?  Jika Ya, jelaskan isi umpan balik dan tindak lanjutnya.<br><b>Setiap Prodi Hanya Boleh Memasukan Keempat Umpan Balik Itu Saja!!</b></p>
	
		@if ((Auth::user()->level !='prodi') or ($umpanbalik->count()< 4)  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addumpanbalik"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">Sumber</th>
					<th class="text-center middle">Isi</th>
					<th class="text-center middle">Tindak Lanjut</th>
					<th width="80px" class="text-center middle">Action</th>
			</thead>
			<tbody class="text-center">
				
					@foreach($umpanbalik as $value)
						<tr class="daftar soft">
							<td >{!!$value->masterprodis->namaProdi!!}</td>
							<td class="text-left text-capitalize">{!!$value->sumber!!}</td>
							<td class="text-left">{!!$value->isi!!}...</td>
							<td class="text-left">{!!$value->tindakLanjut!!}...</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editumpanbalik/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delumpanbalik/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
				
			</tbody>
			</table>
			
			
	</div>
	 
</div>


@stop 
