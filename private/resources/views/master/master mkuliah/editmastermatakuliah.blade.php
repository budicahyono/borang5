<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Edit Master Mata Kuliah</h2>
	{{Form::open(array('action' => 'MastermatakuliahController@updatemastermatakuliah')) }}

	{{Form::label('idprodi', 'Pilih Prodi') }} 
  	<select name="idprodi" class="form-control">
	@foreach($data1 as $key => $row)
	<option value="{{$row->idprodi}}">{{$row->namaProdi}}</option> 		
	@endforeach
  	</select>
  	<br>

	{{Form::label('idkurikulum', 'Pilih ID Kurikulum') }} 
 	 <select name="idkurikulum" class="form-control">
	@foreach($data2 as $key => $row)
	<option value="{{$row->idkurikulum}}">{{$row->idprodi}}</option> 		
	@endforeach
 	 </select>
 	 <br>

	{{Form::label ('semester', 'Semester') }}
	{{Form::select ('semester',  array('I' => 'I', 'II' => 'II', 'III' => 'III', 'IV' => 'IV', 'V' => 'V', 'VI' => 'VI', 'VII' => 'VII', 'VIII' => 'VIII'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Semester')) }}

	{{Form::label ('idmatakuliah', 'ID Mata Kuliah') }}
	{{Form::text ('idmatakuliah', $data->idmatakuliah, array('class' =>'form-control')) }}

	{{Form::label ('namaMatakuliah', 'Nama Mata Kuliah') }}
	{{Form::text ('namaMataKuliah', $data->namaMataKuliah, array('class' =>'form-control')) }}

	{{Form::label ('jenisMatakuliah', 'Jenis Mata Kuliah') }}
	{{Form::text ('jenisMataKuliah', $data->jenisMataKuliah, array('class' =>'form-control')) }}

	{{Form::label ('jenisMKPilihan', 'Jenis Mata Kuliah Pilihan') }}
	{{Form::select ('jenisMKPilihan',  array('Ya' => 'Ya', 'Tidak' => 'Tidak'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Silabus')) }}

	{{Form::label ('sks', 'SKS') }}
	{{Form::text ('sks', $data->sks, array('class' =>'form-control')) }}

	{{Form::label ('sks_inti', 'SKS Inti') }}
	{{Form::text ('sks_inti', $data->sks_inti, array('class' =>'form-control')) }}

	{{Form::label ('sks_institusi', 'SKS Institusi') }}
	{{Form::text ('sks_institusi', $data->sks_institusi, array('class' =>'form-control')) }}

	{{Form::label ('deskripsi', 'Deskripsi') }}
	{{Form::textarea ('deskripsi', $data->deskripsi, array('class' =>'form-control')) }}

	{{Form::label ('bobot_tugas', 'Bobot Tugas') }}
	{{Form::select ('bobot_tugas',  array('Ada' => 'Ada', 'Tidak Ada' => 'Tidak Ada'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Bobot Tugas')) }}

	{{Form::label ('silabus', 'Silabus') }}
	{{Form::select ('silabus',  array('Ada' => 'Ada', 'Tidak Ada' => 'Tidak Ada'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Silabus')) }}

	{{Form::label ('sap', 'SAP') }}
	{{Form::select ('sap',  array('Ada' => 'Ada', 'Tidak Ada' => 'Tidak Ada'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Silabus')) }}

	{{ Form::label('statusMataKuliah', 'Status Mata Kuliah') }}
 	{{ Form::select('statusMataKuliah', array('Mata Kuliah Wajib' => 'Mata Kuliah Wajib', 'Mata Kuliah Pilihan' => 'Mata Kuliah Pilihan'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Status Mata Kuliah')) }}

	

	<br>
	{{Form::hidden ('id', $data->id) }}
	{{Form::submit ('Update', array('class' =>'btn btn-primary')) }}

{{ Form::close() }} </div>
	
	  
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 