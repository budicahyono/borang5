<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Master Data Fakultas</h2>
	{{Form::open(array('action' => 'MasterfakultasController@save')) }}

	{{Form::label ('idfakultas', 'ID Fakultas') }}
	{{Form::text ('idfakultas', '', array('class' =>'form-control')) }}

	{{Form::label ('namaFakultas', 'Nama Fakultas') }}
	{{Form::text ('namaFakultas', '', array('class' =>'form-control')) }}
	
	{{Form::label ('singkatan', 'Singkatan') }}
	{{Form::text ('singkatan', '', array('class' =>'form-control')) }}

	
	<br>
	{{Form::hidden('id', '', array('class' =>'form-control')) }}
	{{Form::submit ('Save', array('class' =>'btn btn-primary')) }}

{{ Form::close() }} </div>
	
	  
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 