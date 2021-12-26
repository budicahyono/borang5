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
				5.1.3   Tuliskan mata kuliah pilihan yang dilaksanakan dalam tiga tahun terakhir, pada tabel berikut:
			</div>
			<br>
			<br>
			<table class="tg">
			  <tr>
			    <th width="50px"><p class="text-center">Semester</p></th>
                    <th width="100px"><p class="text-center">Kode MK</p></th>
                    <th width="200px"><p class="text-center">Nama MK PIlihan</p></th>
                    <th width="50px"><p class="text-center">Bobot SKS</p></th>
                    <th width="50px"><p class="text-center">Bobot Tugas</p></th>
                    <th width="100px"><p class="text-center">Unit/ Jur/ Fak Pengelola</p></th>
                  </tr>

			<?php $total=0; ?>
                    @foreach($data5 as $key => $value)
                        <tr>
                            <td align="center">{{$value->Semester}} </td>
                            <td align="center">{{$value->idmatakuliah}}</td> 
                            <td>{{$value->namaMKPilihan}}</td> 
                            <td align="center">{{$value->bobotsks}}</td>
                            <td align="center">{{$value->bobottugas}}</td> 
                            <td>{{$value->Unit}}</td>  

                        <?php
                         $total = $value->bobotsks + $total;?>            

                        </tr>
                    @endforeach
                    <tr>
                    <th colspan="3">Total SKS</th> 
                    <td align="center">{{$total}}</td>
                    <th bgcolor="grey"</th>
                    <th bgcolor="grey"</th>
			</table>
			<br>
			 * beri tanda √ pada mata kuliah yang dalam penentuan nilai akhirnya memberikan bobot pada tugas-tugas (praktikum/praktek, PR atau makalah) ≥ 20%.
			@endif
		</body>
	</head>
</html>