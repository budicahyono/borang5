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
				5.5   Pembimbingan Tugas Akhir / Skripsi
				<br>
				<br>
				5.5.1   Jelaskan pelaksanaan pembimbingan Tugas Akhir atau Skripsi yang diterapkan pada <br>
				<p align="justify">•  Rata-rata banyaknya mahasiswa per dosen pembimbing tugas akhir (TA) mahasiswa/dosen TA.<br>
                • Rata-rata jumlah pertemuan dosen-mahasiswa untuk menyelesaikan tugas akhir :.... kali mulai dari saat mengambil TA hingga menyelesaikan TA.<br>
                • Laporan nama-nama dosen yang menjadi pembimbing tugas akhir atau skripsi, dan jumlah mahasiswa yang bimbingan: </p>
			<br>
			
			<table class="tg">
			  <tr>
			    <th width="20px"><p class="text-center">No</p></th>
          		<th width="200px"><p class="text-center">Nama Dosen Pembimbing</p></th>
         		<th width="100px"><p class="text-center">Jumlah Mahasiswa</p></th>
			  </tr>
			 <?php $no=1; ?>
          @foreach($data3 as $key => $value)
            <tr>
              <td align="center">{{$no++}}</td>
              <td>{{$value->nama}}</td>
              <td align="center">{{$value->jumlahMahasiswa}}</td>
              
            </tr>
          @endforeach
			</table>
			@endif
		</body>
	</head>
</html>