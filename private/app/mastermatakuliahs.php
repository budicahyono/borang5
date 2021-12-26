<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class mastermatakuliahs extends Model{
	
	protected $fillable = [];
	protected $primaryKey = 'idmatakuliah';
	
	
	public function tbpraktikums() 
	{
		return $this->hasMany('App\tbpraktikums','idmatakuliah');
	}
	
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public function masterkurikulums() 
	{
		return $this->belongsTo('App\masterkurikulums','idkurikulum');
	}
	
	
	public static $rules_dok = [
		'modul_praktikum' 	=> 'required',
    ];

    public static $messages_dok = [
        'modul_praktikum.required' => 'Unggah filenya dulu',
        
    ];
}	
?>