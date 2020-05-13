<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /* create, edit or update user profile */
    public function create_user(Request $request)
    {
        
    }

    /* show user profile */
    public function show_user($id)
    {

    }

    /* remove user profile */
    public function remove_user($id)
    {

    }

    /* show all user profiles */
    public function list_users()
    {
        $all_users = User::all();
        $all_roles = Role::all();

        return view('admin/users', compact(['all_users']));
    }
}
