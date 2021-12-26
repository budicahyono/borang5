@include('html.print')
<?php 

header("Content-Type: application/vnd.ms-word; name='word'");
header("Content-disposition: attachment;filename=\"$filename.doc\"");

?>
<body >
	<div style="width:700px;" class="preview">
		<div class="title">
			<h3>{!!$title!!}</h3>		
		</div>
		  <table class="table table-bordered">
					
           
					<body>
   
      				  <tr>
			            <th rowspan="2"><p class="text-center">Tahun Masuk</th></p>
			            <th colspan="7"><p class="text-center">Jumlah Mahasiswa Reguler per Angkatan pada Tahun*</th></p>
			            <th rowspan="2"><p class="text-center">Jumlah Lulusan sampai dengan TS</th></p>
           
       				 </tr>
        

        <tr>
            
            <th><p class="text-center">TS-6</p></th>
            <th><p class="text-center">TS-5</p></th>
            <th><p class="text-center">TS-4</p></th>
            <th><p class="text-center">TS-3</p></th>
            <th><p class="text-center">TS-2</p></th>
            <th><p class="text-center">TS-1</p></th>
            <th><p class="text-center">TS</p></th>
           
           
        </tr>
			<?php
			$nourut= 7 ;
			$Ynow=date('Y');
			
			$sum = new App\Libraries\Fungsi;
			?>
			@foreach($tbjumlahmahasiswas as $value)
			
				<?php 
				$nourut--;
				 ?>
					 <tr>
						<td align="center"><?php echo "TS".$nourut; ?></td>
						<td align="center">
							<?php

							$jmlh = $sum->getjmlMhs($value->angkatan, $Ynow-6);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = $sum->getjmlMhs($value->angkatan, $Ynow-5);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = $sum->getjmlMhs($value->angkatan, $Ynow-4);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = $sum->getjmlMhs($value->angkatan, $Ynow-3);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = $sum->getjmlMhs($value->angkatan, $Ynow-2);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = $sum->getjmlMhs($value->angkatan, $Ynow-1);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = $sum->getjmlMhs($value->angkatan, $Ynow);
							echo $jmlh;
							?>
						</td>
						<td align="center">
							<?php
							$jmlh = $sum->getlulusanMhs($value->angkatan);
							echo $jmlh;
							?>
						</td>
					 </tr>
				
			@endforeach
        
    </table>
		
	</div>	  
</body>