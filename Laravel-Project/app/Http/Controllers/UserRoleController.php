<?php

namespace App\Http\Controllers;

use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function update(Request $request) {
        $user_role = UserRole::where('user_id', $request->user()->id)->first();
        $user_role -> role_id = $request -> role_id;
        $user_role->save();

        return redirect('/admindashboard')->with('success', 'User role changed succesfully!');
    }
}
