<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Edit Ruang Kerja Dosen</h2>
	{{Form::open(array('action' => 'SaranaprasaranaController@update')) }}

	{{Form::label ('idprodi', 'Pilih Prodi') }}
		<select name = "idprodi" class = "form-control">
		@foreach ($data1 as $key => $row)
		<option value="{{$row->idprodi}}" >{{$row->namaProdi}}</option>
		@endforeach
		</select>
		<br>	
	
	{{Form::label ('jenisRuang', 'Jenis Ruang') }}
	{{Form::text('jenisRuang',$data->jenisRuang, array('class' =>'form-control')) }}
	<br> 

	{{Form::label ('jumlahRuang', 'Jumlah Ruang') }}
	{{Form::text('jumlahRuang',$data->jumlahRuang, array('class' =>'form-control')) }}
	<br> 
	
	{{Form::label ('jumlahLuas', 'Jumlah Luas') }}
	{{Form::text('jumlahLuas',$data->jumlahLuas, array('class' =>'form-control')) }}
	<br>

	{{Form::hidden ('id',$data->id) }}
	{{Form::submit ('update', array('class' =>'btn btn-primary')) }}
	<br> 
	
{{ Form::close() }} </div>
	
	 
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 