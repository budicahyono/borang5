<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Data Detail Dana Penelitian</h2>
	{{Form::open(array('action' => 'PembiayaanController@detaildanapenelitian')) }}

	{{Form::label ('idprodi', 'Pilih Prodi') }}
	{{Form::text('idprodi',$data4->idprodi, array('class' =>'form-control','disabled')) }}

	{{Form::label ('nip', 'Pilih NIP') }}
	{{Form::text('nip',$data4->nip, array('class' =>'form-control','disabled')) }}
      
	{{Form::label ('jenisKegiatan', 'Jenis Kegiatan') }}
	{{Form::text ('jenisKegiatan',$data4->jenisKegiatan, array('class' =>'form-control','placeholder'=>'Plilih Jenis Penggunaan','disabled')) }}
	<br>

	{{Form::label ('judul', 'Judul') }}
	{{Form::text('judul',$data4->judul, array('class' =>'form-control','disabled')) }}
	<br>

	{{Form::label ('tahun', 'Tahun') }}
	{{Form::text('tahun',$data4->tahun, array('class' =>'form-control','disabled')) }}
	<br>

	{{Form::label ('penulisLainnya', 'Penulis Lainnya') }}
	{{Form::text('penulisLainnya',$data4->penulisLainnya, array('class' =>'form-control','disabled')) }}
	<br>

	{{Form::label ('idbiaya', 'Pilih Id Biaya') }}
    {{Form::text('idbiaya',$data4->idbiaya, array('class' =>'form-control','disabled')) }}   

	{{Form::label ('jenisDana', 'Jenis Dana') }}
	{{Form::text('jenisDana',$data4->jenisDana, array('class' =>'form-control','disabled')) }}
	<br>

	{{Form::label ('jumlahDana', 'Jumlah Dana') }}
	{{Form::text('jumlahDana',$data4->jumlahDana, array('class' =>'form-control','disabled')) }}
	<br>

	{{Form::label ('jumlahMahasiswa', 'jumlah Mahasiswa') }}
	{{Form::text('jumlahMahasiswa',$data4->jumlahMahasiswa, array('class' =>'form-control','disabled')) }}
	<br>

	{{Form::label ('jumlahMahasiswaTA', 'Jumlah Mahasiswa TA') }}
	{{Form::text('jumlahMahasiswaTA',$data4->jumlahMahasiswaTA, array('class' =>'form-control','disabled')) }}
	<br>

	{{Form::label ('deskripsiPartisipasiMahasiswa', 'Deskripsi Partisipasi Mahasiswa') }}
	{{Form::text('deskripsiPartisipasiMahasiswa',$data4->deskripsiPartisipasiMahasiswa, array('class' =>'form-control','disabled')) }}
	<br>

	{{Form::hidden ('id',$data4->id) }}
	<br>
	
{{ Form::close() }} </div>
	 
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 