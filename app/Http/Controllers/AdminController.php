<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
 
class AdminController extends Controller
{
    public function index()
    {
        $blogs = DB::table('blogs')->orderBy('id', 'desc')->paginate(10);
        return view('index', compact('blogs'));
    }
 
    public function blog()
    {
        $blogs = DB::table("blogs")->paginate(3);
        return view("blog", compact('blogs'));
    }
 
    public function edit($id)
    {
        $blog = DB::table('blogs')->where('id', $id)->first();
        if (!$blog) {
            return redirect()->route('blog')->with('error', 'ไม่พบข้อมูลบทความที่ต้องการแก้ไข');
        }
        return view('form_edit_blogs', compact('blog'));
    }
 
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'required|in:0,1',
        ], [
            'title.required' => 'กรุณากรอกหัวข้อบทความ',
            'title.max' => 'หัวข้อบทความต้องไม่เกิน 255 ตัวอักษร',
            'content.required' => 'กรุณากรอกเนื้อหาบทความ',
            'status.required' => 'กรุณาเลือกสถานะการเผยแพร่',
            'status.in' => 'สถานะการเผยแพร่ไม่ถูกต้อง',
        ]);
 
        DB::table('blogs')->where('id', $id)->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'status' => $validated['status'],
            'updated_at' => Carbon::now(),
        ]);
 
        return redirect()->route('blog')->with('success', 'แก้ไขบทความเรียบร้อยแล้ว');
    }
 
    public function create()
    {
        return view('form_add_blogs');
    }
 
    public function insert(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'status' => 'required|in:0,1',
        ], [
            'title.required' => 'กรุณากรอกหัวข้อบทความ',
            'title.max' => 'หัวข้อบทความต้องไม่เกิน 255 ตัวอักษร',
            'content.required' => 'กรุณากรอกเนื้อหาบทความ',
            'status.required' => 'กรุณาเลือกสถานะการเผยแพร่',
            'status.in' => 'สถานะการเผยแพร่ไม่ถูกต้อง',
        ]);
 
        DB::table('blogs')->insert([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'status' => $validated['status'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
 
        return redirect()->route('index')->with('success', 'บันทึกบทความเรียบร้อยแล้วด้วย Query Builder');
    }
 
    public function delete($id)
    {
        DB::table('blogs')->where('id', $id)->delete();
        return redirect()->route('index')->with('success', 'ลบบทความเรียบร้อยแล้วด้วย Query Builder');
    }
}
 