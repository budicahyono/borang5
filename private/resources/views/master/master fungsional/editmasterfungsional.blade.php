<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Edit Master Fungsional</h2>
	{{Form::open(array('action' => 'MasterfungsionalController@updatemasterfungsional')) }}

	{{Form::label ('namajabatan', 'Nama Jabatan') }}
	{{Form::text ('namajabatan', $data->namaJabatan, array('class' =>'form-control')) }}

	
	<br>
	{{Form::hidden ('idjabatan', $data->idjabatan) }}
	{{Form::submit ('Update', array('class' =>'btn btn-primary')) }}

{{ Form::close() }} </div>
	
	  
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 