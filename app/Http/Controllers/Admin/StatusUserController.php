<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\StatusUser;
use App\User;

class StatusUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = StatusUser::all();

        $arr_get = [
            'user_id'=>$request->get('user_id'),
            'action'=>$request->get('action'),
            'model_class'=>$request->get('model_class'),
            'created_at'=>$request->get('created_at')
        ];

        $status_users = StatusUser::select('status_users.*','users.username')
            ->join('users', 'status_users.user_id', '=', 'users.id')
            ->statususer($arr_get)
            ->orderBy('status_users.id','DESC')
            ->paginate(15);
        // dd($status_users);

        $username = User::orderBy('username','desc')->has('statususer')->pluck('username', 'id');
        $action = StatusUser::orderBy('action','desc')->pluck('action', 'action');
        // $model_class = StatusUser::orderBy('model_class','desc')->pluck('model_class', 'model_class');
        return view('admin.status_users.index', compact('status_users','username','action','model_class'));

        // dd($status->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
