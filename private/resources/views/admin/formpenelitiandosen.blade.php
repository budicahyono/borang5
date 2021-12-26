<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Penelitian Dosen</h2>
	{{Form::open(array('action' => 'PenelitianController@addpenelitiandosen')) }}

	{{Form::label ('idprodi', 'Pilih Prodi') }}
		<select name = "idprodi" class = "form-control">
		@foreach ($data as $key => $row)
		<option value="{{$row->idprodi}}" >{{$row->namaProdi}}</option>
		@endforeach
		</select>
		<br>

	{{Form::label ('nip', 'Pilih NIP') }}
		<select name = "nip" class = "form-control">
		@foreach ($data1 as $key => $row)
		<option value="{{$row->nip}}" >{{$row->nip}}</option>
		@endforeach
		</select>
		<br>
	
	{{Form::label ('judul', 'Judul') }}
	{{Form::text('judul', '', array('class' =>'form-control')) }}
	<br>

	{{Form::label ('jurnal', 'Jurnal') }}
	{{Form::text('jurnal', '', array('class' =>'form-control')) }}
	<br>

	{{Form::label ('tahunPublikasi', 'Tahun Publikasi') }}
	{{Form::text('tahunPublikasi', '', array('class' =>'form-control')) }}
	<br>

	{{Form::label ('tingkat', 'Tingkat') }}
	{{Form::select ('tingkat', array(''=>'','Lokal' =>'Lokal','Nasional' => 'Nasional','Internasional' => 'Internasional'),
		null, array ('class' =>'form-control','placeholder'=>'Plilih Jenis Tingkatan')) }}
	<br>
	
	{{Form::submit ('save', array('class' =>'btn btn-primary')) }}
	<br>
{{ Form::close() }} </div>

	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 