<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Edit Master Ketenagapendidikan</h2>
	{{Form::open(array('action' => 'MasterketenagapendidikanController@updatemastertenaga')) }}

	
	{{Form::label('idfakultas', 'Pilih ID Fakultas') }} 
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
	<select name="nip" class="form-control">
	@foreach($data1 as $key => $row)
	<option value="{{$row->nip}}">{{$row->nip}}</option> 		
	@endforeach
  	</select>

	{{Form::label ('nama', 'Nama') }}
	<select name="nama" class="form-control">
	@foreach($data1 as $key => $row)
	<option value="{{$row->nama}}">{{$row->nama}}</option> 		
	@endforeach
  	</select>

	{{Form::label ('alamat', 'Alamat') }}
	{{Form::text ('alamat', $data->alamat, array('class' =>'form-control')) }}

	{{Form::label ('tempatLahir', 'Tempat Lahir') }}
	{{Form::text ('tempatLahir', $data->tempatLahir, array('class' =>'form-control')) }}

	{{Form::label ('tanggalLahir', 'Tanggal Lahir') }}
	{{ Form::text('tanggalLahir', $data->tanggalLahir, array('type' => 'text', 'class' => 'form-control datepicker','data-date-format'=>'yyyy/mm/dd',
		'placeholder' => 'Pilih Tanggal Lahir', 'id' => 'calendar')) }}

	{{ Form::label('jenisKelamin', 'Jenis Kelamin') }}
 	{{ Form::select('jenisKelamin', array('L' => 'Laki-laki', 'P' => 'Perempuan'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Jenis Kelamin')) }}
	
	{{ Form::label('jenis', 'Jenis') }}
 	{{ Form::select('jenis', array('Pustakawan' => 'Pustakawan', 'Laboran' => 'Laboran', 'Teknisi' => 'Teknisi', 'Operator' => 'Operator',
 		'Programmer' => 'Programmer', 'Analis' => 'Analis', 'Administrasi' => 'Administrasi'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Jenis')) }}
	

	{{ Form::label('jenjangPendidikanTerakhir', 'Jenjang Pendidikan Terakhir') }}
 	{{ Form::select('jenjangPendidikanTerakhir', array('S3' => 'S3', 'S2' => 'S2', 'S1' => 'S1', 'D4' => 'D4', 'D3' => 'D3', 'D2' => 'D2', 'SMA/SMK' => 'SMA/SMK'), 
 		null, array('class' => 'form-control','placeholder'=>'')) }}
 	
	{{Form::label ('unitKerja', 'Unit Kerja') }}
	{{Form::text ('unitKerja', $data->unitKerja, array('class' =>'form-control')) }}
	<br>
	{{Form::hidden ('id', $data->id) }}
	{{Form::submit ('Update', array('class' =>'btn btn-primary')) }}

{{ Form::close() }} </div>
	
	  
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 