<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Edit Pustaka</h2>
	{{Form::open(array('action' => 'SaranaprasaranaController@updatepustaka')) }}

	{{Form::label ('idprodi', 'Pilih Prodi') }}
		<select name = "idprodi" class = "form-control">
		@foreach ($data4 as $key => $row)
		<option value="{{$row->idprodi}}" >{{$row->namaProdi}}</option>
		@endforeach
		</select>
		<br>

	{{Form::label ('idjenispustaka', 'Pilih Jenis Pustaka') }}
		<select name = "idjenispustaka" class = "form-control">
		@foreach ($data5 as $key => $row)
		<option value="{{$row->idjenispustaka}}" >{{$row->jenisPustaka}}</option>
		@endforeach
		</select>
		<br>
	
	{{Form::label ('jumlahJudul', 'Jumlah Judul') }}
	{{Form::text('jumlahJudul',$data3->jumlahJudul, array('class' =>'form-control')) }}
	<br> 
	
	{{Form::label ('jumlahCopy', 'Jumlah Copy') }}
	{{Form::text('jumlahCopy',$data3->jumlahCopy, array('class' =>'form-control')) }}
	<br>
	
	{{Form::hidden ('id',$data3->id) }}
	{{Form::submit ('update', array('class' =>'btn btn-primary')) }}
	<br> 
{{ Form::close() }} </div>
	
	 
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 