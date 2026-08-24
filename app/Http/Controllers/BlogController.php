<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = DB::table('blogs')->orderBy('id', 'desc')->paginate(3);
        return view('blog', compact('blogs'));
    }

    public function create()
    {
        return view('form_add_blogs');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'required|in:0,1',
        ]);

        DB::table('blogs')->insert([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'status' => $validated['status'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('blog')->with('success', 'บันทึกบทความเรียบร้อยแล้ว');
    }

    public function edit($id)
    {
        $blog = DB::table('blogs')->where('id', $id)->first();
        return view('form_edit_blogs', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'required|in:0,1',
        ]);

        DB::table('blogs')->where('id', $id)->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'status' => $validated['status'],
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('blog')->with('success', 'แก้ไขบทความเรียบร้อยแล้ว');
    }

    public function destroy($id)
    {
        DB::table('blogs')->where('id', $id)->delete();
        return redirect()->route('blog')->with('success', 'ลบบทความเรียบร้อยแล้ว');
    }
}
