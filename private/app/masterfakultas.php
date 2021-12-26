<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class masterfakultas extends Model{

	protected $fillable = [];
	protected $primaryKey = 'idfakultas';
	
	public function masterfakultas() 
	{
		return $this->belongsTo('App\masterfakultas','idfakultas');
	}
}
?>