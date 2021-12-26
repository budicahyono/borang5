<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class masterketenagapendidikans extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	public function masterfakultas() 
	{
		return $this->belongsTo('App\masterfakultas','idfakultas');
	}
	

}
?>