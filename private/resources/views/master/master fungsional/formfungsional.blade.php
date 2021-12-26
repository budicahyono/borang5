<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Master Fungsional</h2>
	{{Form::open(array('action' => 'MasterfungsionalController@save')) }}

	{{Form::label ('namajabatan', 'Nama Jabatan') }}
	{{Form::text ('namajabatan', '', array('class' =>'form-control')) }}

	
	<br>
	
	{{Form::submit ('Save', array('class' =>'btn btn-primary')) }}

{{ Form::close() }} </div>
	
	  
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 