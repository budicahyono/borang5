<?php namespace App\Libraries;

use DB;

class Fungsi 
{
    public  function getData($jenis=null, $jenjang=null) {
        $kegiatandosen = DB::table('masterketenagapendidikans')->where('jenis','=',$jenis)->where('jenjangPendidikanTerakhir','=',$jenjang)->count();
		return $kegiatandosen;
    }
	
	
	public  function getjmlMhs($angkatan=null, $thnakademik=null) {
        $jmlmhs = DB::table('tbjumlahmahasiswas')->select('jumlah')->where('angkatan','=',$angkatan)->where('tahunAkademikBerjalan','=',$thnakademik)->get();
		foreach($jmlmhs as $row)
			return $row->jumlah;
    }
	
	public  function getlulusanMhs($angkatan=null) {
        $jmlmhs = DB::table('tbjumlahmahasiswas')->select('jumlahLulusan',DB::raw('sum(jumlahLulusan) as jumlahlulusan'))->where('angkatan','=',$angkatan)->get();
		foreach($jmlmhs as $row)
			return $row->jumlahlulusan;
    }

    public  function getDana($sumber=null, $tahun=null) {
        $sumberdana = DB::table('tbsumberdanas')->where('sumberDana','=',$sumber)->where('tahun','=',$tahun)->get();
		foreach($sumberdana as $row)
			return $row->jumlahDana;
    }
	
	public  function buatrp($angka)
	{
	 $jadi = "Rp " . number_format($angka,0,',','.');
	return $jadi;
	}
}
?>