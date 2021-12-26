<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbaktivitasmengajars extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public function masterdosens() 
	{
		return $this->belongsTo('App\masterdosens','nip');
	}
	
	public function mastermatakuliahs() 
	{
		return $this->belongsTo('App\mastermatakuliahs','idmatakuliah');
	}
	
	public static $rules = [
        'idprodi' 					=> 'required',
		'nip' 						=> 'required|numeric',
		'tahunAkademik' 			=> 'required|numeric|max:2100|min:1945',
		'idmatakuliah' 				=> 'required',
		'jumlahKelas' 				=> 'required|numeric|max:99',
		'jumlahRencanaPertemuan' 	=> 'required|numeric|max:99',
		'jumlahRealisasiPertemuan' 	=> 'required|numeric|max:99',
    ];

    public static $messages = [
        'idprodi.required'     				 => 'Prodi harus dipilih',

        'nip.required'   					 => 'nip harus diisi',
        'nip.numeric'   					 => 'nip harus angka',

        'tahunAkademik.required'     		 => 'Tahun Akademik harus diisi',
        'tahunAkademik.numeric'     		 => 'Tahun Akademik harus angka',
        'tahunAkademik.max'     		     => 'Penulisan Tahun Akademik salah',
        'tahunAkademik.min'     		     => 'Penulisan Tahun Akademik salah',

        'idmatakuliah.required'     		 => 'Kode Mata Kuliah harus diisi',

        'jumlahKelas.required'     		     => 'Jumlah Kelas harus diisi',
        'jumlahRencanaPertemuan.required'    => 'Jumlah Rencana Pertemuan harus diisi',
        'jumlahRealisasiPertemuan.required'  => 'Jumlah Realisasi Pertemuan harus diisi',

		'jumlahKelas.numeric'     		     => 'Jumlah Kelas harus angka',
        'jumlahRencanaPertemuan.numeric'     => 'Jumlah Rencana Pertemuan harus angka',
        'jumlahRealisasiPertemuan.numeric'   => 'Jumlah Realisasi Pertemuan harus angka',
		 
		'jumlahKelas.max'     		         => 'Jumlah Kelas max 2 digit',
		'jumlahRencanaPertemuan.max'         => 'Jumlah Rencana Pertemuan max 2 digit',
        'jumlahRealisasiPertemuan.max'       => 'Jumlah Realisasi Pertemuan max 2 digit',
		
        
    ]; 
	
}
?>