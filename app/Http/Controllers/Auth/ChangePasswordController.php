<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function patch(Request $request) {
        if ($request->password) {
            $user = User::where('id', Auth::id())->first();
            $user->password = Hash::make($request->password);
            $user->save();
        }
        else {
            redirect('/');
        }
        return view('account');
    }
}
