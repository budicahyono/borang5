<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Penelitian</title>
    <body>
      <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
        .tg td{font-family:Arial;font-size:11px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
        .tg th{font-family:Arial;font-size:11px;font-weight:normal;padding:9px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
        .tg .tg-3wr7{font-weight:bold;font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
        .tg .tg-ti5e{font-size:8px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
        .tg .tg-rv4w{font-size:8px;font-family:"Arial", Helvetica, sans-serif !important;}
      </style>
 
      <div style="font-family:Arial; font-size:12px;">

      </div>
				<h2>STANDAR 7. 	PENELITIAN, PELAYANAN/PENGABDIAN KEPADA MASYARAKAT, DAN<br>
				<font color="white">iiiiiiiiiiiiiiiiiiiii</font> KERJASAMA</h2>
				<br>
				<br>
				7.1   Penelitian Dosen Tetap yang Bidang Keahliannya Sesuai dengan PS
				<br>
				<br>
				7.1.1   Tuliskan jumlah judul penelitian* yang sesuai dengan bidang keilmuan PS, yang dilakukan oleh dosen tetap yang bidang keahliannya sesuai dengan PS selama tiga tahun terakhir dengan mengikuti format tabel berikut:


			</div>
			<br>
			<table class="tg">
			  <tr>

			  			<th width="100"><p class="text-center">Sumber Pembiayaan</p></th>
						<th width="100"><p class="text-center">TS-2</p></th>
						<th width="100"><p class="text-center">TS-1</p></th>
						<th width="100"><p class="text-center">TS</p></th>
						
			  </tr>
			<?php  
						$Ynow=date('Y');
						$penelitian = "";
					?>
					@foreach($data as $key => $value)
					<tr>
						<td>{{$value->sumberBiaya}}</td>
						<?php
								if($value->tahun==$Ynow-2)
									echo "<td>".$value->jumlah."</td><td></td>
									<td></td>";
								if($value->tahun==$Ynow-1)
									echo "<td></td><td>".$value->jumlah."</td>
										  <td></td>";
								if($value->tahun==$Ynow)
									echo "<td></td><td></td>
										  <td>".$value->jumlah."</td>";
						?>
					</tr>
					@endforeach
			</table>
		</body>
	</head>
</html>