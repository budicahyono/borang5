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
				Hasil peninjauan tersebut, mengikuti format tabel berikut.
			</div>
			<br>
			<br>
			<table class="tg">
			  <tr>
			  <th rowspan="2" ><p class="text-center ">No</p></th>
                    <th rowspan="2" ><p class="text-center">No MK</p></th>
                    <th rowspan="2"><p class="text-center">Nama MK</p></th>
                    <th rowspan="2" ><p class="text-center">MK Baru/Lama/Hapus</p></th>
                    <th colspan="2" ><p class="text-center">Perubahan Pada</p></th>
                    <th rowspan="2" ><p class="text-center">Alasan Peninjauan</p></th>
                    <th rowspan="2" ><p class="text-center">Berlaku mulai Sem./Th.</p></th>
                    
                    <tr>
                    <th ><p class="text-center">Silabus/SAP</p></th>
                    <th width="100px"><p class="text-center">Buku Ajar</p></th> 
			  </tr>

			 <?php $no=1; ?>
                    @foreach($data8 as $key => $value)
                        <tr>
                            <td align="center">{{$no++}}</td>
                            <td align="center">{{$value->idmatakuliah}}</td>
                            <td>{{$value->namaMataKuliah}}</td> 
                            <td>{{$value->statusMK}}</td> 
                             <?php 
                                if($value->perubahanPada=='Silabus/SAP'){
                                    echo "<td align=center>".$value->perubahanPada."</td>";
                                    echo "<td><center>--</center></td>"; 
                                } 
                                else{
                                    echo "<td><center>--</center></td>"; 
                                    echo "<td align=center>".$value->perubahanPada."</td>";
                                }
                                ?>      
                            <td>{{$value->alasanPeninjauan}}</td> 
                            <td align=center>{{$value->tahunBerlaku}}</td>                     
                        </tr>
                    @endforeach

			</table>
			<br>
			
			@endif
		</body>
	</head>
</html>