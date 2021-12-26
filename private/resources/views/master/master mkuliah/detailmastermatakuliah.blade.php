<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Detail Master Mata Kuliah</h2>
	{{Form::open(array('action' => 'MastermatakuliahController@detail')) }}

	{{Form::label ('idprodi', 'ID Prodi') }}
	{{Form::text ('idprodi', $data->idprodi, array('class' =>'form-control','disabled')) }}

	{{Form::label ('idkurikulum', 'ID Kurikulum') }}
	{{Form::text ('idkurikulum', $data->idkurikulum, array('class' =>'form-control','disabled')) }}

	{{Form::label ('semester', 'Semester') }}
	{{Form::text ('semester', $data->semester, array('class' =>'form-control','disabled')) }}

	{{Form::label ('idmatakuliah', 'ID Mata Kuliah') }}
	{{Form::text ('idmatakuliah', $data->idmatakuliah, array('class' =>'form-control','disabled')) }}

	{{Form::label ('namaMatakuliah', 'Nama Mata Kuliah') }}
	{{Form::text ('namaMataKuliah', $data->namaMataKuliah, array('class' =>'form-control','disabled')) }}

	{{Form::label ('jenisMatakuliah', 'Jenis Mata Kuliah') }}
	{{Form::text ('jenisMataKuliah', $data->jenisMataKuliah, array('class' =>'form-control','disabled')) }}

	{{Form::label ('jenisMKPilihan', 'Jenis Mata Kuliah Pilihan') }}
	{{Form::select ('jenisMKPilihan',  array('Ya' => 'Ya', 'Tidak' => 'Tidak'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Silabus','disabled')) }}

	{{Form::label ('sks', 'SKS') }}
	{{Form::text ('sks', $data->sks, array('class' =>'form-control','disabled')) }}

	{{Form::label ('sks_inti', 'SKS Inti') }}
	{{Form::text ('sks_inti', $data->sks_inti, array('class' =>'form-control','disabled')) }}

	{{Form::label ('sks_institusi', 'SKS Institusi') }}
	{{Form::text ('sks_institusi', $data->sks_institusi, array('class' =>'form-control','disabled')) }}

	{{Form::label ('deskripsi', 'Deskripsi') }}
	{{Form::textarea ('deskripsi', $data->deskripsi, array('class' =>'form-control','disabled')) }}

	{{Form::label ('bobot_tugas', 'Bobot Tugas') }}
	{{Form::text ('bobot_tugas', $data->bobot_tugas, array('class' =>'form-control','disabled')) }}

	{{Form::label ('silabus', 'Silabus') }}
	{{Form::select ('silabus',  array('Ada' => 'Ada', 'Tidak Ada' => 'Tidak Ada'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Silabus','disabled')) }}

	{{Form::label ('sap', 'SAP') }}
	{{Form::select ('sap',  array('Ada' => 'Ada', 'Tidak Ada' => 'Tidak Ada'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih SAP','disabled')) }}

	{{ Form::label('statusMataKuliah', 'Status Mata Kuliah') }}
 	{{ Form::select('statusMataKuliah', array('Wajib' => 'Wajib', 'Pilihan' => 'Pilihan'), 
 		null, array('class' => 'form-control','placeholder'=>'Pilih Status Mata Kuliah','disabled')) }}

	
	<br>
	{{Form::hidden ('id', $data->id) }}
	
{{ Form::close() }} </div>
	
	  
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 