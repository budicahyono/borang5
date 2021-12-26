<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Sistem Informasi</h2>
	{{Form::open(array('action' => 'SisteminformasiController@add')) }}

	{{Form::label ('idprodi', 'Pilih Prodi') }}
		<select name = "idprodi" class = "form-control">
		@foreach ($data as $key => $row)
		<option value="{{$row->idprodi}}" >{{$row->namaProdi}}</option>
		@endforeach
		</select>
		<br>
	
	{{Form::label ('deskripsi', 'Deskripsi') }}
	{{Form::textarea('deskripsi', '', array('class' =>'form-control')) }}
	<br>
	
	{{Form::submit ('save', array('class' =>'btn btn-primary')) }}
	<br>
	
{{ Form::close() }} </div>

	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 