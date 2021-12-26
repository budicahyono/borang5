<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Jumlah Mahasiswa</title>
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
 
			
			<br>
3.1.4 Tuliskan data jumlah mahasiswa reguler tujuh tahun terakhir dengan mengikuti format tabel berikut: <br>
<br>
			<table class="tg">

<tr>
			            <th rowspan="3"><p class="text-center">Tahun Masuk </p></th>
			            <th colspan="7"><p class="text-center">Jumlah Mahasiswa Reguler per Angkatan pada Tahun* </p></th>
			            <th rowspan="3"><p class="text-center">Jumlah Lulusan sampai dengan TS</p> </th>
           
       				
        

        <tr>
             <th rowspan="2"><p class="text-center">TS-6 </p></th>
             <th rowspan="2"><p class="text-center">TS-5 </p></th>
             <th rowspan="2"><p class="text-center">TS-4 </p></th>
             <th rowspan="2"><p class="text-center">TS-3 </p></th>
             <th rowspan="2"><p class="text-center">TS-2 </p></th>
             <th rowspan="2"><p class="text-center">TS-1 </p></th>
             <th rowspan="2"><p class="text-center">TS   </p></th>
            <tr>
           
           
        </tr>
			<?php
			$nourut= 7 ;
			$Ynow = date ('Y');
			?>
			@foreach($data4 as $key => $value)
			
				<?php 
				$nourut--;
				 ?>
					 <tr>
						<td><?php echo "TS".$nourut; ?></td>
						<td align="center">
							<?php
							$jmlh = Fungsi::getjmlMhs($value->angkatan, $Ynow-6);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = Fungsi::getjmlMhs($value->angkatan, $Ynow-5);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = Fungsi::getjmlMhs($value->angkatan, $Ynow-4);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = Fungsi::getjmlMhs($value->angkatan, $Ynow-3);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = Fungsi::getjmlMhs($value->angkatan, $Ynow-2);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = Fungsi::getjmlMhs($value->angkatan, $Ynow-1);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = Fungsi::getjmlMhs($value->angkatan, $Ynow);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = Fungsi::getlulusanMhs($value->angkatan);
							echo $jmlh;
							?>
						</td>
					 </tr>
				
			@endforeach
  
    </table>
<br>
 * Tidak memasukkan mahasiswa transfer. <br> 


			</table>
		</body>
	</head>
</html>
			