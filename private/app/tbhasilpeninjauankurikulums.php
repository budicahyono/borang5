<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbhasilpeninjauankurikulums extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	public function mastermatakuliahs() 
	{
		return $this->belongsTo('App\mastermatakuliahs','idmatakuliah');
	}
	public function tbpeninjauankurikulums() 
	{
		return $this->belongsTo('App\tbpeninjauankurikulums','idpeninjauan');
	}
	public static $rules = [
        'idprodi' 				=> 'required',
		'idpeninjauan' 			=> 'required',
		'idmatakuliah' 			=> 'required',
		'statusMK' 				=> 'required',
		'perubahanPada' 		=> 'required',
		'isiPerubahan' 			=> 'required',
		'alasanPeninjauan' 		=> 'required',
		'atasUsulan' 			=> 'required',
		'semesterBerlaku' 		=> 'required|numeric|max:8',
		'tahunBerlaku' 			=> 'required|numeric|max:2100|min:1945',
    ];

    public static $messages = [
        'idprodi.required'     			=> 'Prodi harus dipilih',
        'idpeninjauan.required'   		=> 'Peninjauan harus diisi',
        'idmatakuliah.required'     	=> 'Kode Mata Kuliah harus diisi',
        'statusMK.required'     		=> 'Status Mata Kuliah harus diisi',
        'perubahanPada.required'     	=> 'Perubahan Pada harus diisi',
        'isiPerubahan.required'     	=> 'Isi Perubahan harus diisi',
        'alasanPeninjauan.required'     => 'Alasan Peninjauan harus diisi',
        'atasUsulan.required'  			=> 'Atas Usulan harus diisi',
		
        'semesterBerlaku.required'  	=> 'Semester Berlaku harus diisi',
        'semesterBerlaku.max'  			=> 'Penulisan Semester Berlaku salah',
        'semesterBerlaku.numeric'  		=> 'Semester Berlaku harus angka',
        
		'tahunBerlaku.required'  		=> 'Tahun Berlaku harus diisi',
		'tahunBerlaku.max'  			=> 'Penulisan Tahun salah',
		'tahunBerlaku.min'  			=> 'Penulisan Tahun salah',
		'tahunBerlaku.numeric'  		=> 'Tahun Berlaku harus angka',
        
    ];
}
?>