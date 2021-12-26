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
			
        5.4   Sistem Pembimbingan Akademik
        <br>
        <br>
        5.4.1  Tuliskan nama dosen pembimbing akademik dan jumlah mahasiswa yang dibimbingnya dengan mengikuti format tabel berikut:  

			</div>
			<br>
			<br>
			<table class="tg">
			  <tr>

         <th width="20px"><p class="text-center">No</p></th>
          <th width="200px"><p class="text-center">Nama Dosen Pembimbing Akademik</p></th>
          <th width="100px"><p class="text-center">Jumlah Mahasiswa Bimbingan</p></th>
          <th width="100px"><p class="text-center">Rata-Rata Banyaknya Pertemuan/mhs/semester</p></th>
          
      </tr>
     
          <?php $no=1; 
          $total=0;
          $rata2=0;?>
         
          @foreach($data1 as $key => $value)
            <tr>
              <td align="center">{{$no++}}</td>
              <td>{{$value->nama}}</td>
              <td align="center">{{$value->jumlahMahasiswa}}</td>
              <td align="center">{{$value->jumlahPertemuan}}</td>
              
              <?php
             $total = $value->jumlahMahasiswa + $total;
             $rata2 = $value->jumlahPertemuan + $rata2;
            ?>

            </tr>

          @endforeach
          <tr>
          <td colspan="2" align="left">Total</p></td>
          <td align="center">{{$total}}</td>
          <th bgcolor="black"</th>
          </tr>
          <tr>
          <td colspan="3" align="left">Rata-rata</td>
          

     	<?php
     	$hasilrata2 = $rata2 / ($no-1);
     	echo "<td align=center>".$hasilrata2."</td>";
     	?>
      </table>
			<br>
			 Lampirkan contoh soal ujian dalam 1 tahun terakhir untuk 5 mata kuliah keahlian 
			@endif
		</body>
	</head>
</html>