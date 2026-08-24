<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClaimController extends Controller
{
    public function index()
    {
        $claims = DB::table('claims')->orderBy('id', 'desc')->paginate(3);
        return view('claim', compact('claims'));
    }

    public function create()
    {
        return view('form_add_claim');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'detail' => 'required',
            'status' => 'required|in:0,1',
        ]);

        DB::table('claims')->insert([
            'title' => $validated['title'],
            'detail' => $validated['detail'],
            'status' => $validated['status'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('claim')->with('success', 'บันทึกข้อมูลการเคลมเรียบร้อยแล้ว');
    }

    public function edit($id)
    {
        $claim = DB::table('claims')->where('id', $id)->first();
        return view('form_edit_claim', compact('claim'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'detail' => 'required',
            'status' => 'required|in:0,1',
        ]);

        DB::table('claims')->where('id', $id)->update([
            'title' => $validated['title'],
            'detail' => $validated['detail'],
            'status' => $validated['status'],
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('claim')->with('success', 'แก้ไขข้อมูลการเคลมเรียบร้อยแล้ว');
    }

    public function destroy($id)
    {
        DB::table('claims')->where('id', $id)->delete();
        return redirect()->route('claim')->with('success', 'ลบข้อมูลการเคลมเรียบร้อยแล้ว');
    }
}
