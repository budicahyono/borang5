<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Ruang Kerja Dosen</h2>
	{{Form::open(array('action' => 'SaranaprasaranaController@add')) }}

	{{Form::label ('idprodi', 'Pilih Prodi') }}
		<select name = "idprodi" class = "form-control">
		@foreach ($data as $key => $row)
		<option value="{{$row->idprodi}}" >{{$row->namaProdi}}</option>
		@endforeach
		</select>
		<br>	
	
	{{Form::label ('jenisRuang', 'Jenis Ruang') }}
	{{Form::text('jenisRuang', '', array('class' =>'form-control')) }}
	<br>

	{{Form::label ('jumlahRuang', 'Jumlah Ruang') }}
	{{Form::text('jumlahRuang', '', array('class' =>'form-control')) }}
	<br>

	{{Form::label ('jumlahLuas', 'Jumlah Luas') }}
	{{Form::text('jumlahLuas', '', array('class' =>'form-control')) }}
	<br>
	
	{{Form::submit ('save', array('class' =>'btn btn-primary')) }}
	<br>
	
{{ Form::close() }} </div>

	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 