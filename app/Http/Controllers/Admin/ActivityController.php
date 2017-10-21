<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Activity;
use App\User;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $arr_get = [
            'user_id'=>$request->get('user_id'),
            'action'=>$request->get('action'),
            'model_class'=>$request->get('model_class'),
            'created_at'=>$request->get('created_at')
        ];

        $activities = Activity::select('activities.*','users.username')
            ->join('users', 'activities.user_id', '=', 'users.id')
            ->activity($arr_get)
            ->orderBy('activities.id','DESC')
            // ->with('users')
            ->paginate(15);
            // dd($activities);
        $username = User::orderBy('username','desc')->has('activity')->pluck('username', 'id');
        $action = Activity::orderBy('action','desc')->pluck('action', 'action');
        $model_class = Activity::orderBy('model_class','desc')->pluck('model_class', 'model_class');
        return view('admin.activities.index', compact('activities','username','action','model_class'));
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
