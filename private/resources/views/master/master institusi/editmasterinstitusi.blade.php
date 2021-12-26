<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Edit Master Institusi</h2>
	{{Form::open(array('action' => 'MasterinstitusiController@updatemasterinstitusi')) }}

	{{Form::label ('namaInstitusi', 'Nama Institusi') }}
	{{Form::text ('namaInstitusi', $data->namaInstitusi, array('class' =>'form-control')) }}

	{{Form::label ('tingkat', 'Tingkat Institusi') }}
	{{Form::text ('tingkat', $data->tingkat, array('class' =>'form-control')) }}

	{{ Form::label('jenis', 'Jenis Institusi') }}
 	{{ Form::select('jenis', array
 		('Dalam Negeri' => 'Dalam Negeri', 'Luar Negeri' => 'Luar Negeri',), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Jenis Institusi')) }}

	<br>
	{{Form::hidden ('idinstitusi', $data->idinstitusi) }}
	{{Form::submit ('Update', array('class' =>'btn btn-primary')) }}

{{ Form::close() }} </div>
	
	  
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 