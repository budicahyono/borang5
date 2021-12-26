<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class masterkurikulums extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	protected $fillable = [];
	protected $primaryKey = 'idkurikulum';
	
}
?>