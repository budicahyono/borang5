<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Jurnal</h2>
	{{Form::open(array('action' => 'SaranaprasaranaController@addjurnal')) }}

	{{Form::label ('idprodi', 'Pilih Prodi') }}
		<select name = "idprodi" class = "form-control">
		@foreach ($data as $key => $row)
		<option value="{{$row->idprodi}}" >{{$row->namaProdi}}</option>
		@endforeach
		</select>
		<br>

	{{Form::label ('namaJurnal', 'Nama Jurnal') }}
	{{Form::text('namaJurnal', '', array('class' =>'form-control')) }}
	<br>

	{{Form::label ('tahun', 'Tahun') }}
	{{Form::text('tahun', '', array('class' =>'form-control')) }}
	<br>

	{{Form::label ('nomor', 'Nomor') }}
	{{Form::text('nomor', '', array('class' =>'form-control')) }}
	<br>

	{{Form::label ('jumlah', 'Jumlah') }}
	{{Form::text('jumlah', '', array('class' =>'form-control')) }}
	<br>

	{{Form::label ('akreditasi', 'Akreditasi') }}
	{{Form::select ('akreditasi', array(''=>'','DIKTI' =>'DIKTI','Internasional' => 'Internasional'),
		null, array ('class' =>'form-control','placeholder'=>'Plilih Jenis Akreditasi')) }}
	<br>
	
	{{Form::submit ('save', array('class' =>'btn btn-primary')) }}

{{ Form::close() }} </div>

	 
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 