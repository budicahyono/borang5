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
		 <table>
					<tr>
						<th rowspan="2"><p class="text-center">No</p></th>
						<th rowspan="2"><p class="text-center">Jenis Kemampuan</th></p>
						<th colspan="4"><p class="text-center">Tanggapan Pihak Pengguna</th></p>
						<th rowspan="2"><p class="text-center">Tindak Lanjut</th></p>
					</tr>
					

					
					<tr>
						
						<th><p class="text-center">Sangat Baik (%)</p></th>
						<th><p class="text-center">Baik (%)</p></th>
						<th><p class="text-center">Cukup (%)</p></th>
						<th><p class="text-center">Kurang (%)</p></th>
						
					</tr>	
					
				<tbody>
					<?php $no=1; 
					$total=0;
					$total1=0;
					$total2=0;
					$total3=0;?>
					@foreach($tbevaluasilulusans as $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td>{{$value->jenisKemampuan}}</td>
							<td align="center">{{$value->tanggapanSangatBaik}}</td>
							<td align="center">{{$value->tanggapanBaik}}</td>
							<td align="center">{{$value->tanggapanCukup}}</td>
							<td align="center">{{$value->tanggapanKurang}}</td>
							<td>{{$value->tindakLanjut}}</td>
							
							<?php
							$total = $value->tanggapanSangatBaik + $total;
							$total1 = $value->tanggapanBaik + $total1;
							$total2 = $value->tanggapanCukup + $total2;
							$total3 = $value->tanggapanKurang + $total3;

							?>
						</tr>
					@endforeach
							<th colspan="2"><p class="text-center">Total</th></p>
							<td align="center">{{$total}}</td>
							<td align="center">{{$total1}}</td>
							<td align="center">{{$total2}}</td>
							<td align="center">{{$total3}}</td>
							<td></td>
				</tbody>
				</table>
		
	</div>	  
</body>