 @extends('template.app')
 @section('content')
<?php 
if (Session::has('tab_dosen')) {
	$tab_dosen = Session::get('tab_dosen');
} else {
	$tab_dosen = "datadosen";
}
?>	
<div class="row">
	<div class="col-lg-12 panjang">
		<h3 class="page-header">
			<b>Standar Akademik IV</b> 
		</h3>
		<ul class="nav nav-tabs">
		<li class="<?php if ($tab_dosen == "datadosen") echo 'active'; ?>" ><a href="#tab1">Kegiatan Dosen</a></li>
		<li class="<?php if ($tab_dosen == "aktivitas") echo 'active'; ?>"><a href="#tab2">Aktivitas Mengajar</a></li>
		<li class="<?php if ($tab_dosen == "tenaga") echo 'active'; ?>"><a href="#tab3">Kegiatan Tenaga Ahli</a></li>
		<li class="<?php if ($tab_dosen == "tugasbelajar") echo 'active'; ?>"><a href="#tab4">Tugas Belajar</a></li>
		<li class="<?php if ($tab_dosen == "prestasi") echo 'active'; ?>"><a href="#tab5">Prestasi Dosen</a></li>
		<li class="<?php if ($tab_dosen == "organisasi") echo 'active'; ?>"><a href="#tab6">Organisasi Profesi</a></li>
		<li class="<?php if ($tab_dosen == "pendidikan") echo 'active'; ?>"><a href="#tab7">Pendidikan Dosen</a></li>
		<li class="<?php if ($tab_dosen == "upaya") echo 'active'; ?>"><a href="#tab8">Upaya Peningkatan Tenaga Kependidikan</a></li>
	</ul>
	<div class="tab-content"> 	
		<div id="tab1" class="tab-pane fade <?php if ($tab_dosen == "datadosen") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Kegiatan Dosen
			</div>
			@if(Session::has('status-datadosen'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status-datadosen') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut merupakan data kegiatan dosen pada setiap Program Studi.
			Isi kegiatan dosen yang bidang keahliannya sesuai dengan Program Studi dalam kegiatan Seminar Ilmiah, Lokakarya, Penataran, Workshop, Pagelaran, Pameran, atau Peragaan dimana kegiatan tersebut tidak hanya melibatkan dosen Perguruan Tinggi sendiri.
			</p>
			
			@if ((Auth::user()->level !='prodi') or ($kegiatandosen->count()>= 0)  )
			<div class="form-group">	
			<a class="btn btn-primary" href="addkegiatandosen"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			@endif
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
						<th width="150px" class="text-center middle">Program Studi</th>
						<th class="text-center middle">Tahun</th>
						<th width="120px" class="text-center middle">NIP	</th>
						<th width="150px" class="text-center middle">Nama Dosen</th>
						<th class="text-center middle">Jenis Kegiatan</th>
						<th class="text-center middle">Nama Kegiatan</th>
						<th class="text-center middle">Tempat</th>
						<th class="text-center middle">Waktu</th>
						<th class="text-center middle">Sebagai</th>
						<th width="80px" class="text-center middle">Action</th>

				</thead>
				<tbody class="text-center">
						
						@foreach($kegiatandosen as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!!$value->Tahun!!}</td>
								<td >{!!$value->nip!!}</td>
								<td >{!!$value->masterdosens->nama !!}</td>
								<td >{!!$value->jenisKegiatan !!}</td>
								<td >{!!$value->namaKegiatan !!}</td>
								<td >{!!$value->tempat !!}</td>
								<td >{!!date('d-m-Y', strtotime($value->waktu)) !!}</td>
								<td >{!!$value->sebagai !!}</td>
								<td  class="text-center">
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Edit" href="editkegiatandosen/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
								</span>
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delkegiatandosen/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
								</span>
								</td>
							</tr>
						@endforeach
						
				</tbody>
			</table>
		</div>
		
		
		<div id="tab2" class="tab-pane fade <?php if ($tab_dosen == "aktivitas") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Aktivitas Mengajar
			</div>
			@if(Session::has('status-aktivitas'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status-aktivitas') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut merupakan data aktivitas mengajar dosen dalam Program Studi dengan mengikuti format tabel dibawah ini.
			</p>
			
			@if ((Auth::user()->level !='prodi') or ($aktivitasmengajar->count()>= 0)  )
			<div class="form-group">	
			<a class="btn btn-primary" href="addaktivitasmengajar"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			@endif
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
						<th width="150px" class="text-center middle">Program Studi</th>
						<th width="120px" class="text-center middle">NIP	</th>
						<th width="150px" class="text-center middle">Nama Dosen</th>
						<th class="text-center middle">Tahun Akademik</th>
						<th width="120px" class="text-center middle">Nama Mata Kuliah</th>
						<th class="text-center middle">Jumlah Kelas</th>
						<th class="text-center middle">Jumlah Rencana Pertemuan</th>
						<th class="text-center middle">Jumlah Realisasi Pertemuan</th>
						<th width="80px" class="text-center middle">Action</th>

				</thead>
				<tbody class="text-center">
						
						@foreach($aktivitasmengajar as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!!$value->nip!!}</td>
								<td >{!!$value->masterdosens->nama!!}</td>
								<td >{!!$value->tahunAkademik !!}</td>
								<td >{!!$value->mastermatakuliahs->namaMataKuliah !!}</td>
								<td >{!!$value->jumlahKelas !!}</td>
								<td >{!!$value->jumlahRencanaPertemuan !!}</td>
								<td >{!!$value->jumlahRealisasiPertemuan !!}</td>
								<td  class="text-center">
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Edit" href="editaktivitasmengajar/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
								</span>
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delaktivitasmengajar/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
								</span>
								</td>
							</tr>
						@endforeach
						
				</tbody>
			</table>
			
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Aktivitas Mengajar Dosen
			</div>
			<p class="text-justify">Berikut aktivitas mengajar dosen yang dinyatakan dalam sks. <br><b>Setiap Dosen Hanya Boleh Memiliki Satu Data Saja!!</b>
			</p>
			
			@if ((Auth::user()->level !='prodi') or ($aktivitasmengajarsks->count()>= 0)  )
			<div class="form-group">	
			<a class="btn btn-primary" href="addaktivitasmengajarsks"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			@endif
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
					<tr>
						<th rowspan="2" width="150px" class="text-center middle">Program Studi</th>
						<th rowspan="2" class="text-center middle">Tahun Akademik</th>
						<th rowspan="2" class="text-center middle">NIP dan Nama Dosen</th>
						<th colspan="3" class="text-center middle">SKS Pengajaran Pada</th>
						<th rowspan="2" class="text-center middle">SKS Penelitian</th>
						<th rowspan="2" class="text-center middle">SKS Pengabdian Kepada Masyarakat</th>
						<th colspan="2" class="text-center middle">SKS Manajemen</th>
						<th rowspan="2" width="80px" class="text-center middle">Action</th>

					</tr>
					<tr>
						<th class="text-center middle">PS Sendiri</th>
						<th class="text-center middle">PS Lain PT Sendiri</th>
						<th class="text-center middle">PT Lain</th>
						<th class="text-center middle">PS Sendiri</th>
						<th class="text-center middle">PT Lain</th>
					</tr>
				<tbody class="text-center">
						
						@foreach($aktivitasmengajarsks as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!!$value->tahunAkademik!!}</td>
								<td >{!!$value->nip!!} ({!!$value->masterdosens->nama!!})</td>
								<td >{!!$value->sks_PSsendiri !!}</td>
								<td >{!!$value->sks_PSLainPTsendiri !!}</td>
								<td >{!!$value->sks_PTLain !!}</td>
								<td >{!!$value->sks_penelitian !!}</td>
								<td >{!!$value->sks_Pengabdian !!}</td>
								<td >{!!$value->sks_man_PSsendiri !!}</td>
								<td >{!!$value->sks_man_PTlain !!}</td>
								<td  class="text-center">
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Edit" href="editaktivitasmengajarsks/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
								</span>
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delaktivitasmengajarsks/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
								</span>
								</td>
							</tr>
						@endforeach
					
				</tbody>
			</table>
		</div>
		
		
		<div id="tab3" class="tab-pane fade <?php if ($tab_dosen == "tenaga") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Kegiatan Tenaga Ahli
			</div>
			@if(Session::has('status-tenaga'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status-tenaga') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut merupakan kegiatan tenaga ahli/pakar sebagai pembicara dalam seminar/pelatihan, pembicara tamu, dsb, dari luar Perguruan Tinggi sendiri.
			</p>
			
			@if ((Auth::user()->level !='prodi') or ($kegiatantenagaahli->count()>= 0)  )
			<div class="form-group">	
			<a class="btn btn-primary" href="addkegiatantenagaahli"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			@endif
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
						<th width="150px" class="text-center middle">Program Studi</th>
						<th class="text-center middle">Tahun</th>
						<th width="150px" class="text-center middle">Nama Tenaga Ahli</th>
						<th width="250px" class="text-center middle">Nama Kegiatan</th>
						<th class="text-center middle">Waktu</th>
						<th width="80px" class="text-center middle">Action</th>

				</thead>
				<tbody class="text-center">
						
						@foreach($kegiatantenagaahli as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!!$value->Tahun!!}</td>
								<td >{!!$value->namaTenagaAhli!!}</td>
								<td >{!!$value->namaKegiatan !!}</td>
								<td >{!!date('d-F-Y', strtotime($value->waktu)) !!}</td>
								<td  class="text-center">
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Edit" href="editkegiatantenagaahli/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
								</span>
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delkegiatantenagaahli/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
								</span>
								</td>
							</tr>
						@endforeach
						
				</tbody>
			</table>
		</div>
		
		
		<div id="tab4" class="tab-pane fade <?php if ($tab_dosen == "tugasbelajar") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Tugas Belajar
			</div>
			@if(Session::has('status-tugasbelajar'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status-tugasbelajar') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut merupakan data peningkatan kemampuan dosen melalui program tugas belajar dalam bidang yang sesuai dengan bidang Program Studi.
			</p>
			
			@if ((Auth::user()->level !='prodi') or ($tugasbelajar->count()>= 0)  )
			<div class="form-group">	
			<a class="btn btn-primary" href="addtugasbelajar"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			@endif
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
						<th width="150px" class="text-center middle">Program Studi</th>
						<th class="text-center middle">Tahun</th>
						<th class="text-center middle">NIP	</th>
						<th class="text-center middle">Nama Dosen</th>
						<th class="text-center middle">Jenjang</th>
						<th class="text-center middle">Bidang Studi</th>
						<th class="text-center middle">Perguruan Tinggi</th>
						<th class="text-center middle">Negara</th>
						<th class="text-center middle">Tahun Mulai</th>
						<th width="80px" class="text-center middle">Action</th>

				</thead>
				<tbody class="text-center">
						
						@foreach($tugasbelajar as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!!$value->Tahun!!}</td>
								<td >{!!$value->nip!!}</td>
								<td >{!!$value->masterdosens->nama !!}</td>
								<td >{!!$value->jenjang !!}</td>
								<td >{!!$value->bidangStudi !!}</td>
								<td >{!!$value->perguruanTinggi !!}</td>
								<td >{!!$value->negara !!}</td>
								<td >{!!$value->tahunMulai !!}</td>
								<td  class="text-center">
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Edit" href="edittugasbelajar/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
								</span>
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Hapus" href="deltugasbelajar/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
								</span>
								</td>
							</tr>
						@endforeach
						
				</tbody>
			</table>
		</div>
		
		<div id="tab5" class="tab-pane fade <?php if ($tab_dosen == "prestasi") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Prestasi Dosen
			</div>
			@if(Session::has('status-prestasi'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status-prestasi') }}</b>
			</div>
			@endif
			<p class="text-justify">Masukan pencapaian prestasi/reputasi dosen (misalnya prestasi dalam pendidikan, penelitian dan pelayanan/pengabdian kepada masyarakat).
			</p>
			
			@if ((Auth::user()->level !='prodi') or ($prestasiDos->count()>= 0)  )
			<div class="form-group">	
			<a class="btn btn-primary" href="addprestasidosen"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			@endif
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
						<th width="150px" class="text-center middle">Program Studi</th>
						<th class="text-center middle">Tahun</th>
						<th width="120px" class="text-center middle">NIP</th>
						<th width="150px" class="text-center middle">Nama Dosen</th>
						<th width="150px" class="text-center middle">Prestasi</th>
						<th class="text-center middle">Waktu</th>
						<th class="text-center middle">Tingkat</th>
						<th width="80px" class="text-center middle">Action</th>

				</thead>
				<tbody class="text-center">
						
						@foreach($prestasiDos as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!!$value->Tahun!!}</td>
								<td >{!!$value->nip!!}</td>
								<td >{!!$value->masterdosens->nama !!}</td>
								<td >{!!$value->prestasi !!}</td>
								<td >{!!date('d-F-Y', strtotime($value->waktu)) !!}</td>
								<td >{!!$value->tingkat !!}</td>
								<td  class="text-center">
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Edit" href="editprestasidosen/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
								</span>
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delprestasidosen/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
								</span>
								</td>
							</tr>
						@endforeach
						
				</tbody>
			</table>
		</div>
		
		<div id="tab6" class="tab-pane fade <?php if ($tab_dosen == "organisasi") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Organisasi Profesi
			</div>
			@if(Session::has('status-organisasi'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status-organisasi') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut merupakan data keikutsertaan dosen dalam organisasi keilmuan atau organisasi profesi.
			</p>
			
			@if ((Auth::user()->level !='prodi') or ($organisasiprof->count()>= 0)  )
			<div class="form-group">	
			<a class="btn btn-primary" href="addorganisasiprofesi"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			@endif
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
						<th width="150px" class="text-center middle">Program Studi</th>
						<th class="text-center middle">Tahun</th>
						<th width="120px" class="text-center middle">NIP	</th>
						<th width="150px" class="text-center middle">Nama Dosen</th>
						<th width="150px" class="text-center middle">Nama Organisasi</th>
						<th class="text-center middle">Waktu Mulai</th>
						<th class="text-center middle">Waktu Selesai</th>
						<th class="text-center middle">Tingkat</th>
						<th width="80px" class="text-center middle">Action</th>

				</thead>
				<tbody class="text-center">
					
						@foreach($organisasiprof as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!!$value->Tahun!!}</td>
								<td >{!!$value->nip!!}</td>
								<td >{!!$value->masterdosens->nama !!}</td>
								<td >{!!$value->namaOrganisasi !!}</td>
								<td >{!!date('d-m-Y', strtotime($value->waktuMulai)) !!}</td>
								<td >{!!date('d-m-Y', strtotime($value->waktuSelesai)) !!}</td>
								<td >{!!$value->tingkat !!}</td>
								<td  class="text-center">
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Edit" href="editorganisasiprofesi/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
								</span>
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delorganisasiprofesi/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
								</span>
								</td>
							</tr>
						@endforeach
						
				</tbody>
			</table>
		</div>
		
		
		<div id="tab7" class="tab-pane fade <?php if ($tab_dosen == "pendidikan") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Pendidikan Dosen
			</div>
			@if(Session::has('status-pendidikan'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status-pendidikan') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut merupakan data pendidikan terakhir setiap dosen di Program Studi.
			</p>
			
			@if ((Auth::user()->level !='prodi') or ($pendidikandosen->count()>= 0)  )
			<div class="form-group">	
			<a class="btn btn-primary" href="addpendidikandosen"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			@endif
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
						<th width="150px" class="text-center middle">Program Studi</th>
						<th width="120px" class="text-center middle">NIP	</th>
						<th width="150px" class="text-center middle">Nama Dosen</th>
						<th class="text-center middle">Jenjang</th>
						<th width="150px" class="text-center middle">Nama Sekolah</th>
						<th width="150px" class="text-center middle">Bidang Keahlian</th>
						<th class="text-center middle">Gelar</th>
						<th width="80px" class="text-center middle">Action</th>

				</thead>
				<tbody class="text-center">
						
						@foreach($pendidikandosen as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td >{!!$value->nip!!}</td>
								<td >{!!$value->masterdosens->nama !!}</td>
								<td >{!!$value->jenjang !!}</td>
								<td >{!!$value->namaSekolah !!}</td>
								<td >{!!$value->bidangKeahlian !!}</td>
								<td >{!!$value->gelar !!}</td>
								<td  class="text-center">
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Edit" href="editpendidikandosen/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
								</span>
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delpendidikandosen/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
								</span>
								</td>
							</tr>
						@endforeach
						
				</tbody>
			</table>
		</div>
		
		
		<div id="tab8" class="tab-pane fade <?php if ($tab_dosen == "upaya") echo 'in active'; ?>">	
			<div class="breadcrumb">
				   <i class="fa fa-th-list fa-fw"></i>Upaya Peningkatan Tenaga Kependidikan
			</div>
			@if(Session::has('status-upaya'))
			<div id="fade_out" class="alert-box alert-success text-center">
				<b >{{ Session::get('status-upaya') }}</b>
			</div>
			@endif
			<p class="text-justify">Berikut merupakan data tentang penjelasan Upaya Peningkatan Tenaga Kependidikan.
			<br><b> Setiap Prodi Hanya Boleh Memasukan Satu Data Saja !</b></p>
			
			@if ((Auth::user()->level  =='admin') or ($upaya->count() != $masterprodis->count())  )
			<div class="form-group">	
			<a class="btn btn-primary" href="addupayatenagakependidikan"><i class="fa fa-plus fa-fw"></i><b>Tambah</b></a>	
			</div>
			@endif
			<p></p>
			<table class="table  table-bordered data" >
				<thead >
						<th width="150px" class="text-center middle">Program Studi</th>
						<th width="620px" class="text-center middle">Upaya Peningkatan Tenaga Kependidikan</th>
						<th width="80px" class="text-center middle">Action</th>

				</thead>
				<tbody class="text-center">
						
						@foreach($upaya as $value)
							<tr class="daftar soft">
								<td >{!!$value->masterprodis->namaProdi!!}</td>
								<td class="text-left">{!! substr($value->upayaTenagaKependidikan,0,200) !!}...</td>
								<td  class="text-center">
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Edit" href="editupayatenagakependidikan/{!!$value->id!!}" class=" soft"><i class="glyphicon glyphicon-edit"></i></a>
								</span>
								<span>
								<a data-toggle="tooltip" data-placement="top" title="Hapus" href="delupayatenagakependidikan/{!!$value->id!!}"  class=" soft" onclick="return confirm('Ingin menghapus data ?')"><i class="glyphicon glyphicon-trash"></i></a>
								</span>
								</td>
							</tr>
						@endforeach
						
				</tbody>
			</table>
		</div>
	</div>		
			
			
	</div>
	 
</div>

@stop 