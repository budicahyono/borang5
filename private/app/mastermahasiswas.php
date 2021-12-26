<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class mastermahasiswas extends Model{

	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
}
?>