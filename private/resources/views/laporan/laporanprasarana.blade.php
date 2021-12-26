@extends('layouts.master')
@section('content')
	<br>
	<div class="col-lg-24">
		<h2>Standar VI. Laporan Sarana Prasarana</h2>
		<br>
		<br>
			<ul class="nav nav-tabs">
				<li><a href="lapprasarana">Laporan Ruang Kerja Dosen</a></li>
            	<li><a href="lapdataprasarana">Laporan Data Prasarana</a></li>
            	<li><a href="lapdatapenunjang">Laporan Data Penunjang</a></li>
				<li><a href="lappustaka">Laporan Pustaka</a></li>
				<li><a href="lapjurnal">Laporan Jurnal</a></li>
				<li><a href="lapsumberpustaka">Laporan Sumber Pustaka</a></li>
				<li><a href="lapperalatanLAB">Laporan Peralatan LAB</a></li>
			</ul>
			<br>
			

				<div class="tab-content">
				<div class="tab-pane<?php if (isset($y)) echo $y ;?>" id="lapprasarana" name="Ruang Kerja Dosen">
				<br>
			  		<div class="alert alert-info">
			  		<strong>Laporan Ruang kerja Dosen </strong>
			  		<br>
			  		<br>
			  			<p></p>
			  		</div>
			  		<?php if (isset($dataprodi) and Session::get('level')!='user') {?>
                        	 <form method="post" action="">
						{{Form::label('idprodi', 'Pilih Prodi :') }} <br>
 						 <select name="idprodi">
						@foreach($dataprodi as $key => $row)
						<option value="{{$row->idprodi}}">{{$row->namaProdi}}</option> 		
						@endforeach
 						 </select>
						<input type="submit" name="submitidprodi" value="Cari" />
						<?php }?>
					</form>
					<?php
					if(isset($hasilpencarian) ) 
					{
					echo $hasilpencarian;?>
			  		<br>
			  		<br>
						<table class="table  table-bordered data" >
					<thead>
						<th width="100"><p class="text-center">Ruang Kerja Dosen</p></th>
						<th width="100"><p class="text-center">Jumlah<br> Ruang</p></th>
						<th width="100"><p class="text-center">Jumlah Luas<br>(m2)</p></th>
					</thead>
					<tbody class="text-center">
					<?php 
					$total=0;
					 ?>

					@foreach($data as $key => $value)
					<tr>
						<td>{{$value->jenisRuang}}</td>
						<td>{{$value->jumlahRuang}}</td>
						<td>{{$value->jumlahLuas}}</td>

					<?php
					$total = $value->jumlahLuas + $total;
					?>
					</tr>
					@endforeach
					<th colspan="2">Total</th>
					<td>{{$total}}</td>
					</tbody>
					</table>
					<?php
					}
					
					if(Session::get('level')=='user')
					{?>
					<table class="table  table-bordered data" >
					<thead>
						<th width="100"><p class="text-center">Ruang Kerja Dosen</p></th>
						<th width="100"><p class="text-center">Jumlah<br> Ruang</p></th>
						<th width="100"><p class="text-center">Jumlah Luas<br>(m2)</p></th>
					</thead>
					<tbody class="text-center">
					<?php 
					$total=0;
					 ?>

					@foreach($data as $key => $value)
					<tr>
						<td>{{$value->jenisRuang}}</td>
						<td>{{$value->jumlahRuang}}</td>
						<td>{{$value->jumlahLuas}}</td>

					<?php
					$total = $value->jumlahLuas + $total;
					?>
					</tr>
					@endforeach
					<th colspan="2">Total</th>
					<td>{{$total}}</td>
					</tbody>
					</table>
					<a class="btn btn-primary" href="{{ url('PDF/pdfruangkerjadosen') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
					<?php }?>
			  	</div>

			  	<div class="tab-pane<?php if (isset($bangke)) echo $bangke ;?>" id="prasarana" name="Prasarana">
			  	<br>
			  		<div class="alert alert-info">
			  		<strong>Laporan Data Prasarana Utama </strong>
			  		<br>
			  		<br>
			  			<p>Data prasrana (kantor, ruang kelas, ruang laboratorium, studio, ruang perpustakaan, kebun percobaan, dsb kecuali ruang dosen)<br>
			  			yang dipergunakan PS dalam proses belajar mengajar.</p>
			  		</div>
			  		<?php if (isset($dataprodi) and Session::get('level')!='user') {?>
                        	 <form method="post" action="">
						{{Form::label('idprodi', 'Pilih Prodi :') }} <br>
 						 <select name="idprodi">
						@foreach($dataprodi as $key => $row)
						<option value="{{$row->idprodi}}">{{$row->namaProdi}}</option> 		
						@endforeach
 						 </select>
						<input type="submit" name="submitidprodi" value="Cari" />
						<?php }?>
					</form>
					<?php
					if(isset($hasilpencarian) ) 
					{
					echo $hasilpencarian;?>
			  		<br>
			  		<br>
						<table class="table  table-bordered data" >
					<thead>
						<th rowspan="2" width="30"><p class="text-center">No</p></th>
						<th rowspan="2" width="100"><p class="text-center">Jenis Prasarana</p></th>
						<th rowspan="2" width="100"><p class="text-center">Jumalh<br> Unit</p></th>
						<th rowspan="2" width="100"><p class="text-center">Total<br> Luas<br>(m2)</p></th>
						<th colspan="2" ><p class="text-center">Kepemilikan</p></th>
						<th colspan="2"  ><p class="text-center">Kondisi</p></th>
						<th rowspan="2" width="100"><p class="text-center">Utilisasi<br>(Jam/Minggu)</p></th>
					<tr>
						<th width="100"><p class="text-center">SD</p></th>
						<th width="100"><p class="text-center">SW</p></th>
						<th width="100"><p class="text-center">Terawat</p></th>
						<th width="100" style="border:1px"><p class="text-center">Tidak<br>Terawat</p></th>
						
					</thead>
					<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data2 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->jenisPrasarana}}</td>
						<td>{{$value->jumlahUnit}}</td>
						<td>{{$value->luas}}</td>
						<?php
							if($value->kepemilikan=="sendiri" || $value->kepemilikan=="Sendiri" )
								echo "<td>".$value->kepemilikan."</td><td></td>";
							if($value->kepemilikan=="sewa" || $value->kepemilikan=="Sewa")
								echo "<td></td><td>".$value->kepemilikan."</td>";
							
							if($value->kondisi=="terawat" || $value->kondisi=="Terawat" )
								echo "<td>".$value->kondisi."</td><td></td>";
							if($value->kondisi=="tidak terawat" || $value->kondisi=="Tidak Terawat")
								echo "<td></td><td>".$value->kondisi."</td>";
						?>
						<td>{{$value->utilisasi}}</td>
					</tr>
					@endforeach
					</tbody>	
					</table>
					<div >
			  		<strong>Keterangan</strong>
			  		<br>
			  			<p>SD=Milik PT/Fakultas/Jurusan Sendiri<br>SW=Sewa/Kontrak/Kerjasama</p>
			  		</div>
			  		<?php
					}
					
					if(Session::get('level')=='user')
					{?>
					<table class="table  table-bordered data" >
					<thead>
						<th rowspan="2" width="30"><p class="text-center">No</p></th>
						<th rowspan="2" width="100"><p class="text-center">Jenis Prasarana</p></th>
						<th rowspan="2" width="100"><p class="text-center">Jumalh<br> Unit</p></th>
						<th rowspan="2" width="100"><p class="text-center">Total<br> Luas<br>(m2)</p></th>
						<th colspan="2" ><p class="text-center">Kepemilikan</p></th>
						<th colspan="2"  ><p class="text-center">Kondisi</p></th>
						<th rowspan="2" width="100"><p class="text-center">Utilisasi<br>(Jam/Minggu)</p></th>
					<tr>
						<th width="100"><p class="text-center">SD</p></th>
						<th width="100"><p class="text-center">SW</p></th>
						<th width="100"><p class="text-center">Terawat</p></th>
						<th width="100" style="border:1px"><p class="text-center">Tidak<br>Terawat</p></th>
						
					</thead>
					<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data2 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->jenisPrasarana}}</td>
						<td>{{$value->jumlahUnit}}</td>
						<td>{{$value->luas}}</td>
						<?php
							if($value->kepemilikan=="sendiri" || $value->kepemilikan=="Sendiri" )
								echo "<td>".$value->kepemilikan."</td><td></td>";
							if($value->kepemilikan=="sewa" || $value->kepemilikan=="Sewa")
								echo "<td></td><td>".$value->kepemilikan."</td>";
							
							if($value->kondisi=="terawat" || $value->kondisi=="Terawat" )
								echo "<td>".$value->kondisi."</td><td></td>";
							if($value->kondisi=="tidak terawat" || $value->kondisi=="Tidak Terawat")
								echo "<td></td><td>".$value->kondisi."</td>";
						?>
						<td>{{$value->utilisasi}}</td>
					</tr>
					@endforeach
					</tbody>	
					</table>
					<div >
			  		<strong>Keterangan</strong>
			  		<br>
			  			<p>SD=Milik PT/Fakultas/Jurusan Sendiri<br>SW=Sewa/Kontrak/Kerjasama</p>
				</div>
				<a class="btn btn-primary" href="{{ url('PDF/pdfprasaranautama') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
					<?php }?>
				</div>

				<div class="tab-pane<?php if (isset($sip)) echo $sip;?>" id="prasarana" name="Prasarana">
			  	<br>
			  		<div class="alert alert-info">
			  		<strong>Laporan Data Penunjang</strong>
			  		<br>
			  		<br>
			  			<p>Data prasarana lain yang menunjang (misalnya tempat olahraga, ruang bersama, ruang himpunan mahasiswa, poliklinik<br>
			  			yang dipergunakan PS</p>
			  		</div>
			  		<?php if (isset($dataprodi) and Session::get('level')!='user') {?>
                        	 <form method="post" action="">
						{{Form::label('idprodi', 'Pilih Prodi :') }} <br>
 						 <select name="idprodi">
						@foreach($dataprodi as $key => $row)
						<option value="{{$row->idprodi}}">{{$row->namaProdi}}</option> 		
						@endforeach
 						 </select>
						<input type="submit" name="submitidprodi" value="Cari" />
						<?php }?>
					</form>
					<?php
					if(isset($hasilpencarian) ) 
					{
					echo $hasilpencarian;?>
			  		<br>
			  		<br>
					<table class="table  table-bordered data" >
					<thead>
						<th rowspan="2" width="30"><p class="text-center">No</p></th>
						<th rowspan="2" width="100"><p class="text-center">Jenis Prasarana<br>Penunjang</p></th>
						<th rowspan="2" width="100"><p class="text-center">Jumalh<br> Unit</p></th>
						<th rowspan="2" width="100"><p class="text-center">Total<br> Luas<br>(m2)</p></th>
						<th colspan="2" style='border:1px'><p class="text-center">Kepemilikan</p></th>
						<th colspan="2" ><p class="text-center">Kondisi</p></th>
						<th rowspan="2" width="100"><p class="text-center">Unit<br>Pengelola</p></th>
					<tr>
						<th width="100"><p class="text-center">SD</p></th>
						<th width="100"><p class="text-center">SW</p></th>
						<th width="100"><p class="text-center">Terawat</p></th>
						<th width="100"><p class="text-center">Tidak<br>Terawat</p></th>
						
					</thead>
					<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data3 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->jenisPrasarana}}</td>
						<td>{{$value->jumlahUnit}}</td>
						<td>{{$value->luas}}</td>
						<?php
							if($value->kepemilikan=="sendiri" || $value->kepemilikan=="Sendiri" )
								echo "<td>".$value->kepemilikan."</td><td></td>";
							if($value->kepemilikan=="sewa" || $value->kepemilikan=="Sewa")
								echo "<td></td><td>".$value->kepemilikan."</td>";
							
							if($value->kondisi=="terawat" || $value->kondisi=="Terawat" )
								echo "<td>".$value->kondisi."</td><td></td>";
							if($value->kondisi=="tidak terawat" || $value->kondisi=="Tidak Terawat")
								echo "<td></td><td>".$value->kondisi."</td>";
						?>
						<td>{{$value->pengelola}}</td>
					</tr>
					@endforeach
					</tbody>	
					</table>
					<div >
			  		<strong>Keterangan</strong>
			  		<br>
			  			<p>SD=Milik PT/Fakultas/Jurusan Sendiri<br>SW=Sewa/Kontrak/Kerjasama</p>
			  		</div>
			  		<?php
					}
					
					if(Session::get('level')=='user')
					{?>
					<table class="table  table-bordered data" >
					<thead>
						<th rowspan="2" width="30"><p class="text-center">No</p></th>
						<th rowspan="2" width="100"><p class="text-center">Jenis Prasarana<br>Penunjang</p></th>
						<th rowspan="2" width="100"><p class="text-center">Jumalh<br> Unit</p></th>
						<th rowspan="2" width="100"><p class="text-center">Total<br> Luas<br>(m2)</p></th>
						<th colspan="2" style='border:1px'><p class="text-center">Kepemilikan</p></th>
						<th colspan="2" ><p class="text-center">Kondisi</p></th>
						<th rowspan="2" width="100"><p class="text-center">Unit<br>Pengelola</p></th>
					<tr>
						<th width="100"><p class="text-center">SD</p></th>
						<th width="100"><p class="text-center">SW</p></th>
						<th width="100"><p class="text-center">Terawat</p></th>
						<th width="100"><p class="text-center">Tidak<br>Terawat</p></th>
						
					</thead>
					<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data3 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->jenisPrasarana}}</td>
						<td>{{$value->jumlahUnit}}</td>
						<td>{{$value->luas}}</td>
						<?php
							if($value->kepemilikan=="sendiri" || $value->kepemilikan=="Sendiri" )
								echo "<td>".$value->kepemilikan."</td><td></td>";
							if($value->kepemilikan=="sewa" || $value->kepemilikan=="Sewa")
								echo "<td></td><td>".$value->kepemilikan."</td>";
							
							if($value->kondisi=="terawat" || $value->kondisi=="Terawat" )
								echo "<td>".$value->kondisi."</td><td></td>";
							if($value->kondisi=="tidak terawat" || $value->kondisi=="Tidak Terawat")
								echo "<td></td><td>".$value->kondisi."</td>";
						?>
						<td>{{$value->pengelola}}</td>
					</tr>
					@endforeach
					</tbody>	
					</table>
					
					<div >
			  		<strong>Keterangan</strong>
			  		<br>
			  			<p>SD=Milik PT/Fakultas/Jurusan Sendiri<br>SW=Sewa/Kontrak/Kerjasama</p>
			  		</div>
			  		<a class="btn btn-primary" href="{{ url('PDF/pdfprasaranapenunjang') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
					<?php }?>
				</div>

				<div class="tab-pane<?php if (isset($on)) echo $on ;?>" id="pustaka" name="Pustaka">
			  	<br>
			  		<div class="alert alert-info">
			  		<strong>Laporan Pustaka </strong>
			  		<br>
			  		<br>
			  			<p>
			  			</p>
			  		</div>
			  		<?php if (isset($dataprodi) and Session::get('level')!='user') {?>
                        	 <form method="post" action="">
						{{Form::label('idprodi', 'Pilih Prodi :') }} <br>
 						 <select name="idprodi">
						@foreach($dataprodi as $key => $row)
						<option value="{{$row->idprodi}}">{{$row->namaProdi}}</option> 		
						@endforeach
 						 </select>
						<input type="submit" name="submitidprodi" value="Cari" />
						<?php }?>
					</form>
					<?php
					if(isset($hasilpencarian) ) 
					{
					echo $hasilpencarian;?>
			  		<br>
			  			<p> Tabel 1. Rekapitulasi jumlah ketersediaan pustaka yang relevan dengan bidang PS</p>
						<table class="table  table-bordered data" >
					<thead>
						<th width="100"><p class="text-center">Jenis Pustaka</p></th>
						<th width="100"><p class="text-center">Jumlah Judul</p></th>
						<th width="100"><p class="text-center">Jumlah Copy</p></th>
					</thead>
					<tbody class="text-center">
					<?php 
					$total = 0;
					$total1 = 0;
					 ?>
					@foreach($data4 as $key => $value)
					<tr>
						<td>{{$value->jenisPustaka}}</td>
						<td>{{$value->jumlahJudul}}</td>
						<td>{{$value->jumlahCopy}}</td>

					<?php
					$total = $value->jumlahJudul + $total;
					$total1 = $value->jumlahCopy + $total1;
					?>
					</tr>
					@endforeach
					<th colspan="1">Total</th>
					<td>{{$total}}</td>
					<td>{{$total1}}</td>
					</tbody>	
					</table>
					<?php
					}
					
					if(Session::get('level')=='user')
					{?>
					<br>
			  			<p> Tabel 1. Rekapitulasi jumlah ketersediaan pustaka yang relevan dengan bidang PS</p>
						<table class="table  table-bordered data" >
					<thead>
						<th width="100"><p class="text-center">Jenis Pustaka</p></th>
						<th width="100"><p class="text-center">Jumlah Judul</p></th>
						<th width="100"><p class="text-center">Jumlah Copy</p></th>
					</thead>
					<tbody class="text-center">
					<?php 
					$total = 0;
					$total1 = 0;
					 ?>
					@foreach($data4 as $key => $value)
					<tr>
						<td>{{$value->jenisPustaka}}</td>
						<td>{{$value->jumlahJudul}}</td>
						<td>{{$value->jumlahCopy}}</td>

					<?php
					$total = $value->jumlahJudul + $total;
					$total1 = $value->jumlahCopy + $total1;
					?>
					</tr>
					@endforeach
					<th colspan="1">Total</th>
					<td>{{$total}}</td>
					<td>{{$total1}}</td>
					</tbody>	
					</table>
					<a class="btn btn-primary" href="{{ url('PDF/pdfpustaka') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
					<?php }?>
			  	</div>

			  	<div class="tab-pane<?php if (isset($oyi)) echo $oyi ;?>" id="jurnal" name="Jurnal">
			  <br>
			  		<div class="alert alert-info">
			  		<strong>Laporan Jurnal</strong>
			  		<br>
			  		<br>
			  			<p>
			  			</p>
			  		</div>
			  		<?php if (isset($dataprodi) and Session::get('level')!='user') {?>
                        	 <form method="post" action="">
						{{Form::label('idprodi', 'Pilih Prodi :') }} <br>
 						 <select name="idprodi">
						@foreach($dataprodi as $key => $row)
						<option value="{{$row->idprodi}}">{{$row->namaProdi}}</option> 		
						@endforeach
 						 </select>
						<input type="submit" name="submitidprodi" value="Cari" />
						<?php }?>
					</form>
					<?php
					if(isset($hasilpencarian) ) 
					{
					echo $hasilpencarian;?>
			  		<br>
			  			<p>Tabel 2. Jurnal yang tersedia/yang diterima secara teratur (lengkap), terbitan 3 tahun terakhir</p>
						<table class="table  table-bordered data" >
					<thead>
						<th width="100"><p class="text-center">JenisJurnal</p></th>
						<th width="100"><p class="text-center">Nama Jurnal</p></th>
						<th width="100"><p class="text-center">Tahun</p></th>
						<th width="100"><p class="text-center">Nomor</p></th>
						<th width="100"><p class="text-center">Jumlah</p></th>
					</thead>
					<tbody class="text-center">
					<?php  ?>
					@foreach($data5 as $key => $value)
					<tr>
						<td>{{$value->akreditasi}}</td>
						<td>{{$value->namaJurnal}}</td>
						<td>{{$value->tahun}}</td>
						<td>{{$value->nomor}}</td>
						<td>{{$value->jumlah}}</td>
					</tr>
					@endforeach
					</tbody>	
					</table>
					<div >
			  			<p>Catatan*=termasuk e-journal</p>
			  		</div>
			  		<?php
					}
					
					if(Session::get('level')=='user')
					{?>
					<br>
			  			<p>Tabel 2. Jurnal yang tersedia/yang diterima secara teratur (lengkap), terbitan 3 tahun terakhir</p>
						<table class="table  table-bordered data" >
					<thead>
						<th width="100"><p class="text-center">JenisJurnal</p></th>
						<th width="100"><p class="text-center">Nama Jurnal</p></th>
						<th width="100"><p class="text-center">Tahun</p></th>
						<th width="100"><p class="text-center">Nomor</p></th>
						<th width="100"><p class="text-center">Jumlah</p></th>
					</thead>
					<tbody class="text-center">
					<?php  ?>
					@foreach($data5 as $key => $value)
					<tr>
						<td>{{$value->akreditasi}}</td>
						<td>{{$value->namaJurnal}}</td>
						<td>{{$value->tahun}}</td>
						<td>{{$value->nomor}}</td>
						<td>{{$value->jumlah}}</td>
					</tr>
					@endforeach
					</tbody>	
					</table>
					
					<div >
			  			<p>Catatan*=termasuk e-journal</p>
			  		</div>
			  		<a class="btn btn-primary" href="{{ url('PDF/pdfjurnal') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
					<?php }?>
			  	</div>

			  	<div class="tab-pane<?php if (isset($oo)) echo $oo ;?>" id="sumberpustaka" name="Sumber Pustaka">
			  <br>
			  		<div class="alert alert-info">
			  		<strong> Sumber Pustaka </strong>
			  		<br>
			  		<br>
			  			<p>Sumber-sumber pustaka di lembaga lain (lembaga perpustakaan/ sumber dari internet beserta alamat website)<br> yang bisa diakses/dimanfaatkan oleh dosen dan mahasiswa program studi ini.
			  			</p>
			  		</div>
			  		<?php if (isset($dataprodi) and Session::get('level')!='user') {?>
                        	 <form method="post" action="">
						{{Form::label('idprodi', 'Pilih Prodi :') }} <br>
 						 <select name="idprodi">
						@foreach($dataprodi as $key => $row)
						<option value="{{$row->idprodi}}">{{$row->namaProdi}}</option> 		
						@endforeach
 						 </select>
						<input type="submit" name="submitidprodi" value="Cari" />
						<?php }?>
					</form>
					<?php
					if(isset($hasilpencarian) ) 
					{
					echo $hasilpencarian;?>
			  		<br>
			  		<br>
						<table class="table  table-bordered data" >
					<thead>
						<th width="30"><p class="text-center">NO</p></th>
						<th><p class="text-center">Sumber</p></th>
					</thead>
					<tbody class="text-center">
					<?php  $no=1; ?>
					@foreach($data6 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->sumberpustaka}}</td>
					</tr>
					@endforeach
					</tbody>	
					</table>
					<?php
					}
					
					if(Session::get('level')=='user')
					{?>
						<table class="table  table-bordered data" >
					<thead>
						<th width="30"><p class="text-center">NO</p></th>
						<th><p class="text-center">Sumber</p></th>
					</thead>
					<tbody class="text-center">
					<?php  $no=1; ?>
					@foreach($data6 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->sumberpustaka}}</td>
					</tr>
					@endforeach
					</tbody>	
					</table>
					<a class="btn btn-primary" href="{{ url('PDF/pdfsumberpustaka') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
					<?php }?>
			  	</div>

			  	<div class="tab-pane<?php if (isset($noge)) echo $noge ;?>" id="peralatanLAB" name="Peralatan LAB">
			  	<div class="alert alert-info">
			  		<strong> Peralatan LAB </strong>
			  		<br>
			  		<br>
			  			<p>Data peralatan utama yang digunakan di laboratorium (tempat praktikum, bengkel, studio, ruang simulasi, rumah sakit, puskesmas/balai kesehatan, green house, lahan untuk pertanian dan sejenisnya) yang di pergunakan dalam proses pembelajaran di jurusan/fakultas.
			  			</p>
			  		</div>
			  		<?php if (isset($dataprodi) and Session::get('level')!='user') {?>
                        	 <form method="post" action="">
						{{Form::label('idprodi', 'Pilih Prodi :') }} <br>
 						 <select name="idprodi">
						@foreach($dataprodi as $key => $row)
						<option value="{{$row->idprodi}}">{{$row->namaProdi}}</option> 		
						@endforeach
 						 </select>
						<input type="submit" name="submitidprodi" value="Cari" />
						<?php }?>
					</form>
					<?php
					if(isset($hasilpencarian) ) 
					{
					echo $hasilpencarian;?>
			  		<br>
			  		<br>
						<table class="table  table-bordered data" >
					<thead>
						<th rowspan="2" width="30"><p class="text-center">No</p></th>
						<th rowspan="2" width="100"><p class="text-center">Nama Laboratorium</p></th>
						<th rowspan="2" width="100"><p class="text-center">Jenis peralatan Utama</p></th>
						<th rowspan="2" width="100"><p class="text-center">Jumlah Unit</p></th>
						<th colspan="2" style='border:1px'><p class="text-center">Kepemilikan</p></th>
						<th colspan="2" ><p class="text-center">Kondisi</p></th>
						<th rowspan="2" width="100"><p class="text-center">Rata-rata Waktu<br>Penggunaan<br>(Jam/Minggu)</p></th>
					<tr>
						<th width="100"><p class="text-center">SD</p></th>
						<th width="100"><p class="text-center">SW</p></th>
						<th width="100"><p class="text-center">Terawat</p></th>
						<th width="100"><p class="text-center">Tidak<br>Terawat</p></th>
						
					</thead>
					<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data7 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->namaLaboratorium}}</td>
						<td>{{$value->namaPeralatan}}</td>
						<td>{{$value->jumlahUnit}}</td>
						<?php
							if($value->kepemilikan=="sendiri" || $value->kepemilikan=="Sendiri" )
								echo "<td>".$value->kepemilikan."</td><td></td>";
							if($value->kepemilikan=="sewa" || $value->kepemilikan=="Sewa")
								echo "<td></td><td>".$value->kepemilikan."</td>";
							
							if($value->kondisi=="terawat" || $value->kondisi=="Terawat" )
								echo "<td>".$value->kondisi."</td><td></td>";
							if($value->kondisi=="tidak terawat" || $value->kondisi=="Tidak Terawat")
								echo "<td></td><td>".$value->kondisi."</td>";
						?>
						<td>{{$value->utilisasi}}</td>
					</tr>
					@endforeach
					</tbody>	
					</table>
					<div >
			  		<strong>Keterangan</strong>
			  		<br>
			  			<p>SD=Milik PT/Fakultas/Jurusan Sendiri<br>SW=Sewa/Kontrak/Kerjasama</p>
			  		</div>
			  		<?php
					}
					
					if(Session::get('level')=='user')
					{?>
					<table class="table  table-bordered data" >
					<thead>
						<th rowspan="2" width="30"><p class="text-center">No</p></th>
						<th rowspan="2" width="100"><p class="text-center">Nama Laboratorium</p></th>
						<th rowspan="2" width="100"><p class="text-center">Jenis peralatan Utama</p></th>
						<th rowspan="2" width="100"><p class="text-center">Jumlah Unit</p></th>
						<th colspan="2" style='border:1px'><p class="text-center">Kepemilikan</p></th>
						<th colspan="2" ><p class="text-center">Kondisi</p></th>
						<th rowspan="2" width="100"><p class="text-center">Rata-rata Waktu<br>Penggunaan<br>(Jam/Minggu)</p></th>
					<tr>
						<th width="100"><p class="text-center">SD</p></th>
						<th width="100"><p class="text-center">SW</p></th>
						<th width="100"><p class="text-center">Terawat</p></th>
						<th width="100"><p class="text-center">Tidak<br>Terawat</p></th>
					</thead>
					<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data7 as $key => $value)
					<tr>
						<td>{{$no++}}</td>
						<td>{{$value->namaLaboratorium}}</td>
						<td>{{$value->namaPeralatan}}</td>
						<td>{{$value->jumlahUnit}}</td>
						<?php
							if($value->kepemilikan=="sendiri" || $value->kepemilikan=="Sendiri" )
								echo "<td>".$value->kepemilikan."</td><td></td>";
							if($value->kepemilikan=="sewa" || $value->kepemilikan=="Sewa")
								echo "<td></td><td>".$value->kepemilikan."</td>";
							
							if($value->kondisi=="terawat" || $value->kondisi=="Terawat" )
								echo "<td>".$value->kondisi."</td><td></td>";
							if($value->kondisi=="tidak terawat" || $value->kondisi=="Tidak Terawat")
								echo "<td></td><td>".$value->kondisi."</td>";
						?>
						<td>{{$value->utilisasi}}</td>
					</tr>
					@endforeach
					</tbody>	
					</table>
					
					<div >
			  		<strong>Keterangan</strong>
			  		<br>
			  			<p>SD=Milik PT/Fakultas/Jurusan Sendiri<br>SW=Sewa/Kontrak/Kerjasama</p>
			  		</div>
			  		<a class="btn btn-primary" href="{{ url('PDF/pdfperalatanlab') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
					<?php }?>
			  	</div>
			  	
			</div>

<br>

<script>
	$('#myTab a').click(function (e) {
	e.preventDefault()
	$(this).tab('show')
	});
</script>

<script>
	<input type="text" class="form-control">
	$('#sandbox-container input').datepicker({
   	});
</script>
 
</div>
</div><!--/#content.span10-->
</div><!--/fluid-row-->

@stop 