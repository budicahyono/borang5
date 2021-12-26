<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Master Jenis Pustaka</h2>
	{{Form::open(array('action' => 'MasterjenispustakaController@save')) }}

	{{Form::label ('jenisPustaka', 'Jenis Pustaka') }}
	{{Form::text ('jenisPustaka', '', array('class' =>'form-control')) }}

	<br>
	
	{{Form::submit ('Save', array('class' =>'btn btn-primary')) }}

{{ Form::close() }} </div>
	
	  
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 