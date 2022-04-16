<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\User;
use App\Role_user; 
use DataTables;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

    public function add_role(){
    	$roles = Role::latest()->get();
    	return view('role.add_role', compact('roles'));
    }
      public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|unique:users',
       ]);

         Role::updateOrCreate(['id' => $request->role_id],
                ['name' => $request->name,
                 'description' => $request->description ]); 
                 $roles = Role::latest()->get();
                 return view('role.add_role', compact('roles')); 

    }
 
  		public function add_user(){
    	
    	return view('role.add_user' );
    }

    public function add_admin(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
       ]);

         $role = Role::where('name', $request['role'])->first();
         $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        
        Role_user::create([
 		'role_id' => $role->id,
 		'user_id' => $user->id,
        ]);
        
        return view('home')->with('message', 'Admin user added successfully'); 

    }

     public function index(Request $request)
    {
     
      $users = User::join('role_user', 'users.id', '=', 'role_user.user_id')
      				->join('roles', 'role_user.role_id', '=', 'roles.id')
                              ->select('users.*', 'roles.name  AS role_name')
                              ->latest()->get();

       return view('role.index', compact('users'));

    }

     public function edit_user($id, Request $request){
       $users = User::find($id);
       return view('role.edit_user', compact('users'));
    }
    public function delete_user($id){
        Role_user::where('user_id', $id)->delete();
        User::find($id)->delete();

        return redirect()->back()->with('message', 'Delete successfully');
    }

}
