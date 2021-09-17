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
}
