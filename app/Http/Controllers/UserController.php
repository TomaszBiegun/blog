<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    /**
     * Change User's role between
     * User::ROLE_ADMIN and User::ROLE_USER
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function modifyAdmin($id)
    {
        try {
            $user = User::find($id);

            $role = (int)Input::get('role') == User::ROLE_ADMIN ? User::ROLE_USER : User::ROLE_ADMIN;
            $user->setRole($role)
                ->save();

            return redirect()->route('home')->with('success', $role == User::ROLE_USER ? trans('alerts.success.set-user') : trans('alerts.success.set-admin'));
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', trans('alerts.error.set-role'));
        }

    }
}
