<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Master Ketenagapendidikan</h2>
	{{Form::open(array('action' => 'MasterketenagapendidikanController@save')) }}	
	{{Form::label('idfakultas', 'Pilih ID Fakultas') }} 
	<br>
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
  	
	{{Form::label ('nip', 'NIP') }}
	{{Form::text ('nip', '', array('class' =>'form-control')) }}
	<br>
	{{Form::label ('nama', 'Nama') }}
	{{Form::text ('nama', '', array('class' =>'form-control')) }}
	<br>
	{{Form::label ('alamat', 'Alamat') }}
	{{Form::text ('alamat', '', array('class' =>'form-control')) }}
	<br>
	{{Form::label ('tempatLahir', 'Tempat Lahir') }}
	{{Form::text ('tempatLahir', '', array('class' =>'form-control')) }}
	<br>
	{{Form::label ('tanggalLahir', 'Tanggal Lahir') }}
	{{ Form::text('tanggalLahir', '', array('type' => 'text', 'class' => 'form-control datepicker','data-date-format'=>'yyyy/mm/dd',
		'placeholder' => 'Pilih Tanggal Lahir', 'id' => 'calendar')) }}
	<br>
	{{ Form::label('jenisKelamin', 'Jenis Kelamin') }}
 	{{ Form::select('jenisKelamin', array('L' => 'Laki-laki', 'P' => 'Perempuan'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Jenis Kelamin')) }}
	<br>
	{{ Form::label('jenis', 'Jenis') }}
 	{{ Form::select('jenis', array('Pustakawan' => 'Pustakawan', 'Laboran' => 'Laboran', 'Teknisi' => 'Teknisi', 'Operator' => 'Operator',
 		'Programmer' => 'Programmer', 'Analis' => 'Analis', 'Administrasi' => 'Administrasi'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Jenis')) }}
 	<br>
	{{ Form::label('jenjangPendidikanTerakhir', 'Jenjang Pendidikan Terakhir') }}
 	{{ Form::select('jenjangPendidikanTerakhir', array('S3' => 'S3', 'S2' => 'S2', 'S1' => 'S1', 'D4' => 'D4', 'D3' => 'D3', 'D2' => 'D2', 'SMA/SMK' => 'SMA/SMK'), 
 		null, array('class' => 'form-control','placeholder'=>'')) }}

 	<br>
	{{Form::label ('unitKerja', 'Unit Kerja') }}
	{{Form::text ('unitKerja', '', array('class' =>'form-control')) }}
	<br>
	{{Form::submit ('Save', array('class' =>'btn btn-primary')) }}
	{{ Form::close() }} </div>
	
	  
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 