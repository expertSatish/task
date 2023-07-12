<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\MsgApp;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('user_id', auth()->user()->id)->get();
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }


    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        $blog = (new \App\Http\Controllers\CommonController())->uploadFile($request, 'image', '/blogs');
        Blog::saveData($request, $blog, $userId);
        return redirect()->route('blog.index')->with('success', MsgApp::SUCCESS_ADDED);
    }

    public function show($id)
    {
        Blog::getBlog($id);
        return redirect()->back()->with('success', MsgApp::SUCCESS_DEL);
    }

    public function edit($id)
    {
        $data = Blog::find($id);
        return view('blogs.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $userId = auth()->user()->id;
        $blog = (new \App\Http\Controllers\CommonController())->uploadFile($request, 'image', '/blogs');
        Blog::saveData($request, $blog, $userId, $id);
        return redirect()->route('blog.index')->with('success', MsgApp::SUCCESS_UPD);
    }

    public function destroy($id)
    {
        //
    }


    public function search(Request $request)
    {
        $search = $request->input('search');

        $blogs = Blog::where('title', 'like', "%$search%")->get();

        return view('blogs.search', compact('blogs'));
    }

    public function like(Request $request)
    {
        $blogId = $request->input('blog_id');
        $action = $request->input('action');
        $blog = Blog::find($blogId);

        if ($blog) {
            if ($action === 'like') {
                $blog->likes += 1;
            } elseif ($action === 'dislike') {
                $blog->dislikes += 1;
            }

            $blog->save();

            return response()->json([
                'likes_count' => $blog->likes,
                'dislikes_count' => $blog->dislikes,
            ]);
        }

        return response()->json(['error' => 'Blog not found.'], 404);
    }
}