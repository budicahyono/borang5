@extends('layouts.master')
@section('content')
    
    <br>
    <div class="col-md-12">
            <h2>Standar V. Laporan Upaya Peningkatan Suasana Akademik </h2><br><br>
                        <ul class="nav nav-tabs">

                             <li><a href="laporansuasana">Kebijakan Suasana Akademik</a></li>
                             <li><a href="laporansuasana1">Ketersediaan Sarana Prasarana</a></li>
                             <li><a href="laporansuasana2">Kegiatan Luar Pembelajaran</a></li>
                             <li><a href="laporansuasana3">Interaksi Akademik</a></li>
                             <li><a href="laporansuasana4">Pengembangan Perilaku Kecendekiawan</a></li>
                        
                        </ul>

                    <div class="panel-body">

                    @if(Session::get('level')=='')
                    <div class="tab-content">
                        <div class="tab-pane<?php if(isset($aktif)) echo $aktif ;?>" id="laporansuasana" name="laporansuasana">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Kebijakan Suasana Akademik</strong><br/>
                            Laporan kebijakan tentang suasana akademik (otonomi keilmuan, kebebasan akademik, kebebasan mimbar akademik).          
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
                    <th><p class="text-center">Kebijakan Suasana Akademik</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data as $key => $value)
                        <tr>
                            <td align="justify">{{$value->kebijakanSuasanaAkademik}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            <?php } ?>
            </div>


            <div class="tab-pane<?php if(isset($ak)) echo $ak ;?>" id="laporansuasana1" name="laporansuasana1">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Ketersediaan Sarana Prasarana</strong><br/>
                            Laporan ketersediaan dan jenis prasarana, sarana dan dana yang memungkinkan terciptanya interaksi akademik antara sivitas akademika.          
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
                    <th><p class="text-center">Ketersediaan Sarana Prasarana</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data1 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->ketersediaanSaranaPrasarana}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            <?php } ?>
            </div>


            <div class="tab-pane<?php if(isset($at)) echo $at ;?>" id="laporansuasana2" name="laporansuasana2">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Kegiatan Luar Pembelajaran</strong><br/>
                            <p align="justify">Laporan program dan kegiatan di dalam dan di luar proses pembelajaran, yang dilaksanakan baik di dalam maupun di luar kelas,  untuk menciptakan suasana akademik yang kondusif (misalnya seminar, simposium, lokakarya, bedah buku, penelitian bersama, pengenalan kehidupan kampus, dan temu dosen-mahasiswa-alumni).</p>        
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
                    <th><p class="text-center">Kegiatan Luar Pembelajaran</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data2 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->kegiatanLuarPembelajaran}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            <?php } ?>
            </div>


            <div class="tab-pane<?php if(isset($ai)) echo $ai ;?>" id="laporansuasana3" name="laporansuasana3">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Interaksi Akademik</strong><br/>
                           Laporan interaksi akademik antara dosen-mahasiswa, antar mahasiswa, serta antar dosen.       
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
                    <th><p class="text-center">Interaksi Akademik</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data3 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->interaksiAkademik}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
           <?php } ?>
            </div>

          <div class="tab-pane<?php if(isset($af)) echo $af ;?>" id="laporansuasana4" name="laporansuasana4">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Pengembangan Perilaku Kecendekiawan</strong><br/>
                            Laporan pengembangan perilaku kecendekiawanan.          
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
                    <th><p class="text-center">Pengembangan Perilaku Kecendekiawan</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data4 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->pengembanganPerilakuKecendekiawan}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
           <?php } ?>
            </div>
            @endif




             @if(Session::get('level')=='admin')
                    <div class="tab-content">
                        <div class="tab-pane<?php if(isset($aktif)) echo $aktif ;?>" id="laporansuasana" name="laporansuasana">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Kebijakan Suasana Akademik</strong><br/>
                             Laporan ketersediaan dan jenis prasarana, sarana dan dana yang memungkinkan terciptanya interaksi akademik antara sivitas akademika.         
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
                    <th><p class="text-center">Kebijakan Suasana Akademik</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data as $key => $value)
                        <tr>
                            <td align="justify">{{$value->kebijakanSuasanaAkademik}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            <?php } ?>
            </div>


            <div class="tab-pane<?php if(isset($ak)) echo $ak ;?>" id="laporansuasana1" name="laporansuasana1">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Ketersediaan Sarana Prasarana</strong><br/>
                           Laporan ketersediaan dan jenis prasarana, sarana dan dana yang memungkinkan terciptanya interaksi akademik antara sivitas akademika.        
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
                    <th><p class="text-center">Ketersediaan Sarana Prasarana</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data1 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->ketersediaanSaranaPrasarana}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            <?php } ?>
            </div>


            <div class="tab-pane<?php if(isset($at)) echo $at ;?>" id="laporansuasana2" name="laporansuasana2">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Kegiatan Luar Pembelajaran</strong><br/>
                           <p align="justify"> Laporan program dan kegiatan di dalam dan di luar proses pembelajaran, yang dilaksanakan baik di dalam maupun di luar kelas,  untuk menciptakan suasana akademik yang kondusif (misalnya seminar, simposium, lokakarya, bedah buku, penelitian bersama, pengenalan kehidupan kampus, dan temu dosen-mahasiswa-alumni).</p>           
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
                    <th><p class="text-center">Kegiatan Luar Pembelajaran</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data2 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->kegiatanLuarPembelajaran}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            <?php } ?>
            </div>


            <div class="tab-pane<?php if(isset($ai)) echo $ai ;?>" id="laporansuasana3" name="laporansuasana3">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Interaksi Akademik</strong><br/>
                            Laporan interaksi akademik antara dosen-mahasiswa, antar mahasiswa, serta antar dosen.          
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
                    <th><p class="text-center">Interaksi Akademik</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data3 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->interaksiAkademik}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
           <?php } ?>
            </div>

          <div class="tab-pane<?php if(isset($af)) echo $af ;?>" id="laporansuasana4" name="laporansuasana4">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Pengembangan Perilaku Kecendekiawan</strong><br/>
                             Laporan pengembangan perilaku kecendekiawanan.          
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
                    <th><p class="text-center">Pengembangan Perilaku Kecendekiawan</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data4 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->pengembanganPerilakuKecendekiawan}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
           <?php } ?>
            </div>
            @endif



             @if(Session::get('level')=='user')
                    <div class="tab-content">
                        <div class="tab-pane<?php if(isset($aktif)) echo $aktif ;?>" id="laporansuasana" name="laporansuasana">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Kebijakan Suasana Akademik</strong><br/>
                             Laporan ketersediaan dan jenis prasarana, sarana dan dana yang memungkinkan terciptanya interaksi akademik antara sivitas akademika.        
                        </div>
    
                   
                    <table class="table  table-bordered data" >
                    <thead>
                    <th><p class="text-center">Kebijakan Suasana Akademik</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data as $key => $value)
                        <tr>
                            <td align="justify">{{$value->kebijakanSuasanaAkademik}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            <br>
            <br>
            <a class="btn btn-primary" href="{{ url('PDF/pdfksa') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
          
            </div>


            <div class="tab-pane<?php if(isset($ak)) echo $ak ;?>" id="laporansuasana1" name="laporansuasana1">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Ketersediaan Sarana Prasarana</strong><br/>
                            Laporan ketersediaan dan jenis prasarana, sarana dan dana yang memungkinkan terciptanya interaksi akademik antara sivitas akademika.         
                        </div>
    
                   
                    <table class="table  table-bordered data" >
                    <thead>
                    <th><p class="text-center">Ketersediaan Sarana Prasarana</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data1 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->ketersediaanSaranaPrasarana}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            <br>
            <br>
            <a class="btn btn-primary" href="{{ url('PDF/pdfksp') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
            </div>


            <div class="tab-pane<?php if(isset($at)) echo $at ;?>" id="laporansuasana2" name="laporansuasana2">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Kegiatan Luar Pembelajaran</strong><br/>
                            <p align="justify">Laporan program dan kegiatan di dalam dan di luar proses pembelajaran, yang dilaksanakan baik di dalam maupun di luar kelas,  untuk menciptakan suasana akademik yang kondusif (misalnya seminar, simposium, lokakarya, bedah buku, penelitian bersama, pengenalan kehidupan kampus, dan temu dosen-mahasiswa-alumni).</p>         
                        </div>
    
                   
                    <table class="table  table-bordered data" >
                    <thead>
                    <th><p class="text-center">Kegiatan Luar Pembelajaran</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data2 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->kegiatanLuarPembelajaran}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            <br>
            <br>
            <a class="btn btn-primary" href="{{ url('PDF/pdfklp') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
            </div>


            <div class="tab-pane<?php if(isset($ai)) echo $ai ;?>" id="laporansuasana3" name="laporansuasana3">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Interaksi Akademik</strong><br/>
                            Laporan interaksi akademik antara dosen-mahasiswa, antar mahasiswa, serta antar dosen.         
                        </div>
    
                   
                    <table class="table  table-bordered data" >
                    <thead>
                    <th><p class="text-center">Interaksi Akademik</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data3 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->interaksiAkademik}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            <br>
            <br>
            <a class="btn btn-primary" href="{{ url('PDF/pdfia') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
          
            </div>

          <div class="tab-pane<?php if(isset($af)) echo $af ;?>" id="laporansuasana4" name="laporansuasana4">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Pengembangan Perilaku Kecendekiawan</strong><br/>
                             Laporan pengembangan perilaku kecendekiawanan.         
                        </div>
    
                   
                    <table class="table  table-bordered data" >
                    <thead>
                    <th><p class="text-center">Pengembangan Perilaku Kecendekiawan</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data4 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->pengembanganPerilakuKecendekiawan}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
          <br>
            <br>
            <a class="btn btn-primary" href="{{ url('PDF/pdfppk') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
          
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