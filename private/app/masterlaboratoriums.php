<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class masterlaboratoriums extends Model{

	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
}
?>