<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbmkpilihans extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	
	public static $rules = [
        'idprodi' 					=> 'required',
        'idmatakuliah' 				=> 'required|unique:tbmkpilihans',
		'tahunAkademik' 			=> 'required|numeric|max:2100|min:1945',
		'namaMKPilihan' 			=> 'required',
		'bobotsks' 					=> 'required|numeric|max:9',
		'bobottugas' 				=> 'required|numeric|max:99',
		'Unit' 						=> 'required',
		'Semester' 					=> 'required|numeric|max:8',
    ];

    public static $messages = [
        'idprodi.required'     				 => 'Prodi harus dipilih',
		'idmatakuliah.required'     		 => 'Kode Mata Kuliah harus diisi',
		'idmatakuliah.unique'     		 	 => 'Kode Mata Kuliah sudah ada',
              
        'tahunAkademik.required'     		 => 'Tahun Akademik harus diisi',
        'tahunAkademik.numeric'     		 => 'Tahun Akademik harus angka',
        'tahunAkademik.max'     		     => 'Penulisan Tahun Akademik salah',
        'tahunAkademik.min'     		     => 'Penulisan Tahun Akademik salah',

        'namaMKPilihan.required'     		 => 'nama Mata kuliah pilihan harus dipilih',
        'Unit.required'     				 => 'Unit harus dipilih',

        'bobotsks.required'     		     => 'bobot SKS harus diisi',
        'bobottugas.required'    			 => 'bobot tugas harus diisi',
        'Semester.required' 				 => 'Semester harus diisi',

		'bobotsks.numeric'     		    	 => 'bobot SKS harus angka',
        'bobottugas.numeric'     			 => 'bobot tugas harus angka',
        'Semester.numeric'   				 => 'Semester harus angka',
		 
		'bobotsks.max'     		      		 => 'bobot SKS max 1 digit',
		'bobottugas.max'         			 => 'bobot tugas  max 2 digit',
        'Semester.max'       				 => 'Semester max 1 digit',
		
        
    ];
	
}
?>