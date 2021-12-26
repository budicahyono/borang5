<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Master Mahasiswa</h2>
	{{Form::open(array('action' => 'MastermahasiswaController@save')) }}

	{{Form::label ('nim', 'NIM') }}
	{{Form::text ('nim', '', array('class' =>'form-control')) }}

	{{Form::label ('namaMahasiswa', 'Nama Mahasiswa') }}
	{{Form::text ('namaMahasiswa', '', array('class' =>'form-control')) }}

	{{ Form::label('jenisKelamin', 'Jenis Kelamin') }}
 	{{ Form::select('jenisKelamin', array('L' => 'Laki - Laki', 'P' => 'Perempuan'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Jenis Kelamin')) }}

	{{Form::label ('alamat', 'Alamat') }}
	{{Form::text ('alamat', '', array('class' =>'form-control')) }}

	{{Form::label ('angkatan', 'Angkatan') }}
	{{Form::text ('angkatan', '', array('class' =>'form-control')) }}

	{{Form::label ('status', 'Status') }}
	{{Form::select('status', array('A' => 'Aktif', 'TA' => 'Tidak Aktif'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Status Aktif Mahasiswa')) }}

	{{Form::label ('statusReguler', 'Status Reguler') }}
	{{Form::select('statusReguler', array('1' => 'Reguler', '0' => 'Non-Reguler'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Status Aktif Mahasiswa')) }}

	{{Form::label('idprodi', 'Pilih Prodi') }} 
  	<select name="idprodi" class="form-control">
	@foreach($data2 as $key => $row)
	<option value="{{$row->idprodi}}">{{$row->namaProdi}}</option> 		
	@endforeach
  	</select>
  	<br>

	<br>
	{{Form::hidden('id', '', array('class' =>'form-control')) }}
	{{Form::submit ('Save', array('class' =>'btn btn-primary')) }}

{{ Form::close() }} </div>
	
	  
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 