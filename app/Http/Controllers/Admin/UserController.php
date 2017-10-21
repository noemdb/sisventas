<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/*Clases adicionadas*/
use App\User;
use App\Profile;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    /*
        Constructor, verifica login del usuario - Profile
    */
    public function __construct(){

        $this->middleware('auth');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        //variables del formulario de busqueda
        $arr_get = [
            'username'=>$request->get('username'),
            'is_active'=>$request->get('is_active'),
            'is_admin'=>$request->get('is_admin')
        ];

        $users = User::select('users.*','profiles.id as id_profile','profiles.is_admin','profiles.is_user1','profiles.is_user2','profiles.is_user3','profiles.url_img','profiles.created_at as pcreated_at','profiles.updated_at as pupdated_at','profiles.deleted_at as pdeleted_at', \DB::raw('CONCAT(firstname, " ", lastname) AS fullname'))
            ->leftjoin('profiles', 'profiles.user_id', '=', 'users.id')
            ->username($arr_get)
            ->orderBy('users.id','DESC')
            ->with('profile')
            ->paginate(15);
            //dd($users);

        return view('admin.users.index', compact('users'));
    }

    public function trash(Request $request)
    {
        
        //variables del formulario de busqueda
        //dd($request);

        $arr_get = [
            'username'=>$request->get('username'), 
            'is_active'=>$request->get('is_active'), 
            'is_admin'=>$request->get('is_admin')
        ];

        $users = User::select('users.*','profiles.id as id_profile','profiles.is_admin','profiles.is_user1','profiles.is_user2','profiles.is_user3','profiles.url_img','profiles.created_at as pcreated_at','profiles.updated_at as pupdated_at','profiles.deleted_at as pdeleted_at', \DB::raw('CONCAT(firstname, " ", lastname) AS fullname'))
            ->leftjoin('profiles', 'profiles.user_id', '=', 'users.id')
            ->username($arr_get)
            ->orderBy('users.id','DESC')
            ->with('profile')
            ->onlyTrashed()
            ->paginate(15);

            //dd($users);
  
        return view('admin.users.trash', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(CreateUserRequest $request)
    {

        $user = User::create($request->all());
        $messenge = trans('db_oper_result.user_create_ok');;

        if($request->ajax()){
            //return $messenge;
            return response()->json([
                "username"=>$request->username,
                "email"=>$request->email,
                "is_active"=>$request->is_active,
                "messenge"=>$messenge
            ]);
        }
        
        Session::flash('operp_ok',trans('db_oper_result.user_create_ok'));
        return redirect()->route('users.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::findOrFail($id);
        //dd($use);

        return view('admin.users.show',compact('user'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=1)
    {
        
        $user = User::findOrFail($id);

        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $old_user = clone $user;
        $user->fill($request->all());
        $user->save();
        // Log::info('Update user.', ['data_old' => $old_user, 'data_new' => $user]);

        $messenge = trans('db_oper_result.user_update_ok');

        if($request->ajax()){
            return response()->json([
                "username"=>$request->username,
                "email"=>$request->email,
                "is_active"=>$request->is_active,
                "messenge"=>$messenge
            ]);
        }
        Session::flash('operp_ok',trans('db_oper_result.user_update_ok'));
        return redirect()->route('users.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        //
        $user = User::findOrFail($id);
        $old_user = clone $user;

        $profile = $user->profile;        

        $user->delete();
        // Log::info('Destroy user.', ['data_old' => $old_user, 'data_new' => $user]);
        if(isset($profile->id)){
            $old_profile = clone $profile;
            $profile->delete();
            // Log::info('Destroy profile.', ['data_old' => $old_user, 'data_new' => $user]);
        }

        $messenge = trans('db_oper_result.user_destroy_ok');

        if($request->ajax()){
            return $messenge;
        }
        
        $messenge = trans('db_oper_result.user_destroy_ok');
        Session::flash('operp_ok',$messenge.' -> ('.$user->username.')');
        return redirect()->route('users.index');
    }

    public function restore( $id, Request $request )
    {
        //return $id;
        $user = User::withTrashed()
            ->where('id', '=', $id)
            ->with('profile')
            ->first();

        $profile = Profile::withTrashed()
            ->where('user_id','=',$user->id)
            ->first();

        //Restauramos los registros
        $user->restore();
        if(isset($profile->id)){
            $profile->restore();
        }

        $messenge = trans('db_oper_result.user_restored_ok');

        if($request->ajax()){
            return $messenge;
        }

        $messenge = trans('db_oper_result.user_restored_ok');
        Session::flash('operp_ok',$messenge.' -> ('.$user->username.')');
        return \Redirect::route( "users.trash" );
    }

    public function force_destroy($id, Request $request)
    {
        
        //dd('force_destroy');
        $user = User::withTrashed()
            ->where('id', '=', $id)
            ->first();
        if(isset($user->id)){
            $temp = $user->forceDelete();
        }    

        $profile = Profile::withTrashed()
            ->where('user_id','=',$id)
            ->first();
        if(isset($profile->id)){
            $temp = $profile->forceDelete();
        }

        $messenge = trans('db_oper_result.user_force_destroy_ok');

        if($request->ajax()){
            return $messenge;
        }

        Session::flash('operp_ok',$messenge.' -> ('.$user->username.')');
        return redirect()->route('users.trash');
    }
}
