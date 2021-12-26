
@extends('layouts.master')
@section('content')

<div class="col-lg-12">
	<h2>Standar IV. Sumber Daya Manusia </h2><br><br>
	<ul class="nav nav-tabs">
		<li><a href="kegiatandosen">Kegiatan Dosen</a></li>
		<li><a href="aktivitasmengajar">Aktivitas Mengajar</a></li>
		<li><a href="kegiatantenagaahli">Kegiatan Tenaga Ahli</a></li>
		<li><a href="tugasbelajar">Tugas Belajar</a></li>
		<li><a href="prestasidosen">Prestasi Dosen</a></li>
		<li><a href="organisasiprofesi">Organisasi Profesi</a></li>
		<li><a href="pendidikandosen" >Pendidikan Dosen</a></li>
		<li><a href="upayatenagakependidikan">Upaya Peningkatan Tenaga Kependidikan</a></li>
	</ul>
	<br>


	@if(Session::get('level')=='')
	<div class="tab-content">
		<div class="tab-pane<?php if(isset($aktif)) echo $aktif ;?>" id="kegiatandosen" name="kegiatandosen">
			<br>
			<div class="alert alert-info">
				<strong>Kegiatan Dosen</strong><br/>
				Berikut merupakan data kegiatan dosen pada setiap Program Studi :
			</div>
			<br>
			<br>

			<!--button tambah nya dimasukkan disini di area div id kegiatandosen -->
			<table class="table  table-bordered data" >
				<thead>
					<th><p class="text-center">No</p></th>
					<th width="50px"><p class="text-center">ID Prodi</p></th>
					<th width="50px"><p class="text-center">Tahun</p></th>
					<th width="50px"><p class="text-center">NIP</p></th>
					<th width="200px"><p class="text-center">Nama Dosen</p></th>
					<th width="200px"><p class="text-center">Jenis Kegiatan</p></th>
					<th width="200px"><p class="text-center">Nama Kegiatan</p></th>
					<th width="100px"><p class="text-center">Tempat</p></th>
					<th width="100px"><p class="text-center">Waktu</p></th>
					<th width="100px"><p class="text-center">Sebagai</p></th>
				</thead>
				<tbody class="text-center">
					<?php $no=1; ?>
					@foreach($data as $key => $value)
					<tr>
						<td align="center">{{$no++}}</td>
						<td align="center">{{$value->idprodi}}</td>
						<td align="center">{{$value->Tahun}}</td>
						<td align="center">{{$value->nip}}</td>
						<td>{{$value->namaDosen}}</td>
						<td>{{$value->jenisKegiatan}}</td>
						<td>{{$value->namaKegiatan}}</td>
						<td>{{$value->tempat}}</td>
						<td align="center">{{$value->waktu}}</td>
						<td align="center">{{$value->sebagai}}</td>
						
					</tr>
					@endforeach
				</tbody>
			</table>
			<br>

		</div>
		@endif


		@if(Session::get('level')=='admin')
		<div class="tab-content">
			<div class="tab-pane<?php if(isset($aktif)) echo $aktif ;?>" id="kegiatandosen" name="kegiatandosen">
				<br>
				<div class="alert alert-info">
					<strong>Kegiatan Dosen</strong><br/>
					Isi kegiatan dosen yang bidang keahliannya sesuai dengan Program Studi dalam kegiatan :<br>
					* Seminar Ilmiah<br>
					* Lokakarya<br>
					* Penataran<br>
					* Workshop<br>
					* Pagelaran<br>
					* Pameran<br>
					* Peragaan<br>
					Dimana kegiatan tersebut tidak hanya melibatkan dosen Perguruan Tinggi sendiri.
				</div>
				<br>
				<br>

				<!--button tambah nya dimasukkan disini di area div id kegiatandosen -->
				<table class="table  table-bordered data" >
					<thead>
						<th><p class="text-center">No</p></th>
						<th width="50px"><p class="text-center">ID Prodi</p></th>
						<th width="50px"><p class="text-center">Tahun</p></th>
						<th width="50px"><p class="text-center">NIP</p></th>
						<th width="200px"><p class="text-center">Nama Dosen</p></th>
						<th width="200px"><p class="text-center">Jenis Kegiatan</p></th>
						<th width="200px"><p class="text-center">Nama Kegiatan</p></th>
						<th width="100px"><p class="text-center">Tempat</p></th>
						<th width="100px"><p class="text-center">Waktu</p></th>
						<th width="100px"><p class="text-center">Sebagai</p></th>
						<th width="100px"><p class="text-center">Action</p></th>

					</thead>
					<tbody class="text-center">
						<?php $no=1; ?>
						@foreach($data as $key => $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td align="center">{{$value->idprodi}}</td>
							<td align="center">{{$value->Tahun}}</td>
							<td align="center">{{$value->nip}}</td>
							<td>{{$value->namaDosen}}</td>
							<td>{{$value->jenisKegiatan}}</td>
							<td>{{$value->namaKegiatan}}</td>
							<td>{{$value->tempat}}</td>
							<td align="center">{{$value->waktu}}</td>
							<td align="center">{{$value->sebagai}}</td>
							<td align="center"><a href="editdosen/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="dosen/delete/{{$value->id}}"class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
				<br>
				
				<a href="adddatadosen"><button type="button" class='btn btn-primary'><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
				

			</div>
			@endif


			@if(Session::get('level')=='user')
			<div class="tab-content">
				<div class="tab-pane<?php if(isset($aktif)) echo $aktif ;?>" id="kegiatandosen" name="kegiatandosen">
					<br>
					<div class="alert alert-info">
						<strong>Kegiatan Dosen</strong><br/>
						Isi kegiatan dosen yang berada pada Program Studi dalam kegiatan :<br>
						* Seminar Ilmiah<br>
						* Lokakarya<br>
						* Penataran<br>
						* Workshop<br>
						* Pagelaran<br>
						* Pameran<br>
						* Peragaan<br>
						Dimana kegiatan tersebut tidak hanya melibatkan dosen Perguruan Tinggi sendiri.
					</div>
					<br>
					<br>

					<!--button tambah nya dimasukkan disini di area div id kegiatandosen -->
					<table class="table  table-bordered data" >
						<thead>
							<th><p class="text-center">No</p></th>
							<th width="50px"><p class="text-center">Tahun</p></th>
							<th width="50px"><p class="text-center">NIP</p></th>
							<th width="200px"><p class="text-center">Nama Dosen</p></th>
							<th width="200px"><p class="text-center">Jenis Kegiatan</p></th>
							<th width="200px"><p class="text-center">Nama Kegiatan</p></th>
							<th width="100px"><p class="text-center">Tempat</p></th>
							<th width="100px"><p class="text-center">Waktu</p></th>
							<th width="100px"><p class="text-center">Sebagai</p></th>
							<th width="100px"><p class="text-center">Action</p></th>

						</thead>
						<tbody class="text-center">
							<?php $no=1; ?>
							@foreach($data as $key => $value)
							<tr>
								<td align="center">{{$no++}}</td>
								<td align="center">{{$value->Tahun}}</td>
								<td align="center">{{$value->nip}}</td>
								<td>{{$value->namaDosen}}</td>
								<td>{{$value->jenisKegiatan}}</td>
								<td>{{$value->namaKegiatan}}</td>
								<td>{{$value->tempat}}</td>
								<td align="center">{{$value->waktu}}</td>
								<td align="center">{{$value->sebagai}}</td>
								<td align="center"><a href="editdosen/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="dosen/delete/{{$value->id}}"class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<br>
					
					<a href="adddatadosen"><button type="button" class='btn btn-primary'><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
					

				</div>
				@endif


				@if(Session::get('level')=='')
				<div class="tab-pane <?php if(isset($ok)) echo $ok ;?>" id= "aktivitasmengajar" name="aktivitasmengajar">
					<br>

					<div class="alert alert-info">
						<strong>Aktivitas Mengajar</strong><br/>
						Berikut merupakan data aktivitas mengajar dosen dalam Program Studi dengan mengikuti format tabel berikut :
					</div><br>
					<!--button tambah nya dimasukkan disini di area div id kegiatandosen -->

					<table class="table  table-bordered data" >
						<thead>
							<th><p class="text-center">No</p></th>
							<th width="50px"><p class="text-center">ID Prodi</p></th>
							<th width="100px"><p class="text-center">NIP</p></th>
							<th width="100px"><p class="text-center">Tahun Akademik</p></th>
							<th width="100px"><p class="text-center">Id Mata Kuliah</p></th>
							<th width="300px"><p class="text-center">Nama Mata Kuliah</p></th>
							<th width="100px"><p class="text-center">Jumlah Kelas</p></th>
							<th width="100px"><p class="text-center">Jumlah Rencana Pertemuan</p></th>
							<th width="100px"><p class="text-center">Jumlah Realisasi Pertemuan</p></th>
						</thead>
						<tbody class="text-center">
							<?php $no=1; ?>
							@foreach($data2 as $key => $value)
							<tr>

								<td align="center">{{$no++}}</td>
								<td align="center">{{$value->idprodi}}</td>
								<td align="center">{{$value->nip}}</td>
								<td align="center">{{$value->tahunAkademik}}</td>
								<td align="center">{{$value->idmatakuliah}}</td>
								<td>{{$value->namaMataKuliah}}</td>
								<td align="center">{{$value->jumlahKelas}}</td>
								<td align="center">{{$value->jumlahRencanaPertemuan}}</td>
								<td align="center">{{$value->jumlahRealisasiPertemuan}}</td>

							</tr>
							@endforeach
						</tbody>
					</table>
					<br>
					<br>
					<br>
					<div class="alert alert-info">
						Berikut aktivitas mengajar dosen yang dinyatakan dalam sks :
					</div><br>
					<!--button tambah nya dimasukkan disini di area div id kegiatandosen -->

					<table class="table  table-bordered data" >
						<thead>
							<th rowspan="3"><p class="text-center">No</p></th>
							<th rowspan="3" width="50px"><p class="text-center">ID Prodi</p></th>
							<th rowspan="3" width="100px"><p class="text-center">Tahun Akademik</p></th>
							<th rowspan="3" width="100px"><p class="text-center">NIP</p></th>
							<th colspan="3" style="border:1px"><p class="text-center">SKS Pengajaran Pada</p></th>
							<th rowspan="3" width="100px"><p class="text-center">SKS Penelitian</p></th>
							<th rowspan="3" width="100px"><p class="text-center">SKS Pengabdian Kepada Masyarakat</p></th>
							<th colspan="2" style="border:1px"><p class="text-center">SKS Manajemen</p></th>
							
						</thead>

						<thead>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th width="100px"><p class="text-center">PS Sendiri</p></th>
							<th width="100px"><p class="text-center">PS Lain PT Sendiri</p></th>
							<th width="100px"><p class="text-center">PT Lain</p></th>
							<th></th>
							<th></th>
							<th width="100px"><p class="text-center">PS Sendiri</p></th>
							<th width="100px"><p class="text-center">PT Lain</p></th>
							
						</thead>
						<tbody class="text-center">
							<?php $no=1; ?>
							@foreach($data9 as $key => $value)
							<tr>

								<td align="center">{{$no++}}</td>
								<td align="center">{{$value->idprodi}}</td>
								<td align="center">{{$value->tahunAkademik}}</td>
								<td align="center">{{$value->nip}}</td>
								<td align="center">{{$value->sks_PSsendiri}}</td>
								<td align="center">{{$value->sks_PSLainPTsendiri}}</td>
								<td align="center">{{$value->sks_PTLain}}</td>
								<td align="center">{{$value->sks_penelitian}}</td>
								<td align="center">{{$value->sks_Pengabdian}}</td>
								<td align="center">{{$value->sks_PtSendiri}}</td>
								<td align="center">{{$value->sksPTlain}}</td>

							</tr>
							@endforeach
						</tbody>
					</table>
					<br>
					<br>
				</div>
				@endif


				@if(Session::get('level')=='admin')
				<div class="tab-pane <?php if(isset($ok)) echo $ok ;?>" id= "aktivitasmengajar" name="aktivitasmengajar">
					<br>

					<div class="alert alert-info">
						<strong>Aktivitas Mengajar</strong><br/>
						Masukan data aktivitas mengajar dosen dalam Program Studi dengan mengikuti format tabel berikut :
					</div><br>
					<!--button tambah nya dimasukkan disini di area div id kegiatandosen -->

					<table class="table  table-bordered data" >
						<thead>
							<th><p class="text-center">No</p></th>
							<th width="50px"><p class="text-center">ID Prodi</p></th>
							<th width="100px"><p class="text-center">NIP</p></th>
							<th width="100px"><p class="text-center">Tahun Akademik</p></th>
							<th width="100px"><p class="text-center">Id Mata Kuliah</p></th>
							<th width="300px"><p class="text-center">Nama Mata Kuliah</p></th>
							<th width="100px"><p class="text-center">Jumlah Kelas</p></th>
							<th width="100px"><p class="text-center">Jumlah Rencana Pertemuan</p></th>
							<th width="100px"><p class="text-center">Jumlah Realisasi Pertemuan</p></th>
							<th width="100px"><p class="text-center">Action</p></th>
						</thead>
						<tbody class="text-center">
							<?php $no=1; ?>
							@foreach($data2 as $key => $value)
							<tr>

								<td align="center">{{$no++}}</td>
								<td align="center">{{$value->idprodi}}</td>
								<td align="center">{{$value->nip}}</td>
								<td align="center">{{$value->tahunAkademik}}</td>
								<td align="center">{{$value->idmatakuliah}}</td>
								<td>{{$value->namaMataKuliah}}</td>
								<td align="center">{{$value->jumlahKelas}}</td>
								<td align="center">{{$value->jumlahRencanaPertemuan}}</td>
								<td align="center">{{$value->jumlahRealisasiPertemuan}}</td>

								<td align="center"><a href="editaktivitasmengajar/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="aktivitasmengajar/delete/{{$value->id}}" class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<br>
					<a href="addaktivitasmengajar"><button type="button" class='btn btn-primary'><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
					<br>
					<br>
					<br>
					<div class="alert alert-info">
						Masukan aktivitas mengajar dosen yang dinyatakan dalam sks :
					</div><br>
					<!--button tambah nya dimasukkan disini di area div id kegiatandosen -->

					<table class="table  table-bordered data" >
						<thead>
							<th rowspan="3"><p class="text-center">No</p></th>
							<th rowspan="3" width="50px"><p class="text-center">ID Prodi</p></th>
							<th rowspan="3" width="100px"><p class="text-center">Tahun Akademik</p></th>
							<th rowspan="3" width="100px"><p class="text-center">NIP</p></th>
							<th colspan="3" style="border:1px"><p class="text-center">SKS Pengajaran Pada</p></th>
							<th rowspan="3" width="100px"><p class="text-center">SKS Penelitian</p></th>
							<th rowspan="3" width="100px"><p class="text-center">SKS Pengabdian Kepada Masyarakat</p></th>
							<th colspan="2" style="border:1px"><p class="text-center">SKS Manajemen</p></th>
							<th rowspan="3" width="100px"><p class="text-center">Action</p></th>
						</thead>

						<thead>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th width="100px"><p class="text-center">PS Sendiri</p></th>
							<th width="100px"><p class="text-center">PS Lain PT Sendiri</p></th>
							<th width="100px"><p class="text-center">PT Lain</p></th>
							<th></th>
							<th></th>
							<th width="100px"><p class="text-center">PS Sendiri</p></th>
							<th width="100px"><p class="text-center">PT Lain</p></th>
							<th></th>
						</thead>
						<tbody class="text-center">
							<?php $no=1; ?>
							@foreach($data9 as $key => $value)
							<tr>

								<td align="center">{{$no++}}</td>
								<td align="center">{{$value->idprodi}}</td>
								<td align="center">{{$value->tahunAkademik}}</td>
								<td align="center">{{$value->nip}}</td>
								<td align="center">{{$value->sks_PSsendiri}}</td>
								<td align="center">{{$value->sks_PSLainPTsendiri}}</td>
								<td align="center">{{$value->sks_PTLain}}</td>
								<td align="center">{{$value->sks_penelitian}}</td>
								<td align="center">{{$value->sks_Pengabdian}}</td>
								<td align="center">{{$value->sks_PtSendiri}}</td>
								<td align="center">{{$value->sksPTlain}}</td>
								<td align="center"><a href="editaktivitasmengajar1/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="aktivitasmengajar1/delete/{{$value->id}}" class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<a href="addaktivitasmengajar1"><button type="button" class='btn btn-primary'><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
					<br>
					<br>

				</div>
				@endif


				@if(Session::get('level')=='user')
				<div class="tab-pane <?php if(isset($ok)) echo $ok ;?>" id= "aktivitasmengajar" name="aktivitasmengajar">
					<br>

					<div class="alert alert-info">
						<strong>Aktivitas Mengajar</strong><br/>
						Masukan data aktivitas mengajar dosen dalam Program Studi dengan mengikuti format tabel berikut :
					</div><br>
					<!--button tambah nya dimasukkan disini di area div id kegiatandosen -->

					<table class="table  table-bordered data" >
						<thead>
							<th><p class="text-center">No</p></th>
							<th width="100px"><p class="text-center">NIP</p></th>
							<th width="100px"><p class="text-center">Tahun Akademik</p></th>
							<th width="100px"><p class="text-center">Id Mata Kuliah</p></th>
							<th width="300px"><p class="text-center">Nama Mata Kuliah</p></th>
							<th width="100px"><p class="text-center">Jumlah Kelas</p></th>
							<th width="100px"><p class="text-center">Jumlah Rencana Pertemuan</p></th>
							<th width="100px"><p class="text-center">Jumlah Realisasi Pertemuan</p></th>
							<th width="100px"><p class="text-center">Action</p></th>
						</thead>
						<tbody class="text-center">
							<?php $no=1; ?>
							@foreach($data2 as $key => $value)
							<tr>

								<td align="center">{{$no++}}</td>
								<td align="center">{{$value->nip}}</td>
								<td align="center">{{$value->tahunAkademik}}</td>
								<td align="center">{{$value->idmatakuliah}}</td>
								<td>{{$value->namaMataKuliah}}</td>
								<td align="center">{{$value->jumlahKelas}}</td>
								<td align="center">{{$value->jumlahRencanaPertemuan}}</td>
								<td align="center">{{$value->jumlahRealisasiPertemuan}}</td>
								<td align="center"><a href="editaktivitasmengajar/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="aktivitasmengajar/delete/{{$value->id}}" class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<br>
					<a href="addaktivitasmengajar"><button type="button" class='btn btn-primary'><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
					<br>
					<br>
					<br>
					<div class="alert alert-info">
						Masukan aktivitas mengajar dosen yang dinyatakan dalam sks :
					</div><br>
					<!--button tambah nya dimasukkan disini di area div id kegiatandosen -->

					<table class="table  table-bordered data" >
						<thead>
							<th rowspan="3"><p class="text-center">No</p></th>
							<th rowspan="3" width="100px"><p class="text-center">Tahun Akademik</p></th>
							<th rowspan="3" width="100px"><p class="text-center">NIP</p></th>
							<th colspan="3" style="border:1px"><p class="text-center">SKS Pengajaran Pada</p></th>
							<th rowspan="3" width="100px"><p class="text-center">SKS Penelitian</p></th>
							<th rowspan="3" width="100px"><p class="text-center">SKS Pengabdian Kepada Masyarakat</p></th>
							<th colspan="2" style="border:1px"><p class="text-center">SKS Manajemen</p></th>
							<th rowspan="3"width="100px"><p class="text-center">Action</p></th>
						</thead>

						<thead>
							<th></th>
							<th></th>
							<th></th>
							<th width="100px"><p class="text-center">PS Sendiri</p></th>
							<th width="100px"><p class="text-center">PS Lain PT Sendiri</p></th>
							<th width="100px"><p class="text-center">PT Lain</p></th>
							<th></th>
							<th></th>
							<th width="100px"><p class="text-center">PS Sendiri</p></th>
							<th width="100px"><p class="text-center">PT Lain</p></th>
							<th></th>
						</thead>
						<tbody class="text-center">
							<?php $no=1; ?>
							@foreach($data9 as $key => $value)
							<tr>

								<td align="center">{{$no++}}</td>
								<td align="center">{{$value->tahunAkademik}}</td>
								<td align="center">{{$value->nip}}</td>
								<td align="center">{{$value->sks_PSsendiri}}</td>
								<td align="center">{{$value->sks_PSLainPTsendiri}}</td>
								<td align="center">{{$value->sks_PTLain}}</td>
								<td align="center">{{$value->sks_penelitian}}</td>
								<td align="center">{{$value->sks_Pengabdian}}</td>
								<td align="center">{{$value->sks_PtSendiri}}</td>
								<td align="center">{{$value->sksPTlain}}</td>
								<td align="center"><a href="editaktivitasmengajar1/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="aktivitasmengajar1/delete/{{$value->id}}" class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<a href="addaktivitasmengajar1"><button type="button" class='btn btn-primary'><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
					<br>
					<br>
				</div>
				@endif



				@if(Session::get('level')=='')
				<div class="tab-pane <?php if(isset($ak)) echo $ak ;?>" id="kegiatantenagaahli" name="kegiatantenagaahli">
					<br>
					<div class="alert alert-info">
						<strong>Kegiatan Tenaga Ahli</strong><br/>
						Berikut merupakan kegiatan tenaga ahli/pakar sebagai pembicara dalam seminar/pelatihan, pembicara tamu, dsb, dari luar Perguruan Tinggi sendiri.
					</div><br>
					
					<table class="table  table-bordered data" >
						<thead>
							<th width="50px"><p class="text-center">No</p></th>
							<th width="100px"><p class="text-center">ID Prodi</p></th>
							<th width="100px"><p class="text-center">Tahun</p></th>
							<th width="200px"><p class="text-center">Nama Tenaga Ahli</p></th>
							<th width="200px"><p class="text-center">Nama Kegiatan</p></th>
							<th width="100px"><p class="text-center">Waktu</p></th>
						</thead>
						<tbody class="text-center">
							<?php $no=1; ?>
							@foreach($data3 as $value)
							<tr>
								<td align="center">{{$no++}}</td>
								<td align="center">{{$value->idprodi}}</td>
								<td align="center">{{$value->Tahun}}</td>
								<td>{{$value->namaTenagaAhli}}</td>
								<td>{{$value->namaKegiatan}}</td>
								<td align="center">{{$value->waktu}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<br>
				</div>
				@endif


				@if(Session::get('level')=='admin')
				<div class="tab-pane <?php if(isset($ak)) echo $ak ;?>" id="kegiatantenagaahli" name="kegiatantenagaahli">
					<br>
					<div class="alert alert-info">
						<strong>Kegiatan Tenaga Ahli</strong><br/>
						Masukan kegiatan tenaga ahli/pakar sebagai pembicara dalam seminar/pelatihan, pembicara tamu, dsb, dari luar Perguruan Tinggi sendiri.
					</div><br>
					
					<table class="table  table-bordered data" >
						<thead>
							<th width="50px"><p class="text-center">No</p></th>
							<th width="100px"><p class="text-center">ID Prodi</p></th>
							<th width="100px"><p class="text-center">Tahun</p></th>
							<th width="200px"><p class="text-center">Nama Tenaga Ahli</p></th>
							<th width="200px"><p class="text-center">Nama Kegiatan</p></th>
							<th width="100px"><p class="text-center">Waktu</p></th>
							<th width="100px"><p class="text-center">Action</p></th>

						</thead>
						<tbody class="text-center">
							<?php $no=1; ?>
							@foreach($data3 as $value)
							<tr>
								<td align="center">{{$no++}}</td>
								<td align="center">{{$value->idprodi}}</td>
								<td align="center">{{$value->Tahun}}</td>
								<td>{{$value->namaTenagaAhli}}</td>
								<td>{{$value->namaKegiatan}}</td>
								<td align="center">{{$value->waktu}}</td>
								<td align="center"><a href="editkegiatantenagaahli/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="kegiatantenagaahli/delete/{{$value->id}}" class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<br>
					<a href="addkegiatantenagaahli"><button type="button" class='btn btn-primary'><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
				</div>
				@endif


				@if(Session::get('level')=='user')

				<div class="tab-pane <?php if(isset($ak)) echo $ak ;?>" id="kegiatantenagaahli" name="kegiatantenagaahli">
					<br>
					<div class="alert alert-info">
						<strong>Kegiatan Tenaga Ahli</strong><br/>
						Masukan kegiatan tenaga ahli/pakar sebagai pembicara dalam seminar/pelatihan, pembicara tamu, dsb, dari luar Perguruan Tinggi sendiri.
					</div><br>
					
					<table class="table  table-bordered data" >
						<thead>
							<th width="50px"><p class="text-center">No</p></th>
							<th width="100px"><p class="text-center">Tahun</p></th>
							<th width="200px"><p class="text-center">Nama Tenaga Ahli</p></th>
							<th width="200px"><p class="text-center">Nama Kegiatan</p></th>
							<th width="100px"><p class="text-center">Waktu</p></th>
							<th width="100px"><p class="text-center">Action</p></th>

						</thead>
						<tbody class="text-center">
							<?php $no=1; ?>
							@foreach($data3 as $value)
							<tr>
								<td align="center">{{$no++}}</td>
								<td align="center">{{$value->Tahun}}</td>
								<td>{{$value->namaTenagaAhli}}</td>
								<td>{{$value->namaKegiatan}}</td>
								<td align="center">{{$value->waktu}}</td>
								<td align="center"><a href="editkegiatantenagaahli/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="kegiatantenagaahli/delete/{{$value->id}}" class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></a></td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<br>
					<a href="addkegiatantenagaahli"><button type="button" class='btn btn-primary'><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
				</div>
				@endif



				@if(Session::get('level')=='')
				<div class="tab-pane <?php if(isset($ac)) echo $ac ;?>" id="tugasbelajar" name="tugasbelajar">
					<br>
					<div class="alert alert-info">
						<strong>Tugas Belajar</strong><br/>
						Berikut merupakan data peningkatan kemampuan dosen melalui program tugas belajar dalam bidang yang sesuai dengan bidang Program Studi.
					</div><br>
					
					<table class="table  table-bordered data" >
						<thead>
							<th><p class="text-center">No</th>
							<th width="100px"><p class="text-center">ID Prodi</p></th>
							<th width="100px"><p class="text-center">Tahun</p></th>
							<th width="100px"><p class="text-center">NIP</p></th>
							<th width="100px"><p class="text-center">Jenjang</p></th>
							<th width="200px"><p class="text-center">Bidang Studi</p></th>
							<th width="200px"><p class="text-center">Perguruan Tinggi</p></th>
							<th width="200px"><p class="text-center">Negara</p></th>
							<th width="100px"><p class="text-center">Tahun Mulai</p></th>

						</thead>
						<tbody class="text-center">
							<?php $no=1; ?>
							@foreach($data4 as $key => $value)
							<tr>
								<td align="center">{{$no++}}</td>
								<td align="center">{{$value->idprodi}}</td>
								<td align="center">{{$value->Tahun}}
									<td align="center">{{$value->nip}}</td>
									<td align="center">{{$value->jenjang}}</td>
									<td>{{$value->bidangStudi}}</td>
									<td>{{$value->perguruanTinggi}}</td>
									<td>{{$value->negara}}</td>
									<td align="center">{{$value->tahunMulai}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<br>
					</div>
					@endif




					@if(Session::get('level')=='admin')
					<div class="tab-pane <?php if(isset($ac)) echo $ac ;?>" id="tugasbelajar" name="tugasbelajar">
						<br>
						<div class="alert alert-info">
							<strong>Tugas Belajar</strong><br/>
							Masukan data peningkatan kemampuan dosen melalui program tugas belajar dalam bidang yang sesuai dengan bidang Program Studi.
						</div><br>
						
						<table class="table  table-bordered data" >
							<thead>
								<th><p class="text-center">No</th>
								<th width="100px"><p class="text-center">ID Prodi</p></th>
								<th width="100px"><p class="text-center">Tahun</p></th>
								<th width="100px"><p class="text-center">NIP</p></th>
								<th width="100px"><p class="text-center">Jenjang</p></th>
								<th width="200px"><p class="text-center">Bidang Studi</p></th>
								<th width="200px"><p class="text-center">Perguruan Tinggi</p></th>
								<th width="200px"><p class="text-center">Negara</p></th>
								<th width="100px"><p class="text-center">Tahun Mulai</p></th>
								<th width="100px"><p class="text-center">Action</p></th>

							</thead>
							<tbody class="text-center">
								<?php $no=1; ?>
								@foreach($data4 as $key => $value)
								<tr>
									<td align="center">{{$no++}}</td>
									<td align="center">{{$value->idprodi}}</td>
									<td align="center">{{$value->Tahun}}
										<td align="center">{{$value->nip}}</td>
										<td align="center">{{$value->jenjang}}</td>
										<td>{{$value->bidangStudi}}</td>
										<td>{{$value->perguruanTinggi}}</td>
										<td>{{$value->negara}}</td>
										<td align="center">{{$value->tahunMulai}}</td>
										<td align="center"><a href="edittugasbelajar/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="tugasbelajar/delete/{{$value->id}}" class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></a></td>
									</tr>
									@endforeach
								</tbody>
							</table>
							<br>
							<a href="addtugasbelajar"><button type="button" class='btn btn-primary'><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
						</div>
						@endif


						@if(Session::get('level')=='user')
						<div class="tab-pane <?php if(isset($ac)) echo $ac ;?>" id="tugasbelajar" name="tugasbelajar">
							<br>
							<div class="alert alert-info">
								<strong>Tugas Belajar</strong><br/>
								Masukan data peningkatan kemampuan dosen melalui program tugas belajar dalam bidang yang sesuai dengan bidang Program Studi.
							</div><br>
							
							<table class="table  table-bordered data" >
								<thead>
									<th><p class="text-center">No</th>
									<th width="100px"><p class="text-center">Tahun</p></th>
									<th width="100px"><p class="text-center">NIP</p></th>
									<th width="100px"><p class="text-center">Jenjang</p></th>
									<th width="200px"><p class="text-center">Bidang Studi</p></th>
									<th width="200px"><p class="text-center">Perguruan Tinggi</p></th>
									<th width="200px"><p class="text-center">Negara</p></th>
									<th width="100px"><p class="text-center">Tahun Mulai</p></th>
									<th width="100px"><p class="text-center">Action</p></th>

								</thead>
								<tbody class="text-center">
									<?php $no=1; ?>
									@foreach($data4 as $key => $value)
									<tr>
										<td align="center">{{$no++}}</td>
										<td align="center">{{$value->Tahun}}
											<td align="center">{{$value->nip}}</td>
											<td align="center">{{$value->jenjang}}</td>
											<td>{{$value->bidangStudi}}</td>
											<td>{{$value->perguruanTinggi}}</td>
											<td>{{$value->negara}}</td>
											<td align="center">{{$value->tahunMulai}}</td>
											<td align="center"><a href="edittugasbelajar/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="tugasbelajar/delete/{{$value->id}}" class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></a></td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<br>
								<a href="addtugasbelajar"><button type="button" class='btn btn-primary'><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
							</div>
							@endif


							@if(Session::get('level')=='')
							<div class="tab-pane <?php if(isset($at)) echo $at ;?>" id="prestasidosen" name="prestasidosen">
								<br>
								<div class="alert alert-info">
									<strong>Prestasi Dosen</strong><br/>
									Berikut merupakan data pencapaian prestasi/reputasi dosen (misalnya prestasi dalam pendidikan, penelitian dan pelayanan/pengabdian kepada masyarakat).
								</div><br>
								
								<table class="table  table-bordered data" >
									<thead>
										<th width="50px"><p class="text-center">No</p></th>
										<th width="100px"><p class="text-center">ID Prodi</p></th>
										<th width="100px"><p class="text-center">Tahun</p></th>
										<th width="100px"><p class="text-center">NIP</p></th>
										<th width="200px"><p class="text-center">Prestasi</p></th>
										<th width="100px"><p class="text-center">Waktu</p></th>
										<th width="200px"><p class="text-center">Tingkat</p></th>

									</thead>
									<tbody class="text-center">
										<?php $no=1; ?>
										@foreach($data5 as $key => $value)
										<tr>
											<td align="center">{{$no++}}</td>
											<td align="center">{{$value->idprodi}}</td>
											<td align="center">{{$value->Tahun}}</td>
											<td align="center">{{$value->nip}}</td>
											<td>{{$value->prestasi}}</td>
											<td align="center">{{$value->waktu}}</td>
											<td>{{$value->tingkat}}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<br>
								
							</div>
							@endif


							@if(Session::get('level')=='admin')
							<div class="tab-pane <?php if(isset($at)) echo $at ;?>" id="prestasidosen" name="prestasidosen">
								<br>
								<div class="alert alert-info">
									<strong>Prestasi Dosen</strong><br/>
									Masukan pencapaian prestasi/reputasi dosen (misalnya prestasi dalam pendidikan, penelitian dan pelayanan/pengabdian kepada masyarakat).
								</div><br>
								
								<table class="table  table-bordered data" >
									<thead>
										<th width="50px"><p class="text-center">No</p></th>
										<th width="100px"><p class="text-center">ID Prodi</p></th>
										<th width="100px"><p class="text-center">Tahun</p></th>
										<th width="100px"><p class="text-center">NIP</p></th>
										<th width="200px"><p class="text-center">Prestasi</p></th>
										<th width="100px"><p class="text-center">Waktu</p></th>
										<th width="200px"><p class="text-center">Tingkat</p></th>
										<th width="100px"><p class="text-center">Action</p></th>


									</thead>
									<tbody class="text-center">
										<?php $no=1; ?>
										@foreach($data5 as $key => $value)
										<tr>
											<td align="center">{{$no++}}</td>
											<td align="center">{{$value->idprodi}}</td>
											<td align="center">{{$value->Tahun}}</td>
											<td align="center">{{$value->nip}}</td>
											<td>{{$value->prestasi}}</td>
											<td align="center">{{$value->waktu}}</td>
											<td>{{$value->tingkat}}</td>
											<td align="center"><a href="editprestasidosen/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="prestasidosen/delete/{{$value->id}}" class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></a></td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<br>
								<a href="addprestasidosen"><button type="button" class='btn btn-primary'><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
							</div>
							@endif


							@if(Session::get('level')=='user')
							<div class="tab-pane <?php if(isset($at)) echo $at ;?>" id="prestasidosen" name="prestasidosen">
								<br>
								<div class="alert alert-info">
									<strong>Prestasi Dosen</strong><br/>
									Masukan pencapaian prestasi/reputasi dosen (misalnya prestasi dalam pendidikan, penelitian dan pelayanan/pengabdian kepada masyarakat).
								</div><br>
								
								<table class="table  table-bordered data" >
									<thead>
										<th width="50px"><p class="text-center">No</p></th>
										<th width="100px"><p class="text-center">Tahun</p></th>
										<th width="100px"><p class="text-center">NIP</p></th>
										<th width="200px"><p class="text-center">Prestasi</p></th>
										<th width="100px"><p class="text-center">Waktu</p></th>
										<th width="200px"><p class="text-center">Tingkat</p></th>
										<th width="100px"><p class="text-center">Action</p></th>

									</thead>
									<tbody class="text-center">
										<?php $no=1; ?>
										@foreach($data5 as $key => $value)
										<tr>
											<td align="center">{{$no++}}</td>
											<td align="center">{{$value->Tahun}}</td>
											<td align="center">{{$value->nip}}</td>
											<td>{{$value->prestasi}}</td>
											<td align="center">{{$value->waktu}}</td>
											<td>{{$value->tingkat}}</td>
											<td align="center"><a href="editprestasidosen/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="prestasidosen/delete/{{$value->id}}" class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></a></td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<br>
								<a href="addprestasidosen"><button type="button" class='btn btn-primary'><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
							</div>
							@endif


							@if(Session::get('level')=='')
							<div class="tab-pane<?php if(isset($ai)) echo $ai ;?>" id="organisasiprofesi" name="organisasiprofesi">
								<br>
								<div class="alert alert-info">
									<strong>Organisasi Profesi</strong><br/>
									Berikut merupakan data keikutsertaan dosen dalam organisasi keilmuan atau organisasi profesi.
								</div><br>
								
								<table class="table  table-bordered data" >
									<thead>
										<th width="40px"><p class="text-center">No</p></th>
										<th width="100px"><p class="text-center">ID Prodi</p></th>
										<th width="100px"><p class="text-center">Tahun</p></th>
										<th width="100px"><p class="text-center">NIP</p></th>
										<th width="200px"><p class="text-center">Nama Organisasi</p></th>
										<th width="100px"><p class="text-center">Waktu Mulai</p></th>
										<th width="100px"><p class="text-center">Waktu Selesai</p></th>
										<th width="200px"><p class="text-center">Tingkat</p></th>

									</thead>
									<tbody class="text-center">
										<?php $no=1; ?>
										@foreach($data6 as $key => $value)
										<tr>
											<td align="center">{{$no++}}</td>
											<td align="center">{{$value->idprodi}}</td>
											<td align="center">{{$value->Tahun}}</td>
											<td align="center">{{$value->nip}}</td>
											<td>{{$value->namaOrganisasi}}</td>
											<td align="center">{{$value->waktuMulai}}</td>
											<td align="center">{{$value->waktuSelesai}}</td>
											<td>{{$value->tingkat}}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<br>
							</div>
							@endif



							@if(Session::get('level')=='admin')
							<div class="tab-pane<?php if(isset($ai)) echo $ai ;?>" id="organisasiprofesi" name="organisasiprofesi">
								<br>
								<div class="alert alert-info">
									<strong>Organisasi Profesi</strong><br/>
									Sebutkan keikutsertaan dosen dalam organisasi keilmuan atau organisasi profesi.
								</div><br>
								
								<table class="table  table-bordered data" >
									<thead>
										<th width="50px"><p class="text-center">No</p></th>
										<th width="100px"><p class="text-center">ID Prodi</p></th>
										<th width="100px"><p class="text-center">Tahun</p></th>
										<th width="100px"><p class="text-center">NIP</p></th>
										<th width="200px"><p class="text-center">Nama Organisasi</p></th>
										<th width="100px"><p class="text-center">Waktu Mulai</p></th>
										<th width="100px"><p class="text-center">Waktu Selesai</p></th>
										<th width="200px"><p class="text-center">Tingkat</p></th>
										<th width="100px"><p class="text-center">Action</p></th>

									</thead>
									<tbody class="text-center">
										<?php $no=1; ?>
										@foreach($data6 as $key => $value)
										<tr>
											<td align="center">{{$no++}}</td>
											<td align="center">{{$value->idprodi}}</td>
											<td align="center">{{$value->Tahun}}</td>
											<td align="center">{{$value->nip}}</td>
											<td>{{$value->namaOrganisasi}}</td>
											<td align="center">{{$value->waktuMulai}}</td>
											<td align="center">{{$value->waktuSelesai}}</td>
											<td>{{$value->tingkat}}</td>
											<td align="center"><a href="editorganisasiprofesi/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="organisasiprofesi/delete/{{$value->id}}" class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></a></td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<br>
								<a href="addorganisasiprofesi"><button type="button" class='btn btn-primary'><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
							</div>
							@endif


							@if(Session::get('level')=='user')
							<div class="tab-pane<?php if(isset($ai)) echo $ai ;?>" id="organisasiprofesi" name="organisasiprofesi">
								<br>
								<div class="alert alert-info">
									<strong>Organisasi Profesi</strong><br/>
									Sebutkan keikutsertaan dosen dalam organisasi keilmuan atau organisasi profesi.
								</div><br>
								
								<table class="table  table-bordered data" >
									<thead>
										<th width="50px"><p class="text-center">No</p></th>
										<th width="100px"><p class="text-center">Tahun</p></th>
										<th width="100px"><p class="text-center">NIP</p></th>
										<th width="200px"><p class="text-center">Nama Organisasi</p></th>
										<th width="100px"><p class="text-center">Waktu Mulai</p></th>
										<th width="100px"><p class="text-center">Waktu Selesai</p></th>
										<th width="200px"><p class="text-center">Tingkat</p></th>
										<th width="100px"><p class="text-center">Action</p></th>

									</thead>
									<tbody class="text-center">
										<?php $no=1; ?>
										@foreach($data6 as $key => $value)
										<tr>
											<td align="center">{{$no++}}</td>
											<td align="center">{{$value->Tahun}}</td>
											<td align="center">{{$value->nip}}</td>
											<td>{{$value->namaOrganisasi}}</td>
											<td align="center">{{$value->waktuMulai}}</td>
											<td align="center">{{$value->waktuSelesai}}</td>
											<td>{{$value->tingkat}}</td>
											<td align="center"><a href="editorganisasiprofesi/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="organisasiprofesi/delete/{{$value->id}}" class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></a></td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<br>
								<a href="addorganisasiprofesi"><button type="button" class='btn btn-primary'><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
							</div>
							@endif


							@if(Session::get('level')=='')
							<div class="tab-pane<?php if(isset($av)) echo $av ;?>" id="pendidikandosen" name="pendidikandosen">
								<br>
								<div class="alert alert-info">
									<strong>Pendidikan Dosen</strong><br/>
									Berikut merupakan data pendidikan terakhir setiap dosen di Program Studi.
								</div><br>
								
								<table class="table  table-bordered data" >
									<thead>
										<th><p class="text-center">No</p></th>
										<th width="100px"><p class="text-center">ID Prodi</p></th>
										<th width="100px"><p class="text-center">NIP</p></th>
										<th width="100px"><p class="text-center">Jenjang</p></th>
										<th width="200px"><p class="text-center">Nama Sekolah</p></th>
										<th width="300px"><p class="text-center">Bidang Keahlian</p></th>
										<th width="200px"><p class="text-center">Gelar</p></th>

									</thead>
									<tbody class="text-center">
										<?php $no=1; ?>
										@foreach($data7 as $key => $value)
										<tr>
											<td align="center">{{$no++}}</td>
											<td align="center">{{$value->idprodi}}</td>
											<td align="center">{{$value->nip}}</td>
											<td align="center">{{$value->jenjang}}</td>
											<td>{{$value->namaSekolah}}</td>
											<td>{{$value->bidangKeahlian}}</td>
											<td>{{$value->gelar}}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<br>
							</div>
							@endif


							@if(Session::get('level')=='admin')
							<div class="tab-pane<?php if(isset($av)) echo $av ;?>" id="pendidikandosen" name="pendidikandosen">
								<br>
								<div class="alert alert-info">
									<strong>Pendidikan Dosen</strong><br/>
									Masukan pendidikan terakhir setiap dosen di Program Studi.
								</div><br>
								
								<table class="table  table-bordered data" >
									<thead>
										<th><p class="text-center">No</p></th>
										<th width="100px"><p class="text-center">ID Prodi</p></th>
										<th width="100px"><p class="text-center">NIP</p></th>
										<th width="100px"><p class="text-center">Jenjang</p></th>
										<th width="200px"><p class="text-center">Nama Sekolah</p></th>
										<th width="300px"><p class="text-center">Bidang Keahlian</p></th>
										<th width="200px"><p class="text-center">Gelar</p></th>
										<th width="100px"><p class="text-center">Action</p></th>

									</thead>
									<tbody class="text-center">
										<?php $no=1; ?>
										@foreach($data7 as $key => $value)
										<tr>
											<td align="center">{{$no++}}</td>
											<td align="center">{{$value->idprodi}}</td>
											<td align="center">{{$value->nip}}</td>
											<td align="center">{{$value->jenjang}}</td>
											<td>{{$value->namaSekolah}}</td>
											<td>{{$value->bidangKeahlian}}</td>
											<td>{{$value->gelar}}</td>
											<td align="center"><a href="editpendidikandosen/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="pendidikandosen/delete/{{$value->id}}" class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></a></td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<br>
								<a href="addpendidikandosen"><button type="button" class='btn btn-primary'><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
							</div>
							@endif


							@if(Session::get('level')=='user')
							<div class="tab-pane<?php if(isset($av)) echo $av ;?>" id="pendidikandosen" name="pendidikandosen">
								<br>
								<div class="alert alert-info">
									<strong>Pendidikan Dosen</strong><br/>
									Masukan pendidikan terakhir setiap dosen di Program Studi.
								</div><br>
								
								<table class="table  table-bordered data" >
									<thead>
										<th><p class="text-center">No</p></th>
										<th width="100px"><p class="text-center">NIP</p></th>
										<th width="100px"><p class="text-center">Jenjang</p></th>
										<th width="300px"><p class="text-center">Nama Sekolah</p></th>
										<th width="300px"><p class="text-center">Bidang Keahlian</p></th>
										<th width="300px"><p class="text-center">Gelar</p></th>
										<th width="100px"><p class="text-center">Action</p></th>
									</thead>
									<tbody class="text-center">
										<?php $no=1; ?>
										@foreach($data7 as $key => $value)
										<tr>
											<td align="center">{{$no++}}</td>
											<td align="center">{{$value->nip}}</td>
											<td align="center">{{$value->jenjang}}</td>
											<td>{{$value->namaSekolah}}</td>
											<td>{{$value->bidangKeahlian}}</td>
											<td>{{$value->gelar}}</td>
											<td align="center"><a href="editpendidikandosen/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="pendidikandosen/delete/{{$value->id}}" class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></a></td>
										</tr>
										@endforeach
									</tbody>
								</table>
								<br>
								<a href="addpendidikandosen"><button type="button" class='btn btn-primary'><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
							</div>
							@endif


							@if(Session::get('level')=='')
							<div class="tab-pane<?php if(isset($ap)) echo $ap ;?>" id="upayatenagakependidikan" name="upayatenagakependidikan">
								<br>
								<div class="alert alert-info">
									<strong>Upaya Peningkatan Tenaga Kependidikan</strong><br/>
									Berikut merupakan data tentang penjelasan Upaya Peningkatan Tenaga Kependidikan :
									
								</div>
								
								
								<table class="table  table-bordered data" >
									<thead>
										<th width="100px"><p class="text-center">ID Prodi</p></th> 
										<th width="300px"><p class="text-center">Upaya Peningkatan Tenaga Kependidikan</p></th> 
										
										
									</thead>
									<tbody class="text-center">

										@foreach($data8 as $key => $value)
										<tr>
											<td align="center">{{$value->idprodi}}</td>
											<td align="justify">{{$value->upayaTenagaKependidikan}}</td>
											
										</tr>
										@endforeach
									</tbody>
								</table>
								
							</div>
							@endif



							@if(Session::get('level')=='admin')
							<div class="tab-pane<?php if(isset($ap)) echo $ap ;?>" id="upayatenagakependidikan" name="upayatenagakependidikan">
								<br>
								<div class="alert alert-info">
									<strong>Upaya Peningkatan Tenaga Kependidikan</strong><br/>
									Berikut merupakan data tentang penjelasan Upaya Peningkatan Tenaga Kependidikan :
									
								</div>
								
								
								<table class="table  table-bordered data" >
									<thead>
										<th width="100px"><p class="text-center">ID Prodi</p></th> 
										<th width="300px"><p class="text-center">Upaya Peningkatan Tenaga Kependidikan</p></th> 
										<th width="100px"><p class="text-center">Action</p></th>
										
									</thead>
									<tbody class="text-center">

										@foreach($data8 as $key => $value)
										<tr>
											<td align="center">{{$value->idprodi}}</td>
											<td align="justify">{{$value->upayaTenagaKependidikan}}</td>
											<td align="center"> <a href="editupayatenagakependidikan/{{$value->id}}" class='glyphicon glyphicon-edit'></a> <a href="upayatenagakependidikan/delete/{{$value->id}}"><i class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></i></a></td>
											
										</tr>
										@endforeach
									</tbody>
								</table>
								<br/>
								<a href="addupayatenagakependidikan"><button type="button" class='btn btn-primary'><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
							</div>

							@endif


							@if(Session::get('level')=='user')
							<div class="tab-pane<?php if(isset($ap)) echo $ap ;?>" id="upayatenagakependidikan" name="upayatenagakependidikan">
								<br>
								<div class="alert alert-info">
									<strong>Upaya Peningkatan Tenaga Kependidikan</strong><br/>
									Berikut merupakan data tentang penjelasan Upaya Peningkatan Tenaga Kependidikan :
									
								</div>
								
								
								<table class="table  table-bordered data" >
									<thead>
										<th><p class="text-center">Upaya Peningkatan Tenaga Kependidikan</p></th> 
										
										
									</thead>
									<tbody class="text-center">

										@foreach($data8 as $key => $value)
										<tr>
											<td align="justify">{{$value->upayaTenagaKependidikan}}</td>
											
										</tr>
										@endforeach
									</tbody>
								</table>
								@if (count($data8) < 1)
								<a href="addupayatenagakependidikan"><button type="button" class='btn btn-primary'><i class="glyphicon glyphicon-plus"></i> Tambah</button></a>
								@endif
								@foreach($data8 as $key => $value)
								<a href="editupayatenagakependidikan/{{$value->id}}" class='glyphicon glyphicon-edit'></a> 
								<a href="upayatenagakependidikan/delete/{{$value->id}}"><i class='glyphicon glyphicon-trash' onclick="return confirm('Ingin menghapus data ?')"></i></a>
								@endforeach
							</div>

							@endif


							
						</div>






						
						<script>
							$('#myTab a').click(function (e) {
								e.preventDefault()
								$(this).tab('show')
							</script>

							<script>
								<input type="text" class="form-control">
								<input type="text" id="calendar" name="calendar" value="2012/06/03">
								$("#calendar").datepicker({

								});
							</script>
							<br>
							<br>
							
							

							
						</div>
					</div><!--/#content.span10-->
				</div><!--/fluid-row-->

				@stop 