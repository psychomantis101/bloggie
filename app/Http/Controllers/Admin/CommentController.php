<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;


class CommentController extends Controller
{
    public function index(Blog $blog)
    {
        $comments = Comment::where('blog_id', $blog->id)->get();

        return view('admin.comments.index', compact('comments', 'blog'));
    }

    public function create(Blog $blog)
    {
        return view('admin.comments.create', compact('blog'));
    }

    public function store(CommentRequest $request): RedirectResponse
    {
        Comment::create($request->validated());

        return redirect()->route('admin.comments.index', $request->blog_id)->with('success', 'Comment created successfully');
    }

    public function edit(Blog $blog, Comment $comment)
    {
        return view('admin.comments.create', compact('blog', 'comment'));
    }

    public function update(Comment $comment, CommentRequest $request)
    {
        $comment->update($request->validated());

        return redirect()->route('admin.comments.index', $comment->blog_id)->with('success', 'Comment updated successfully');
    }
}
