<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Edit Master Jenis Pustaka</h2>
	{{Form::open(array('action' => 'MasterjenispustakaController@updatemasterjenispustaka')) }}

	{{Form::label ('jenisPustaka', 'Jenis Pustaka') }}
	{{Form::text ('jenisPustaka', $data->jenisPustaka, array('class' =>'form-control')) }}

	<br>
	{{Form::hidden ('idjenispustaka', $data->idjenispustaka) }}
	{{Form::submit ('Update', array('class' =>'btn btn-primary')) }}

{{ Form::close() }} </div>
	
	  
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 