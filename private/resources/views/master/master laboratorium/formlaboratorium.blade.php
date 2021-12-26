<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Master Laboratorium</h2>
	{{Form::open(array('action' => 'MasterlaboratoriumController@save')) }}

	{{Form::label('idprodi', 'Pilih Prodi') }} 
  	<select name="idprodi" class="form-control">
	@foreach($data2 as $key => $row)
	<option value="{{$row->idprodi}}">{{$row->namaProdi}}</option> 		
	@endforeach
  	</select>
  	<br>
  	{{Form::label('idfakultas', 'Pilih ID Fakultas') }} 
	<br>
  	<select name="idfakultas" class="form-control">
	@foreach($data3 as $key => $row)
	<option value="{{$row->idfakultas}}">{{$row->namaFakultas}}</option> 		
	@endforeach
  	</select>
  	<br>

	{{Form::label ('idlaboratorium', 'ID Laboratorium') }}
	{{Form::text ('idlaboratorium', '', array('class' =>'form-control')) }}

	{{Form::label ('namaLaboratorium', 'Nama Laboratorium') }}
	{{Form::text ('namaLaboratorium', '', array('class' =>'form-control')) }}

	<br>
	{{Form::hidden('id', '', array('class' =>'form-control')) }}
	{{Form::submit ('Save', array('class' =>'btn btn-primary')) }}

{{ Form::close() }} </div>
	
	  
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 