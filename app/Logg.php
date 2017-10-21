<?php

namespace App;

use Auth;
use Request;
use Illuminate\Database\Eloquent\Model;


class Logg extends Model
{

    protected $fillable = [
        'env','auth_user', 'message', 'sql', 'bindings','time', 'level', 'context', 'ip', 'view',
    ];

    public static function saveUpdate($username,$ip='localhost'){

        $auth_user = Auth::user();
        $log = array(
            'auth_user'=>$auth_user->username,
            'message' => 'El usuario: '.$username.' se actualizó correctamente', 
            'level' => 'UPDATE',
            'ip' => Request::ip(),
        );
        $logs = Logg::create($log);
    }


    public static function saveCreate($username,$ip='localhost'){

        // INI para evitar error en la migracion y seed
        $auth_user = '';
        if(!empty(Auth::user())){
            $auth_user = Auth::user()->username;
        }
        // FIN para evitar error en la migracion y seed

        $log = array(
            'auth_user'=>$auth_user,
            'message' => 'El usuario: '.$username.' se creó correctamente', 
            'level' => 'UPDATE',
            'ip' => Request::ip(),
        );
        $logs = Logg::create($log);
    }
}
