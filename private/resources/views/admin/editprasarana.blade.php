<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Edit Prasarana</h2>
	{{Form::open(array('action' => 'SaranaprasaranaController@updateprasarana')) }}

	{{Form::label ('idprodi', 'Pilih Prodi') }}
		<select name = "idprodi" class = "form-control">
		@foreach ($data3 as $key => $row)
		<option value="{{$row->idprodi}}" >{{$row->namaProdi}}</option>
		@endforeach
		</select>
		<br>	

	{{Form::label ('nama', 'Nama') }}
	{{Form::text('nama',$data2->nama, array('class' =>'form-control')) }}
	<br> 
	
	{{Form::label ('jenisPrasarana', 'Jenis Prasarana') }}
	{{Form::select ('jenisPrasarana', array(''=>'','utama' =>'Utama','penunjang' => 'Penunjang'),
		null, array ('class' =>'form-control','placeholder'=>'Plilih Jenis Prasarana')) }}
	<br> 

	{{Form::label ('jumlahUnit', 'Jumlah Unit') }}
	{{Form::text('jumlahUnit',$data2->jumlahUnit, array('class' =>'form-control')) }}
	<br> 

	{{Form::label ('luas', 'Luas') }}
	{{Form::text('luas',$data2->luas, array('class' =>'form-control')) }}
	<br> 

	{{Form::label ('kepemilikan', 'Kepemilikan') }}
	{{Form::select ('kepemilikan', array(''=>'','sendiri' =>'Sendiri','sewa/kontrak/kerjasama' => 'Sewa/Kontrak/Kerjasama'),
		null, array ('class' =>'form-control','placeholder'=>'Plilih Jenis Kepemilikan')) }}
	<br> 

	{{Form::label ('kondisi', 'Kondisi') }}
	{{Form::select ('kondisi', array(''=>'','terawat' =>'Terawat','tidak terawat' => 'Tidak Terawat'),
		null, array ('class' =>'form-control','placeholder'=>'Plilih Jenis Kondisi')) }}
	<br> 

	{{Form::label ('utilisasi', 'Utilisasi') }}
	{{Form::text ('utilisasi',$data2->utilisasi, array('class' =>'form-control')) }}
	<br> 

	{{Form::label ('pengelola', 'Pengelola') }}
	{{Form::text('pengelola',$data2->pengelola, array('class' =>'form-control')) }}
	<br>

	{{Form::hidden ('id',$data2->id) }}
	{{Form::submit ('update', array('class' =>'btn btn-primary')) }}
	<br> 
{{ Form::close() }} </div>

	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 