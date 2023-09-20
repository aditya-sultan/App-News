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
        $validateData = $request->validate([
            'id_user' => 'required',
            'id_news' => 'required',
            'content' => 'required',
        ]);

        Comment::create($validateData);

        return redirect()->back()->with('success', 'Berhasil menambahkan komentar');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comments = Comment::find($id);

        return view('pages.commen.edit', compact('comments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'content' => 'required'
        ]);

        $comments = Comment::find($id);

        $comments->update($validateData);

        return redirect()->route('news=', $comments->id_user)->with('success', 'Komentar Telah Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comments = Comment::find($id);
        $comments->delete();

        return redirect()->back()->with('success', 'Komentar Telah Dihapus');
    }
}