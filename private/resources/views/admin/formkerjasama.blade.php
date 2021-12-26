<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Kegiatan kerjasama</h2>
	{{Form::open(array('action' => 'KerjasamaController@add')) }}

	{{Form::label ('idprodi', 'Pilih Prodi') }}
		<select name = "idprodi" class = "form-control">
		@foreach ($data as $key => $row)
		<option value="{{$row->idprodi}}" >{{$row->namaProdi}}</option>
		@endforeach
		</select>
		<br>

	{{Form::label ('idinstitusi', 'Pilih Institusi') }}
		<select name = "idinstitusi" class = "form-control">
		@foreach ($data1 as $key => $row)
		<option value="{{$row->idinstitusi}}" >{{$row->namaInstitusi}}</option>
		@endforeach
		</select>
		<br>

	{{Form::label ('jenisKegiatan', 'Jenis Kegiatan') }}
	{{Form::select ('jenisKegiatan', array(''=>'','Penelitian' =>'Penelitian','Pengabdian Kepada Masyarakat' => 'Pengabdian Kepada Masyarakat',''=>'','Beasiswa' =>'Beasiswa'),
		null, array ('class' =>'form-control','placeholder'=>'Plilih Jenis Kegiatan')) }}
	<br>

	{{Form::label ('namaKegiatan', 'Nama kegiatan') }}
	{{Form::text('namaKegiatan', '', array('class' =>'form-control')) }}
	<br>

	{{Form::label ('tahunMulai', 'Tahun Mulai') }}
	{{Form::text('tahunMulai', '', array('class' =>'form-control')) }}
	<br>

	{{Form::label ('tahunSelesai', 'Tahun Selesai') }}
	{{Form::text('tahunSelesai', '', array('class' =>'form-control')) }}
	<br>
	
	{{Form::label ('manfaat', 'Manfaat') }}
	{{Form::text('manfaat', '', array('class' =>'form-control')) }}
	<br>
	
	{{Form::submit ('save', array('class' =>'btn btn-primary')) }}
	<br>
{{ Form::close() }} </div>

	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 