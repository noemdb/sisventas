<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/*Clases adicionadas*/
use App\Profile;
use App\User;
use App\Http\Requests\CreateProfileRequest;
use App\Http\Requests\EditProfileRequest;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
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
        $arr_get = ['username'=>$request->get('username'), 'is_active'=>$request->get('is_active'), 'is_admin'=>$request->get('is_admin')];
        //dd($arr_get);

        $profiles = Profile::select('profiles.*','users.username', 'users.email', 'users.is_active', 'users.created_at as ucreated_at', 'users.updated_at as uupdated_at')
        ->join('users', 'profiles.user_id', '=', 'users.id')
        ->WhereNull('users.deleted_at') // is null
        ->with('user') 
        ->username($arr_get)
        ->orderBy('profiles.user_id','DESC')
        ->paginate(25);

        return view('admin.profiles.index', compact('profiles'));
    }


    public function trash(Request $request)
    {
        //variables del formulario de busqueda
        $arr_get = [
            'username'=>$request->get('username'),
            'is_active'=>$request->get('is_active'),
            'is_admin'=>$request->get('is_admin')
        ];

        $profiles = Profile::select('profiles.*','users.username', 'users.email', 'users.is_active', 'users.created_at as ucreated_at', 'users.updated_at as uupdated_at')
        ->username($arr_get)
        ->leftjoin('users', 'profiles.user_id', '=', 'users.id')
        ->orderBy('profiles.user_id','DESC')
        ->whereNotNull('users.deleted_at') // is null
        ->onlyTrashed()
        ->paginate(25);

        //dd($profiles);

        return view('admin.profiles.trash', compact('profiles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(CreateProfileRequest $request)
    // {
        
    //     //dd($request);

    //     $profile = Profile::create($request->all());

    //     Session::flash('operp_ok',trans('db_oper_result.profile_create_ok'));

    //     return redirect()->route('profiles.index');
    // }

    public function store(CreateProfileRequest $request)
    {
        $user = Profile::create($request->all());
        $messenge = trans('db_oper_result.profile_create_ok');

        if($request->ajax()){
            //return $messenge;
            return response()->json([
                "user_id"=>$request->user_id,
                "firstname"=>$request->firstname,
                "lastname"=>$request->lastname,
                "url_img"=>$request->url_img,
                "is_admin"=>$request->is_admin,
                "is_user1"=>$request->is_user1,
                "is_user2"=>$request->is_user2,
                "is_user3"=>$request->is_user3,
                "messenge"=>$messenge
            ]);
        }

        $messenge = trans('db_oper_result.profile_create_not');
        Session::flash('operp_ok',$messenge.' -> ('.$profile->fullName.')');
        return redirect()->route('profiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //dd('ControllerProfile edit: '.$id);
        $profile = Profile::findOrFail($id);
        return view('admin.profiles.edit',compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(EditProfileRequest $request, $id)
    // {
    //     //dd($request);
    //     $profile = Profile::findOrFail($id);
    //     $profile->fill($request->all());
    //     $profile->save();
    //     Session::flash('operp_ok',trans('db_oper_result.profile_update_ok'));
    //     return redirect()->route('profiles.index');
        
    // }

        public function update(EditProfileRequest $request, $id)
    {
        $prifile = Profile::findOrFail($id);
        $jprifile = $prifile;
        $prifile->fill($request->all());
        $prifile->save();
        $messenge = trans('db_oper_result.profile_update_ok');

        if($request->ajax()){
            return response()->json([
                "firstname"=>$request->firstname,
                "lastname"=>$request->lastname,
                // "url_img"=>$request->url_img,
                "is_admin"=>$request->is_admin,
                "is_user1"=>$request->is_user1,
                "is_user2"=>$request->is_user2,
                "is_user3"=>$request->is_user3,
                "messenge"=>$messenge
            ]);
        }

        $messenge = trans('db_oper_result.profile_update_not');
        Session::flash('operp_ok',$messenge.' -> ('.$profile->fullName.')');
        return redirect()->route('profiles.index');
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
        //dd($request);
        $profile = Profile::findOrFail($id);
        $user = $profile->user;
        
        $profile->delete();
        if(isset($user->id)){
            $user->delete();
        }

        $messenge = trans('db_oper_result.profile_destroy_ok');

        if($request->ajax()){
            return $messenge;
        }
        
        $messenge = trans('db_oper_result.profile_destroy_not_ok');
        Session::flash('operp_ok',$messenge.' -> ('.$profile->fullName.')');
        return redirect()->route('profiles.index');
    }

    public function restore( $id, Request $request)
    {
        $profile = Profile::withTrashed()
            ->with('user')
            ->where('id', '=', $id)
            ->first();

        $user = User::withTrashed()
            ->where('id','=',$profile->user_id)
            ->first();

        //Restauramos el registro
        $profile->restore();
        if(isset($profile->user_id)){
            $user->restore();
        }

        $messenge = trans('db_oper_result.user_restored_ok');

        if($request->ajax()){
            return $messenge;
        }

        $messenge = trans('db_oper_result.user_restored_ok');
        Session::flash('operp_ok',$messenge.' -> ('.$profile->fullname.')');

        return \Redirect::route( "profiles.trash" );
    }

    public function force_destroy($id, Request $request)
    {
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

        $messenge = trans('db_oper_result.user_force_destroy_ok');
        Session::flash('operp_ok',$messenge.' -> ('.$user->username.')');
        return redirect()->route('users.trash');
    }

}
