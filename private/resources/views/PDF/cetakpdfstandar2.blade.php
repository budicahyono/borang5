<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Standar II</title>
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
				<h3>STANDAR 2.  TATA PAMONG, KEPEMIMPINAN, SISTEM PENGELOLAAN, DAN <br>
					<font color="white">sdcacdcascaai</font> PENJAMINAN MUTU</h3>	
			</div>
			<br>
2.1   Sistem Tata Pamong <br>
Sistem tata pamong berjalan secara efektif melalui mekanisme yang disepakati bersama, serta dapat memelihara dan mengakomodasi semua unsur, fungsi, dan peran dalam program studi. Tata pamong didukung dengan budaya organisasi yang dicerminkan dengan ada dan tegaknya aturan, tatacara pemilihan pimpinan, etika dosen, etika mahasiswa, etika tenaga kependidikan, sistem penghargaan dan sanksi serta pedoman dan prosedur pelayanan (administrasi, perpustakaan, laboratorium, dan studio). Sistem tata pamong (input, proses, output dan outcome serta lingkungan eksternal yang menjamin terlaksananya tata pamong yang baik) harus diformulasikan, disosialisasikan, dilaksanakan,  dipantau dan dievaluasi dengan peraturan dan prosedur yang jelas. <br>
<br>
Uraikan secara ringkas sistem dan pelaksanaan tata pamong di Program Studi untuk  membangun sistem tata pamong yang kredibel, transparan, akuntabel, bertanggung jawab dan adil.
			<table class="tg">
			  <tr>
			   
			 @foreach($data2 as $key => $value)
			  	<td>{{$value->tataPamong}}</td>	
			 @endforeach
			 </table>

			 <br>
2.2   Kepemimpinan <br>
Kepemimpinan efektif mengarahkan dan mempengaruhi perilaku semua unsur dalam program studi, mengikuti nilai, norma, etika, dan budaya organisasi yang disepakati bersama, serta mampu membuat keputusan yang tepat dan cepat.
Kepemimpinan mampu memprediksi masa depan, merumuskan dan mengartikulasi visi yang realistik, kredibel, serta mengkomunikasikan visi ke depan, yang menekankan pada keharmonisan hubungan manusia dan mampu menstimulasi secara intelektual dan arif bagi anggota untuk mewujudkan visi organisasi, serta mampu memberikan arahan, tujuan, peran, dan tugas kepada seluruh unsur dalam perguruan tinggi. Dalam menjalankan fungsi kepemimpinan dikenal kepemimpinan operasional, kepemimpinan organisasi, dan kepemimpinan publik.  Kepemimpinan operasional berkaitan dengan kemampuan menjabarkan visi, misi ke dalam kegiatan operasional program studi.  Kepemimpinan organisasi berkaitan dengan pemahaman tata kerja antar unit dalam organisasi perguruan tinggi.  Kepemimpinan publik berkaitan dengan kemampuan menjalin kerjasama dan menjadi rujukan bagi publik.<br>
<br>
Jelaskan pola kepemimpinan dalam Program Studi.<br>
<br>

			 <table class="tg">
			 	<tr>
	
			 @foreach($data2 as $key => $value)
			    <td>{{$value->kepemimpinan}}</td>
			 @endforeach
			</table>

			 <br>
2.3    Sistem Pengelolaan <br>
Sistem pengelolaan fungsional dan operasional program studi mencakup <i>planning, organizing, staffing, leading, controlling</i> dalam kegiatan  internal maupun eksternal. <br>
<br>
Jelaskan sistem pengelolaan Program Studi serta dokumen pendukungnya. <br>
<br>
			 <table class="tg">
			 	<tr>
			  
			 @foreach($data2 as $key => $value)
			    <td>{{$value->sistemPengelolaan}}</td>
			 @endforeach
			</table>

			 <br>
2.4   	Penjaminan Mutu <br>
Bagaimanakah pelaksanaan penjaminan mutu pada Program Studi? Jelaskan.<br>
<br>
			 <table class="tg">
			 	<tr>

			 @foreach($data2 as $key => $value)
			    <td>{{$value->penjaminanMutu}}</td>
			 @endforeach
			</table>
<br>
2.5   Umpan Balik<br>

Apakah program studi telah melakukan kajian tentang proses pembelajaran melalui umpan balik dari dosen, mahasiswa, alumni, dan pengguna lulusan mengenai harapan dan persepsi mereka?  Jika Ya, jelaskan isi umpan balik dan tindak lanjutnya.<br>
<br>
			<table class="tg">
			  <tr>
			  		<th><p class="text-center">Umpan Balik Dari</p></th>
					<th><p class="text-center">Isi</p></th>
					<th><p class="text-center">Tindak</p></th>
			   
			  </tr>
			@foreach($data3 as $key => $value)
						<tr>
							<td>{{$value->sumber}}</td>
							<td>{{$value->isi}}</td>
							<td>{{$value->tindakLanjut}}</td>
							
						</tr>
			@endforeach
			</table>
<br>
2.6	  Keberlanjutan<br>
Jelaskan upaya untuk menjamin keberlanjutan (sustainability) program studi ini, khususnya dalam hal: <br>
<br>
			<table class="tg">
			  <tr>
			  		<th><p class="text-center">No</p></th>
					<th><p class="text-center">Jenis Upaya</p></th>
					<th><p class="text-center">Tindak Lanjut</p></th>
			   
			  </tr>
			<?php $no=1; ?>
					@foreach($data4 as $key => $value)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$value->jenisUpaya}}</td>
							<td>{{$value->upaya}}</td>
							
						</tr>
					@endforeach
			 </table>

			</table>
		</body>
	</head>
</html>