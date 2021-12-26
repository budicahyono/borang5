<?
@extends('layouts.master')
@section('content')
	
	<div class="col-lg-6">
	<h2>Form Edit Dana Penelitian</h2>
	{{Form::open(array('action' => 'PembiayaanController@updatedanapenelitian')) }}

	{{Form::label ('idprodi', 'Pilih Prodi') }}
		<select name = "idprodi" class = "form-control">
		@foreach ($data5 as $key => $row)
		<option value="{{$row->idprodi}}" >{{$row->namaProdi}}</option>
		@endforeach
		</select>
		<br>

	{{Form::label ('nip', 'Pilih NIP') }}
        <select name = "nip" class = "form-control">
        @foreach ($data6 as $key => $row)
        <option value="{{$row->nip}}" >{{$row->nip}}</option>
        @endforeach
        </select>
        <br> 

	{{Form::label ('jenisKegiatan', 'Jenis Kegiatan') }}
	{{Form::select ('jenisKegiatan', array(''=>'','Penelitian' => 'Penelitian','Pengabdian Kepada Masyarakat' => 'Pengabdian Kepada Masyarakat'),
		null, array ('class' =>'form-control','placeholder'=>'Plilih Jenis Penggunaan')) }}
	<br>

	{{Form::label ('judul', 'Judul') }}
	{{Form::text('judul',$data4->judul, array('class' =>'form-control')) }}
	<br>

	{{Form::label ('tahun', 'Tahun') }}
	{{Form::text('tahun',$data4->tahun, array('class' =>'form-control')) }}
	<br>

	{{Form::label ('penulisLainnya', 'Penulis Lainnya') }}
	{{Form::text('penulisLainnya',$data4->penulisLainnya, array('class' =>'form-control')) }}
	<br>

	{{Form::label ('idbiaya', 'Pilih Id Biaya') }}
        <select name = "idbiaya" class = "form-control">
        @foreach ($data7 as $key => $row)
        <option value="{{$row->idbiaya}}" >{{$row->sumberBiaya}}</option>
        @endforeach
        </select>
        <br>

	{{Form::label ('jenisDana', 'Jenis Dana') }}
	{{Form::text('jenisDana',$data4->jenisDana, array('class' =>'form-control')) }}
	<br>

	{{Form::label ('jumlahDana', 'Jumlah Dana') }}
	{{Form::text('jumlahDana',$data4->jumlahDana, array('class' =>'form-control')) }}
	<br>

	{{Form::label ('jumlahMahasiswa', 'jumlah Mahasiswa') }}
	{{Form::text('jumlahMahasiswa',$data4->jumlahMahasiswa, array('class' =>'form-control')) }}
	<br>

	{{Form::label ('jumlahMahasiswaTA', 'Jumlah Mahasiswa TA') }}
	{{Form::text('jumlahMahasiswaTA',$data4->jumlahMahasiswaTA, array('class' =>'form-control')) }}
	<br>

	{{Form::label ('deskripsiPartisipasiMahasiswa', 'Deskripsi Partisipasi Mahasiswa') }}
	{{Form::text('deskripsiPartisipasiMahasiswa',$data4->deskripsiPartisipasiMahasiswa, array('class' =>'form-control')) }}
	<br>

	{{Form::hidden ('id',$data4->id) }}
	{{Form::submit ('update', array('class' =>'btn btn-primary')) }}
	<br>
	
{{ Form::close() }} </div>
	 
	</div>
 </div><!--/#content.span10-->
 </div><!--/fluid-row-->

@stop 