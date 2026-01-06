<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blogDetails(string $slug)
    {
        $blog = Blog::with('comments')->where('slug', $slug)->where('status', 1)->firstOrFail();
        $moreBlogs = Blog::where('slug', '!=', $slug)->where('status', 1)->orderBy('id', 'DESC')->take(15)->get();
        $comments = $blog->comments()->paginate(20);
        // dd($comments);
        return view('frontend.pages.blog-detail', compact('blog', 'moreBlogs', 'comments'));
    }
    public function comment(Request $request)
    {
        $request->validate([
            'comment' => ['required', 'max:100']
        ]);
        $comment = new BlogComment();
        $comment->user_id = auth()->user()->id;
        $comment->blog_id = $request->blog_id;
        $comment->comment = $request->comment;
        $comment->save();
        toastr('Comment Added Successfully!', 'success', ' ');
        return redirect()->back();
    }
}
