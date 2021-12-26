<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Penelitian</h2>
	{{Form::open(array('action' => 'PenelitianController@add')) }}

	{{Form::label ('idprodi', 'Pilih Prodi') }}
		<select name = "idprodi" class = "form-control">
		@foreach ($data as $key => $row)
		<option value="{{$row->idprodi}}" >{{$row->namaProdi}}</option>
		@endforeach
		</select>
		<br>

	{{Form::label ('idbiaya', 'Pilih ID Biaya') }}
		<select name = "idbiaya" class = "form-control">
		@foreach ($data1 as $key => $row)
		<option value="{{$row->idbiaya}}" >{{$row->sumberBiaya}}</option>
		@endforeach
		</select>
		<br>

	{{Form::label ('tahun', 'Tahun') }}
	{{Form::text('tahun', '', array('class' =>'form-control')) }}
	<br>

	{{Form::label ('jumlah', 'Jumlah') }}
	{{Form::text('jumlah', '', array('class' =>'form-control')) }}
	<br>

	{{Form::label ('jenisKegiatan', 'jenis Kegiatan') }}
	{{Form::select ('jenisKegiatan', array(''=>'','Penelitian' =>'Penelitian','Pengabdian Kepada Masyarakat' => 'Pengabdian Kepada Masyarakat'),
		null, array ('class' =>'form-control','placeholder'=>'Plilih Jenis Kegiatan')) }}
	<br>
	
	{{Form::submit ('save', array('class' =>'btn btn-primary')) }}

{{ Form::close() }} </div>
	
	 
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 