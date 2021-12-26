<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Edit Aksesibilitas</h2>
	{{Form::open(array('action' => 'SisteminformasiController@updateaksesibilitasdata')) }}

	{{Form::label ('idprodi', 'Pilih Prodi') }}
		<select name = "idprodi" class = "form-control">
		@foreach ($data3 as $key => $row)
		<option value="{{$row->idprodi}}" >{{$row->namaProdi}}</option>
		@endforeach
		</select>
		<br>	
	
	{{Form::label ('jenisData', 'Jenis Data') }}
	{{Form::select ('jenisData', array(''=>'','mahasiswa' =>'Mahasiswa','kartu rencana study (KRS)' => 'Kartu Rencana Study (KRS)','Jadwal Mata Kuliah' => 'Jadwal Mata Kuliah','Nilai Mata Kuliah' => 'Niali Mata Kuliah','Transkip Akademik' => 'Transkip Akademik','Lulusan' => 'Lulusan','Dosen' => 'Dosen','Pegawai' => 'Pegawai','Keuangan' => 'Keuangan','Inventaris' => 'Inventaris','Perpustakaan' => 'Perpustakaan'),
		null, array ('class' =>'form-control','placeholder'=>'Plilih Jenis Penggunaan')) }}
	<br>

	{{Form::label ('sistemPengelolaanData', 'Sistem Pengelolaan Data') }}
	{{Form::select ('sistemPengelolaanData', array(''=>'','Manual' =>'Manual','Komputer NonLAN' => 'Komputer NonLAN','Komputer LAN' => 'Komputer LAN','Komputer WAN' => 'Komputer WAN'),
		null, array ('class' =>'form-control','placeholder'=>'Plilih Sistem Pengelolaan Data')) }}
	<br>

	{{Form::hidden ('id',$data2->id) }}
	{{Form::submit ('update', array('class' =>'btn btn-primary')) }}
	<br>

	{{ Form::close() }} </div>

	 
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 