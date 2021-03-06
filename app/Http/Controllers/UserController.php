<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role_User;
use Sentinel;
use Session;
use DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admins.user.index', compact('users'));
    }

    public function create()
    {
        return view('admins.user.create');
    }

    public function role_user()
    {
       $data = DB::select("SELECT id, first_name, last_name, user_id, role_id
            FROM users, role_users
            WHERE id = user_id");
        return view('admins.user.role_user', compact('data'));
    }


    public function store(Request $request)
    {

        try{
            $this->validate($request, array(
                'username'   => 'required',
                'last_name'  => 'required',
                'first_name' => 'required',
                'phone'      => 'required',
                'jabatan'    => 'required',
                'address'    => 'required'
            ));

            $users = [
                'username'   => $request->get('username'),
                'last_name'  => $request->get('last_name'),
                'first_name' => $request->get('first_name'),
                'phone'      => $request->get('phone'),
                'jabatan'    => $request->get('jabatan'),
                'address'    => $request->get('address'),
                'password'   => 'secret'
            ];
            
            $user = Sentinel::registerAndActivate($users);

            $role = Sentinel::findRoleBySlug('employee');
        
            $role->users()->attach($user);

            //if($users->save())
            //{
                Session::flash('new', 'New User was successfully added!');
                return redirect('user');
            //}
        } 
        catch(\Exception $e){
            return redirect()->back()->with('error', ' Sorry something went worng. Please try again.');
        } 
    }

    public function show($id)
    {
        $users = User::find($id);
        return view('admins.user.detail', compact('users'));
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('admins.user.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        try{
            $this->validate($request, array(
                'username'   => 'required',
                'last_name'  => 'required',
                'first_name' => 'required',
                'phone'      => 'required',
                'jabatan'    => 'required',
                'address'    => 'required'
            ));

            if(User::find($id)->update($request->all())){
                Session::flash('update', 'User data was successfully updated!');
                return redirect('user');
            }
        } 
        catch(\Exception $e){
            return redirect()->back()->with('error', ' Sorry something went worng. Please try again.');
        } 
    }

    public function update_role(Request $request, $id)
    {
        // try{
        //     $this->validate($request, array(
        //         'role_id'    => 'required'
        //     ));

        //     if(Role_User::find($id)->update($request->all())){
        //         Session::flash('update', 'User data was successfully updated!');
        //         return redirect('role_user');
        //     }
        // } 
        // catch(\Exception $e){
        //     return redirect()->back()->with('error', ' Sorry something went worng. Please try again.');
        // }

        dd($request->all()); 
    }

    public function destroy($id)
    {
        if(User::findOrFail($id)->delete())
        {
            Session::flash('delete', 'User was successfully deleted!');
            return redirect('user');
        } 
    }


}
