<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB;
use session;
use Hash;
use Input;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('role:superadministrator|administrator');
    }

    public function index()
    {
        $users = User::orderBy('id', 'desc')->with('roles')->paginate(10);
//         $user = User::find(1);
//
// foreach ($user->roles as $role) {
//     dd($role->display_name);
// }
        return view('manage.users.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('manage.users.create')->withRoles($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required | max:255 ",
            "email" => "required|email|unique:users",
            "phone_number" => "required | max:100 ",
            "address" => "sometimes | max:255 ",
        ]);

        if (!empty($request->password)) {
            // password was enterd by the user
            $password = trim($request->password);
        }else {
            // generate a password
            $length = 10;
            $keyspace = '123456789abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
            $str='';
            $max= mb_strlen($keyspace, '8bit') - 1;
            for($i=0; $i < $length; ++$i) {
                $str .= $keyspace[random_int(0, $max)];
            }
            $password = $str;
        }

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->password = Hash::make($password);
        $user->save();

        if ($request->roles) {
            $user->syncRoles(explode(',', $request->roles));
          }

        return redirect()->route('users.show', $user->id);

        // if ($user->save()) {
        //     return redirect()->route('users.show', $user->id);
        // } else {
        //     Session::flash('danger', 'Sorry a problem occurred while creating this user.');
        //     return redirect()->route('users.create');
        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->with('roles')->first();
        return view("manage.users.show")->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::where('id', $id)->with('roles')->first();
        return view("manage.users.edit")->withUser($user)->withRoles($roles);
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
         $this->validateWith([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            "phone_number" => "required | max:100 ",
            "address" => "sometimes | max:255 ",
      ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;

        if ($request->password_options == 'auto') {
             // generate a password
            $length = 10;
            $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
            $str='';
            $max= mb_strlen($keyspace, '8bit') - 1;
            for($i=0; $i < $length; ++$i) {
                $str .= $keyspace[random_int(0, $max)];
            }
            $user->password = Hash::make($str);
        }elseif ($request->password_options == 'manual') {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $user->syncRoles(explode(',', $request->roles));
        return redirect()->route('users.show', $id);

        // if () {
        //     return redirect()->route('users.show', $id);
        // }else {
        //     Session::flash('error', 'Sorry a problem occurred while updating this user. Try again');
        //     return redirect()->route('users.edit', $id);
        // }
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
