<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Edit Jurnal</h2>
	{{Form::open(array('action' => 'SaranaprasaranaController@updatejurnal')) }}

	{{Form::label ('idprodi', 'Pilih Prodi') }}
		<select name = "idprodi" class = "form-control">
		@foreach ($data5 as $key => $row)
		<option value="{{$row->idprodi}}" >{{$row->namaProdi}}</option>
		@endforeach
		</select>
		<br>

	{{Form::label ('namaJurnal', 'Nama Jurnal') }}
	{{Form::text('namaJurnal',$data4->namaJurnal, array('class' =>'form-control')) }}
	<br> 

	{{Form::label ('tahun', 'Tahun') }}
	{{Form::text('tahun',$data4->tahun, array('class' =>'form-control')) }}
	<br> 

	{{Form::label ('nomor', 'Nomor') }}
	{{Form::text('nomor',$data4->nomor, array('class' =>'form-control')) }}
	<br> 

	{{Form::label ('jumlah', 'Jumlah') }}
	{{Form::text('jumlah',$data4->jumlah, array('class' =>'form-control')) }}
	<br> 

	{{Form::label ('akreditasi', 'Akreditasi') }}
	{{Form::select ('akreditasi', array(''=>'','DIKTI' =>'DIKTI','Internasional' => 'Internasional'),
		null, array ('class' =>'form-control','placeholder'=>'Plilih Jenis Akreditasi')) }}
	<br>
	
	{{Form::hidden ('id',$data4->id) }}
	{{Form::submit ('update', array('class' =>'btn btn-primary')) }}
	<br> 

{{ Form::close() }} </div>

	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 