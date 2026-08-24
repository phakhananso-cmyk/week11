<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Studentcontroller extends Controller
{
    public function index()
    {
        $students = DB::table('students')->orderBy('id', 'desc')->paginate(3);
        return view('student', compact('students'));
    }

    public function create()
    {
        return view('form_add_student');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'status' => 'required|in:0,1',
        ]);

        DB::table('students')->insert([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'status' => $validated['status'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('student')->with('success', 'บันทึกข้อมูลนักศึกษาเรียบร้อยแล้ว');
    }

    public function edit($id)
    {
        $student = DB::table('students')->where('id', $id)->first();
        return view('form_edit_student', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'status' => 'required|in:0,1',
        ]);

        DB::table('students')->where('id', $id)->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'status' => $validated['status'],
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('student')->with('success', 'แก้ไขข้อมูลนักศึกษาเรียบร้อยแล้ว');
    }

    public function destroy($id)
    {
        DB::table('students')->where('id', $id)->delete();
        return redirect()->route('student')->with('success', 'ลบข้อมูลนักศึกษาเรียบร้อยแล้ว');
    }
}
