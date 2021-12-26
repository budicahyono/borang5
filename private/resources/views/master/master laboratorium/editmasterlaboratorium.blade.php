<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Edit Master Laboratorium</h2>
	{{Form::open(array('action' => 'MasterlaboratoriumController@updatemasterlaboratorium')) }}
	<br>

	{{Form::label('idfakultas', 'Pilih ID Fakultas') }} 
  	<select name="idfakultas" class="form-control">
	@foreach($data3 as $key => $row)
	<option value="{{$row->idfakultas}}">{{$row->namaFakultas}}</option> 		
	@endforeach
  	</select>
  	<br>

	{{Form::label('idprodi', 'Pilih Prodi') }} 
  	<select name="idprodi" class="form-control">
	@foreach($data2 as $key => $row)
	<option value="{{$row->idprodi}}">{{$row->namaProdi}}</option> 		
	@endforeach
  	</select>
  	<br>

	{{Form::label ('idlaboratorium', 'ID Laboratorium') }}
	{{Form::text ('idlaboratorium', $data->idlaboratorium, array('class' =>'form-control')) }}

	{{Form::label ('namaLaboratorium', 'Nama Laboratorium') }}
	{{Form::text ('namaLaboratorium', $data->namaLaboratorium, array('class' =>'form-control')) }}

	<br>
	
	{{Form::hidden ('id', $data->id) }}
	{{Form::submit ('Update', array('class' =>'btn btn-primary')) }}

{{ Form::close() }} </div>
	
	  
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 