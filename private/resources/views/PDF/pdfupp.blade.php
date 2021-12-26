<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Pembelajaran</title>
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
			
			@if(Session::get('level')=='user')
				5.5.2  Rata-rata lama penyelesaian tugas akhir/skripsi pada tiga tahun terakhir :  ... bulan. (Menurut kurikulum tugas akhir direncanakan ... semester).<br>
				<br>
				5.6  Upaya Perbaikan Pembelajaran<br>
				Uraikan upaya perbaikan pembelajaran serta hasil yang telah dilakukan dan dicapai dalam tiga tahun terakhir dan hasilnya.

			<br>
			<br>

			<table class="tg">

			  <tr>
		  <th rowspan="2" width="200px"><p class="text-center">Butir</p></th>  
          <th colspan="2" ><p class="text-center">Upaya Tindakan</p></th>
          
          <tr>
          <th width="200px"><p class="text-center">Tindakan</p></th>
          <th width="200px"><p class="text-center">Hasil</p></th>
       	</tr>
       		</tr>
			  
		@foreach($data5 as $key => $value)
            <tr>
              <td>{{$value->item}}</td>
              <td align="justify">{{$value->tindakanPerbaikan}}</td>
              <td align="justify">{{$value->hasilPerbaikan}}</td>
              
            </tr>
        @endforeach
			
          
          
         
          
         
          </table>
			@endif
		</body>
	</head>
</html>