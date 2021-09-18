<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function OwnerProductList(Request $request)
    {
        $db = DB::table('products')->orderByDesc('id')->get();
        return view('owner.products.list', ['products' => $db]);
    }

    public function NewOwnerProduct(Request $request)
    {
        return view('owner.products.new');
    }

    public function NewOwnerProductPost(Request $request)
    {
        $title = $request->title;
        $description = $request->description;
        $price = $request->price;
        $link = $request->link;

        if ($request->hasFile('file')) {
            $path = Storage::putFile('uploads/', $request->file('file'));
            if (isset($request->id)) {
                $db = DB::table('products')->where('id', $request->id)->update([
                    'TITLE' => $title,
                    'DESCRIPTION' => $description,
                    'PRICE' => $price,
                    'IMAGE' => $path,
                    'LINK' => $link,
                    'created_at' => date('Y-m-d'),
                ]);
            } else {
                $db = DB::table('products')->insert([
                    'TITLE' => $title,
                    'DESCRIPTION' => $description,
                    'PRICE' => $price,
                    'IMAGE' => $path,
                    'LINK' => $link,
                    'created_at' => date('Y-m-d'),
                ]);
            }
        } else {
            if (isset($request->pre_img)) {
                $path = $request->pre_img;
                $db = DB::table('products')->where('id', $request->id)->update([
                    'TITLE' => $title,
                    'DESCRIPTION' => $description,
                    'PRICE' => $price,
                    'IMAGE' => $path,
                    'LINK' => $link,
                    'created_at' => date('Y-m-d'),
                ]);
            } else {
                return redirect('/owner/products/new')->with(['product_status' => 'Image Needed']);
                exit();
            }
        }

        if ($db) {
            return redirect('/owner/products/new')->with(['product_status' => 'Product Saved']);
        } else {
            return redirect('/owner/products/new')->with(['product_status' => 'Product didn\'t saved ']);
        }
    }

    public function OwnerProductEdit(Request $request)
    {
        $id = $request->id;
        $db = DB::table('products')->where('id', $id)->first();
        return view('owner.products.edit', ['product' => $db]);
    }

    public function OwnerProductDelete(Request $request)
    {
        DB::table('products')->where('id', $request->id)->delete();
        return redirect('/owner/products');
    }

    public function UserProducts(Request $request)
    {
        if($request->session()->has('USER_LOGIN')){
            $db = DB::table('products')->get();
            return view('user.products', ['products' => $db]);
        }else{
            return redirect('/login');
        }
    }
}
