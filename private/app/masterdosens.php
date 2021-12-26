<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class masterdosens extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	protected $fillable = [];
	protected $primaryKey = 'nip';
	
}
?>