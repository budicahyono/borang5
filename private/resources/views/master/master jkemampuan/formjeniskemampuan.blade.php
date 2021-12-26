<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Master Jenis Kemampuan</h2>
	{{Form::open(array('action' => 'MasterjeniskemampuanController@save')) }}

	{{Form::label ('jenisKemampuan', 'Jenis Kemampuan') }}
	{{Form::text ('jenisKemampuan', '', array('class' =>'form-control')) }}

	<br>
	
	{{Form::hidden('id', '', array('class' =>'form-control')) }}
	{{Form::submit ('Save', array('class' =>'btn btn-primary')) }}

{{ Form::close() }} </div>
	
	  
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 