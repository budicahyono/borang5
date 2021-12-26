<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Kurikulum</title>
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
				5.1.1.3  Uraikan secara ringkas kompetensi lainnya/pilihan lulusan 
			</div>
			<br>
			<br>
			<table class="tg">
			  <tr>
			  <th><p class="text-center">Kompetensi Lainnya</p></th> 
			  </tr>
			 @foreach($data2 as $key => $value)
                        <tr>
                            <td>{{$value->kompetensiLain}}</td>
                            
                        </tr>
                    @endforeach
			</table>
			<br>
			Catatan: Pengertian tentang kompetensi utama, pendukung, dan lainnya dapat dilihat pada Kepmendiknas No. 045/2002.
			@endif
		</body>
	</head>
</html>