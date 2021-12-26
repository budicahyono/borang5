<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Monev</title>
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
				4.2  	Monitoring dan Evaluasi<br>
				<p align="justify">Laporan tentang penjelasan sistem monitoring dan evaluasi, serta rekam jejak kinerja akademik dosen dan kinerja tenaga kependidikan (termasuk informasi tentang ketersediaan pedoman tertulis, dan monitoring dan evaluasi kinerja dosen dalam tridarma serta dokumentasinya).	
			</div>
			<br>
			<table class="tg">
			  <tr>
			   
			    <th class="tg-3wr7">Monitoring dan Evaluasi<br></th>
			  </tr>
			  @foreach($data1 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->monev}}</td>
                            
                        </tr>
                    @endforeach
			</table>
			@endif

			@if(Session::get('level')=='admin')
				<center><h2>LAPORAN MONITORING DAN EVALUASI</h2></center>
				<p align="justify">Laporan tentang penjelasan sistem monitoring dan evaluasi, serta rekam jejak kinerja akademik dosen dan kinerja tenaga kependidikan (termasuk informasi tentang ketersediaan pedoman tertulis, dan monitoring dan evaluasi kinerja dosen dalam tridarma serta dokumentasinya).	
			</div>
			<br>
			<table class="tg">
			  <tr>
			   
			    <th class="tg-3wr7">Monitoring dan Evaluasi<br></th>
			  </tr>
			  @foreach($data1 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->monev}}</td>
                            
                        </tr>
                    @endforeach
			</table>
			@endif
		</body>
	</head>
</html>