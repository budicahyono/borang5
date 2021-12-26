<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class masterprodis extends Model{
	
	protected $fillable = [];
	protected $primaryKey = 'idprodi';
	
	public function masterfakultas() 
	{
		return $this->belongsTo('App\masterfakultas','idfakultas');
	}
	
	public static $rules = [
        'idprodi' 		=> 'required|unique:masterprodis',
		'namaProdi' 	=> 'required',
		'idfakultas' 	=> 'required',
		'jenjang' 		=> 'required',
		'kaprodi' 		=> 'required',
		'minSksLulus' 	=> 'required',
		
    ];

    public static $messages = [
        'idprodi.required'     		=> 'Prodi harus diisi',
        'idprodi.unique'     		=> 'Prodi sudah ada',
        'namaProdi.required'    	=> 'Nama Prodi harus diisi',
        'idfakultas.required'     	=> 'Fakultas harus dipilih',
        'jenjang.required'     		=> 'Jenjang harus diisi',
        'kaprodi.required'     		=> 'Ketua Program Studi harus diisi',
        'minSksLulus.required'     	=> 'Minimal SKS Lulus harus diisi',
        
        
    ];
}
?>

