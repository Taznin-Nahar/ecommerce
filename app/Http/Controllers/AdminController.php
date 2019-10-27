<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
session_start();

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->adminAuthCheck();
        return view('admin.admin_login');
    }

    public function adminLogin(Request $request){
        $email=$request->admin_email;
        $password=$request->password;
        $result = DB::table('admin')
                ->where('admin_email', $email)
                ->where('password',md5($password))
                ->first();
                
                

                // 
                if ($result) {
                    # code...
                    Session::put('admin_name',$result->admin_name);
                    Session::put('admin_id',$result->admin_id);
                    // return view('admin.admin_master');
                    return Redirect::to('/dashboard');
                }else{
                    Session::put('exception','User ID or password invalid!');
                    return Redirect::to('/admin');
                }
         
    }

    public function adminAuthCheck(){
        $admin_id=Session::get('admin_id');

        if ($admin_id) {
             return Redirect::to('/dashboard')->send();
        }else{

            return;
        }
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
