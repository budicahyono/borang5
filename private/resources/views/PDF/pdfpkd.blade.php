<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laporan Upaya Peningkatan Sumber Daya Manusia</title>
    <body>
      <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
        .tg td{font-family:Arial;font-size:11px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
        .tg th{font-family:Arial;font-size:11px;font-weight:normal;padding:9px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
        .tg .tg-3wr7{font-weight:bold;font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
        .tg .tg-ti5e{font-size:8px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
        .tg .tg-rv4w{font-size:8px;font-family:"Arial", Helvetica, sans-serif !important;}
      </style>
 
      <div style="font-family:Arial; font-size:12px;">

      </div>
			@if(Session::get('level')=='user')
				4.5.2  Peningkatan kemampuan dosen tetap melalui program tugas belajar dalam bidang yang sesuai dengan bidang PS<br>
			</div>
			<br>
			<table class="tg">
			  <tr>
			   
			    <th width="50px"><p class="text-center">No</p></th>
					<th width="100px"><p class="text-center">Nama Dosen</p></th>
					<th width="100px"><p class="text-center">Jenjang Pendidikan Lanjut</p></th>
					<th width="100px"><p class="text-center">Bidang Studi</p></th>
					<th width="100px"><p class="text-center">Perguruan Tinggi</p></th>
					<th width="100px"><p class="text-center">Negara</p></th>
					<th width="100px"><p class="text-center">Tahun Mulai</p></th>
			  </tr>
			 <?php $no=1; ?>
					@foreach($data8 as $key => $value)
						<tr>
							<td align="center">{{$no++}}</td>
							<td>{{$value->nama}}</td>
							<td align="center">{{$value->jenjang}}</td>
							<td>{{$value->bidangStudi}}</td>
							<td>{{$value->perguruanTinggi}}</td>
							<td>{{$value->negara}}</td>
							<td align="center">{{$value->tahunMulai}}</td>
							
						</tr>
					@endforeach
			</table>
			@endif
		</body>
	</head>
</html>