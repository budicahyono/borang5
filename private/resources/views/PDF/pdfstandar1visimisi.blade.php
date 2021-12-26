<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Standar I</title>
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
				<h3>STANDAR 1.  VISI, MISI, TUJUAN DAN SASARAN, SERTA STRATEGI <br>
					<font color="white">sdcacdcascaai</font>  PENCAPAIAN</h3>
			</div>
			<br>
			 1.1	Visi, Misi, Tujuan, dan Sasaran serta Strategi Pencapaian <br>
			  <br>
1.1.1	Jelaskan mekanisme penyusunan visi, misi, tujuan dan sasaran program studi, serta pihak-pihak yang dilibatkan. <br>
<br>
			<table class="tg">
			  <tr> 

			 @foreach($data as $key => $value)
			  	<td>{{$value->mekanisme}}</td> 	
			 @endforeach

			 </table>
			 <br>

1.1.2  Visi <br>
<br>
			 <table class="tg">
			  <tr>
			
			 @foreach($data as $key => $value)
			  	<td>{{$value->visi}}</td>
			 @endforeach
			 </table>
			 <br>

1.1.3  Misi <br>
<br>
			 <table class="tg">
			 	<tr>
			  
			 @foreach($data as $key => $value)
			    <td>{{$value->misi}}</td> 
			 @endforeach
			</table>
			 <br>

1.1.4  Tujuan <br>
<br>
			 <table class="tg">
			 	<tr>
			  
			 @foreach($data as $key => $value)
			    <td>{{$value->tujuan}}</td>
			 @endforeach
			</table>
			 <br>

1.1.5  Sasaran dan Strategi Pencapaiannya <br>
<br>
			 <table class="tg">
			 	<tr>
			   
			 @foreach($data as $key => $value) 
			   <td><p class="text-left">{{$value->sasaran}}</td>
    		   <td><p class="text-left">{{$value->strategi}}</td>  
			 @endforeach
			</table>
			<br>

1.2	Sosialisasi <br>
Uraikan upaya penyebaran/sosialisasi visi, misi dan tujuan program studi serta pemahaman sivitas akademika (dosen dan mahasiswa) dan tenaga kependidikan.


			 <table class="tg">
			 	<tr>
			  
			 @foreach($data as $key => $value)
			    <td>{{$value->sosialisasi}}</td> 
			 @endforeach
			</table>
		</body>
	</head>
</html>