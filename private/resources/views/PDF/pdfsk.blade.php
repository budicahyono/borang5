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
				5.1.2.2  Tuliskan struktur kurikulum berdasarkan urutan mata kuliah (MK) semester demi semester, dengan mengikuti format tabel berikut:
			</div>
			<br>
			<br>
			<table class="tg">
			  <tr>
			    <th rowspan="2" ><p class="text-center">Smt</p></th>
                    <th rowspan="2" ><p class="text-center">Kode MK</p></th>
                    <th rowspan="2" ><p class="text-center">Nama Mata Kuliah</p></th>
                    <th rowspan="2" ><p class="text-center">Bobot SKS</p></th>
                    <th colspan="2" ><p class="text-center">SKS MK dalam Kurikulum</th>
                    <th rowspan="2" ><p class="text-center">Bobot Tugas*** </p></th>
                    <th colspan="3" ><p class="text-center">Kelengkapan****</p></th>
                    <th rowspan="2" ><p class="text-center">Unit/Jur/Fak Penyelenggara</p></th>
                    
                    <tr>
                    <th >Inti**</th>
                    <th >Institusional</th>
                    <th width="100px">Deskripsi</th>
                    <th width="50px">Silabus</th>
                    <th width="50px">SAP</th>
                  </tr>
                  </tr>

			<?php $total=0;
                    $total1=0;
                    $total2=0; ?>
                    @foreach($data4 as $key => $value)
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
			<br>
			*  Tuliskan mata kuliah pilihan sebagai mata kuliah pilihan I, mata kuliah pilihan II, dst. (nama-nama mata kuliah pilihan yang dilaksanakan dicantumkan dalam tabel 5.1.3.)<br>
            **   Menurut rujukan peer group / SK Mendiknas 045/2002 (ps. 3 ayat 2e)<br>
            *** Beri tanda √ pada mata kuliah yang dalam penentuan nilai akhirnya memberikan bobot pada tugas-tugas (praktikum/praktek, PR atau makalah) ≥ 20%.<br>
            ****Beri tanda √ pada mata kuliah yang dilengkapi dengan deskripsi, silabus, dan atau SAP.  Sediakan dokumen pada saat asesmen lapangan.<br>
			@endif
		</body>
	</head>
</html>