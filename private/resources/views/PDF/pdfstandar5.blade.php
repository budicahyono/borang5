<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Laporan Standar V</title>
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
				<h3>STANDAR V. KURIKULUM, PEMBELAJARAN, DAN SUASANA AKADEMIK</h3>	
				<br>
				<br>
				5.1  Kurikulum
       			<p align='justify'>Kurikulum pendidikan tinggi adalah seperangkat rencana dan pengaturan mengenai isi, bahan kajian, maupun bahan pelajaran serta cara penyampaiannya, dan penilaian yang digunakan sebagai pedoman penyelenggaraan kegiatan pembelajaran di perguruan tinggi.<br>
				Kurikulum seharusnya memuat standar kompetensi lulusan yang terstruktur dalam kompetensi utama, pendukung dan lainnya yang mendukung  tercapainya tujuan, terlaksananya misi, dan terwujudnya visi program studi. Kurikulum memuat mata kuliah/modul/blok yang mendukung pencapaian kompetensi lulusan dan memberikan keleluasaan pada mahasiswa untuk memperluas wawasan dan memperdalam keahlian sesuai dengan minatnya, serta dilengkapi dengan deskripsi mata kuliah/modul/blok, silabus, rencana pembelajaran dan evaluasi.<br> 
				Kurikulum harus dirancang berdasarkan relevansinya dengan tujuan, cakupan dan kedalaman materi, pengorganisasian yang mendorong terbentuknya hard skills dan keterampilan kepribadian dan perilaku (soft skills) yang dapat diterapkan dalam berbagai situasi dan kondisi.</p>

				5.1.1  Kompetensi<br>
				5.1.1.1  Uraikan secara ringkas kompetensi utama lulusan

 
			</div>
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
			Catatan: Pengertian tentang kompetensi utama, pendukung, dan lainnya dapat dilihat pada Kepmendiknas No. 045/2002.
			<br>
			<br>
			<br>
			5.1.1.2  Uraikan secara ringkas kompetensi pendukung lulusan<br>
			<br>
			<br>
			<table class="tg">
			  <tr>
			  <th><p class="text-center">Kompetensi Pendukung</p></th> 
			  </tr>
			@foreach($data as $key => $value)
                        <tr>
                            <td>{{$value->kompetensiPendukung}}</td>
                            
                        </tr>
                    @endforeach
			</table>
			Catatan: Pengertian tentang kompetensi utama, pendukung, dan lainnya dapat dilihat pada Kepmendiknas No. 045/2002.
			<br>
			<br>
			<br>
			5.1.1.3  Uraikan secara ringkas kompetensi lainnya/pilihan lulusan <br>
			<table class="tg">
			  <tr>
			  <th><p class="text-center">Kompetensi Lainnya</p></th> 
			  </tr>
			 @foreach($data as $key => $value)
                        <tr>
                            <td>{{$value->kompetensiLain}}</td>
                            
                        </tr>
                    @endforeach
			</table>
			<br>
			Catatan: Pengertian tentang kompetensi utama, pendukung, dan lainnya dapat dilihat pada Kepmendiknas No. 045/2002.<br>
			<br>
			<br>
			5.1.2  Struktur Kurikulum<br>
			5.1.2.1  Jumlah sks PS (minimum untuk kelulusan) :  …  sks yang tersusun sebagai berikut:
			<table class="tg">
			  <tr>
			    <th>Jenis Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Keterangan</th>
                   </tr>
			<?php $totalsks=0;?>
                    @foreach($data1 as $key => $value)
                        <tr>
                            <td>{{$value->statusMataKuliah}}</td>
                            <td>{{$value->total}}</td>     
                            <td></td>
                            <?php $totalsks =  $totalsks + $value->total ?>                      
                        </tr>
                    @endforeach
                    <tr>
                    <td colspan="1" align="left">Jumlah Total</td> 
                    <td align="left">{{$totalsks}} </td>
                    <th bgcolor="grey"</th>
			</table>
			* Hanya yang memiliki pendidikan formal dalam bidang perpustakaan<br>
			<br>
			<br>
			<br>
			<br>
			5.1.2.2  Tuliskan struktur kurikulum berdasarkan urutan mata kuliah (MK) semester demi semester, dengan mengikuti format tabel berikut:
			<table class="tg">
			  <tr>
			   <th rowspan="2"><p class="text-center">Smt</p></th>
                    <th rowspan="2"><p class="text-center">Kode MK</p></th>
                    <th rowspan="2"><p class="text-center">Nama Mata Kuliah</p></th>
                    <th rowspan="2"><p class="text-center">Bobot SKS</p></th>
                    <th colspan="2"><p class="text-center">SKS MK dalam Kurikulum</th>
                    <th rowspan="2"><p class="text-center">Bobot Tugas*** </p></th>
                    <th colspan="3"><p class="text-center">Kelengkapan****</p></th>
                    <th rowspan="2" width="50px"><p class="text-center">Unit/Jur/Fak Penyelenggara</p></th>
                    
                    <tr>
                    <th >Inti**</th>
                    <th width="100px">Institusional</th>
                    <th width="100px">Deskripsi</th>
                    <th width="50px">Silabus</th>
                    <th width="50px">SAP</th>
                  </tr>
                 

			<?php $total=0;
                    $total1=0;
                    $total2=0; ?>
                    @foreach($data2 as $key => $value)
                        <tr>
                            <td align="center">{{$value->semester}}</td>
                            <td align="center">{{$value->idmatakuliah}}</td> 
                            <td>{{$value->namaMataKuliah}}</td> 
                            <td align="center">{{$value->sks}}</td>
                            <td align="center">{{$value->sks_inti}}</td>
                            <td align="center">{{$value->sks_institusi}}</td>
                            <td align="center">{{$value->bobot_tugas}}</td> 
                            <td>{{$value->deskripsi}}</td> 
                            <td align="center">{{$value->silabus}}</td>
                            <td align="center">{{$value->sap}}</td>
                            <td align="center">{{$value->idfakultas}}</td>   

                            <?php
                         $total = $value->sks + $total;
                         $total1 = $value->sks_inti + $total1;  
                         $total2 = $value->sks_institusi + $total1;  
                            
                            
                        ?>
                                                  
                        </tr>
                    @endforeach
                    <tr>
                    <th colspan="3">Total SKS</th> 
                    <td align="center">{{$total}}</td>
                    <td align="center">{{$total1}}</td>
                    <td align="center">{{$total2}}</td>
                    <th bgcolor="grey"</th>
                    <th bgcolor="grey"</th>
                    <th bgcolor="grey"</th>
                    <th bgcolor="grey"</th>
                    <th bgcolor="grey"</th>
			</table>
			*  Tuliskan mata kuliah pilihan sebagai mata kuliah pilihan I, mata kuliah pilihan II, dst. (nama-nama mata kuliah pilihan yang dilaksanakan dicantumkan dalam tabel 5.1.3.)<br>
            **   Menurut rujukan peer group / SK Mendiknas 045/2002 (ps. 3 ayat 2e)<br>
            *** Beri tanda √ pada mata kuliah yang dalam penentuan nilai akhirnya memberikan bobot pada tugas-tugas (praktikum/praktek, PR atau makalah) ≥ 20%.<br>
            ****Beri tanda √ pada mata kuliah yang dilengkapi dengan deskripsi, silabus, dan atau SAP.  Sediakan dokumen pada saat asesmen lapangan.<br>
            <br>
            <br>
            5.1.3   Tuliskan mata kuliah pilihan yang dilaksanakan dalam tiga tahun terakhir, pada tabel berikut:<br>
            <br>
            <table class="tg">
			  <tr>
			    <th width="50px"><p class="text-center">Semester</p></th>
                    <th width="100px"><p class="text-center">Kode MK</p></th>
                    <th width="200px"><p class="text-center">Nama MK PIlihan</p></th>
                    <th width="50px"><p class="text-center">Bobot SKS</p></th>
                    <th width="50px"><p class="text-center">Bobot Tugas</p></th>
                    <th width="100px"><p class="text-center">Unit/ Jur/ Fak Pengelola</p></th>
                  </tr>

			<?php $total=0; ?>
                    @foreach($data3 as $key => $value)
                        <tr>
                            <td align="center">{{$value->Semester}} </td>
                            <td align="center">{{$value->idmatakuliah}}</td> 
                            <td>{{$value->namaMKPilihan}}</td> 
                            <td align="center">{{$value->bobotsks}}</td>
                            <td align="center">{{$value->bobottugas}}</td> 
                            <td>{{$value->Unit}}</td>  

                        <?php
                         $total = $value->bobotsks + $total;?>            

                        </tr>
                    @endforeach
                    <tr>
                    <th colspan="3">Total SKS</th> 
                    <td align="center">{{$total}}</td>
                    <th bgcolor="grey"</th>
                    <th bgcolor="grey"</th>
			</table>
			 * beri tanda √ pada mata kuliah yang dalam penentuan nilai akhirnya memberikan bobot pada tugas-tugas (praktikum/praktek, PR atau makalah) ≥ 20%.<br>
			 <br>
			 <br>
			 5.1.4   Tuliskan substansi praktikum/praktek yang mandiri ataupun yang merupakan bagian dari mata kuliah tertentu, dengan mengikuti format di bawah ini:<br>
			 <table class="tg">
			  <tr>
			  <th rowspan="2" width="50px"><p class="text-center">No</p></th>
                    <th rowspan="2" ><p class="text-center">Nama Praktikum/Praktek</p></th>
                    <th colspan="2" ><p class="text-center">Isi Praktikum/Praktek</p></th>
                    <th rowspan="2" ><p class="text-center">Tempat/Lokasi Praktikum/Praktek</p></th>

                    
                    <tr>
                    <th ><p class="text-center">Judul/Modul</p></th>
                    <th width="100px"><p class="text-center">Jam Pelaksanaan</p></th>
			  </tr>

			 <?php $no=1; ?>
                    @foreach($data4 as $key => $value)
                        <tr>
                            <td align="center">{{$no++}}</td>
                            <td>{{$value->namaPraktikum}}</td>
                            <td>{{$value->judulModul}}</td> 
                            <td align="center">{{$value->jamPelaksanaan}}</td> 
                            <td>{{$value->lokasi}}</td>                      
                        </tr>
                    @endforeach
			</table>
			<br>
			<br>
			<br>
			5.2. Peninjauan Kurikulum dalam 5 Tahun Terakhir <br>
			Jelaskan mekanisme peninjauan kurikulum dan pihak-pihak yang dilibatkan dalam proses peninjauan tersebut. <br>
			<table class="tg">
			  <tr>
			  <th><p class="text-center">Peninjauan Kurikulum</p></th> 
			  </tr>

			 @foreach($data5 as $key => $value)
                        <tr>
                            <td>{{$value->mekanisme}}</td>
                            
                        </tr>
                    @endforeach

			</table>
			<br>
			<br>
			Tuliskan hasil peninjauan tersebut, mengikuti format tabel berikut.<br>
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
                    @foreach($data6 as $key => $value)
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
			<br>
			<br>
			5.3    Pelaksanaan Proses Pembelajaran<br>
			<p align='justify'>Sistem pembelajaran dibangun berdasarkan perencanaan yang relevan dengan tujuan, ranah belajar dan hierarkinya.
			Pembelajaran dilaksanakan menggunakan berbagai strategi dan teknik yang menantang, mendorong mahasiswa untuk berpikir kritis bereksplorasi, berkreasi dan bereksperimen dengan memanfaatkan aneka sumber.
			Pelaksanaan pembelajaran memiliki mekanisme untuk memonitor, mengkaji, dan memperbaiki secara periodik kegiatan perkuliahan (kehadiran dosen dan mahasiswa), penyusunan materi perkuliahan, serta penilaian hasil belajar.<br></p>

			5.3.1   Mekanisme Penyusunan Materi Kuliah dan Monitoring Perkuliahan<br>
			<p align='justify'>Jelaskan mekanisme penyusunan materi kuliah dan monitoring perkuliahan, antara lain kehadiran dosen dan mahasiswa, serta materi kuliah.</p>
			<table class="tg">
			  <tr>
			    <th><p class="text-center">Mekanisme</p></th> 
			  </tr>
			  @foreach($data7 as $key => $value)
                        <tr>
                            <td>{{$value->mekanismePenyusunan}}</td>
                            
                        </tr>
                    @endforeach
			</table>
			 Lampirkan contoh soal ujian dalam 1 tahun terakhir untuk 5 mata kuliah keahlian <br>
			 <br>
			 <br>
			 5.3.2  Lampirkan contoh soal ujian dalam 1 tahun terakhir untuk 5 mata kuliah keahlian berikut silabusnya.<br>
			 <br>
			 5.4   Sistem Pembimbingan Akademik<br>
			 5.4.1  Tuliskan nama dosen pembimbing akademik dan jumlah mahasiswa yang dibimbingnya dengan mengikuti format tabel berikut:<br>
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
         
          @foreach($data8 as $key => $value)
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
			 Lampirkan contoh soal ujian dalam 1 tahun terakhir untuk 5 mata kuliah keahlian <br>
			 <br>
			 <br>

			 5.4.2  Jelaskan proses pembimbingan akademik  yang diterapkan pada Program Studi ini dalam hal-hal berikut:<br>
			 <table class="tg">
			  <tr>
			   <th width="20px"><p class="text-center">No</p></th>
          	   <th width="300px"><p class="text-center">Hal</p></th>
          	   <th width="300px"><p class="text-center">Penjelasan</p></th>
			  </tr>
			 <?php $no=1; ?>
          @foreach($data9 as $key => $value)
            <tr>
              <td align="center">{{$no++}}</td>
              <td align="justify">{{$value->Hal}}</td>
              <td align="justify">{{$value->penjelasan}}</td>
              
            </tr>
          @endforeach
			</table>
			<br>
			<br>
			<br>

			5.5   Pembimbingan Tugas Akhir / Skripsi<br>
			<br>
			5.5.1   Jelaskan pelaksanaan pembimbingan Tugas Akhir atau Skripsi yang diterapkan pada PS ini. <br>
			•	Rata-rata banyaknya mahasiswa per dosen pembimbing tugas akhir (TA)……. mahasiswa/dosen TA.<br>
			•	Rata-rata jumlah pertemuan dosen-mahasiswa untuk menyelesaikan tugas akhir : .... kali mulai dari saat mengambil TA hingga menyelesaikan TA.<br>
			•	Tuliskan nama-nama dosen yang menjadi pembimbing tugas akhir atau skripsi, dan jumlah mahasiswa yang bimbingan dengan mengikuti format tabel berikut: <br>
			<table class="tg">
			  <tr>
			    <th width="20px"><p class="text-center">No</p></th>
          		<th width="200px"><p class="text-center">Nama Dosen Pembimbing</p></th>
         		<th width="100px"><p class="text-center">Jumlah Mahasiswa</p></th>
			  </tr>
			 <?php $no=1; ?>
          @foreach($data10 as $key => $value)
            <tr>
              <td align="center">{{$no++}}</td>
              <td>{{$value->nama}}</td>
              <td align="center">{{$value->jumlahMahasiswa}}</td>
              
            </tr>
          @endforeach
			</table>
			•	Ketersediaan panduan pembimbingan tugas akhir (Beri tanda  pada pilihan yang sesuai):<br>
				Ya<br>
				Tidak<br>
			Jika Ya, jelaskan cara sosialisasi dan pelaksanaannya.<br>
			<table class="tg">
			  <tr>
			  <th><p class="text-center">Panduan</p></th>
			   <th><p class="text-center">Sosialisasi Panduan</p></th>

		 <?php $no=1; ?>
         @foreach($data11 as $key => $value)
              <tr>
              <td align="center">{{$value->Panduan}}</td>
              <td align="justify">{{$value->sosialisasiPanduan}}</td>
              </tr>
          @endforeach       
          </table>
			<br>
			<br>
			5.5.2  Rata-rata lama penyelesaian tugas akhir/skripsi pada tiga tahun terakhir :  ... bulan. (Menurut kurikulum tugas akhir direncanakan ... semester).<br>
			<br>
			<br>
			5.6  Upaya Perbaikan Pembelajaran<br>
			Uraikan upaya perbaikan pembelajaran serta hasil yang telah dilakukan dan dicapai dalam tiga tahun terakhir dan hasilnya.<br>
		  <table class="tg">
		  <tr>
		  <th rowspan="2" width="200px"><p class="text-center">Butir</p></th>  
          <th colspan="2" ><p class="text-center">Upaya Tindakan</p></th>
          
          <tr>
          <th width="200px"><p class="text-center">Tindakan</p></th>
          <th width="200px"><p class="text-center">Hasil</p></th>
       	  </tr>
       	  </tr>
		@foreach($data12 as $key => $value)
            <tr>
              <td>{{$value->item}}</td>
              <td align="justify">{{$value->tindakanPerbaikan}}</td>
              <td align="justify">{{$value->hasilPerbaikan}}</td>
              
            </tr>
        @endforeach
          </table>
          <br>
          <br>
          <br>
          5.7  Upaya Peningkatan Suasana Akademik<br>
		  Berikan gambaran yang jelas mengenai upaya dan kegiatan untuk menciptakan suasana akademik yang kondusif di lingkungan PS, khususnya mengenai hal-hal berikut:<br>
		  <br>
		  5.7.1	Kebijakan tentang suasana akademik (otonomi keilmuan, kebebasan akademik, kebebasan mimbar akademik).<br>
		  <table class="tg">
			  <tr>
			   <th><p class="text-center">Kebijakan Suasana Akademik</p></th> 

			</tr>
		@foreach($data13 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->kebijakanSuasanaAkademik}}</td>
                            
                        </tr>
                    @endforeach  
          </table>
          <br>
 		  <br>
          5.7.2	Ketersediaan dan jenis prasarana, sarana dan dana yang memungkinkan terciptanya interaksi akademik antara sivitas akademika.<br>
          <table class="tg">

			  <tr>
			   <th><p class="text-center">Ketersediaan Sarana Prasarana</p></th> 

			</tr>
		@foreach($data13 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->ketersediaanSaranaPrasarana}}</td>
                            
                        </tr>
                    @endforeach
         
          </table>
          <br>
          <p align='justify'>5.7.3	Program dan kegiatan di dalam dan di luar proses pembelajaran, yang dilaksanakan baik di dalam maupun di luar kelas,  untuk menciptakan suasana akademik yang kondusif (misalnya seminar, simposium, lokakarya, bedah buku, penelitian bersama, pengenalan kehidupan kampus, dan temu dosen-mahasiswa-alumni).</p>
          <table class="tg">

			  <tr>
			   <th><p class="text-center">Kegiatan Luar Pembelajaran</p></th> 

			</tr>
		@foreach($data13 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->kegiatanLuarPembelajaran}}</td>    
                        </tr>
                    @endforeach
          </table>
          <br>
          <br>
          5.7.4	Interaksi akademik antara dosen-mahasiswa, antar mahasiswa, serta antar dosen.<br>
          <table class="tg">
			  <tr>
			     <th><p class="text-center">Interaksi Akademik</p></th> 
			</tr>
       
		@foreach($data13 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->interaksiAkademik}}</td>
                            
                        </tr>
                    @endforeach
          </table>
          <br>
          <br>
          <br>
          <br>
          5.7.5	Pengembangan perilaku kecendekiawanan. <br>
          <table class="tg">
			  <tr>
			     <th><p class="text-center">Pengembangan Perilaku Kecendekiawan</p></th>
			</tr>
       
		 @foreach($data13 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->pengembanganPerilakuKecendekiawan}}</td>
                            
                        </tr>
                    @endforeach
          </table>
			@endif
		</body>
	</head>
</html>