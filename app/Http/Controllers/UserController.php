<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;




class UserController extends Controller
{

    #=======================================================================================#
    #			                             create                                         #
    #=======================================================================================#
    public function unAuth()
    {
        return view('500');
    }

    #=======================================================================================#
    #			                             index                                         	#
    #=======================================================================================#
    public function index()
    {
        $users = User::all();

        return view('layouts.user-layout', [
            'users' => $users,

        ]);
    }
    #=======================================================================================#
    #			                        show_profile                                      	#
    #=======================================================================================#
    public function show_profile($user_id)
    {
        $user = User::find($user_id);

        return view('user.admin_profile', [
            'user' => $user,
        ]);
    }


    public function show_my_profile()
    {
        $user = User::find(Auth::user()->id);
        return view('user.my_profile')->with([
            'user' => $user,
        ]);
    }

    #=======================================================================================#
    #			                         edit_profile                                  	    #
    #=======================================================================================#
    public function edit_profile($user_id)
    {
        return view('allUsers.edit_user', [
            'user' => User::find($user_id),
        ]);
    }

    public function edit_my_profile()
    {
        $user = User::find(Auth::user()->id);
        return view('user.edit_my_profile')->with([
            'user' => $user,
        ]);
    }

    #=======================================================================================#
    #			                             update                                        	#
    #=======================================================================================#


    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|string|unique:users,email,' . $user->id,
            'profile_image' => 'mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $request->name;
        $user->subscription_start = $request->subscription_start;
        $user->subscription_end = $request->subscription_end;
        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }

            $imagePath = $request->file('profile_image')->store('profilePic', 'public');

            $validated['profile_image'] = $imagePath;
        }
        $user->update($validated);
        return redirect()->route('allUsers.list');
    }



    public function update_my_profile(StoreRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $validated = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|string|unique:users,email,' . $user->id,
            'profile_image' => 'mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $request->name;
        $user->subscription_start = $request->subscription_start;
        $user->subscription_end = $request->subscription_end;
        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }

            $imagePath = $request->file('profile_image')->store('profilePic', 'public');

            $validated['profile_image'] = $imagePath;
        }

        $user->update($validated);

        return redirect()->route('user.show_my_profile', auth()->user()->id)->with('success', 'Your data successfully updated');
    }
    #=======================================================================================#
    #			                             store                                         	#
    #=======================================================================================#
    public function store(StoreRequest $request)
    {
        $requestData = request()->all();
        User::create($requestData);

        return redirect()->route('user.admin_profile');
    }


    #=======================================================================================#
    #			                             destroy                                       	#
    #=======================================================================================#
    public function destroy()
    {
        return redirect()->route('');
    }

    #=======================================================================================#
    #			                            Ban User                              	        #
    #=======================================================================================#
    public function banUser($userID)
    {
        User::find($userID)->ban([
            'comment' => 'banned user',
            'expired_at' => '+3 month',
        ]);
        return response()->json(['success' => 'Record deleted successfully!']);
    }

    #=======================================================================================#
    #			                            listBanned                             	        #
    #=======================================================================================#
    public function listBanned()
    {
        $userRole = Auth::user()->getRoleNames();
        $allBannedUser = 0;
        if ($userRole['0'] == 'admin') {
            $allBannedUser = User::role(['coach', 'user'])->onlyBanned()->get();
        }
        if (count($allBannedUser) <= 0) { //for empty statement
            return view('empty');
        }
        return view('ban.showBanned', [
            'banUsers' => $allBannedUser,
        ]);
    }
    #=======================================================================================#
    #			                                unBan                             	        #
    #=======================================================================================#
    public function unBan($userID)
    {
        $x = User::find($userID)->unban();
        return $this->listBanned();
    }
}
