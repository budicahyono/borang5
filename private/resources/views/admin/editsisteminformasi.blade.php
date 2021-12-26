<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Edit Sistem Informasi</h2>
	{{Form::open(array('action' => 'SisteminformasiController@update')) }}

	{{Form::label ('idprodi', 'Pilih Prodi') }}
		<select name = "idprodi" class = "form-control">
		@foreach ($data1 as $key => $row)
		<option value="{{$row->idprodi}}" >{{$row->namaProdi}}</option>
		@endforeach
		</select>
		<br>	
	
	{{Form::label ('deskripsi', 'Deskripsi') }}
	{{Form::textarea('deskripsi',$data->deskripsi, array('class' =>'form-control')) }}
	<br>
	
	{{Form::hidden ('id',$data->id) }}
	{{Form::submit ('update', array('class' =>'btn btn-primary')) }}
	<br> 
{{ Form::close() }} </div>
	
	 
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 