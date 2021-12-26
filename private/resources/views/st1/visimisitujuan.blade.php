 @extends('template.app')
 @section('content')
	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik I</b> 
		</h3>
		<div class="breadcrumb">
			   <i class="fa fa-th-list fa-fw"></i>Visi Misi 
		</div>
		@if(Session::has('status'))
		<div id="fade_out" class="alert-box alert-success text-center">
			<b >{{ Session::get('status') }}</b>
		</div>
		@endif
		<p class="text-justify">Jelaskan mekanisme penyusunan visi, misi, tujuan dan sasaran program studi, serta pihak-pihak yang dilibatkan.<br><b>Setiap Prodi Hanya Boleh Memasukan Satu Data Saja!!</b></p>
		
		@if ((Auth::user()->level =='admin') or ($tbvises->count() != $masterprodis->count())  )
		<div class="form-group">	
		<a class="btn btn-primary" href="addvisimisitujuan"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
		</div>
		@endif
		<p></p>
		<table class="table  table-bordered data" >
			<thead >
					<th width="150px" class="text-center middle">Program Studi</th>
					<th class="text-center middle">Mekanisme</th>
					<th class="text-center middle">Visi</th>
					<th class="text-center middle">Misi</th>
					<th class="text-center middle">Tujuan</th>
					<th class="text-center middle">Sasaran</th>
					<th class="text-center middle">Strategi Pencapaian</th>
					<th class="text-center middle">Sosialisasi</th>
					<th width="80px" class="text-center middle">Action</th>

			</thead>
			<tbody class="text-center">
					
					@foreach($tbvises as $value)
						<tr class="daftar soft">
							<td >{!!$value->masterprodis->namaProdi!!}</td>
							<td class="text-left">{!! substr($value->mekanisme,0,100) !!}...</td>
							<td class="text-left">{!! substr($value->visi,0,100)!!}...</td>
							<td class="text-left">{!! substr($value->misi,0,100) !!}...</td>
							<td class="text-left">{!! substr($value->tujuan,0,100) !!}...</td>
							<td class="text-left">{!! substr($value->sasaran,0,100) !!}...</td>
							<td class="text-left">{!! substr($value->strategi,0,100) !!}...</td>
							<td class="text-left">{!! substr($value->sosialisasi,0,100) !!}...</td>
							<td  class="text-center">
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Edit" href="editvisimisitujuan/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
							</span>
							<span>
							<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delvisimisitujuan/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
							</span>
							</td>
						</tr>
					@endforeach
					
			</tbody>
			</table>
			
			
	</div>
	 
</div>

@stop 