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
					
					<th><p class="text-center">Waktu Tunggu Lulusan</p></th>
					<th><p class="text-center">Kerja Sesuai Bidang</p></th>
					<th><p class="text-center">Himpunan Alumni</p></th>
					
			</thead>
			<tbody>
					<?php ?>
					@foreach($tbalumnis as $value)
						<tr>
							
							<td align="center">{{$value->waktuTungguLulusan}}</td>
							<td align="center">{{$value->kerjaSesuaiBidang}}</td>
							<td align="center">{!! $value->himpunanAlumni !!}</td>
							
						</tr>
					@endforeach
			</tbody>
			</table>
	</div>	  
</body>