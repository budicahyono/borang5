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
				
				<h2>STANDAR 5. KURIKULUM, PEMBELAJARAN, DAN SUASANA<br>
				<font color="white">scdedswfsdefi</font> AKADEMIK</h2>
				<br>
				5.1  Kurikulum<br>
       			<p align="justify">Kurikulum pendidikan tinggi adalah seperangkat rencana dan pengaturan mengenai isi, bahan kajian, maupun bahan pelajaran serta cara penyampaiannya, dan penilaian yang digunakan sebagai pedoman penyelenggaraan kegiatan pembelajaran di perguruan tinggi.
				Kurikulum seharusnya memuat standar kompetensi lulusan yang terstruktur dalam kompetensi utama, pendukung dan lainnya yang mendukung  tercapainya tujuan, terlaksananya misi, dan terwujudnya visi program studi. Kurikulum memuat mata kuliah/modul/blok yang mendukung pencapaian kompetensi lulusan dan memberikan keleluasaan pada mahasiswa untuk memperluas wawasan dan memperdalam keahlian sesuai dengan minatnya, serta dilengkapi dengan deskripsi mata kuliah/modul/blok, silabus, rencana pembelajaran dan evaluasi. 
				Kurikulum harus dirancang berdasarkan relevansinya dengan tujuan, cakupan dan kedalaman materi, pengorganisasian yang mendorong terbentuknya hard skills dan keterampilan kepribadian dan perilaku (soft skills) yang dapat diterapkan dalam berbagai situasi dan kondisi.
				<br>
				<br>
				5.1.1  Kompetensi<br>
				5.1.1.1  Uraikan secara ringkas kompetensi utama lulusan

			</div>
			<br>
			<br>
			<table class="tg">
			  <tr>
			  <th><p class="text-center">Kompetensi Utama</p></th> 
			  </tr>
			 @foreach($data as $key => $value)
                        <tr>
                            <td>{{$value->kompetensiUtama}}</td>
                            
                        </tr>
                    @endforeach
			</table>
			<br>
			Catatan: Pengertian tentang kompetensi utama, pendukung, dan lainnya dapat dilihat pada Kepmendiknas No. 045/2002.
			@endif
		</body>
	</head>
</html>