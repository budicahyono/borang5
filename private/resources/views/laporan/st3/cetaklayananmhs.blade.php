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
					<th>No</th>
					<th><p class="text-center">Jenis Layanan Kepada Mahasiswa</p></th>
					<th><p class="text-center">Bentuk Kegiatan, Pelaksanaan, dan Hasilnya</th></p>
					
					

			</thead>
			<tbody>
					<?php $no=1; ?>
					@foreach($tblayananmahasiswas as  $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td align="justify">{{$value->jenisKegiatan}}</td>
							<td align="justify">{{$value->isiKegiatan}}</td>
							
						</tr>
					@endforeach
			</tbody>
			</table>
		
	</div>	  
</body>