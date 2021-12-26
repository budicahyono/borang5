<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Master Institusi</h2>
	{{Form::open(array('action' => 'MasterinstitusiController@save')) }}

	{{Form::label ('namaInstitusi', 'Nama Institusi') }}
	{{Form::text ('namaInstitusi', '', array('class' =>'form-control')) }}

	{{Form::label ('tingkat', 'Tingkat Institusi') }}
	{{Form::text ('tingkat', '', array('class' =>'form-control')) }}

	{{ Form::label('jenis', 'Jenis Institusi') }}
 	{{ Form::select('jenis', array
 		('Dalam Negeri' => 'Dalam Negeri', 'Luar Negeri' => 'Luar Negeri',), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Jenis Institusi')) }}

	<br>
	
	{{Form::submit ('Save', array('class' =>'btn btn-primary')) }}

{{ Form::close() }} </div>
	
	  
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 