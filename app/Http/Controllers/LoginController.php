<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function OwnerLogin(Request $request)
    {
        if ($request->session()->has('OWNER_ID')) {
            return redirect('/owner/dashboard');
        } else {
            return view('owner.login');
        }
    }

    /**
     * WHEN OWNER WILL MAKE POST REQUEST FOR LOGIN
     */
    public function OwnerLoginPost(Request $request)
    {
        //Get Owner Login Data
        $email = $request->email;
        $password = $request->password;

        // Fetch in Database
        $db = DB::table('owners')->where([
            ['EMAIL_ADDRESS', '=', $email],
            ['PASSWORD', '=', $password],
        ])->first();

        //FORGET USER
        $request->session()->forget('USER_LOGIN');

        // Check Result
        if ($db) {
            $request->session()->put('OWNER_ID', $db->id);
            return redirect('/owner/dashboard');
        } else {
            return redirect('/owner/login')->with(['login_status' => 'No Account Found']);
        }
    }

    public function UserLogin()
    {
        return view('user.login');
    }

    public function UserLoginPost(Request $request)
    {
        $check = DB::table('users')->where('EMAIL', $request->email)->first();

        if ($check) {
            if (!$check->BLOCK) {
                DB::table('users')->where('EMAIL', $request->email)->update([
                    'COUNT' => $check->COUNT + 1,
                    'updated_at' => date('Y-m-d')
                ]);
            } else {
                return redirect('/login')->with(['login_blocked' => true]);
            }
        } else {
            DB::table('users')->insert([
                'EMAIL' => $request->email,
                'COUNT' => 1,
                'created_at' => date('Y-m-d')
            ]);
        }

        $request->session()->forget('OWNER_ID');
        $request->session()->put('USER_LOGIN', true);
        return redirect('/');
    }
}
