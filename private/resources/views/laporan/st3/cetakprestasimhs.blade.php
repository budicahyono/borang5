@include('html.print')
<?php 
header("Content-Type: application/vnd.ms-word; name='word'");
header("Content-disposition: attachment;filename=\"$filename.doc\"");

?>
<body >
	<div style="width:700px;" class="preview">
		<div class="title">
			<h3>{!!$title!!}</h3>		
		</div>
		 <table class="table table-bordered">
					<thead>
					<th><p class="text-center">No</p></th>
					<th><p class="text-center">Nama Kegiatan</p></th>
					<th><p class="text-center">Waktu Penyelenggaraan</p></th>
					<th><p class="text-center">Tingkat (Lokal, Wilayah, Nasional, atau Internasional)</p></th>
					<th><p class="text-center">Prestasi yang Dicapai</p></th>
					

			</thead>
			<tbody>
					<?php $no=1; ?>
					@foreach($tbprestasimahasiswas as $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td>{{$value->namaKegiatan}}</td>
							<td align="center">{{$value->waktu}}</td>
							<td align="center">{{$value->tingkat}}</td>
							<td>{{$value->prestasi}}</td>
						</tr>
					@endforeach
			</tbody>
			</table>
		
	</div>	  
</body>