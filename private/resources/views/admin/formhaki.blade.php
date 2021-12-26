<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form HAKI</h2>
	{{Form::open(array('action' => 'PenelitianController@addhaki')) }}

	{{Form::label ('idkarya', 'Id Karya') }}
	{{Form::text('idkarya', '', array('class' =>'form-control')) }}
	<br>

	{{Form::label ('idprodi', 'Pilih Prodi') }}
		<select name = "idprodi" class = "form-control">
		@foreach ($data as $key => $row)
		<option value="{{$row->idprodi}}" >{{$row->namaProdi}}</option>
		@endforeach
		</select>
		<br>
	
	{{Form::label ('namaKarya', 'Nama Karya') }}
	{{Form::text('namaKarya', '', array('class' =>'form-control')) }}
	<br>

	{{Form::label ('tahun', 'Tahun') }}
	{{Form::text('tahun', '', array('class' =>'form-control')) }}	
	<br>
	
	{{Form::submit ('save', array('class' =>'btn btn-primary')) }}
	<br>
	
{{ Form::close() }} </div>
	
	 
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 