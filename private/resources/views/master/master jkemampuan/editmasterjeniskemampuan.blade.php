<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Edit Master Jenis Kemampuan</h2>
	{{Form::open(array('action' => 'MasterjeniskemampuanController@updatemasterjeniskemampuan')) }}

	{{Form::label ('jenisKemampuan', 'Jenis Kemampuan') }}
	{{Form::text ('jenisKemampuan', $data->jenisKemampuan, array('class' =>'form-control')) }}

	<br>
	{{Form::hidden ('id', $data->id) }}
	{{Form::submit ('Update', array('class' =>'btn btn-primary')) }}

{{ Form::close() }} </div>
	
	  
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 