<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Login extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'logins';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'username', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
	
	
	public function akses()
    {
        return $this->hasMany('App\Akses','id_logins');
    }
	
	public function tbvises()
    {
        return $this->hasOne('App\tbvises','idprodi');
    }
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
		'firstname' 	=> 'required',
		'lastname' 		=> 'required',
		'username' 		=> 'required|unique:logins',
		'password' 		=> 'required',
		'level' 		=> 'required',
    ];

    public static $messages = [
        'firstname.required'    => 'First Name harus diisi',
        'lastname.required'     => 'Last Name harus diisi',
        'username.required'     => 'Username harus diisi',
        'username.unique'     	=> 'Username sudah ada',
        'password.required'     => 'Password harus diisi',
        'level.required'     	=> 'Level harus dipilih',
        
    ];
	
	public static $rules_edit = [
		'firstname' 	=> 'required',
		'lastname' 		=> 'required',
		'username' 		=> 'required',
		'password' 		=> 'required',
		'level' 		=> 'required',
    ];

    public static $messages_edit = [
        'firstname.required'    => 'First Name harus diisi',
        'lastname.required'     => 'Last Name harus diisi',
        'username.required'     => 'Username harus diisi',
        'username.unique'     	=> 'Username sudah ada',
        'password.required'     => 'Password harus diisi',
        'level.required'     	=> 'Level harus dipilih',
        
    ];
}
