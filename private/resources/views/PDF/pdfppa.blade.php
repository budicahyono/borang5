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
				<p align="justify">5.4.2  Jelaskan proses pembimbingan akademik  yang diterapkan pada Program Studi ini dalam hal-hal berikut:
				<br>
			</div>
			<br>
			<table class="tg">
			  <tr>
			   <th width="20px"><p class="text-center">No</p></th>
          	   <th width="300px"><p class="text-center">Hal</p></th>
          	   <th width="300px"><p class="text-center">Penjelasan</p></th>
			  </tr>
			 <?php $no=1; ?>
          @foreach($data2 as $key => $value)
            <tr>
              <td align="center">{{$no++}}</td>
              <td align="justify">{{$value->Hal}}</td>
              <td align="justify">{{$value->penjelasan}}</td>
              
            </tr>
          @endforeach
			</table>
			@endif
		</body>
	</head>
</html>