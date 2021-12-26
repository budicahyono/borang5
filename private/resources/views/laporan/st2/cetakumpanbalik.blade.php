

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
					
					<th><p class="text-center">Sumber</p></th>
					<th><p class="text-center">Isi</p></th>
					<th><p class="text-center">Tindak Lanjut</p></th>
					
			</thead>
			<tbody>
				
					@foreach($tbumpanbaliks as $value)
						<tr>
							
							<td >{!! $value->sumber !!}</td>
							<td >{!! $value->isi !!}</td>
							<td >{!! $value->tindakLanjut !!}</td>
							
						</tr>
					@endforeach
			</tbody>
			</table>
	</div>	  
</body>