<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'material_id' => 'required|exists:materials,id',
        'comment_text' => 'required|string|max:1000',
        'parent_id' => 'nullable|exists:comments,id'
    ]);

    Comment::create([
        'material_id' => $request->material_id,
        'user_id' => auth()->id(),
        'comment_text' => $request->comment_text,
        'parent_id' => $request->parent_id
    ]);

    return back()->with('success', 'Komentar berhasil ditambahkan!');
}


    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
