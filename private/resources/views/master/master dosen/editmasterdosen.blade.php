<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Edit Master Data Dosen</h2>
	{{Form::open(array('action' => 'MasterdosenController@updatemasterdosen')) }}

	{{Form::label('idprodi', 'Pilih Prodi') }} 
  	<select name="idprodi" class="form-control">
	@foreach($data2 as $key => $row)
	<option value="{{$row->idprodi}}">{{$row->namaProdi}}</option> 		
	@endforeach
  	</select>
  	<br>

	{{Form::label ('nip', 'NIP') }}
	{{Form::text ('nip', $data->nip, array('class' =>'form-control')) }}
	
	{{Form::label ('nama', 'Nama Dosen') }}
	{{Form::text ('nama', $data->nama, array('class' =>'form-control')) }}

	{{Form::label ('nidn', 'Nomor Induk Dosen Nasional') }}
	{{Form::text ('nidn', $data->nidn, array('class' =>'form-control')) }}

	{{Form::label ('alamat', 'Alamat') }}
	{{Form::text ('alamat', $data->alamat, array('class' =>'form-control')) }}

	{{Form::label ('tempatLahir', 'Tempat Lahir') }}
	{{Form::text ('tempatLahir', $data->tempatLahir, array('class' =>'form-control')) }}

	{{Form::label ('tanggalLahir', 'Tanggal Lahir') }}
	{{ Form::text('tanggalLahir', $data->tanggalLahir, array('type' => 'text', 'class' => 'form-control datepicker','data-date-format'=>'yyyy/mm/dd',
		'placeholder' => 'Pilih Tanggal Lahir', 'id' => 'calendar')) }}

	{{ Form::label('jenisKelamin', 'Jenis Kelamin') }}
 	{{ Form::select('jenisKelamin', array('L' => 'Laki - Laki', 'P' => 'Perempuan'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Jenis Kelamin')) }}
	
	{{ Form::label('statusKerja', 'Status Kerja') }}
 	{{ Form::select('statusKerja', array('Tetap' => 'Tetap', 'Tidak Tetap' => 'Tidak Tetap'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Status Kerja')) }}

 	{{Form::label ('pendidikanTerakhir', 'Pendidikan Terakhir') }}
	{{Form::text ('pendidikanTerakhir', $data->pendidikanTerakhir, array('class' =>'form-control')) }}


	{{ Form::label('pangkatTerakhir', 'Pangkat Terakhir') }}
 	{{ Form::select('pangkatTerakhir', array
 		('Penata Muda' => 'Penata Muda', 'TK. 1' => 'Tk. 1','Pembina' => 'Pembina','Pembina Muda' => 'Pembina Muda'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Pangkat Terakhir')) }}

 	{{ Form::label('fungsionalTerakhir', 'Jabatan Terakhir') }}
 	{{ Form::select('fungsionalTerakhir', array
 		('AA' => 'AA', 'L' => 'L','LK' => 'LK','GB' => 'GB','TP' => 'TP'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Jabatan Terakhir')) }}

	{{Form::label ('sesuaiBidangPS', 'Sesuai Bidang Program Studi : ') }} <br>
	{{Form::label ('Iya', 'Iya    ') }}
	{{Form::radio ('sesuaiBidangPS', 'Ya', true) }} <br>
	{{Form::label ('Yidak', 'Tidak ') }}
	{{Form::radio ('sesuaiBidangPS', 'Tidak') }} <br>

	{{Form::label ('bidangKeahlian', 'Bidang Keahlian') }}
	{{Form::text ('bidangKeahlian', $data->bidangKeahlian, array('class' =>'form-control')) }}

	{{Form::label ('sertifikatDosen', 'Sertifikat Dosen : ') }} <br>
	{{Form::label ('Ya', 'Ya    ') }}
	{{Form::radio ('sertifikatDosen', 'Ya', true) }} <br>
	{{Form::label ('Yidak', 'Tidak ') }}
	{{Form::radio ('sertifikatDosen', 'Tidak') }} <br>

	<br>
	{{Form::hidden ('id', $data->id) }}
	{{Form::submit ('Update', array('class' =>'btn btn-primary')) }}

{{ Form::close() }} </div>
	
	  
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 