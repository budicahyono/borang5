<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Kegiatan PKM</title>
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
				7.2   Kegiatan Pelayanan/Pengabdian kepada Masyarakat (PkM)
				<br>
				<br>
				<p align="justify">7.2.1  Tuliskan jumlah kegiatan Pelayanan/Pengabdian kepada Masyarakat (*) yang sesuai dengan bidang keilmuan PS selama tiga tahun terakhir yang dilakukan oleh dosen tetap yang bidang keahliannya sesuai dengan PS dengan mengikuti format tabel berikut:

			</div>
			<br>
			<table class="tg">
			  <tr>
					
						<th width="100"><p class="text-center">Sumber Dana Kegiatan<br>Pelayana/Pengabdian Kepada<br>Masyarakat</p></th>
						<th width="100"><p class="text-center">TS-2</p></th>
						<th width="100"><p class="text-center">TS-1</p></th>
						<th width="100"><p class="text-center">TS</p></th>
			  </tr>
			<?php  
					$Ynow=date('Y');
					?>
					@foreach($data as $key => $value)
					<tr>
						<td>{{$value->sumberBiaya}}</td>
						<?php
								if($value->tahun==$Ynow-2)
									echo "<td>".$value->jumlah."</td><td></td>";
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