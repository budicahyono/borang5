<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbmhsnonregulers extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
        'idprodi' 							=> 'required',
		'tahunAkademik' 					=> 'required|numeric|max:2100|min:1945',
		'dayaTampung' 						=> 'required|numeric|max:999',
		'calonMahasiswaIkut' 				=> 'required|numeric|max:999',
		'calonMahasiswaLulus' 				=> 'required|numeric|max:999',
		'mahasiswaBaruNonReguler' 			=> 'required|numeric|max:999',
		'mahasiswaBaruTransfer' 			=> 'required|numeric|max:999',
		'totalMahasiswaNonReguler' 			=> 'required|numeric|max:999',
		'totalMahasiswaTransfer' 			=> 'required|numeric|max:999',
    ];

    public static $messages = [
        'idprodi.required'     				=> 'Prodi harus dipilih',
        'tahunAkademik.required'    		=> 'Tahun Akademik harus diisi',
        'dayaTampung.required'    			=> 'Daya Tampung harus diisi',
        'calonMahasiswaIkut.required'     	=> 'Calon Mahasiswa Terdaftar harus diisi',
        'calonMahasiswaLulus.required'     	=> 'Calon Mahasiswa Lulus harus diisi',
        'mahasiswaBaruNonReguler.required'  => 'Mahasiswa Baru Reguler harus diisi',
        'mahasiswaBaruTransfer.required'    => 'mahasiswa Baru Transfer harus diisi',
        'totalMahasiswaNonReguler.required' => 'Total Mahasiswa Reguler harus diisi',
        'totalMahasiswaTransfer.required'   => 'Total mahasiswa Transfer harus diisi',
		
		'dayaTampung.numeric'    			=> 'Daya Tampung harus angka',
		'tahunAkademik.numeric'    			=> 'Tahun Akademik harus angka',
        'calonMahasiswaIkut.numeric'     	=> 'Calon Mahasiswa Terdaftar harus angka',
        'calonMahasiswaLulus.numeric'     	=> 'Calon Mahasiswa Lulus harus angka',
        'mahasiswaBaruNonReguler.numeric'   => 'Mahasiswa Baru Reguler harus angka',
        'mahasiswaBaruTransfer.numeric'    	=> 'mahasiswa Baru Transfer harus angka',
		'totalMahasiswaNonReguler.numeric'  => 'Total Mahasiswa Reguler harus angka',
        'totalMahasiswaTransfer.numeric'   	=> 'Total mahasiswa Transfer harus angka',
		
		'dayaTampung.max'    				=> 'Daya Tampung max 3 digit',
		'tahunAkademik.max'    				=> 'Penulisan Tahun Akademik salah',
		'tahunAkademik.min'    				=> 'Penulisan Tahun Akademik salah',
        'calonMahasiswaIkut.max'     		=> 'Calon Mahasiswa Terdaftar max 3 digit',
        'calonMahasiswaLulus.max'     		=> 'Calon Mahasiswa Lulus max 3 digit',
        'mahasiswaBaruNonReguler.max'     	=> 'Mahasiswa Baru Reguler max 3 digit',
        'mahasiswaBaruTransfer.max'    		=> 'mahasiswa Baru Transfer max 3 digit',
		'totalMahasiswaNonReguler.max'    	=> 'Total Mahasiswa Reguler max 3 digit',
        'totalMahasiswaTransfer.max'   		=> 'Total mahasiswa Transfer max 3 digit',
        
    ];
	

}
?>