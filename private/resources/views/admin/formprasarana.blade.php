<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Prasarana</h2>
	{{Form::open(array('action' => 'SaranaprasaranaController@addprasarana')) }}

	{{Form::label ('idprodi', 'Pilih Prodi') }}
		<select name = "idprodi" class = "form-control">
		@foreach ($data as $key => $row)
		<option value="{{$row->idprodi}}" >{{$row->namaProdi}}</option>
		@endforeach
		</select>
		<br>	

	{{Form::label ('nama', 'Nama') }}
	{{Form::text('nama', '', array('class' =>'form-control')) }}
	<br>

	{{Form::label ('jenisPrasarana', 'Jenis Prasarana') }}
	{{Form::select ('jenisPrasarana', array(''=>'','utama' =>'Utama','penunjang' => 'Penunjang'),
		null, array ('class' =>'form-control','placeholder'=>'Plilih Jenis Prasarana')) }}
	<br>

	{{Form::label ('jumlahUnit', 'Jumlah Unit') }}
	{{Form::text('jumlahUnit', '', array('class' =>'form-control')) }}
	<br>

	{{Form::label ('luas', 'Luas') }}
	{{Form::text('luas', '', array('class' =>'form-control')) }}
	<br>

	{{Form::label ('kepemilikan', 'Kepemilikan') }}
	{{Form::select ('kepemilikan', array(''=>'','sendiri' =>'SD','sw' => 'SW'),
		null, array ('class' =>'form-control','placeholder'=>'Plilih Jenis Kepemilikan')) }}
	<br>

	{{Form::label ('kondisi', 'Kondisi') }}
	{{Form::select ('kondisi', array(''=>'','terawat' =>'Terawat','tidak terawat' => 'Tidak Terawat'),
		null, array ('class' =>'form-control','placeholder'=>'Plilih Jenis Kondisi')) }}
	<br>

	{{Form::label ('utilisasi', 'Utilisasi') }}
	{{Form::text('utilisasi', '', array('class' =>'form-control')) }}
	<br>

	{{Form::label ('pengelola', 'Pengelola') }}
	{{Form::text('pengelola', '', array('class' =>'form-control')) }}
	<br>

	
	{{Form::submit ('save', array('class' =>'btn btn-primary')) }}
	<br>
{{ Form::close() }} </div>

	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 