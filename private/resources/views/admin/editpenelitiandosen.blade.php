<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Edit Penelitian Dosen</h2>
	{{Form::open(array('action' => 'PenelitianController@updatepenelitiandosen')) }}

	{{Form::label ('idprodi', 'Pilih Prodi') }}
		<select name = "idprodi" class = "form-control">
		@foreach ($data4 as $key => $row)
		<option value="{{$row->idprodi}}" >{{$row->namaProdi}}</option>
		@endforeach
		</select>
		<br>

	{{Form::label ('nip', 'Pilih NIP') }}
		<select name = "nip" class = "form-control">
		@foreach ($data5 as $key => $row)
		<option value="{{$row->nip}}" >{{$row->nip}}</option>
		@endforeach
		</select>
		<br>
	
	{{Form::label ('judul', 'Judul') }}
	{{Form::text('judul',$data3->judul, array('class' =>'form-control')) }}
	<br> 

	{{Form::label ('jurnal', 'Jurnal') }}
	{{Form::text('jurnal',$data3->jurnal, array('class' =>'form-control')) }}
	<br> 

	{{Form::label ('tahunPublikasi', 'Tahun Publikasi') }}
	{{Form::text('tahunPublikasi',$data3->tahunPublikasi, array('class' =>'form-control')) }}
	<br> 

	{{Form::label ('tingkat', 'Tingkat') }}
	{{Form::select ('tingkat', array(''=>'','Lokal' =>'Lokal','Nasional' => 'Nasional','Internasional' => 'Internasional'),
		null, array ('class' =>'form-control','placeholder'=>'Plilih Jenis Tingkatan')) }}
	<br>
	
	{{Form::hidden ('id',$data3->id) }}
	{{Form::submit ('update', array('class' =>'btn btn-primary')) }}
	<br> 
{{ Form::close() }} </div>

	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 