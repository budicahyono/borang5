<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Edit Peralatan LAB</h2>
	{{Form::open(array('action' => 'SaranaprasaranaController@updateperalatanLAB')) }}

	{{Form::label ('idprodi', 'Pilih Prodi') }}
		<select name = "idprodi" class = "form-control">
		@foreach ($data7 as $key => $row)
		<option value="{{$row->idprodi}}" >{{$row->namaProdi}}</option>
		@endforeach
		</select>
		<br>

	{{Form::label ('namaLaboratorium', 'Pilih Laboratorium') }}
		<select name = "namaLaboratorium" class = "form-control">
		@foreach ($data8 as $key => $row)
		<option value="{{$row->namaLaboratorium}}" >{{$row->namaLaboratorium}}</option>
		@endforeach
		</select>
		<br>

	{{Form::label ('idperalatan', 'Id Peralatan') }}
	{{Form::text('idperalatan',$data6->idperalatan, array('class' =>'form-control')) }}
	<br> 
	
	{{Form::label ('namaPeralatan', 'Nama Peralatan') }}
	{{Form::text('namaPeralatan',$data6->namaPeralatan, array('class' =>'form-control')) }}
	<br> 

	{{Form::label ('jumlahUnit', 'Jumlah Unit') }}
	{{Form::text('jumlahUnit',$data6->jumlahUnit, array('class' =>'form-control')) }}
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
	{{Form::text ('utilisasi',$data6->utilisasi, array('class' =>'form-control')) }}
	<br>

	{{Form::hidden ('id',$data6->id) }}
	{{Form::submit ('update', array('class' =>'btn btn-primary')) }}
	<br> 
{{ Form::close() }} </div>

	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 