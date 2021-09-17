<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function OwnerDashboard(Request $request)
    {
        $products_count = count(DB::table('products')->get());
        $total_views = DB::table('users')->sum('COUNT');
        $unique_views = count(DB::table('users')->get());
        return view('owner.dashboard', ['products' => $products_count, 'views' => $total_views, 'unique' => $unique_views]);
    }
}
