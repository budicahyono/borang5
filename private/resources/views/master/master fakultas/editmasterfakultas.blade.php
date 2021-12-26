<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Edit Master Data Fakultas</h2>
	{{Form::open(array('action' => 'MasterfakultasController@updatemasterfakultas')) }}

	{{Form::label ('idfakultas', 'ID Fakultas') }}
	{{Form::text ('idfakultas', $data->idfakultas, array('class' =>'form-control')) }}

	{{Form::label ('namaFakultas', 'Nama Fakultas') }}
	{{Form::text ('namaFakultas', $data->namaFakultas, array('class' =>'form-control')) }}
	
	{{Form::label ('singkatan', 'Singkatan') }}
	{{Form::text ('singkatan', $data->singkatan, array('class' =>'form-control')) }}

	
	<br>
	{{Form::hidden ('id', $data->id) }}
	{{Form::submit ('Update', array('class' =>'btn btn-primary')) }}

{{ Form::close() }} </div>
	
	  
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 