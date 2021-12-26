<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Pustaka</h2>
	{{Form::open(array('action' => 'SaranaprasaranaController@addpustaka')) }}

	{{Form::label ('idprodi', 'Pilih Prodi') }}
		<select name = "idprodi" class = "form-control">
		@foreach ($data as $key => $row)
		<option value="{{$row->idprodi}}" >{{$row->namaProdi}}</option>
		@endforeach
		</select>
		<br>

	{{Form::label ('idjenispustaka', 'Pilih Jenis Pustaka') }}
		<select name = "idjenispustaka" class = "form-control">
		@foreach ($data1 as $key => $row)
		<option value="{{$row->idjenispustaka}}" >{{$row->jenisPustaka}}</option>
		@endforeach
		</select>
		<br>
	
	{{Form::label ('jumlahJudul', 'Jumlah Judul') }}
	{{Form::text('jumlahJudul', '', array('class' =>'form-control')) }}
	<br>

	{{Form::label ('jumlahCopy', 'Jumlah Copy') }}
	{{Form::text('jumlahCopy', '', array('class' =>'form-control')) }}
	<br>
	
	{{Form::submit ('save', array('class' =>'btn btn-primary')) }}
	<br>
	
{{ Form::close() }} </div>

	 
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 