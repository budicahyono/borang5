<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Sumber Pustaka</h2>
	{{Form::open(array('action' => 'SaranaprasaranaController@addsumberpustaka')) }}

	{{Form::label ('idprodi', 'Pilih Prodi') }}
		<select name = "idprodi" class = "form-control">
		@foreach ($data as $key => $row)
		<option value="{{$row->idprodi}}" >{{$row->namaProdi}}</option>
		@endforeach
		</select>
		<br>

	{{Form::label ('sumberpustaka', 'Sumber Pustaka') }}
	<p align='justify'> Sebutkan sumber-sumber pustaka di lembaga lain (lembaga perpustakaan/ sumber dari internet berserta alamat website) yang bisa di akses/dimanfaatkan oleh dosen dan mahasiswa PS </p>
	{{Form::textarea('sumberpustaka', '', array('class' =>'form-control')) }}
	<br>
	
	{{Form::submit ('save', array('class' =>'btn btn-primary')) }}
	<br>
	
{{ Form::close() }} </div>

	 
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 