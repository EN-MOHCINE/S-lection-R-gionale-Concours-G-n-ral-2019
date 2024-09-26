<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class User1s extends Controller
{
    // /////////////////////////////////////////////////////////////////////
    public function index()
    {
        return view('index');
    }
    // /////////////////////////////////////////////////////////////////////
    // /////////////////////////////////////////////////////////////////////
    public function admin()
    {
        $utilisateurs=DB::table('users as s')
        ->select('s.Email', 's.FullName', 'r.RoleName')
        ->join('roles as r', 'r.RoleID', '=', 's.RoleID')
        ->get();;
        
        return view('admin',compact('utilisateurs'));
    }
    // /////////////////////////////////////////////////////////////////////
    public function editer($email)
        {
            $user=DB::table('users')->where('Email',$email)->first();
            
            return view('editer',compact('user'));
        }
     // /////////////////////////////////////////////////////////////////////
    
    public function update1(Request $request,$email)
        {
            $request->validate([
                'passwordAg' => 'sometimes|same:password',
                'password' => 'sometimes',
            ]);
                $data=[
                    'Gender' => $request->input('gender'),
                    'DateOfBirth' => $request->input('dateBith'),
                    'MobileNo' => $request->input('mobile'),
                    'RoleID' => $request->input('roles'),
                ];
            if($request->password){
                
                $data['Password']=$request->password ;
            }
            
            DB::table('users')->where('Email', $email)->update($data);
            Session::put("update","update succes");

            return redirect()->route("admin");
        
        }
     // /////////////////////////////////////////////////////////////////////

    public function sort(Request $request){
        $col=$request->input("sortcol") ; 
        $role=$request->input("sortRole") ; 
        $table=DB::table('users as s')
            ->select('s.Email', 's.FullName', 'r.RoleName')
            ->join('roles as r', 'r.RoleID', '=', 's.RoleID') ;
        if($role){
            $table->where('r.RoleName',$role) ; 
        }
        $utilisateurs=$table->orderBy($col)->get();
        return view('admin',compact('utilisateurs'));
    }
    
    // /////////////////////////////////////////////////////////////////////

    public function test(Request $request){
        $request->validate([
            "email"=>'required',
            "password"=>'required',
        ]);
        $email=$request->input("email") ; 
        $table=DB::table('users')->where('Email',$email)->first();

        if (isset($table)){
    
                if(!($table->Password=== $request->password)){
                    $title="ERREUR password invalid ";
                    return view('index',compact("title"));
                }else{

                    if($table->RoleID === "A"){
                        Session::put('auth',1);
                            return redirect()->route('admin');
                            
                    }elseif($table->RoleID==='M'){

                        Session::put('auth',1);
                        return view('Menu');

                    }else{
                        Session::put('auth',1);
                        return redirect()->route('admin');
                    };};
        }else{
            $title="ERREUR email invalid ";
            return view("index",compact("title"));  
        };  
    }


    // /////////////////////////////////////////////////////////////////////

    public function create()
    {
        //
    }
    // /////////////////////////////////////////////////////////////////////

    public function store(Request $request)
    {
        //
    }

       // /////////////////////////////////////////////////////////////////////

    public function show($id)
    {
        //
    }

        // /////////////////////////////////////////////////////////////////////

    public function edit($id)
    {
        //
    }

        // /////////////////////////////////////////////////////////////////////

    public function update(Request $request, $id)
    {
        //
    }

        // /////////////////////////////////////////////////////////////////////

    public function destroy($id)
    {
        //
    }
}
