@extends('layouts.master')
@section('content')
    
    <br>
    <div class="col-md-12">
            <h2>Standar IV. Laporan Sumber Daya Manusia </h2><br><br>
                        <ul class="nav nav-tabs">
                             <li><a href="laporansistem">Sistem Seleksi dan Pengembangan</a></li>
                             <li><a href="laporansistem1">Monitoring dan Evaluasi</a></li>

                        </ul>

  

                    <div class="panel-body">
                    @if(Session::get('level')=='')
                    <div class="tab-content">
                        <div class="tab-pane<?php if(isset($aktif)) echo $aktif ;?>" id="laporansistem" name="laporansistem">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Sistem Seleksi dan Pengembangan</strong><br/>
                            Laporan tentang penjelasan sistem seleksi/perekrutan, penempatan, pengembangan, retensi, dan pemberhentian dosen dan tenaga kependidikan untuk menjamin mutu penyelenggaraan program akademik (termasuk informasi tentang ketersediaan pedoman tertulis dan konsistensi pelaksanaannya).                 
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
                    <th><p class="text-center">Sistem Seleksi dan Pengembangan</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data as $key => $value)
                        <tr>
                            <td align="justify">{{$value->sistemSeleksi}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
             <?php } ?>
            </div>


            <div class="tab-pane<?php if(isset($ak)) echo $ak ;?>" id="laporansistem1" name="laporansistem1">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Monitoring dan Evaluasi</strong><br/>
                            Laporan tentang penjelasan sistem monitoring dan evaluasi, serta rekam jejak kinerja akademik dosen dan kinerja tenaga kependidikan (termasuk informasi tentang ketersediaan pedoman tertulis, dan monitoring dan evaluasi kinerja dosen dalam tridarma serta dokumentasinya).                
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
                    <th><p class="text-center">Monitoring dan Evaluasi</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data1 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->monev}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
           <?php } ?>
            </div>
            @endif



            @if(Session::get('level')=='admin')
                    <div class="tab-content">
                        <div class="tab-pane<?php if(isset($aktif)) echo $aktif ;?>" id="laporansistem" name="laporansistem">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Sistem Seleksi dan Pengembangan</strong><br/>
                            Laporan tentang penjelasan sistem seleksi/perekrutan, penempatan, pengembangan, retensi, dan pemberhentian dosen dan tenaga kependidikan untuk menjamin mutu penyelenggaraan program akademik (termasuk informasi tentang ketersediaan pedoman tertulis dan konsistensi pelaksanaannya).                 
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
                        <th><p class="text-center">Sistem Seleksi dan Pengembangan</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data as $key => $value)
                        <tr>
                            <td align="justify">{{$value->sistemSeleksi}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
                    <?php } ?>
            </div>


            <div class="tab-pane<?php if(isset($ak)) echo $ak ;?>" id="laporansistem1" name="laporansistem1">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Monitoring dan Evaluasi</strong><br/>
                            Laporan tentang penjelasan sistem monitoring dan evaluasi, serta rekam jejak kinerja akademik dosen dan kinerja tenaga kependidikan (termasuk informasi tentang ketersediaan pedoman tertulis, dan monitoring dan evaluasi kinerja dosen dalam tridarma serta dokumentasinya).                
                        </div><br>
                        <?php if (isset($dataprodi)and Session::get("level")!="user") {?>
                        <form method="post" action="">
                        {{Form::label('idprodi', 'Pilih Prodi :') }} <br>
                         <select name="idprodi">
                        @foreach($dataprodi as $key => $row)
                        <option value="{{$row->idprodi}}">{{$row->namaProdi}}</option>      
                        @endforeach
                         </select>
                        <input type="submit" name="submitidprodi" value="Cari" />
                        <?php } ?>
                        </form>
                        <?php
                        if(isset($hasilpencarian) ) 
                        {

                        echo $hasilpencarian;?>

                        <table class="table  table-bordered data" >
                        <thead>
                        <th><p class="text-center">Monitoring dan Evaluasi</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data1 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->monev}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            
                    <?php } ?>

            </div>
            @endif



            @if(Session::get('level')=='user')
                    <div class="tab-content">
                        <div class="tab-pane<?php if(isset($aktif)) echo $aktif ;?>" id="laporansistem" name="laporansistem">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Sistem Seleksi dan Pengembangan</strong><br/>
                            Laporan tentang penjelasan sistem seleksi/perekrutan, penempatan, pengembangan, retensi, dan pemberhentian dosen dan tenaga kependidikan untuk menjamin mutu penyelenggaraan program akademik (termasuk informasi tentang ketersediaan pedoman tertulis dan konsistensi pelaksanaannya).                 
                        </div>
    
                   
                    <table class="table  table-bordered data" >
                    <thead>
                    <th><p class="text-center">Sistem Seleksi dan Pengembangan</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data as $key => $value)
                        <tr>
                            <td align="justify">{{$value->sistemSeleksi}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            <a class="btn btn-primary" href="{{ url('PDF/pdfsdm') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
            </div>


            <div class="tab-pane<?php if(isset($ak)) echo $ak ;?>" id="laporansistem1" name="laporansistem1">
                        <br>
                        <div class="alert alert-info">
                          <strong>Laporan Monitoring dan Evaluasi</strong><br/>
                            Laporan tentang penjelasan sistem monitoring dan evaluasi, serta rekam jejak kinerja akademik dosen dan kinerja tenaga kependidikan (termasuk informasi tentang ketersediaan pedoman tertulis, dan monitoring dan evaluasi kinerja dosen dalam tridarma serta dokumentasinya).                
                        </div>
    
                   
                    <table class="table  table-bordered data" >
                    <thead>
                    <th><p class="text-center">Monitoring dan Evaluasi</p></th> 
        
                    
            </thead>
            <tbody class="text-center">

                    @foreach($data1 as $key => $value)
                        <tr>
                            <td align="justify">{{$value->monev}}</td>
                            
                        </tr>
                    @endforeach
            </tbody>
            </table>
            <a class="btn btn-primary" href="{{ url('PDF/pdfmonev') }}" target="_blank"><i class="fa fa-print-o"></i> Cetak Data</a>
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