@include('html.print')

<body onload="window.print()">
	<div style="width:700px;" class="preview">
		<div class="title">
			<h3>{!!$title!!}</h3>		
		</div>
		@foreach($tbvises as $value)
		  <table >
			<tr >
			<th class="text-left">Mekanisme</th>
			</tr>
			<tr>
			<td align="justify">{!!$value->mekanisme!!}</td>
			</tr>
			<tr>
			<th class="text-left">Visi</th>
			</tr>
			<tr>
			<td align="justify">{!!$value->visi!!}</td>
			</tr>
			<tr>
			<th class="text-left">Misi</th>
			</tr>
			<tr>
			<td align="justify">{!!$value->misi!!}</td>
			</tr>
			<tr>
			<th class="text-left">Tujuan</th>
			</tr>
			<tr >
			<td align="justify">{!!$value->tujuan!!}</td>
			</tr>
			<tr>
			<th class="text-left">Sasaran dan Strategi Pencapaian</th>
			</tr>
			<tr>
			<td align="justify">{!!$value->sasaran!!}{!!$value->strategi!!}</td>
			</tr>
			<tr>
			<th class="text-left">Sosialisasi</th>
			</tr>
			<tr>
			<td align="justify">{!!$value->sosialisasi!!}</td>
			</tr>
		  </table>
		  @endforeach
	</div>	  
</body>