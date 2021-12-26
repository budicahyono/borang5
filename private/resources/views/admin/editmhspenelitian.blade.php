<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Edit Penelitian Mahasiswa</h2>
	{{Form::open(array('action' => 'PenelitianController@updatemhspenelitian')) }}

	{{Form::label ('idprodi', 'Pilih Prodi') }}
		<select name = "idprodi" class = "form-control">
		@foreach ($data3 as $key => $row)
		<option value="{{$row->idprodi}}" >{{$row->namaProdi}}</option>
		@endforeach
		</select>
		<br>

	{{Form::label ('jumlahMahasiswa', 'Jumlah Mahasiswa') }}
	{{Form::text('jumlahMahasiswa',$data2->jumlahMahasiswa, array('class' =>'form-control')) }}
	<br> 

	{{Form::label ('jumlahMahasiswaTA', 'Jumlah Mahasiswa TA') }}
	{{Form::text('jumlahMahasiswaTA',$data2->jumlahMahasiswaTA, array('class' =>'form-control')) }}
	<br> 

	{{Form::label ('jenisKegiatan', 'jenisKegiatan') }}
	{{Form::select ('jenisKegiatan', array(''=>'','Penelitian' =>'Penelitian','Pengabdian Kepada Masyarakat' => 'Pengabdian Kepada Masyarakat'),
		null, array ('class' =>'form-control','placeholder'=>'Plilih Jenis Kegiatan')) }}
	<br>
	
	{{Form::hidden ('id',$data2->id) }}
	{{Form::submit ('update', array('class' =>'btn btn-primary')) }}
	<br> 
{{ Form::close() }} </div>

	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 