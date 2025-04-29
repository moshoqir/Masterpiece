<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class AllUsersController extends Controller
{
    #=======================================================================================#
    #			                           List Function                                	#
    #=======================================================================================#
    public function list()
    {
        $usersFromDB =  User::role('user')->withoutBanned()->get();
        if (count($usersFromDB) <= 0) { //for empty statement
            return view('empty');
        }
        return view("allUsers.list", ['users' => $usersFromDB]);
    }

    #=======================================================================================#
    #			                           Show Function                                	#
    #=======================================================================================#
    public function show($id)
    {
        $singleUser = User::findorfail($id);
        return view("allUsers.show", ['singleUser' => $singleUser]);
    }
    #=======================================================================================#
    #			                           Delete Function                                	#
    #=======================================================================================#
    public function deleteUser($id)
    {
        $singleUser = User::findorfail($id);
        $singleUser->delete();
        return response()->json(['success' => 'Record deleted successfully!']);
    }


        #=======================================================================================#
    #			                           Add Function                                	#
    #=======================================================================================#

    public function create(){
        return view('allUsers.create');
    }

    public function sotre(Request $request){
        $validated=$request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'profile_image'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password'=>'required|string|min:8|confirmed',

        ]);

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profilePic', 'public');
            $validated['profile_image'] = $imagePath;
        }

       $user= User::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'password'=>bcrypt($validated['password']),
            'profile_image'=>$validated['profile_image'],

        ]);

        // $lastID = $user->id;


        // DB::table('model_has_roles')->insert([
        //     'role_id' => 3,
        //     'model_type' => 'App\Models\User',
        //     'model_id' => $lastID,
        // ]);

        $user->assignRole('user');

        return redirect()->route('allUsers.list')->with('success', 'User created successfully.');
    }



}
