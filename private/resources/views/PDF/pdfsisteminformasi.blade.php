
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Sistem Informasi</title>
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

      
				6.5   Sistem Informasi
				<br>
				<br>
				6.5.1   Jelaskan sistem informasi dan fasilitas yang digunakan oleh program studi untuk proses pembelajaran (hardware, software, e-learning, perpustakaan, dll.).

			</div>
			<br>
			<table class="tg">
			  <tr>

			  			<th width="100"><p class="text-center">No</p></th>
						<th><p class="text-center">Deskripsi</p></th>
						
			  </tr>
			<?php $no=1; ?>
					@foreach($data as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->deskripsi}}</td>
					</tr>
					@endforeach
			</table>
		</body>
	</head>
</html>