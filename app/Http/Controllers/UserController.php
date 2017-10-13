<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeUserOnRoleRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showAll()
    {
        $users = User::all();

        return view('users', ['users' => $users]);
    }

    public function show(User $user)
    {
        $roles = Role::all();

        return view('user', ['user' => $user, 'roles' => $roles]);
    }

    public function subscribeOnRole(User $user, SubscribeUserOnRoleRequest $request)
    {

        UserRole::updateOrCreate(
            [
                'role_id' => $request->role,
                'user_id' => $user->id
            ],
            [
                'expire_in' => $request->expire_in
            ]
        );

        return redirect()->back();
    }
}
