<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Request;

class StatusUser extends Model
{


    protected $fillable = [
        'action', 'message', 'context', 'extra','ip', 'view', 'user_id'
    ];

    // INI relationships
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    // INI relationships

    public static function saveLogin($user_id,$username){
        
        $data = array(
            'user_id' => $user_id, 
            'message' => 'El usuario: '.$username.' inició sesión correctamente',
            'action' => 'LogSuccessfulLogin',
            'ip' => Request::ip(),
        );
        $StatusUsers = StatusUser::create($data);
    }

    public static function saveLoginOut($user_id,$username){
        
        $data = array(
            'user_id' => $user_id, 
            'message' => 'El usuario: '.$username.' cerró sesión correctamente',
            'action' => 'LogSuccessfulLogout',
            'ip' => Request::ip(),
        );
        $StatusUsers = StatusUser::create($data);
    }

    public function scopeStatusUser($query, $arr_dat){

        //añade condicion para el username
        if(trim($arr_dat['user_id'])!=""){
            $query->where('users.id', '=', $arr_dat['user_id']);
        }
        
        //añade condicion para el action
        if(trim($arr_dat['action'])!=""){
            $query->where('status_users.action', '=', $arr_dat['action']);
        }

        //añade condicion para el created_at
        if(trim($arr_dat['created_at'])!=""){
            $query->where('status_users.created_at', 'like', "%".$arr_dat['created_at']."%");
        }

        // dd($query);
        return $query;

    }
}
