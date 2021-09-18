<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function OwnerUsers(Request $request)
    {
        $db = DB::table('users')->get();
        return view('owner.users', ['users' => $db]);
    }

    public function OwnerUsersBlock(Request $request)
    {
        $check = DB::table('users')->where('id', $request->id)->first();
        DB::table('users')->where('id', $request->id)->update(['BlOCK' => $check->BLOCK ? false : true]);
        return redirect('/owner/users');
    }

    public function AddNewOwner()
    {
        return view('owner.new');
    }

    public function AddNewOwnerPost(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $check = DB::table('owners')->where('EMAIL_ADDRESS', $email)->first();
        if (!$check) {
            DB::table('owners')->insert([
                'FULL_NAME' => $name,
                'EMAIL_ADDRESS' => $email,
                'PASSWORD' => $password,
                'created_at' => date('Y-m-d'),
            ]);
            return redirect('/owner/new')->with(['owner_status' => 'Owner Created']);
        } else {
            return redirect('/owner/new')->with(['owner_status' => 'Already Used This Email']);
        }
    }

    public function OwnerList()
    {
        $db = DB::table('owners')->get();
        return view('owner.list', ['owners' => $db]);
    }

    public function OwnerDelete(Request $request)
    {
        DB::table('owners')->where('id', $request->id)->delete();
        return redirect('/owner/owners');
    }
}
