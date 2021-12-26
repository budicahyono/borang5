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
		@foreach($tbtatapamongs as $value)
		  <table class="table1">
			<tr >
			<th class="text-left">Tata Pamong</th>
			</tr>
			<tr>
			<td align="justify">{!!$value->tataPamong!!}</td>
			</tr>
			<tr>
			<th class="text-left">Kepemimpinan</th>
			</tr>
			<tr>
			<td align="justify">{!!$value->kepemimpinan!!}</td>
			</tr>
			<tr>
			<th class="text-left">Sistem Pengelolaan</th>
			</tr>
			<tr>
			<td align="justify">{!!$value->sistemPengelolaan!!}</td>
			</tr>
			<tr>
			<th class="text-left">Penjaminan Mutu</th>
			</tr>
			<tr >
			<td align="justify">{!!$value->penjaminanMutu!!}</td>
			</tr>
		  </table>
		  @endforeach
	</div>	  
</body>