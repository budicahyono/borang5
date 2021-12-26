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
		@foreach($tbsdms as $value)
		  <table class="table1">
			<tr >
			<th class="text-left">Sistem Seleksi dan Pengembangan</th>
			</tr>
			<tr>
			<td align="justify">{!!$value->sistemSeleksi!!}</td>
			</tr>
		  </table>
		  @endforeach
	</div>	  
</body>