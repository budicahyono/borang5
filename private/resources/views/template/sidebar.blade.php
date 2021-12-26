<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" id="side-menu">
                        <li   class="@if ($menu == 'home') and ($menu2 == 'home') {{'actives'}} @endif ">
							<a class="soft" href="{{URL::to('.')}}"><i class="fa fa-home fa-fw"></i>Dashboard</a>
                        </li>
						
						@if ( Auth::user()->level == 'admin' or Auth::user()->level == 'fakultas' )
						<li   class="@if ($menu == 'setting') {{'active'}} @endif ">
							<a class="soft" href="{{URL::to('registrasi')}}"><i class="fa fa-tasks fa-fw"></i>Manajemen User</a>
                        </li>
						@endif 
						@if ($Akses->count() != 0 or Auth::user()->level == 'admin' or Auth::user()->level == 'fakultas')
                        <li class="@if ($menu == 'st1' || $menu == 'st2' || $menu == 'st3' || $menu == 'st4' || $menu == 'st5' || $menu == 'st6' || $menu == 'st7') {{'active'}} @endif">    
                            <a class="soft" href="#"><span></span><i class="fa fa-sitemap fa-fw"></i>Standar Akademik<span class="caret arrow "></span></a>
                            <ul class="nav nav-second-level">
							@if ($Akses->where('modul','st1') != '[]' or Auth::user()->level == 'admin' or Auth::user()->level == 'fakultas')
                                <li class="@if ($menu == 'st1') and ($menu2 == 'visimisitujuan')  {{'actives'}} @endif" >
                                    <a class="soft" href="{{URL::to('visimisitujuan')}}"><i class="fa fa-university fa-fw"></i>Standar I</a>
                                </li>
							@endif 
							@if ($Akses->where('modul','st2') != '[]' or Auth::user()->level == 'admin' or Auth::user()->level == 'fakultas')	
                                <li class="@if ($menu == 'st2') {{'active'}} @endif">
                                    <a class="soft" href="#"><i class="fa fa-graduation-cap fa-fw"></i>Standar II<span class="caret arrow "></span></a>
                                    <ul class="nav nav-third-level">
                                        <li class="@if ($menu2 == 'tatapamong') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('tatapamong')}}"><i class="fa fa-angle-double-right fa-fw"></i>Tata Pamong</a>
                                        </li>
                                        <li class="@if ($menu2 == 'umpanbalik') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('umpanbalik')}}"><i class="fa fa-angle-double-right fa-fw"></i>Umpan Balik</a>
                                        </li>
                                        <li class="@if ($menu2 == 'keberlanjutanprodi') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('keberlanjutanprodi')}}"><i class="fa fa-angle-double-right fa-fw"></i>Keberlanjutan Prodi</a>
                                        </li>
                                    </ul>
								</li>
							@endif 
							@if ($Akses->where('modul','st3') != '[]' or Auth::user()->level == 'admin' or Auth::user()->level == 'fakultas')			
                                <li  class="@if ($menu == 'st3') {{'active'}} @endif">
                                    <a class="soft" href="#"><i class="fa fa-users fa-fw"></i>Standar III<span class="caret arrow "></span></a>
                                    <ul class="nav nav-third-level">
                                        <li class="@if ($menu2 == 'mahasiswa') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('mahasiswa')}}"><i class="fa fa-angle-double-right fa-fw"></i>Mahasiswa</a>
                                        </li>
                                        <li class="@if ($menu2 == 'lulusan') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('lulusan')}}"><i class="fa fa-angle-double-right fa-fw"></i>Lulusan</a>
										</li>
									</ul>
								</li>	
							@endif 
							@if ($Akses->where('modul','st4') != '[]' or Auth::user()->level == 'admin' or Auth::user()->level == 'fakultas')	
                                <li  class="@if ($menu == 'st4') {{'active'}} @endif">
                                    <a class="soft" href="#"><i class="fa fa-user fa-fw"></i>Standar IV<span class="caret arrow "></span></a>
                                    <ul class="nav nav-third-level">
                                        <li class="@if ($menu2 == 'sdm') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('sdm')}}"><i class="fa fa-angle-double-right fa-fw"></i>SDM</a>
                                        </li>
                                        <li class="@if ($menu2 == 'datadosen') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('datadosen')}}"><i class="fa fa-angle-double-right fa-fw"></i>Data Dosen</a>
										</li>
									</ul>
                                </li>
							@endif 
							@if ($Akses->where('modul','st5') != '[]' or Auth::user()->level == 'admin' or Auth::user()->level == 'fakultas')		
								<li  class="@if ($menu == 'st5') {{'active'}} @endif">
                                    <a class="soft" href="#"><i class="fa fa-tasks fa-fw"></i>Standar V<span class="caret arrow "></span></a>
                                    <ul class="nav nav-third-level">
                                        <li class="@if ($menu2 == 'kurikulum') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('kurikulum')}}"><i class="fa fa-angle-double-right fa-fw"></i>Kurikulum</a>
                                        </li>
                                        <li class="@if ($menu2 == 'pembelajaran') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('pembelajaran')}}"><i class="fa fa-angle-double-right fa-fw"></i>Pembelajaran</a>
                                        </li>
                                        <li class="@if ($menu2 == 'suasanaakademik') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('suasanaakademik')}}"><i class="fa fa-angle-double-right fa-fw"></i>Upaya Peningkatan Suasana Akademik</a>
                                        </li>
                                    </ul>
                                </li>
							@endif 
							@if ($Akses->where('modul','st6') != '[]' or Auth::user()->level == 'admin' or Auth::user()->level == 'fakultas')		
								<li  class="@if ($menu == 'st6') {{'active'}} @endif">
                                    <a class="soft" href="#"><i class="fa fa-building fa-fw"></i>Standar VI<span class="caret arrow "></span></a>
                                    <ul class="nav nav-third-level">
                                        <li class="@if ($menu2 == 'pembiayaan') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('pembiayaan')}}"><i class="fa fa-angle-double-right fa-fw"></i>Pembiayaan</a>
                                        </li>
                                        <li class="@if ($menu2 == 'saranaprasarana') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('saranaprasarana')}}"><i class="fa fa-angle-double-right fa-fw"></i>Sarana dan Prasarana</a>
                                        </li>
                                        <li class="@if ($menu2 == 'sisteminformasi') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('sisteminformasi')}}"><i class="fa fa-angle-double-right fa-fw"></i>Sistem Informasi</a>
                                        </li>
                                    </ul>
                                </li>
							@endif 
							@if ($Akses->where('modul','st7') != '[]' or Auth::user()->level == 'admin' or Auth::user()->level == 'fakultas')		
								<li  class="@if ($menu == 'st7') {{'active'}} @endif">
                                    <a class="soft" href="#"><i class="fa fa-globe fa-fw"></i>Standar VII<span class="caret arrow "></span></a>
                                    <ul class="nav nav-third-level">
                                        <li class="@if ($menu2 == 'penelitian') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('penelitian')}}"><i class="fa fa-angle-double-right fa-fw"></i>Penelitian</a>
                                        </li>
                                        <li class="@if ($menu2 == 'kerjasama') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('kerjasama')}}"><i class="fa fa-angle-double-right fa-fw"></i>Kerja Sama</a>
                                        </li>
                                        </ul>
                                </li>  
							@endif	
							</ul>
						</li>
						@endif	
						
                        <li class="@if ($menu == 'lap1' || $menu == 'lap2' || $menu == 'lap3' || $menu == 'lap4' || $menu == 'lap5' || $menu == 'lap6' || $menu == 'lap7' ||  $menu == 'lap0') {{'active'}} @endif">  
                            <a class="soft" href="#"><i class="fa fa-book fa-fw"></i>Laporan<span class="caret arrow "></span></a>
                            <ul class="nav nav-second-level">
							<?php if (isset($open)) { ?>
								<li  class="@if ($menu == 'lap0') {{'actives'}} @endif">
                                    <a class="soft" href="{{URL::to('laporanall')}}"><i class="fa fa-file fa-fw"></i>Semua Standar</a>
                                </li>
							<?php } ?>	
								<li  class="@if ($menu == 'lap1') {{'actives'}} @endif">
                                    <a class="soft" href="{{URL::to('laporanvisimisi')}}"><i class="fa fa-file fa-fw"></i>Standar I</a>
                                </li>
                                <li  class="@if ($menu == 'lap2') {{'active'}} @endif">
                                    <a class="soft" href="#"><i class="fa fa-file fa-fw"></i>Standar II<span class="caret arrow "></span></a>
                                    <ul class="nav nav-third-level">
                                         <li class="@if ($menu2 == 'laporantatapamong') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('laporantatapamong')}}"><i class="fa fa-angle-double-right fa-fw"></i>Tata Pamong</a>
                                        </li>
                                         <li class="@if ($menu2 == 'laporanumpanbalik') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('laporanumpanbalik')}}"><i class="fa fa-angle-double-right fa-fw"></i>Umpan Balik</a>
                                        </li>
                                         <li class="@if ($menu2 == 'laporankeberlanjutanprodi') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('laporankeberlanjutanprodi')}}"><i class="fa fa-angle-double-right fa-fw"></i>Keberlanjutan Prodi</a>
                                        </li>
                                    </ul>
                                </li>
								 <li  class="@if ($menu == 'lap3') {{'active'}} @endif">
                                    <a class="soft" href="#"><i class="fa fa-file fa-fw"></i>Standar III<span class="caret arrow "></span></a>
                                    <ul class="nav nav-third-level">
                                         <li class="@if ($menu2 == 'laporanmahasiswa') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('laporanmahasiswa')}}"><i class="fa fa-angle-double-right fa-fw"></i>Mahasiswa</a>
                                        </li>
                                         <li class="@if ($menu2 == 'laporanlulusan') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('laporanlulusan')}}"><i class="fa fa-angle-double-right fa-fw"></i>Lulusan</a>
										</li>
									</ul>
                                </li>
								 <li  class="@if ($menu == 'lap4') {{'active'}} @endif">
                                    <a class="soft" href="#"><i class="fa fa-file fa-fw"></i>Standar IV<span class="caret arrow "></span></a>
                                    <ul class="nav nav-third-level">
                                         <li class="@if ($menu2 == 'laporansistem') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('laporansistem')}}"><i class="fa fa-angle-double-right fa-fw"></i>SDM</a>
                                        </li>
                                         <li class="@if ($menu2 == 'laporandatadosen') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('laporandatadosen')}}"><i class="fa fa-angle-double-right fa-fw"></i>Data Dosen</a>
                                        </li>
                                    </ul>
								</li>	
                                <li  class="@if ($menu == 'lap5') {{'active'}} @endif">
                                    <a class="soft" href="#"><i class="fa fa-file fa-fw"></i>Standar V<span class="caret arrow "></span></a>
                                    <ul class="nav nav-third-level">
                                         <li class="@if ($menu2 == 'laporankurikulum') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('laporankurikulum')}}"><i class="fa fa-angle-double-right fa-fw"></i>Kurikulum</a>
                                        </li>
                                         <li class="@if ($menu2 == 'laporanpembelajaran') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('laporanpembelajaran')}}"><i class="fa fa-angle-double-right fa-fw"></i>Pembelajaran</a>
                                        </li>
                                          <li class="@if ($menu2 == 'laporansuasana') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('laporansuasana')}}"><i class="fa fa-angle-double-right fa-fw"></i>Upaya Peningkatan Suasana Akademik</a>
                                         </li>
                                    </ul>
								</li>	
								<li  class="@if ($menu == 'lap6') {{'active'}} @endif">
                                    <a class="soft" href="#"><i class="fa fa-file fa-fw"></i>Standar VI<span class="caret arrow "></span></a>
                                    <ul class="nav nav-third-level">
                                         <li class="@if ($menu2 == 'laporanpembiayaan') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('laporanpembiayaan')}}"><i class="fa fa-angle-double-right fa-fw"></i>Pembiayaan</a>
                                        </li>
                                         <li class="@if ($menu2 == 'laporanprasarana') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('laporanprasarana')}}"><i class="fa fa-angle-double-right fa-fw"></i>Sarana dan Prasarana</a>
                                        </li>
                                         <li class="@if ($menu2 == 'laporansisteminformasi') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('laporansisteminformasi')}}"><i class="fa fa-angle-double-right fa-fw"></i>Sistem Informasi</a>
                                        </li>
                                    </ul>
                                </li>
                                <li  class="@if ($menu == 'lap7') {{'active'}} @endif">
                                    <a class="soft" href="#"><i class="fa fa-file fa-fw"></i>Standar VII<span class="caret arrow "></span></a>
                                    <ul class="nav nav-third-level">
                                         <li class="@if ($menu2 == 'laporanpenelitian') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('laporanpenelitian')}}"><i class="fa fa-angle-double-right fa-fw"></i>Penelitian</a>
                                        </li>
                                         <li class="@if ($menu2 == 'laporanpkm') {{'actives'}} @endif">
                                            <a class="soft" href="{{URL::to('laporanpkm')}}"><i class="fa fa-angle-double-right fa-fw"></i>PKM</a>
                                        </li>
                                         <li class="@if ($menu2 == 'laporankerjasama') {{'actives'}} @endif">
                                           <a class="soft" href="{{URL::to('laporankerjasama')}}"><i class="fa fa-angle-double-right fa-fw"></i>Kerja Sama</a>
                                        </li>
									</ul>
								</li>
							</ul>
                        </li>    
                        <li  class="@if ($menu == 'masterbiaya' || $menu == 'masterdosen' || $menu == 'masterfakultas' || $menu == 'masterfungsional' || $menu == 'masterinstitusi' || $menu == 'masterjenispustaka' || $menu == 'masterjeniskemampuan' || $menu == 'masterkurikulum' || $menu == 'masterlaboratorium' || $menu == 'mastermahasiswa' || $menu == 'mastermatakuliah' || $menu == 'masterprodi'  || $menu == 'masterketenagapendidikan') {{'active'}} @endif">
                            <a class="soft" href="#"><i class="fa fa-database fa-fw"></i>Data Master<span class="caret arrow"></span></a>
							
                            <ul class="nav nav-second-level">
                               <li class="@if ($menu == 'masterbiaya') {{'actives'}} @endif">
                                    <a class="soft" href="{{URL::to('masterbiaya')}}"><i class="fa fa-angle-double-right fa-fw"></i>Master Biaya Penelitian</a>
                                </li>
							
                                <li class="@if ($menu == 'masterdosen') {{'actives'}} @endif">
                                    <a class="soft" href="{{URL::to('masterdosen')}}"><i class="fa fa-angle-double-right fa-fw"></i>Master Dosen</a>
                                </li>
							
                                <li class="@if ($menu == 'masterfakultas') {{'actives'}} @endif">
                                    <a class="soft" href="{{URL::to('masterfakultas')}}"><i class="fa fa-angle-double-right fa-fw"></i>Master Fakultas</a>
                                </li>
								
                                <li class="@if ($menu == 'masterfungsional') {{'actives'}} @endif">
                                    <a class="soft" href="{{URL::to('masterfungsional')}}"><i class="fa fa-angle-double-right fa-fw"></i>Master Fungsional</a>
                                </li>
							
                                <li class="@if ($menu == 'masterinstitusi') {{'actives'}} @endif">
                                    <a class="soft" href="{{URL::to('masterinstitusi')}}"><i class="fa fa-angle-double-right fa-fw"></i>Master Institusi </a>
                                </li>
							
                                <li class="@if ($menu == 'masterjenispustaka') {{'actives'}} @endif">
                                    <a class="soft" href="{{URL::to('masterjenispustaka')}}"><i class="fa fa-angle-double-right fa-fw"></i>Master Jenis Pustaka</a>
                                </li>
									
                                 <li class="@if ($menu == 'masterjeniskemampuan') {{'actives'}} @endif">
                                    <a class="soft" href="{{URL::to('masterjeniskemampuan')}}"><i class="fa fa-angle-double-right fa-fw"></i>Master Jenis Kemampuan</a>
                                </li>
									
                                <li class="@if ($menu == 'masterkurikulum') {{'actives'}} @endif">
                                    <a class="soft" href="{{URL::to('masterkurikulum')}}"><i class="fa fa-angle-double-right fa-fw"></i>Master Kurikulum</a>
                                </li>
							
                                <li class="@if ($menu == 'masterlaboratorium') {{'actives'}} @endif">
                                    <a class="soft" href="{{URL::to('masterlaboratorium')}}"><i class="fa fa-angle-double-right fa-fw"></i>Master Laboratorium</a>
                                </li>
							
                                <li class="@if ($menu == 'mastermahasiswa') {{'actives'}} @endif">
                                    <a class="soft" href="{{URL::to('mastermahasiswa')}}"><i class="fa fa-angle-double-right fa-fw"></i>Master Mahasiswa</a>
                                </li>
							
                                <li class="@if ($menu == 'mastermatakuliah') {{'actives'}} @endif">
                                    <a class="soft" href="{{URL::to('mastermatakuliah')}}"><i class="fa fa-angle-double-right fa-fw"></i>Master Mata Kuliah</a>
                                </li>
									
                                <li class="@if ($menu == 'masterprodi') {{'actives'}} @endif">
                                    <a class="soft" href="{{URL::to('masterprodi')}}"><i class="fa fa-angle-double-right fa-fw"></i>Master Prodi</a>
                                </li>
							
                                <li class="@if ($menu == 'masterketenagapendidikan') {{'actives'}} @endif">
                                    <a class="soft" href="{{URL::to('masterketenagapendidikan')}}"><i class="fa fa-angle-double-right fa-fw"></i>Master Ketenagapendidikan</a>
                                </li>
								
                            </ul>
						</li>
						 <li  class="@if ($menu == 'lampiran1' || $menu == 'lampiran2' || $menu == 'lampiran3' || $menu == 'lampiran4' || $menu == 'lampiran5' || $menu == 'lampiran6' || $menu == 'lampiran7') {{'active'}} @endif">
                            <a class="soft" href="#"><i class="fa fa-folder-open fa-fw"></i>Lampiran<span class="caret arrow"></span></a>
							
                            <ul class="nav nav-second-level">
                               <li class="@if ($menu == 'lampiran1') {{'actives'}} @endif">
                                    <a class="soft" href="{{URL::to('lampiran1')}}"><i class="fa fa-th-list fa-fw"></i>Lampiran Standar I</a>
                                </li>
							
                                <li class="@if ($menu == 'lampiran2') {{'actives'}} @endif">
                                    <a class="soft" href="{{URL::to('lampiran2')}}"><i class="fa fa-th-list fa-fw"></i>Lampiran Standar II</a>
                                </li>
							
                                <li class="@if ($menu == 'lampiran3') {{'actives'}} @endif">
                                    <a class="soft" href="{{URL::to('lampiran3')}}"><i class="fa fa-th-list fa-fw"></i>Lampiran Standar III</a>
                                </li>
								
                                <li class="@if ($menu == 'lampiran4') {{'actives'}} @endif">
                                    <a class="soft" href="{{URL::to('lampiran4')}}"><i class="fa fa-th-list fa-fw"></i>Lampiran Standar IV</a>
                                </li>
							
                                <li class="@if ($menu == 'lampiran5') {{'actives'}} @endif">
                                    <a class="soft" href="{{URL::to('lampiran5')}}"><i class="fa fa-th-list fa-fw"></i>Lampiran Standar V</a>
                                </li>
							
                                <li class="@if ($menu == 'lampiran6') {{'actives'}} @endif">
                                    <a class="soft" href="{{URL::to('lampiran6')}}"><i class="fa fa-th-list fa-fw"></i>Lampiran Standar VI</a>
                                </li>
									
                                 <li class="@if ($menu == 'lampiran7') {{'actives'}} @endif">
                                    <a class="soft" href="{{URL::to('lampiran7')}}"><i class="fa fa-th-list fa-fw"></i>Lampiran Standar VII</a>
                                </li>
								
								
                            </ul>
						</li>
                                
                                
                                                 
				</ul>
			</div>
            <!-- /.navbar-collapse -->