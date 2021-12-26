<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbmhsregulers extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public function mastermatakuliahs() 
	{
		return $this->belongsTo('App\mastermatakuliahs','idprodi');
	}
	
	public static $rules = [
        'idprodi' 							=> 'required',
		'tahunAkademik' 					=> 'required|numeric|max:2100|min:1945',
		'dayaTampung' 						=> 'required|numeric|max:999',
		'calonMahasiswaIkut' 				=> 'required|numeric|max:999',
		'calonMahasiswaLulus' 				=> 'required|numeric|max:999',
		'mahasiswaBaruReguler' 				=> 'required|numeric|max:999',
		'mahasiswaBaruTransfer' 			=> 'required|numeric|max:999',
		'totalMahasiswaReguler' 			=> 'required|numeric|max:999',
		'totalMahasiswaTransfer' 			=> 'required|numeric|max:999',
		'mahasiswaLulusReguler' 			=> 'required|numeric|max:999',
		'mahasiswaLulusTransfer' 			=> 'required|numeric|max:999',
		'ipkLulusMinimum' 					=> 'required|numeric|max:4',
		'ipkLulusRerata' 					=> 'required|numeric|max:4',
		'ipkLulusMaksimum' 					=> 'required|numeric|max:4',
		'persenIPK1' 						=> 'required|numeric|max:99',
		'persenIPK2' 						=> 'required|numeric|max:99',
		'persenIPK3' 						=> 'required|numeric|max:99',
    ];

    public static $messages = [
        'idprodi.required'     				=> 'Prodi harus dipilih',
        'tahunAkademik.required'    		=> 'Tahun Akademik harus diisi',
        'dayaTampung.required'    			=> 'Daya Tampung harus diisi',
        'calonMahasiswaIkut.required'     	=> 'Calon Mahasiswa Terdaftar harus diisi',
        'calonMahasiswaLulus.required'     	=> 'Calon Mahasiswa Lulus harus diisi',
        'mahasiswaBaruReguler.required'     => 'Mahasiswa Baru Reguler harus diisi',
        'mahasiswaBaruTransfer.required'    => 'mahasiswa Baru Transfer harus diisi',
        'totalMahasiswaReguler.required'    => 'Total Mahasiswa Reguler harus diisi',
        'totalMahasiswaTransfer.required'   => 'Total mahasiswa Transfer harus diisi',
        'mahasiswaLulusReguler.required'    => 'Mahasiswa Lulus Reguler harus diisi',
        'mahasiswaLulusTransfer.required'  	=> 'Mahasiswa Lulus Transfer harus diisi',
        'ipkLulusMinimum.required'  		=> 'IPK Lulus Minimum harus diisi',
        'ipkLulusRerata.required'  			=> 'IPK Lulus Rata-Rata harus diisi',
        'ipkLulusMaksimum.required'  		=> 'IPK Lulus Maksimum harus diisi',
        'persenIPK1.required'  				=> 'Persentase IPK < 2.75 harus diisi',
        'persenIPK2.required' 			 	=> 'Persentase IPK 2.75 - 3.00 harus diisi',
        'persenIPK3.required'  				=> 'Persentase IPK > 3.00 harus diisi',
		
		'dayaTampung.numeric'    			=> 'Daya Tampung harus angka',
		'tahunAkademik.numeric'    			=> 'Tahun Akademik harus angka',
        'calonMahasiswaIkut.numeric'     	=> 'Calon Mahasiswa Terdaftar harus angka',
        'calonMahasiswaLulus.numeric'     	=> 'Calon Mahasiswa Lulus harus angka',
        'mahasiswaBaruReguler.numeric'     	=> 'Mahasiswa Baru Reguler harus angka',
        'mahasiswaBaruTransfer.numeric'    	=> 'mahasiswa Baru Transfer harus angka',
		'totalMahasiswaReguler.numeric'    	=> 'Total Mahasiswa Reguler harus angka',
        'totalMahasiswaTransfer.numeric'   	=> 'Total mahasiswa Transfer harus angka',
        'mahasiswaLulusReguler.numeric'    	=> 'Mahasiswa Lulus Reguler harus angka',
        'mahasiswaLulusTransfer.numeric'  	=> 'Mahasiswa Lulus Transfer harus angka',
        'ipkLulusMinimum.numeric'  			=> 'IPK Lulus Minimum harus angka',
        'ipkLulusRerata.numeric'  			=> 'IPK Lulus Rata-Rata harus angka',
        'ipkLulusMaksimum.numeric'  		=> 'IPK Lulus Maksimum harus angka',
        'persenIPK1.numeric'  				=> 'Persentase IPK < 2.75 harus angka',
        'persenIPK2.numeric' 			 	=> 'Persentase IPK 2.75 - 3.00 harus angka',
        'persenIPK3.numeric'  				=> 'Persentase IPK > 3.00 harus angka',
		
		'dayaTampung.max'    				=> 'Daya Tampung max 3 digit',
        'calonMahasiswaIkut.max'     		=> 'Calon Mahasiswa Terdaftar max 3 digit',
		'tahunAkademik.max'    				=> 'Penulisan Tahun Akademik salah',
		'tahunAkademik.min'    				=> 'Penulisan Tahun Akademik salah',
        'calonMahasiswaLulus.max'     		=> 'Calon Mahasiswa Lulus max 3 digit',
        'mahasiswaBaruReguler.max'     		=> 'Mahasiswa Baru Reguler max 3 digit',
        'mahasiswaBaruTransfer.max'    		=> 'mahasiswa Baru Transfer max 3 digit',
		'totalMahasiswaReguler.max'    		=> 'Total Mahasiswa Reguler max 3 digit',
        'totalMahasiswaTransfer.max'   		=> 'Total mahasiswa Transfer max 3 digit',
        'mahasiswaLulusReguler.max'    		=> 'Mahasiswa Lulus Reguler max 3 digit',
        'mahasiswaLulusTransfer.max'  		=> 'Mahasiswa Lulus Transfer max 3 digit',
        'ipkLulusMinimum.max'  				=> 'penulisan IPK Lulus Minimum salah',
        'ipkLulusRerata.max'  				=> 'penulisan IPK Lulus Rata-Rata salah',
        'ipkLulusMaksimum.max'  			=> 'penulisan IPK Lulus Maksimum salah',
        'persenIPK1.max'  					=> 'Persentase IPK < 2.75 max 2 digit',
        'persenIPK2.max' 			 		=> 'Persentase IPK 2.75 - 3.00 max 2 digit',
        'persenIPK3.max'  					=> 'Persentase IPK > 3.00 max 2 digit',
        
    ];
	
	public static $rules_dok = [
		'daftar_lulusan' 	=> 'required',
    ];

    public static $messages_dok = [
        'daftar_lulusan.required' => 'Unggah filenya dulu',
        
    ];
	
}
?>