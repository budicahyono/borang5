<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Sdm</title>
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
				<h2>STANDAR 4. SUMBER DAYA MANUSIA</h2>
				4.1  	Sistem Seleksi dan Pengembangan<br>
				<p align="justify">Jelaskan sistem seleksi/perekrutan, penempatan, pengembangan, retensi, dan pemberhentian dosen dan tenaga kependidikan untuk menjamin mutu penyelenggaraan program akademik (termasuk informasi tentang ketersediaan pedoman tertulis dan konsistensi pelaksanaannya).


			</div>
			<br>
			<table class="tg">
			  <tr>
			   
			    <th class="tg-3wr7">Sistem Seleksi dan Pengembangan<br></th>
			  </tr>
			 @foreach($data as $key => $value)
                        <tr>
                            <td align="justify">{{$value->sistemSeleksi}}</td>

			  @endforeach
			</table>
			@endif
		</body>
	</head>
</html>