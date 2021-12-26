<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbpeningkatansuasanaakademiks extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
        'idprodi' 								=> 'required|unique:tbpeningkatansuasanaakademiks',
		'kebijakanSuasanaAkademik' 				=> 'required',
		'kegiatanLuarPembelajaran' 				=> 'required',
		'pengembanganPerilakuKecendekiawan' 	=> 'required',
		'ketersediaanSaranaPrasarana' 	=> 'required',
		'interaksiAkademik' 	=> 'required',
	
    ];

    public static $messages = [
        'idprodi.required'     							=> 'Prodi harus dipilih',
        'idprodi.unique'     							=> 'Prodi sudah ada',
        'kebijakanSuasanaAkademik.required'    			=> 'kebijakan Suasana Akademik harus diisi',
        'kegiatanLuarPembelajaran.required'     		=> 'kegiatan Luar Pembelajaran harus diisi',
        'pengembanganPerilakuKecendekiawan.required'    => 'pengembangan Perilaku harus diisi',
        'ketersediaanSaranaPrasarana.required'    		=> 'ketersediaan Sarana harus diisi',
        'interaksiAkademik.required'    				=> 'interaksi Akademik harus diisi',
       
        
    ];
	
}
?>