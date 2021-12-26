<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Master Biaya Penelitian</h2>
	{{Form::open(array('action' => 'MasterbiayaController@save')) }}

	{{Form::label ('sumberBiaya', 'Sumber Biaya Penelitian') }}
	{{Form::text ('sumberBiaya', '', array('class' =>'form-control')) }}
	
	
	<br>
	
	{{Form::submit ('Save', array('class' =>'btn btn-primary')) }}

{{ Form::close() }} </div>
	
	  
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 