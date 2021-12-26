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
				<p align="justify">5.1.4   Tuliskan substansi praktikum/praktek yang mandiri ataupun yang merupakan bagian dari mata kuliah tertentu, dengan mengikuti format di bawah ini:  
			</div>
			<br>
			<br>
			<table class="tg">
			  <tr>
			  <th rowspan="2"><p class="text-center">No</p></th>
                    <th rowspan="2"><p class="text-center">Nama Praktikum/Praktek</p></th>
                    <th colspan="2" ><p class="text-center">Isi Praktikum/Praktek</p></th>
                    <th rowspan="2"><p class="text-center">Tempat/Lokasi Praktikum/Praktek</p></th>

                    
                    <tr>
                    <th ><p class="text-center">Judul/Modul</p></th>
                    <th width="200px"><p class="text-center">Jam Pelaksanaan</p></th>
			  </tr>

			 <?php $no=1; ?>
                    @foreach($data6 as $key => $value)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$value->namaPraktikum}}</td>
                            <td>{{$value->judulModul}}</td> 
                            <td align="center">{{$value->jamPelaksanaan}}</td> 
                            <td>{{$value->lokasi}}</td>                      
                        </tr>
                    @endforeach

			</table>
			<br>
			
			@endif
		</body>
	</head>
</html>