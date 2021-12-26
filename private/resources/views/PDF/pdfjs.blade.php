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
				5.1.2  Struktur Kurikulum
				<br>
				5.1.2.1  Jumlah sks PS (minimum untuk kelulusan) :  …  sks yang tersusun sebagai berikut:

			</div>
			<br>
			<br>
			<table class="tg">
			  <tr>
			    <th>Jenis Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Keterangan</th>
                   </tr>
			<?php $totalsks=0;?>
                    @foreach($data3 as $key => $value)
                        <tr>
                            <td>{{$value->statusMataKuliah}}</td>
                            <td>{{$value->total}}</td>     
                            <td></td>
                            <?php $totalsks =  $totalsks + $value->total ?>                      
                        </tr>
                    @endforeach
                    <tr>
                    <td colspan="1" align="left">Jumlah Total</td> 
                    <td align="left">{{$totalsks}} </td>
                    <th bgcolor="grey"</th>
			</table>
			<br>
			* Hanya yang memiliki pendidikan formal dalam bidang perpustakaan
			@endif
		</body>
	</head>
</html>