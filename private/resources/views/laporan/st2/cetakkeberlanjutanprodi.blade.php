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
					
					<th><p class="text-center">Jenis Upaya</p></th>
					<th><p class="text-center">Upaya</p></th>
					
			</thead>
			<tbody>
				
					@foreach($tbkeberlanjutanprodis as $value)
						<tr>
							
							<td >{!! $value->jenisUpaya !!}</td>
							<td >{!! $value->upaya !!}</td>
							
						</tr>
					@endforeach
			</tbody>
			</table>
	</div>	  
</body>