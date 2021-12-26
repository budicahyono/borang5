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
				5.3    Pelaksanaan Proses Pembelajaran <br>
				<p align="justify">Sistem pembelajaran dibangun berdasarkan perencanaan yang relevan dengan tujuan, ranah belajar dan hierarkinya.
				Pembelajaran dilaksanakan menggunakan berbagai strategi dan teknik yang menantang, mendorong mahasiswa untuk berpikir kritis bereksplorasi, berkreasi dan bereksperimen dengan memanfaatkan aneka sumber.
				Pelaksanaan pembelajaran memiliki mekanisme untuk memonitor, mengkaji, dan memperbaiki secara periodik kegiatan perkuliahan (kehadiran dosen dan mahasiswa), penyusunan materi perkuliahan, serta penilaian hasil belajar.





5.3.1   Mekanisme Penyusunan Materi Kuliah dan Monitoring Perkuliahan
Jelaskan mekanisme penyusunan materi kuliah dan monitoring perkuliahan, antara lain kehadiran dosen dan mahasiswa, serta materi kuliah.<br>

 
			</div>
			<br>
			<table class="tg">
			  <tr>
			    <th><p class="text-center">Mekanisme</p></th> 
			  </tr>
			  @foreach($data as $key => $value)
                        <tr>
                            <td>{{$value->mekanismePenyusunan}}</td>
                            
                        </tr>
                    @endforeach
			</table>
			<br>
			5.3.2  Lampirkan contoh soal ujian dalam 1 tahun terakhir untuk 5 mata kuliah keahlian berikut silabusnya.
			@endif
		</body>
	</head>
</html>