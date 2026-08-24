<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Bookcontroller extends Controller
{
    public function index()
    {
        $books = DB::table('books')->orderBy('id', 'desc')->paginate(3);
        return view('book', compact('books'));
    }

    public function create()
    {
        return view('form_add_book');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'status' => 'required|in:0,1',
        ]);

        DB::table('books')->insert([
            'title' => $validated['title'],
            'author' => $validated['author'],
            'status' => $validated['status'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('book')->with('success', 'บันทึกข้อมูลหนังสือเรียบร้อยแล้ว');
    }

    public function edit($id)
    {
        $book = DB::table('books')->where('id', $id)->first();
        return view('form_edit_book', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'status' => 'required|in:0,1',
        ]);

        DB::table('books')->where('id', $id)->update([
            'title' => $validated['title'],
            'author' => $validated['author'],
            'status' => $validated['status'],
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('book')->with('success', 'แก้ไขข้อมูลหนังสือเรียบร้อยแล้ว');
    }

    public function destroy($id)
    {
        DB::table('books')->where('id', $id)->delete();
        return redirect()->route('book')->with('success', 'ลบข้อมูลหนังสือเรียบร้อยแล้ว');
    }
}
