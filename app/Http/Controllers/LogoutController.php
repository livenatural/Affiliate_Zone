<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function OwnerLogout(Request $request)
    {
        $request->session()->forget('OWNER_ID');
        return redirect('/owner/login');
    }

    public function UserLogout(Request $request)
    {
        $request->session()->forget('USER_LOGIN');
        return redirect('/');
    }
}
