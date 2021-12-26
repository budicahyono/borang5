@extends('layouts.master')
@section('content')
    
    <br>
    <div class="col-md-12">
            <h2>Standar V. Laporan Pembelajaran </h2><br><br>
                        <ul class="nav nav-tabs">

                             <li><a href="laporanpembelajaran">Proses Pembelajaran</a></li>
                              
                            <li class="dropdown">
                             <a href="#" data-toggle="dropdown">Sistem Pembimbingan Akademik<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="laporanpembelajaran1">Pembimbing Akademik </a></li>
                                    <li><a href="laporanpembelajaran2">Proses Pembimbingan Akademik  </a></li>
                                </ul>
                            
                            <li class="dropdown">
                            <a href="#" data-toggle="dropdown">Pembimbingan Tugas Akhir / Skripsi<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="laporanpembelajaran3">Pelaksanaan Pembimbingan Tugas Akhir atau Skripsi</a></li>
                                    <li><a href="laporanpembelajaran4">Panduan Pembimbingan Skripsi</a></li>
                                </ul>
                            </li>

                             <li><a href="laporanpembelajaran5">Upaya Perbaikan Pembelajaran</a></li>

                        </ul>

  

                    <div class="panel-body">
                    @if(Session::get('level')=='')
                    <div class="tab-content">
                        <div class="tab-pane<?php if(isset($aktif)) echo $aktif ;?>" id="laporanpembelajaran" name="laporanpembelajaran">
                        <br>
                        <div class="alert alert-info">
                          <strong>Pelaksanaan Proses Pembelajaran</strong><br/>
                          <p align="justify" >Sistem pembelajaran dibangun berdasarkan perencanaan yang relevan dengan tujuan, ranah belajar dan hierarkinya. Pembelajaran dilaksanakan menggunakan berbagai strategi dan teknik yang menantang, mendorong mahasiswa untuk berpikir kritis bereksplorasi, berkreasi dan bereksperimen dengan memanfaatkan aneka sumber. Pelaksanaan pembelajaran memiliki mekanisme untuk memonitor, mengkaji, dan memperbaiki secara periodik kegiatan perkuliahan (kehadiran dosen dan mahasiswa), penyusunan materi perkuliahan, serta penilaian hasil belajar.</p>
                          <br>
                          <br>
                          Laporan mekanisme penyusunan materi kuliah dan monitoring perkuliahan, antara lain kehadiran dosen dan mahasiswa, serta materi kuliah.               
                        </div><br>
                        <?php if (isset($dataprodi)) {?>
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
    
                   
                    <table class="table  table-bordered data" >
                    <thead>
                    <th><p class="text-center">Mekanisme</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data as $key => $value)
                        <tr>
                            <td>{{$value->mekanismePenyusunan}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
          Lampirkan contoh soal ujian dalam 1 tahun terakhir untuk 5 mata kuliah keahlian 
           <?php } ?>
            </div>



             <div class="tab-pane<?php if(isset($ak)) echo $ak ;?>" id="laporanpembelajaran1" name="laporanpembelajaran1">
                <br>
                <div class="alert alert-info">
                           <strong>Laporan Dosen Pembimbing Akademik </strong><br/>
                          Laporan nama dosen pembimbing akademik dan jumlah mahasiswa yang dibimbingnya :
                        </div><br>
                        <?php if (isset($dataprodi)) {?>
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
          <table class="table  table-bordered data" >
          <thead>
          <th width="20px"><p class="text-center">No</p></th>
          <th width="200px"><p class="text-center">Nama Dosen Pembimbing Akademik</p></th>
          <th width="100px"><p class="text-center">Jumlah Mahasiswa Bimbingan</p></th>
          <th width="100px"><p class="text-center">Rata-Rata Banyaknya Pertemuan/mhs/semester</p></th>
          
      </thead>
      <tbody class="text-center">
          <?php $no=1; 
          $total=0;
          $rata2=0;?>
          @foreach($data1 as $key => $value)
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
          <th colspan="2">Total</th>
          <td align="center">{{$total}}</td>
          <td bgcolor="grey"</td>
      </tbody>
       <th colspan="3">Rata-rata</th>
	   <?php
	   $hasilrata2 = $rata2 / ($no-1);
	   echo "<td align=center>".$hasilrata2."</td>";
	   ?>
      </table>
      <?php } ?>
      </div>


      <div class="tab-pane<?php if(isset($at)) echo $at ;?>" id="laporanpembelajaran2" name="laporanpembelajaran2">
                <br>
                <div class="alert alert-info">
                          <strong>Laporan Proses Pembimbingan Akademik  </strong><br/>
                           Laporan penjelasan proses pembimbingan akademik  yang diterapkan pada Program Studi ini dalam hal-hal berikut:
                        </div><br>
                        <?php if (isset($dataprodi)) {?>
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
          <table class="table  table-bordered data" >
          <thead>
          <th width="20px"><p class="text-center">No</p></th>
          <th width="300px"><p class="text-center">Hal</p></th>
          <th width="300px"><p class="text-center">Penjelasan</p></th>
        
          
      </thead>
      <tbody class="text-center">
          <?php $no=1; ?>
          @foreach($data2 as $key => $value)
            <tr>
              <td align="center">{{$no++}}</td>
              <td>{{$value->Hal}}</td>
              <td>{{$value->penjelasan}}</td>
              
            </tr>
          @endforeach
      </tbody>
      </table>
      <?php } ?>
      </div>


      <div class="tab-pane<?php if(isset($ai)) echo $ai ;?>" id="laporanpembelajaran3" name="laporanpembelajaran3">
                <br>
                <div class="alert alert-info">
                          <strong>Laporan Pelaksanaan Pembimbingan Tugas Akhir atau Skripsi</strong><br/><br>
                         •  Rata-rata banyaknya mahasiswa per dosen pembimbing tugas akhir (TA) mahasiswa/dosen TA.<br>
                        • Rata-rata jumlah pertemuan dosen-mahasiswa untuk menyelesaikan tugas akhir : .... kali mulai dari saat mengambil TA hingga menyelesaikan TA.<br>
                      • Laporan nama-nama dosen yang menjadi pembimbing tugas akhir atau skripsi, dan jumlah mahasiswa yang bimbingan: 

                        </div><br>
                        <?php if (isset($dataprodi)) {?>
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
          <table class="table  table-bordered data" >
          <thead>
          <th width="20px"><p class="text-center">No</p></th>
          <th width="200px"><p class="text-center">Nama Dosen Pembimbing</p></th>
          <th width="100px"><p class="text-center">Jumlah Mahasiswa</p></th>
        
          
      </thead>
      <tbody class="text-center">
          <?php $no=1; ?>
          @foreach($data3 as $key => $value)
            <tr>
              <td align="center">{{$no++}}</td>
              <td>{{$value->nama}}</td>
              <td align="center">{{$value->jumlahMahasiswa}}</td>
              
            </tr>
          @endforeach
      </tbody>
      </table>
      <?php } ?>
      </div>


      <div class="tab-pane<?php if(isset($af)) echo $af ;?>" id="laporanpembelajaran4" name="laporanpembelajaran4">
                <br>
                <div class="alert alert-info">
                          <strong>Panduan Pembimbingan Skripsi</strong><br/><br>
                         Laporan penjelasan cara sosialisasi dan pelaksanaannya.
                        </div><br>
                        <?php if (isset($dataprodi)) {?>
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
          Buku Panduan :
          @foreach($data4 as $key => $value)
          <td>{{$value->Panduan}}</td>
          @endforeach
          <br>
          <br>
          <table class="table  table-bordered data" >
          <thead>
          <th><p class="text-center">Sosialisasi Panduan</p></th>
        
          
      </thead>
      <tbody class="text-center">
          @foreach($data4 as $key => $value)
            <tr>
              <td>{{$value->sosialisasiPanduan}}</td>
              
            </tr>
          @endforeach
      </tbody>
      </table>
      <?php } ?>
      </div>


      <div class="tab-pane<?php if(isset($aq)) echo $aq ;?>" id="laporanpembelajaran5" name="laporanpembelajaran5">
                <br>
                <div class="alert alert-info">
                          <strong>Laporan Upaya Perbaikan Pembelajaran</strong><br/><br>
                         Laporan upaya perbaikan pembelajaran serta hasil yang telah dilakukan dan dicapai dalam tiga tahun terakhir dan hasilnya :

                        </div><br>
                        <?php if (isset($dataprodi)) {?>
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
          <table class="table  table-bordered data" >
          <thead>
         <th rowspan="2" width="200px"><p class="text-center">Butir</p></th>
          <th colspan="2" style="border:1px"><p class="text-center">Upaya Tindakan</p></th>
          <tr>
          <th width="200px"><p class="text-center">Tindakan</p></th>
          <th width="200px"><p class="text-center">Hasil</p></th>
        
          
      </thead>
      <tbody class="text-center">
          @foreach($data5 as $key => $value)
            <tr>
              <td>{{$value->item}}</td>
              <td>{{$value->tindakanPerbaikan}}</td>
              <td>{{$value->hasilPerbaikan}}</td>
              
            </tr>
          @endforeach
      </tbody>
      </table>
      <?php } ?>
      </div>
      @endif








                        @if(Session::get('level')=='admin')
                               <div class="tab-content">
                        <div class="tab-pane<?php if(isset($aktif)) echo $aktif ;?>" id="laporanpembelajaran" name="laporanpembelajaran">
                        <br>
                        <div class="alert alert-info">
                         <strong>Pelaksanaan Proses Pembelajaran</strong><br/>
                          <p align="justify" >Sistem pembelajaran dibangun berdasarkan perencanaan yang relevan dengan tujuan, ranah belajar dan hierarkinya. Pembelajaran dilaksanakan menggunakan berbagai strategi dan teknik yang menantang, mendorong mahasiswa untuk berpikir kritis bereksplorasi, berkreasi dan bereksperimen dengan memanfaatkan aneka sumber. Pelaksanaan pembelajaran memiliki mekanisme untuk memonitor, mengkaji, dan memperbaiki secara periodik kegiatan perkuliahan (kehadiran dosen dan mahasiswa), penyusunan materi perkuliahan, serta penilaian hasil belajar.</p>
                          <br>
                          <br>
                          Laporan mekanisme penyusunan materi kuliah dan monitoring perkuliahan, antara lain kehadiran dosen dan mahasiswa, serta materi kuliah.              
                        </div><br>
                        <?php if (isset($dataprodi)) {?>
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
    
                   
                    <table class="table  table-bordered data" >
                    <thead>
                    <th><p class="text-center">Mekanisme</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data as $key => $value)
                        <tr>
                            <td>{{$value->mekanismePenyusunan}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
          Lampirkan contoh soal ujian dalam 1 tahun terakhir untuk 5 mata kuliah keahlian 
           <?php } ?>
            </div>



             <div class="tab-pane<?php if(isset($ak)) echo $ak ;?>" id="laporanpembelajaran1" name="laporanpembelajaran1">
                <br>
                <div class="alert alert-info">
                          <strong>Laporan Dosen Pembimbing Akademik </strong><br/>
                          Laporan nama dosen pembimbing akademik dan jumlah mahasiswa yang dibimbingnya :
                        </div><br>
                        <?php if (isset($dataprodi)) {?>
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
          <table class="table  table-bordered data" >
          <thead>
          <th width="20px"><p class="text-center">No</p></th>
          <th width="200px"><p class="text-center">Nama Dosen Pembimbing Akademik</p></th>
          <th width="100px"><p class="text-center">Jumlah Mahasiswa Bimbingan</p></th>
          <th width="100px"><p class="text-center">Rata-Rata Banyaknya Pertemuan/mhs/semester</p></th>
          
      </thead>
      <tbody class="text-center">
          <?php $no=1; 
          $total=0;
          $rata2=0;?>
          @foreach($data1 as $key => $value)
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
          <th colspan="2">Total</th>
          <td align="center">{{$total}}</td>
          <td bgcolor="grey"</td>
      </tbody>
       <th colspan="3">Rata-rata</th>
     <?php
     $hasilrata2 = $rata2 / ($no-1);
     echo "<td align=center>".$hasilrata2."</td>";
     ?>
      </table>
      <?php } ?>
      </div>


      <div class="tab-pane<?php if(isset($at)) echo $at ;?>" id="laporanpembelajaran2" name="laporanpembelajaran2">
                <br>
                <div class="alert alert-info">
                          <strong>Laporan Proses Pembimbingan Akademik  </strong><br/>
                          Laporan penjelasan proses pembimbingan akademik  yang diterapkan pada Program Studi ini dalam hal-hal berikut:
                        </div><br>
                        <?php if (isset($dataprodi)) {?>
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
          <table class="table  table-bordered data" >
          <thead>
          <th width="20px"><p class="text-center">No</p></th>
          <th width="300px"><p class="text-center">Hal</p></th>
          <th width="300px"><p class="text-center">Penjelasan</p></th>
        
          
      </thead>
      <tbody class="text-center">
          <?php $no=1; ?>
          @foreach($data2 as $key => $value)
            <tr>
              <td align="center">{{$no++}}</td>
              <td>{{$value->Hal}}</td>
              <td>{{$value->penjelasan}}</td>
              
            </tr>
          @endforeach
      </tbody>
      </table>
      <?php } ?>
      </div>


      <div class="tab-pane<?php if(isset($ai)) echo $ai ;?>" id="laporanpembelajaran3" name="laporanpembelajaran3">
                <br>
                <div class="alert alert-info">
                          <strong>Laporan Pelaksanaan Pembimbingan Tugas Akhir atau Skripsi</strong><br/><br>
                         •  Rata-rata banyaknya mahasiswa per dosen pembimbing tugas akhir (TA) mahasiswa/dosen TA.<br>
                        • Rata-rata jumlah pertemuan dosen-mahasiswa untuk menyelesaikan tugas akhir : .... kali mulai dari saat mengambil TA hingga menyelesaikan TA.<br>
                      • Laporan nama-nama dosen yang menjadi pembimbing tugas akhir atau skripsi, dan jumlah mahasiswa yang bimbingan: 

                        </div><br>
                        <?php if (isset($dataprodi)) {?>
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
          <table class="table  table-bordered data" >
          <thead>
          <th width="20px"><p class="text-center">No</p></th>
          <th width="200px"><p class="text-center">Nama Dosen Pembimbing</p></th>
          <th width="100px"><p class="text-center">Jumlah Mahasiswa</p></th>
        
          
      </thead>
      <tbody class="text-center">
          <?php $no=1; ?>
          @foreach($data3 as $key => $value)
            <tr>
              <td align="center">{{$no++}}</td>
              <td>{{$value->nama}}</td>
              <td align="center">{{$value->jumlahMahasiswa}}</td>
              
            </tr>
          @endforeach
      </tbody>
      </table>
      <?php } ?>
      </div>


      <div class="tab-pane<?php if(isset($af)) echo $af ;?>" id="laporanpembelajaran4" name="laporanpembelajaran4">
                <br>
                <div class="alert alert-info">
                           <strong>Panduan Pembimbingan Skripsi</strong><br/><br>
                         Laporan penjelasan cara sosialisasi dan pelaksanaannya.
                        </div><br>
                        <?php if (isset($dataprodi)) {?>
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
          Buku Panduan :
          @foreach($data4 as $key => $value)
          <td>{{$value->Panduan}}</td>
          @endforeach
          <br>
          <br>
          <table class="table  table-bordered data" >
          <thead>
          <th><p class="text-center">Sosialisasi Panduan</p></th>
        
          
      </thead>
      <tbody class="text-center">
          @foreach($data4 as $key => $value)
            <tr>
              <td>{{$value->sosialisasiPanduan}}</td>
              
            </tr>
          @endforeach
      </tbody>
      </table>
      <?php } ?>
      </div>


      <div class="tab-pane<?php if(isset($aq)) echo $aq ;?>" id="laporanpembelajaran5" name="laporanpembelajaran5">
                <br>
                <div class="alert alert-info">
                          <strong>Laporan Upaya Perbaikan Pembelajaran</strong><br/><br>
                         Laporan upaya perbaikan pembelajaran serta hasil yang telah dilakukan dan dicapai dalam tiga tahun terakhir dan hasilnya :

                        </div><br>
                        <?php if (isset($dataprodi)) {?>
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
          <table class="table  table-bordered data" >
          <thead>
          <th rowspan="2" width="200px"><p class="text-center">Butir</p></th>
          <th colspan="2" style="border:1px"><p class="text-center">Upaya Tindakan</p></th>
          
          <tr>
          <th width="200px"><p class="text-center">Tindakan</p></th>
          <th width="200px"><p class="text-center">Hasil</p></th>
        
          
      </thead>
      <tbody class="text-center">
          @foreach($data5 as $key => $value)
            <tr>
              <td>{{$value->item}}</td>
              <td>{{$value->tindakanPerbaikan}}</td>
              <td>{{$value->hasilPerbaikan}}</td>
              
            </tr>
          @endforeach
      </tbody>
      </table>
      <?php } ?>
      </div>
      @endif












      @if(Session::get('level')=='user')
                    <div class="tab-content">
                        <div class="tab-pane<?php if(isset($aktif)) echo $aktif ;?>" id="laporanpembelajaran" name="laporanpembelajaran">
                        <br>
                        <div class="alert alert-info">
                         <strong>Pelaksanaan Proses Pembelajaran</strong><br/>
                          <p align="justify" >Sistem pembelajaran dibangun berdasarkan perencanaan yang relevan dengan tujuan, ranah belajar dan hierarkinya. Pembelajaran dilaksanakan menggunakan berbagai strategi dan teknik yang menantang, mendorong mahasiswa untuk berpikir kritis bereksplorasi, berkreasi dan bereksperimen dengan memanfaatkan aneka sumber. Pelaksanaan pembelajaran memiliki mekanisme untuk memonitor, mengkaji, dan memperbaiki secara periodik kegiatan perkuliahan (kehadiran dosen dan mahasiswa), penyusunan materi perkuliahan, serta penilaian hasil belajar.</p>
                          <br>
                          <br>
                          Laporan mekanisme penyusunan materi kuliah dan monitoring perkuliahan, antara lain kehadiran dosen dan mahasiswa, serta materi kuliah.           
                        </div>
    
                   
                    <table class="table  table-bordered data" >
                    <thead>
                    <th><p class="text-center">Mekanisme</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data as $key => $value)
                        <tr>
                            <td>{{$value->mekanismePenyusunan}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
          Lampirkan contoh soal ujian dalam 1 tahun terakhir untuk 5 mata kuliah keahlian 
          <br>
          <br>
          <a class="btn btn-primary" href="{{ url('PDF/pdfpp') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
            </div>


             <div class="tab-pane<?php if(isset($ak)) echo $ak ;?>" id="laporanpembelajaran1" name="laporanpembelajaran1">
                <br>
                <div class="alert alert-info">
                          <strong>Laporan Dosen Pembimbing Akademik </strong><br/>
                          Laporan nama dosen pembimbing akademik dan jumlah mahasiswa yang dibimbingnya :
                        </div>
          <table class="table  table-bordered data" >
          <thead>
         <th width="20px"><p class="text-center">No</p></th>
          <th width="200px"><p class="text-center">Nama Dosen Pembimbing Akademik</p></th>
          <th width="100px"><p class="text-center">Jumlah Mahasiswa Bimbingan</p></th>
          <th width="100px"><p class="text-center">Rata-Rata Banyaknya Pertemuan/mhs/semester</p></th>
          
      </thead>
     <tbody class="text-center">
          <?php $no=1; 
          $total=0;
          $rata2=0;?>
          @foreach($data1 as $key => $value)
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
          <th colspan="2">Total</th>
          <td align="center">{{$total}}</td>
          <td bgcolor="grey"</td>
      </tbody>
       <th colspan="3">Rata-rata</th>
     <?php
     $hasilrata2 = $rata2 / ($no-1);
     echo "<td align=center>".$hasilrata2."</td>";
     ?>
      </table>
      <br>
      <br>
       <a class="btn btn-primary" href="{{ url('PDF/pdfdpa') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>

      </div>


      <div class="tab-pane<?php if(isset($at)) echo $at ;?>" id="laporanpembelajaran2" name="laporanpembelajaran2">
                <br>
                <div class="alert alert-info">
                          <strong>Laporan Proses Pembimbingan Akademik  </strong><br/>
                         Laporan penjelasan proses pembimbingan akademik  yang diterapkan pada Program Studi ini dalam hal-hal berikut:
                        </div>
          <table class="table  table-bordered data" >
          <thead>
          <th width="20px"><p class="text-center">No</p></th>
          <th width="300px"><p class="text-center">Hal</p></th>
          <th width="300px"><p class="text-center">Penjelasan</p></th>
        
          
      </thead>
      <tbody class="text-center">
          <?php $no=1; ?>
          @foreach($data2 as $key => $value)
            <tr>
              <td align="center">{{$no++}}</td>
              <td>{{$value->Hal}}</td>
              <td align="justify">{{$value->penjelasan}}</td>
              
            </tr>
          @endforeach
      </tbody>
      </table>
      <br>
      <br>
       <a class="btn btn-primary" href="{{ url('PDF/pdfppa') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>

      </div>


      <div class="tab-pane<?php if(isset($ai)) echo $ai ;?>" id="laporanpembelajaran3" name="laporanpembelajaran3">
                <br>
                <div class="alert alert-info">
                          <strong>Laporan Pelaksanaan Pembimbingan Tugas Akhir atau Skripsi</strong><br/><br>
                         •  Rata-rata banyaknya mahasiswa per dosen pembimbing tugas akhir (TA) mahasiswa/dosen TA.<br>
                        • Rata-rata jumlah pertemuan dosen-mahasiswa untuk menyelesaikan tugas akhir : .... kali mulai dari saat mengambil TA hingga menyelesaikan TA.<br>
                      • Laporan nama-nama dosen yang menjadi pembimbing tugas akhir atau skripsi, dan jumlah mahasiswa yang bimbingan: 

                        </div>
          <table class="table  table-bordered data" >
          <thead>
          <th width="20px"><p class="text-center">No</p></th>
          <th width="200px"><p class="text-center">Nama Dosen Pembimbing</p></th>
          <th width="100px"><p class="text-center">Jumlah Mahasiswa</p></th>
        
          
      </thead>
      <tbody class="text-center">
          <?php $no=1; ?>
          @foreach($data3 as $key => $value)
            <tr>
              <td align="center">{{$no++}}</td>
              <td>{{$value->nama}}</td>
              <td align="center">{{$value->jumlahMahasiswa}}</td>
              
            </tr>
          @endforeach
      </tbody>
      </table>
      <br>
      <br>
       <a class="btn btn-primary" href="{{ url('PDF/pdfppta') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>

      </div>


      <div class="tab-pane<?php if(isset($af)) echo $af ;?>" id="laporanpembelajaran4" name="laporanpembelajaran4">
                <br>
                <div class="alert alert-info">
                          <strong>Panduan Pembimbingan Skripsi</strong><br/><br>
                         Laporan penjelasan cara sosialisasi dan pelaksanaannya.

                        </div>
          Buku Panduan :
          @foreach($data4 as $key => $value)
          <td>{{$value->Panduan}}</td>
          @endforeach
          <br>
          <br>
          <table class="table  table-bordered data" >
          <thead>
          
          <th><p class="text-center">Sosialisasi Panduan</p></th>
        
          
      </thead>
      <tbody class="text-center">
          @foreach($data4 as $key => $value)
            <tr>
              
              <td align="justify">{{$value->sosialisasiPanduan}}</td>
              
            </tr>
          @endforeach
      </tbody>
      </table>
      <br>
      <br>
      <a class="btn btn-primary" href="{{ url('PDF/pdfpps') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>

      </div>


      <div class="tab-pane<?php if(isset($aq)) echo $aq ;?>" id="laporanpembelajaran5" name="laporanpembelajaran5">
                <br>
                <div class="alert alert-info">
                          <strong>Laporan Upaya Perbaikan Pembelajaran</strong><br/><br>
                         Laporan upaya perbaikan pembelajaran serta hasil yang telah dilakukan dan dicapai dalam tiga tahun terakhir dan hasilnya :

                        </div>
          <table class="table  table-bordered data" >
          <thead>
          <th rowspan="2" width="200px"><p class="text-center">Butir</p></th>
          <th colspan="2" style="border:1px"><p class="text-center">Upaya Tindakan</p></th>
          <tr>
          <th width="200px"><p class="text-center">Tindakan</p></th>
          <th width="200px"><p class="text-center">Hasil</p></th>
        
          
      </thead>
      <tbody class="text-center">
          @foreach($data5 as $key => $value)
            <tr>
              <td>{{$value->item}}</td>
              <td align="justify">{{$value->tindakanPerbaikan}}</td>
              <td align="justify">{{$value->hasilPerbaikan}}</td>
              
            </tr>
          @endforeach
      </tbody>
      </table>
      <br>
      <br>
       <a class="btn btn-primary" href="{{ url('PDF/pdfupp') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
      </div>
      @endif

            


            




</div>
</div>
            
        
</div>
<script>
            $('#myTab a').click(function (e) {
              e.preventDefault()
              $(this).tab('show')
            </script>

            <script>
            <input type="text" class="form-control">
            <input type="text" id="calendar" name="calendar" value="2012/06/03">



             $("#calendar").datepicker({

             });
             </script>
             <br>
             <br>


</div>
<br/>

@stop 