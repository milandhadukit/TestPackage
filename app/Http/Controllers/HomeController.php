<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
    //    $a=\DB::select('CALL ge_users()');
       $id=\DB::select('CALL users(5)'); //pass parameter id
       return $id;
    }


    public function userDelete($id)
     {

            \DB::select('call delete_user(?)',[$id]);
            return "delete";
    }
    
    public function updateUser(Request $request)
    {

         $id=$request->id;
        $name=$request->name;
        $address=$request->address;

         \DB::select('call update_user(?,?,?)',[$id,$name,$address]);
        return "update";
    }
    
}
