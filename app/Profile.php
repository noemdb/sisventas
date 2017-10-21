<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Authenticatable
{
    //

    use Notifiable;
    use SoftDeletes;

    //usada para el softdelete
    protected $dates = ['deleted_at'];

    //para el getFullNameAttribute
    protected $appends = ['fullName'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','firstname', 'lastname', 'url_img','is_admin', 'is_user1', 'is_user2', 'is_user3',
    ];

    public function getFullNameAttribute()
    {
      return $this->firstname .' ' . $this->lastname;
    }

    public function setCreated_atAtAttribute( $value ) {
      $this->attributes['created_at'] = (new Carbon($value))->format('d-m-Y hh:i:s');
    }

    public function setUpdated_atAtAttribute( $value ) {
      $this->attributes['created_at'] = (new Carbon($value))->format('d-m-Y hh:i:s');
    }


      //realtionship 1:1
      public function user()
      {
          return $this->belongsTo('App\User');
      }

    
      public function scopeUsername($query, $arr_dat){

          //dd($arr_dat);

          //añade condicion para el username
          if(trim($arr_dat['username'])!=""){
              $query->where('username', 'like', "%".$arr_dat['username']."%")
                    ->orWhere('firstname', 'like', "%".$arr_dat['username']."%")
                    ->orWhere('lastname', 'like', "%".$arr_dat['username']."%");
          }
          
          //añade condicion para el is_active
          if(trim($arr_dat['is_active'])!=""){
              $query->where('users.is_active', '=', $arr_dat['is_active']);
          }

          //añade condicion para el is_admin
          if(trim($arr_dat['is_admin'])!=""){
              $query->where('is_admin', '=', $arr_dat['is_admin']);
          }

          return $query;

      }

}
