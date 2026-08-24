<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Productcontroller extends Controller
{
    public function index()
    {
        $products = DB::table('products')->orderBy('id', 'desc')->paginate(3);
        return view('product', compact('products'));
    }

    public function create()
    {
        return view('form_add_product');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'status' => 'required|in:0,1',
        ]);

        DB::table('products')->insert([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'status' => $validated['status'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('product')->with('success', 'บันทึกข้อมูลสินค้าเรียบร้อยแล้ว');
    }

    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        return view('form_edit_product', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'status' => 'required|in:0,1',
        ]);

        DB::table('products')->where('id', $id)->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'status' => $validated['status'],
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('product')->with('success', 'แก้ไขข้อมูลสินค้าเรียบร้อยแล้ว');
    }

    public function destroy($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return redirect()->route('product')->with('success', 'ลบข้อมูลสินค้าเรียบร้อยแล้ว');
    }
}
