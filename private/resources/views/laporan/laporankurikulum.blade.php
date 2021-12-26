@extends('layouts.master')
@section('content')
    
    <br>
    <div class="col-md-12">
            <h2>Standar V. Laporan Kurikulum </h2><br><br>
                        <ul class="nav nav-tabs">
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">Kompetensi<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="laporankurikulum">Kompetensi Utama</a></li>
                                    <li><a href="laporankurikulum1">Kompetensi Pendukung</a></li>
                                    <li><a href="laporankurikulum2">Kompetensi Lain</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">Struktur Kurikulum<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="laporankurikulum3">Jumlah SKS PS </a></li>
                                    <li><a href="laporankurikulum4">Struktur Kurikulum MK</a></li>
                                    <li><a href="laporankurikulum5">Mata Kuliah Pilihan</a></li>
                                    <li><a href="laporankurikulum6">Substansi Praktikum/Praktek </a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">Peninjauan<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="laporankurikulum7">Peninjauan Kurikulum</a></li>
                                    <li><a href="laporankurikulum8">Hasil Peninjauan Kurikulum</a></li>
                                </ul>
                            </li>

                        </ul>

  

                    
                     @if(Session::get('level')=='')
                    <div class="tab-content">
                        <div class="tab-pane<?php if(isset($aktif)) echo $aktif ;?>" id="laporankurikulum" name="laporankurikulum">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Kompetensi Utama</strong><br/>
                            Laporan kompetensi utama lulusan :                        
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
                    <th><p class="text-center">Kompetensi Utama</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data as $key => $value)
                        <tr>
                            <td>{{$value->kompetensiUtama}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            Catatan: Pengertian tentang kompetensi utama, pendukung, dan lainnya dapat dilihat pada Kepmendiknas No. 045/2002.
             <?php } ?>
            </div>


            <div class="tab-pane<?php if(isset($ak)) echo $ak ;?>" id="laporankurikulum1" name="laporankurikulum1">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Kompetensi Pendukung</strong><br/>
                            Laporan kompetensi pendukung lulusan :                        
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
                    <th><p class="text-center">Kompetensi Pendukung</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data1 as $key => $value)
                        <tr>
                            <td>{{$value->kompetensiPendukung}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            Catatan: Pengertian tentang kompetensi utama, pendukung, dan lainnya dapat dilihat pada Kepmendiknas No. 045/2002.
             <?php } ?>
            </div>


            <div class="tab-pane<?php if(isset($at)) echo $at ;?>" id="laporankurikulum2" name="laporankurikulum2">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Kompetensi Lain</strong><br/>
                            Laporan kompetensi lainnya/pilihan lulusan  :                        
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
                    <th><p class="text-center">Kompetensi Lainnya</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data2 as $key => $value)
                        <tr>
                            <td>{{$value->kompetensiLain}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            Catatan: Pengertian tentang kompetensi utama, pendukung, dan lainnya dapat dilihat pada Kepmendiknas No. 045/2002.
             <?php } ?>
            </div>

            <div class="tab-pane<?php if(isset($ai)) echo $ai ;?>" id="laporankurikulum3" name="laporankurikulum3">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Jumlah SKS Program Studi </strong><br/>
                            Laporan Jumlah SKS PS (minimum untuk kelulusan) :  …  sks yang tersusun sebagai berikut:                     
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
                    <th>Jenis Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Keterangan</th>
                    

                    
            </thead>
            <tbody class="text-center">
					<?php $totalsks=0;?>
                    @foreach($data3 as $key => $value)
                        <tr>
                            <td>{{$value->statusMataKuliah}}</td>
                            <td>{{$value->total}}</td>                           
                            <td></td>                           
                        </tr>
						<?php $totalsks =  $totalsks + $value->total; ?>
                    @endforeach
                    <th colspan="1">Jumlah Total</th> 
					<th>{{$totalsks}} </th>
                    <td bgcolor="grey"</td>
            </tbody>
            </table>
             <?php } ?>
            </div>

             <div class="tab-pane<?php if(isset($am)) echo $am ;?>" id="laporankurikulum4" name="laporankurikulum4">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Struktur Kurikulum </strong><br/>
                            Laporan struktur kurikulum berdasarkan urutan mata kuliah (MK) semester demi semester:                   
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
           
                   
                    <table class="table table-bordered"  >
                    <thead>
                    <th rowspan="2" width="50px"><p class="text-center">Smt</p></th>
                    <th rowspan="2" width="100px"><p class="text-center">Kode MK</p></th>
                    <th rowspan="2" width="200px"><p class="text-center">Nama Mata Kuliah</p></th>
                    <th rowspan="2" width="50px"><p class="text-center">Bobot SKS</p></th>
                    <th colspan="2" style="border:1px"><p class="text-center">SKS MK dalam Kurikulum</th>
                    <th rowspan="2" width="50px"><p class="text-center">Bobot Tugas*** </p></th>
                    <th colspan="3" style="border:1px"><p class="text-center">Kelengkapan****</p></th>
                    <th rowspan="2" width="100px"><p class="text-center">Unit/Jur/Fak Penyelenggara</p></th>
                    
            </thead>

            <thead>
                    <th></th>
                    <th></th>
                     <th></th>
                    <th></th>
                    <th width="50px">Inti**</th>
                    <th width="50px">Institusional</th>
                    <th></th>
                    <th width="100px">Deskripsi</th>
                    <th width="50px">Silabus</th>
                    <th width="50px">SAP</th>
                    <th></th>
                    
            </thead>

            <tbody class="text-center">
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
                    <th colspan="3">Total SKS</th> 
                    <td align="center">{{$total}}</td>
                    <td align="center">{{$total1}}</td>
                    <td align="center">{{$total2}}</td>
                    <td bgcolor="grey"</td>
                    <td bgcolor="grey"</td>
                    <td bgcolor="grey"</td>
                    <td bgcolor="grey"</td>
                    <td bgcolor="grey"</td>
            </tbody>
            </table>
           *  Tuliskan mata kuliah pilihan sebagai mata kuliah pilihan I, mata kuliah pilihan II, dst. (nama-nama mata kuliah pilihan yang dilaksanakan dicantumkan dalam tabel 5.1.3.)<br>
            **   Menurut rujukan peer group / SK Mendiknas 045/2002 (ps. 3 ayat 2e)<br>
            *** Beri tanda √ pada mata kuliah yang dalam penentuan nilai akhirnya memberikan bobot pada tugas-tugas (praktikum/praktek, PR atau makalah) ≥ 20%.<br>
            ****Beri tanda √ pada mata kuliah yang dilengkapi dengan deskripsi, silabus, dan atau SAP.  Sediakan dokumen pada saat asesmen lapangan.<br>
             <?php } ?>
            </div>

             <div class="tab-pane<?php if(isset($af)) echo $af ;?>" id="laporankurikulum5" name="laporankurikulum5">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Mata Kuliah Pilihan </strong><br/>
                            Laporan mata kuliah pilihan yang dilaksanakan dalam tiga tahun terakhir, pada tabel berikut:                   
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
                    <th width="50px"><p class="text-center">Semester</p></th>
                    <th width="100px"><p class="text-center">Kode MK</p></th>
                    <th width="200px"><p class="text-center">Nama MK PIlihan</p></th>
                    <th width="50px"><p class="text-center">Bobot SKS</p></th>
                    <th width="50px"><p class="text-center">Bobot Tugas</p></th>
                    <th width="100px"><p class="text-center">Unit/ Jur/ Fak Pengelola</p></th>

                    
            </thead>
            <tbody class="text-center">
                     <?php $total=0; ?>
                    @foreach($data5 as $key => $value)
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
                    <th colspan="3">Total SKS</th> 
                    <td align="center">{{$total}}</td>
                    <td bgcolor="grey"</td>
                    <td bgcolor="grey"</td>
            </tbody>
            </table>
            * beri tanda √ pada mata kuliah yang dalam penentuan nilai akhirnya memberikan bobot pada tugas-tugas (praktikum/praktek, PR atau makalah) ≥ 20%.
             <?php } ?>
            </div>


             <div class="tab-pane<?php if(isset($aq)) echo $aq ;?>" id="laporankurikulum6" name="laporankurikulum6">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Substansi Praktikum/Praktek </strong><br/>
                            Laporan substansi praktikum/praktek yang mandiri ataupun yang merupakan bagian dari mata kuliah tertentu:                  
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
                    <th rowspan="2"><p class="text-center">No</p></th>
                    <th rowspan="2"><p class="text-center">Nama Praktikum/Praktek</p></th>
                    <th colspan="2" style="border:1px"><p class="text-center">Isi Praktikum/Praktek</p></th>
                    <th rowspan="2"><p class="text-center">Tempat/Lokasi Praktikum/Praktek</p></th>
                    
                    <tr>
                    <th><p class="text-center">Judul/Modul</p></th>
                    <th><p class="text-center">Jam Pelaksanaan</p></th>
                   
                    
            </thead>
            <tbody class="text-center">
                    <?php $no=1; ?>
                    @foreach($data6 as $key => $value)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$value->namaPraktikum}}</td>
                            <td>{{$value->judulModul}}</td> 
                            <td align="center">{{$value->jamPelaksanaan}}</td> 
                            <td>{{$value->lokasi}}</td>                      
                        </tr>
                    @endforeach
            </tbody>
            </table>
             <?php } ?>
            </div>

            <div class="tab-pane<?php if(isset($aw)) echo $aw ;?>" id="laporankurikulum7" name="laporankurikulum7">
                        <br>
                        <div class="alert alert-info">
                          <strong> Laporan Peninjauan Kurikulum dalam 5 Tahun Terakhir </strong><br/>
                            Laporan mekanisme peninjauan kurikulum dan pihak-pihak yang dilibatkan dalam proses peninjauan tersebut.                  
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
                    <th><p class="text-center">Peninjauan Kurikulum</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data7 as $key => $value)
                        <tr>
                            <td>{{$value->mekanisme}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
           <?php } ?>
            </div>


             <div class="tab-pane<?php if(isset($ae)) echo $ae ;?>" id="laporankurikulum8" name="laporankurikulum8">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Hasil Peninjauan </strong><br/>
                                          
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
                    <th rowspan="2" width="50px"><p class="text-center ">No</p></th>
                    <th rowspan="2" width="100px"><p class="text-center">No MK</p></th>
                    <th rowspan="2" width="200px"><p class="text-center">Nama MK</p></th>
                    <th rowspan="2" width="100px"><p class="text-center">MK Baru/Lama/Hapus</p></th>
                    <th colspan="2" style="border:1px"><p class="text-center">Perubahan Pada</p></th>
                    <th rowspan="2" width="200px"><p class="text-center">Alasan Peninjauan</p></th>
                    <th rowspan="2" width="100px"><p class="text-center">Berlaku mulai Sem./Th.</p></th>
                    
                    <tr>
                    <th width="100px"><p class="text-center">Silabus/SAP</p></th>
                    <th width="100px"><p class="text-center">Buku Ajar</p></th>
                    
                  
                    
            </thead>

            <tbody class="text-center">
                    <?php $no=1; ?>
                    @foreach($data8 as $key => $value)
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
            </tbody>
            </table>
             <?php } ?>
            </div>
            @endif






             @if(Session::get('level')=='admin')
                   <div class="tab-content">
                        <div class="tab-pane<?php if(isset($aktif)) echo $aktif ;?>" id="laporankurikulum" name="laporankurikulum">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Kompetensi Utama</strong><br/>
                            Laporan kompetensi utama lulusan :                        
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
                    <th><p class="text-center">Kompetensi Utama</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data as $key => $value)
                        <tr>
                            <td>{{$value->kompetensiUtama}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            Catatan: Pengertian tentang kompetensi utama, pendukung, dan lainnya dapat dilihat pada Kepmendiknas No. 045/2002.
             <?php } ?>
            </div>


            <div class="tab-pane<?php if(isset($ak)) echo $ak ;?>" id="laporankurikulum1" name="laporankurikulum1">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Kompetensi Pendukung</strong><br/>
                            Laporan kompetensi pendukung lulusan :                        
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
                    <th><p class="text-center">Kompetensi Pendukung</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data1 as $key => $value)
                        <tr>
                            <td>{{$value->kompetensiPendukung}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            Catatan: Pengertian tentang kompetensi utama, pendukung, dan lainnya dapat dilihat pada Kepmendiknas No. 045/2002.
             <?php } ?>
            </div>


            <div class="tab-pane<?php if(isset($at)) echo $at ;?>" id="laporankurikulum2" name="laporankurikulum2">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Kompetensi Lain</strong><br/>
                            Laporan kompetensi lainnya/pilihan lulusan  :                        
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
                    <th><p class="text-center">Kompetensi Lainnya</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data2 as $key => $value)
                        <tr>
                            <td>{{$value->kompetensiLain}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            Catatan: Pengertian tentang kompetensi utama, pendukung, dan lainnya dapat dilihat pada Kepmendiknas No. 045/2002.
             <?php } ?>
            </div>

            <div class="tab-pane<?php if(isset($ai)) echo $ai ;?>" id="laporankurikulum3" name="laporankurikulum3">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Jumlah SKS Program Studi </strong><br/>
                            Laporan Jumlah SKS PS (minimum untuk kelulusan) :  …  sks yang tersusun sebagai berikut:                     
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
                    <th>Jenis Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Keterangan</th>
                    

                    
            </thead>
            <tbody class="text-center">
                    <?php $totalsks=0;?>
                    @foreach($data3 as $key => $value)
                        <tr>
                            <td>{{$value->statusMataKuliah}}</td>
                            <td>{{$value->total}}</td>                           
                            <td></td>                           
                        </tr>
                        <?php $totalsks =  $totalsks + $value->total; ?>
                    @endforeach
                    <th colspan="1">Jumlah Total</th> 
                    <th>{{$totalsks}} </th>
                    <td bgcolor="grey"</td>
            </tbody>
            </table>
             <?php } ?>
            </div>

             <div class="tab-pane<?php if(isset($am)) echo $am ;?>" id="laporankurikulum4" name="laporankurikulum4">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Struktur Kurikulum </strong><br/>
                            Laporan struktur kurikulum berdasarkan urutan mata kuliah (MK) semester demi semester:                   
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
           
                   
                    <table class="table table-bordered"  >
                    <thead>
                    <th rowspan="2" width="50px"><p class="text-center">Smt</p></th>
                    <th rowspan="2" width="100px"><p class="text-center">Kode MK</p></th>
                    <th rowspan="2" width="200px"><p class="text-center">Nama Mata Kuliah</p></th>
                    <th rowspan="2" width="50px"><p class="text-center">Bobot SKS</p></th>
                    <th colspan="2" style="border:1px"><p class="text-center">SKS MK dalam Kurikulum</th>
                    <th rowspan="2" width="50px"><p class="text-center">Bobot Tugas*** </p></th>
                    <th colspan="3" style="border:1px"><p class="text-center">Kelengkapan****</p></th>
                    <th rowspan="2" width="100px"><p class="text-center">Unit/Jur/Fak Penyelenggara</p></th>
                    
                    <tr>
                    <th width="50px">Inti**</th>
                    <th width="50px">Institusional</th>
                    <th width="100px">Deskripsi</th>
                    <th width="50px">Silabus</th>
                    <th width="50px">SAP</th>
                    
                    
            </thead>

            <tbody class="text-center">
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
                    <th colspan="3">Total SKS</th> 
                    <td align="center">{{$total}}</td>
                    <td align="center">{{$total1}}</td>
                    <td align="center">{{$total2}}</td>
                    <td bgcolor="grey"</td>
                    <td bgcolor="grey"</td>
                    <td bgcolor="grey"</td>
                    <td bgcolor="grey"</td>
                    <td bgcolor="grey"</td>
            </tbody>
            </table>
           *  Tuliskan mata kuliah pilihan sebagai mata kuliah pilihan I, mata kuliah pilihan II, dst. (nama-nama mata kuliah pilihan yang dilaksanakan dicantumkan dalam tabel 5.1.3.)<br>
            **   Menurut rujukan peer group / SK Mendiknas 045/2002 (ps. 3 ayat 2e)<br>
            *** Beri tanda √ pada mata kuliah yang dalam penentuan nilai akhirnya memberikan bobot pada tugas-tugas (praktikum/praktek, PR atau makalah) ≥ 20%.<br>
            ****Beri tanda √ pada mata kuliah yang dilengkapi dengan deskripsi, silabus, dan atau SAP.  Sediakan dokumen pada saat asesmen lapangan.<br>
             <?php } ?>
            </div>

             <div class="tab-pane<?php if(isset($af)) echo $af ;?>" id="laporankurikulum5" name="laporankurikulum5">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Mata Kuliah Pilihan </strong><br/>
                            Laporan mata kuliah pilihan yang dilaksanakan dalam tiga tahun terakhir, pada tabel berikut:                   
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
                   <th width="50px"><p class="text-center">Semester</p></th>
                    <th width="100px"><p class="text-center">Kode MK</p></th>
                    <th width="200px"><p class="text-center">Nama MK PIlihan</p></th>
                    <th width="50px"><p class="text-center">Bobot SKS</p></th>
                    <th width="50px"><p class="text-center">Bobot Tugas</p></th>
                    <th width="100px"><p class="text-center">Unit/ Jur/ Fak Pengelola</p></th>

                    
            </thead>
            <tbody class="text-center">
                     <?php $total=0; ?>
                    @foreach($data5 as $key => $value)
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
                    <th colspan="3">Total SKS</th> 
                    <td align="center">{{$total}}</td>
                    <td bgcolor="grey"</td>
                    <td bgcolor="grey"</td>
            </tbody>
            </table>
            * beri tanda √ pada mata kuliah yang dalam penentuan nilai akhirnya memberikan bobot pada tugas-tugas (praktikum/praktek, PR atau makalah) ≥ 20%.
             <?php } ?>
            </div>


             <div class="tab-pane<?php if(isset($aq)) echo $aq ;?>" id="laporankurikulum6" name="laporankurikulum6">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Substansi Praktikum/Praktek </strong><br/>
                            Laporan substansi praktikum/praktek yang mandiri ataupun yang merupakan bagian dari mata kuliah tertentu:                  
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
                    <th rowspan="2"><p class="text-center">No</p></th>
                    <th rowspan="2"><p class="text-center">Nama Praktikum/Praktek</p></th>
                    <th colspan="2" style="border:1px"><p class="text-center">Isi Praktikum/Praktek</p></th>
                    <th rowspan="2"><p class="text-center">Tempat/Lokasi Praktikum/Praktek</p></th>
                    
                    <tr>
                    <th><p class="text-center">Judul/Modul</p></th>
                    <th><p class="text-center">Jam Pelaksanaan</p></th>
                    
                    
            </thead>
            <tbody class="text-center">
                    <?php $no=1; ?>
                    @foreach($data6 as $key => $value)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$value->namaPraktikum}}</td>
                            <td>{{$value->judulModul}}</td> 
                            <td align="center">{{$value->jamPelaksanaan}}</td> 
                            <td>{{$value->lokasi}}</td>                      
                        </tr>
                    @endforeach
            </tbody>
            </table>
             <?php } ?>
            </div>

            <div class="tab-pane<?php if(isset($aw)) echo $aw ;?>" id="laporankurikulum7" name="laporankurikulum7">
                        <br>
                        <div class="alert alert-info">
                          <strong> Laporan Peninjauan Kurikulum dalam 5 Tahun Terakhir </strong><br/>
                            Laporan mekanisme peninjauan kurikulum dan pihak-pihak yang dilibatkan dalam proses peninjauan tersebut.                  
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
                    <th><p class="text-center">Peninjauan Kurikulum</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data7 as $key => $value)
                        <tr>
                            <td>{{$value->mekanisme}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
           <?php } ?>
            </div>


             <div class="tab-pane<?php if(isset($ae)) echo $ae ;?>" id="laporankurikulum8" name="laporankurikulum8">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Hasil Peninjauan </strong><br/>
                                          
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
                     <th rowspan="2" width="50px"><p class="text-center ">No</p></th>
                    <th rowspan="2" width="100px"><p class="text-center">No MK</p></th>
                    <th rowspan="2" width="200px"><p class="text-center">Nama MK</p></th>
                    <th rowspan="2" width="100px"><p class="text-center">MK Baru/Lama/Hapus</p></th>
                    <th colspan="2" style="border:1px"><p class="text-center">Perubahan Pada</p></th>
                    <th rowspan="2" width="200px"><p class="text-center">Alasan Peninjauan</p></th>
                    <th rowspan="2" width="100px"><p class="text-center">Berlaku mulai Sem./Th.</p></th>
                    
                    <tr>
                    <th width="100px"><p class="text-center">Silabus/SAP</p></th>
                    <th width="100px"><p class="text-center">Buku Ajar</p></th>
                    
                    
            </thead>

            <tbody class="text-center">
                    <?php $no=1; ?>
                    @foreach($data8 as $key => $value)
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
            </tbody>
            </table>
             <?php } ?>
            </div>
            @endif



             @if(Session::get('level')=='user')
                    <div class="tab-content">
                        <div class="tab-pane<?php if(isset($aktif)) echo $aktif ;?>" id="laporankurikulum" name="laporankurikulum">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Kompetensi Utama</strong><br/>
                            Laporan kompetensi utama lulusan :                        
                        </div>
    
                   
                    <table class="table  table-bordered data" >
                    <thead> 
                    <th><p class="text-center">Kompetensi Utama</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data as $key => $value)
                        <tr>
                            <td>{{$value->kompetensiUtama}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            Catatan: Pengertian tentang kompetensi utama, pendukung, dan lainnya dapat dilihat pada Kepmendiknas No. 045/2002.
            <br>
            <br>
            <a class="btn btn-primary" href="{{ url('PDF/pdfku') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
            </div>


            <div class="tab-pane<?php if(isset($ak)) echo $ak ;?>" id="laporankurikulum1" name="laporankurikulum1">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Kompetensi Pendukung</strong><br/>
                            Laporan kompetensi pendukung lulusan :                        
                        </div>
           
                   
                    <table class="table  table-bordered data" >
                    <thead>
                    <th><p class="text-center">Kompetensi Pendukung</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data1 as $key => $value)
                        <tr>
                            <td>{{$value->kompetensiPendukung}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            Catatan: Pengertian tentang kompetensi utama, pendukung, dan lainnya dapat dilihat pada Kepmendiknas No. 045/2002.
            <br>
            <br>
             <a class="btn btn-primary" href="{{ url('PDF/pdfkp') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
            </div>


            <div class="tab-pane<?php if(isset($at)) echo $at ;?>" id="laporankurikulum2" name="laporankurikulum2">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Kompetensi Lain</strong><br/>
                            Laporan kompetensi lainnya/pilihan lulusan  :                        
                        </div>
           
                   
                    <table class="table  table-bordered data" >
                    <thead>
         
                    <th><p class="text-center">Kompetensi Lainnya</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data2 as $key => $value)
                        <tr>
                            <td>{{$value->kompetensiLain}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            Catatan: Pengertian tentang kompetensi utama, pendukung, dan lainnya dapat dilihat pada Kepmendiknas No. 045/2002.
            <br>
            <br>
             <a class="btn btn-primary" href="{{ url('PDF/pdfkl') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
            </div>

            <div class="tab-pane<?php if(isset($ai)) echo $ai ;?>" id="laporankurikulum3" name="laporankurikulum3">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Jumlah SKS Program Studi </strong><br/>
                            Laporan Jumlah SKS PS (minimum untuk kelulusan) :  …  sks yang tersusun sebagai berikut:                     
                        </div>
           
                   
                    <table class="table  table-bordered data" >
                    <thead>
                    <th>Jenis Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Keterangan</th>
                    

                    
            </thead>
            <tbody class="text-center">
                    <?php $totalsks=0;?>
                    @foreach($data3 as $key => $value)
                        <tr>
                            <td>{{$value->statusMataKuliah}}</td>
                            <td>{{$value->total}}</td>     
                            <td></td>
                            <?php $totalsks =  $totalsks + $value->total ?>                      
                        </tr>
                    @endforeach
                    <th colspan="1">Jumlah Total</th> 
                    <th>{{$totalsks}} </th>
                    <td bgcolor="grey"</td>
            </tbody>
            </table>
            <br>
            <br>
            <a class="btn btn-primary" href="{{ url('PDF/pdfjs') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
            </div>

             <div class="tab-pane<?php if(isset($am)) echo $am ;?>" id="laporankurikulum4" name="laporankurikulum4">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Struktur Kurikulum </strong><br/>
                            Laporan struktur kurikulum berdasarkan urutan mata kuliah (MK) semester demi semester:                   
                        </div>
           
                   
                    <table class="table table-bordered" >
                    <thead>
                    <th rowspan="2" width="50px"><p class="text-center">Smt</p></th>
                    <th rowspan="2" width="100px"><p class="text-center">Kode MK</p></th>
                    <th rowspan="2" width="200px"><p class="text-center">Nama Mata Kuliah</p></th>
                    <th rowspan="2" width="50px"><p class="text-center">Bobot SKS</p></th>
                    <th colspan="2" style="border:1px"><p class="text-center">SKS MK dalam Kurikulum</th>
                    <th rowspan="2" width="50px"><p class="text-center">Bobot Tugas*** </p></th>
                    <th colspan="3" style="border:1px"><p class="text-center">Kelengkapan****</p></th>
                    <th rowspan="2" width="100px"><p class="text-center">Unit/Jur/Fak Penyelenggara</p></th>
                    
                    <tr>
                    <th width="50px">Inti**</th>
                    <th width="50px">Institusional</th>
                    
                    <th width="100px">Deskripsi</th>
                    <th width="50px">Silabus</th>
                    <th width="50px">SAP</th>
                    
                    
            </thead>

            <tbody class="text-center">
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
                    <th colspan="3">Total SKS</th> 
                    <td align="center">{{$total}}</td>
                    <td align="center">{{$total1}}</td>
                    <td align="center">{{$total2}}</td>
                    <td bgcolor="grey"</td>
                    <td bgcolor="grey"</td>
                    <td bgcolor="grey"</td>
                    <td bgcolor="grey"</td>
                    <td bgcolor="grey"</td>
            </tbody>
            </table>
            *  Tuliskan mata kuliah pilihan sebagai mata kuliah pilihan I, mata kuliah pilihan II, dst. (nama-nama mata kuliah pilihan yang dilaksanakan dicantumkan dalam tabel 5.1.3.)<br>
            **   Menurut rujukan peer group / SK Mendiknas 045/2002 (ps. 3 ayat 2e)<br>
            *** Beri tanda √ pada mata kuliah yang dalam penentuan nilai akhirnya memberikan bobot pada tugas-tugas (praktikum/praktek, PR atau makalah) ≥ 20%.<br>
            ****Beri tanda √ pada mata kuliah yang dilengkapi dengan deskripsi, silabus, dan atau SAP.  Sediakan dokumen pada saat asesmen lapangan.<br>
            <br>
             <a class="btn btn-primary" href="{{ url('PDF/pdfsk') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>

            </div>

             <div class="tab-pane<?php if(isset($af)) echo $af ;?>" id="laporankurikulum5" name="laporankurikulum5">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Mata Kuliah Pilihan </strong><br/>
                            Laporan mata kuliah pilihan yang dilaksanakan dalam tiga tahun terakhir, pada tabel berikut:                   
                        </div>
           
                   
                    <table class="table  table-bordered data" >
                    <thead> 
                   <th width="50px"><p class="text-center">Semester</p></th>
                    <th width="100px"><p class="text-center">Kode MK</p></th>
                    <th width="200px"><p class="text-center">Nama MK PIlihan</p></th>
                    <th width="50px"><p class="text-center">Bobot SKS</p></th>
                    <th width="50px"><p class="text-center">Bobot Tugas</p></th>
                    <th width="100px"><p class="text-center">Unit/ Jur/ Fak Pengelola</p></th>

                    
            </thead>
            <tbody class="text-center">
                     <?php $total=0; ?>
                    @foreach($data5 as $key => $value)
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
                    <th colspan="3">Total SKS</th> 
                    <td align="center">{{$total}}</td>
                    <td bgcolor="grey"</td>
                    <td bgcolor="grey"</td>
            </tbody>
            </table>
            * beri tanda √ pada mata kuliah yang dalam penentuan nilai akhirnya memberikan bobot pada tugas-tugas (praktikum/praktek, PR atau makalah) ≥ 20%.
            <br>
            <br>
            <a class="btn btn-primary" href="{{ url('PDF/pdfmkp') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
            </div>


             <div class="tab-pane<?php if(isset($aq)) echo $aq ;?>" id="laporankurikulum6" name="laporankurikulum6">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Substansi Praktikum/Praktek </strong><br/>
                            Laporan substansi praktikum/praktek yang mandiri ataupun yang merupakan bagian dari mata kuliah tertentu:                  
                        </div>
           
                   
                    <table class="table  table-bordered data" >
                    <thead>
                    <th rowspan="2"><p class="text-center">No</p></th>
                    <th rowspan="2"><p class="text-center">Nama Praktikum/Praktek</p></th>
                    <th colspan="2" style="border:1px"><p class="text-center">Isi Praktikum/Praktek</p></th>
                    <th rowspan="2"><p class="text-center">Tempat/Lokasi Praktikum/Praktek</p></th>
                    
                    <tr>
                    <th><p class="text-center">Judul/Modul</p></th>
                    <th><p class="text-center">Jam Pelaksanaan</p></th>
                    
                    
            </thead>
            <tbody class="text-center">
                    <?php $no=1; ?>
                    @foreach($data6 as $key => $value)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$value->namaPraktikum}}</td>
                            <td>{{$value->judulModul}}</td> 
                            <td align="center">{{$value->jamPelaksanaan}}</td> 
                            <td>{{$value->lokasi}}</td>                      
                        </tr>
                    @endforeach
            </tbody>
            </table>
            <br>
            <br>
            <a class="btn btn-primary" href="{{ url('PDF/pdfp') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
            </div>

            <div class="tab-pane<?php if(isset($aw)) echo $aw ;?>" id="laporankurikulum7" name="laporankurikulum7">
                        <br>
                        <div class="alert alert-info">
                          <strong> Laporan Peninjauan Kurikulum dalam 5 Tahun Terakhir </strong><br/>
                            Laporan mekanisme peninjauan kurikulum dan pihak-pihak yang dilibatkan dalam proses peninjauan tersebut.                  
                        </div>
    
                   
                    <table class="table  table-bordered data" >
                    <thead>
                    <th><p class="text-center">Peninjauan Kurikulum</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data7 as $key => $value)
                        <tr>
                            <td>{{$value->mekanisme}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            <br>
            <br>
            <a class="btn btn-primary" href="{{ url('PDF/pdfpk') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
          
            </div>


             <div class="tab-pane<?php if(isset($ae)) echo $ae ;?>" id="laporankurikulum8" name="laporankurikulum8">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Hasil Peninjauan </strong><br/>
                                          
                        </div>

                    <table class="table  table-bordered data" >
                    <thead>
                    <th rowspan="2" width="50px"><p class="text-center ">No</p></th>
                    <th rowspan="2" width="100px"><p class="text-center">No MK</p></th>
                    <th rowspan="2" width="200px"><p class="text-center">Nama MK</p></th>
                    <th rowspan="2" width="100px"><p class="text-center">MK Baru/Lama/Hapus</p></th>
                    <th colspan="2" style="border:1px"><p class="text-center">Perubahan Pada</p></th>
                    <th rowspan="2" width="200px"><p class="text-center">Alasan Peninjauan</p></th>
                    <th rowspan="2" width="100px"><p class="text-center">Berlaku mulai Sem./Th.</p></th>
                    
                    <tr>
                    <th width="100px"><p class="text-center">Silabus/SAP</p></th>
                    <th width="100px"><p class="text-center">Buku Ajar</p></th>
                    
                    
            </thead>

            <tbody class="text-center">
                    <?php $no=1; ?>
                    @foreach($data8 as $key => $value)
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
            </tbody>
            </table>
            <br>
            <br>
            <a class="btn btn-primary" href="{{ url('PDF/pdfhpk') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
            </div>
            @endif





            



            <script>
            $('#myTab a').click(function (e) {
              e.preventDefault()
              $(this).tab('show')
            });
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
</div>

@stop 