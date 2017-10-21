<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\User;
use Request;

class Activity extends Model
{
    
    // INI relationsheap
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    // FIN relationsheap

    public static function array_request($array_request = null){
    	$str = '';
    	foreach ($array_request as $key => $value) {
    		if ($key <> 'password' && $key <> '_token') {
    			$str .= $key.'=>'.$value.', ';
    		}
    	}
    	return substr($str,0,-2);
    }

    public static function record($action, $class = null){
        
    	$activity = new Activity();
        $request = request();
        $arr_request = $request->ToArray();
        $activity->data = $activity->array_request($arr_request);
    	$activity->action = $action;
        $activity->user_id = auth()->user()->id;
        $activity->ip = $request->ip();
        $activity->pathInfo = $request->getPathInfo();
        $activity->url =$request->server('HTTP_REFERER');
        $activity->model_class = $class;
        
        $activity->save();
    }

    //funcion para la contruccion del query para los usuarios
    //Cuando se llama desde un formulario de busqueda
    public function scopeActivity($query, $arr_dat){

        //añade condicion para el username
        if(trim($arr_dat['user_id'])!=""){
            $query->where('users.id', '=', $arr_dat['user_id']);
        }
        
        //añade condicion para el action
        if(trim($arr_dat['action'])!=""){
            $query->where('activities.action', '=', $arr_dat['action']);
        }

        //añade condicion para el model_class
        if(trim($arr_dat['model_class'])!=""){
            $query->where('activities.model_class', '=', $arr_dat['model_class']);
        }

        //añade condicion para el created_at
        if(trim($arr_dat['created_at'])!=""){
            $query->where('activities.created_at', 'like', "%".$arr_dat['created_at']."%");
        }

        // dd($query);
        return $query;

    }
}
