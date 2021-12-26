<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Edit Master Kurikulum</h2>
	{{Form::open(array('action' => 'MasterkurikulumController@updatemasterkurikulum')) }}

	{{Form::label('idprodi', 'Pilih Prodi') }} 
  	<select name="idprodi" class="form-control">
	@foreach($data2 as $key => $row)
	<option value="{{$row->idprodi}}">{{$row->namaProdi}}</option> 		
	@endforeach
  	</select>
  	<br>

	{{Form::label ('idkurikulum', 'ID Kurikulum') }}
	{{Form::text ('idkurikulum', $data->idkurikulum, array('class' =>'form-control')) }}

	{{Form::label ('deskripsi', 'Deskripsi') }}
	{{Form::textarea ('deskripsi', $data->deskripsi, array('class' =>'form-control')) }}

	<br>
	{{Form::hidden ('id', $data->id) }}
	{{Form::submit ('Update', array('class' =>'btn btn-primary')) }}

{{ Form::close() }} </div>
	
	  
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 