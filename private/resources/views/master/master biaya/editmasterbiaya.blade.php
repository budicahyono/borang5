<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Edit Master Biaya Penelitian</h2>
	{{Form::open(array('action' => 'MasterbiayaController@updatemasterbiaya')) }}


	{{Form::label ('sumberBiaya', 'Sumber Biaya Penelitian') }}
	{{Form::text ('sumberBiaya', $data->sumberBiaya, array('class' =>'form-control')) }}
	

	
	<br>
	{{Form::hidden ('idbiaya', $data->idbiaya) }}
	{{Form::submit ('Update', array('class' =>'btn btn-primary')) }}

{{ Form::close() }} </div>
	
	  
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 