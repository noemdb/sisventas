<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/*Clases adicionadas*/
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'is_active',
    ];

    //usada para el softdelete
    protected $dates = ['deleted_at'];

    public function setPasswordAttribute($value){
        
        if (! empty($value)) {

            $this->attributes['password'] = bcrypt($value);

        }
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    //funcion para la contruccion del query para los usuarios
    //Cuando se llama desde un formulario de busqueda
    public function scopeUsername($query, $arr_dat){

//        dd($query);

        //añade condicion para el username
        if(trim($arr_dat['username'])!=""){
            $query->where('username', 'like', "%".$arr_dat['username']."%")
                  ->orWhere('email', 'like', "%".$arr_dat['username']."%");
        }
        
        //añade condicion para el is_active
        if(trim($arr_dat['is_active'])!=""){
            $query->where('is_active', '=', $arr_dat['is_active']);
        }

        //añade condicion para el is_admin
        if(trim($arr_dat['is_admin'])!=""){
            //dd($arr_dat);
            $query->where('profiles.is_admin', '=', $arr_dat['is_admin']);
        }

        //dd($query);
        return $query;

    }
}
