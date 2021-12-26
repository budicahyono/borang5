<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Detail Master Data Dosen</h2>
	{{Form::open(array('action' => 'MasterdosenController@updatemasterdosen')) }}

	{{Form::label ('idprodi', 'ID Prodi') }}
	{{Form::text ('idprodi', $data->idprodi, array('class' =>'form-control','disabled')) }}
	
	{{Form::label ('nama', 'Nama Dosen') }}
	{{Form::text ('nama', $data->nama, array('class' =>'form-control','disabled')) }}

	{{Form::label ('nidn', 'Nomor Induk Dosen Nasional') }}
	{{Form::text ('nidn', $data->nidn, array('class' =>'form-control','disabled')) }}

	{{Form::label ('alamat', 'Alamat') }}
	{{Form::text ('alamat', $data->alamat, array('class' =>'form-control','disabled')) }}

	{{Form::label ('tempatLahir', 'Tempat Lahir') }}
	{{Form::text ('tempatLahir', $data->tempatLahir, array('class' =>'form-control','disabled')) }}

	{{Form::label ('tanggalLahir', 'Tanggal Lahir') }}
	{{ Form::text('tanggalLahir', $data->tanggalLahir, array('type' => 'text', 'class' => 'form-control datepicker','data-date-format'=>'yyyy/mm/dd',
		'placeholder' => 'Pilih Tanggal Lahir', 'id' => 'calendar','disabled')) }}

	{{ Form::label('jenisKelamin', 'Jenis Kelamin') }}
 	{{ Form::select('jenisKelamin', array('L' => 'Laki - Laki', 'P' => 'Perempuan'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Jenis Kelamin','disabled')) }}
	
	{{ Form::label('statusKerja', 'Status Kerja') }}
 	{{ Form::select('statusKerja', array('Tetap' => 'Tetap', 'Tidak Tetap' => 'Tidak Tetap'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Status Kerja','disabled')) }}

 	{{Form::label ('pendidikanTerakhir', 'Pendidikan Terakhir') }}
	{{Form::text ('pendidikanTerakhir', $data->pendidikanTerakhir, array('class' =>'form-control','disabled')) }}


	{{ Form::label('pangkatTerakhir', 'Pangkat Terakhir') }}
 	{{ Form::select('pangkatTerakhir', array
 		('Penata Muda' => 'Penata Muda', 'TK. 1' => 'Tk. 1','Pembina' => 'Pembina','Pembina Muda' => 'Pembina Muda'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Pangkat Terakhir','disabled')) }}

 	{{ Form::label('fungsionalTerakhir', 'Jabatan Terakhir') }}
 	{{ Form::select('fungsionalTerakhir', array
 		('AA' => 'AA', 'L' => 'L','LK' => 'LK','GB' => 'GB'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Jabatan Terakhir','disabled')) }}

 	{{Form::label ('sesuaiBidangPS', 'Sesuai Bidang Program Studi') }}
	{{Form::text ('sesuaiBidangPS', $data->sesuaiBidangPS, array('class' =>'form-control','disabled')) }}

	{{Form::label ('bidangKeahlian', 'Bidang Keahlian') }}
	{{Form::text ('bidangKeahlian', $data->bidangKeahlian, array('class' =>'form-control','disabled')) }}

	{{Form::label ('sertifikatDosen', 'Sertifikat Dosen') }}
	{{Form::text ('sertifikatDosen', $data->sertifikatDosen, array('class' =>'form-control','disabled')) }}

	<br>
	{{Form::hidden ('id', $data->id) }}
	

{{ Form::close() }} </div>
	
	  
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 