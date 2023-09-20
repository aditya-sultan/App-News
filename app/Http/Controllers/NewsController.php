<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::paginate(5);

        return view('pages.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'id_author' => 'required',
            'picture' => 'nullable',
            'content' => 'nullable',
        ]);

        $picture_file = $request->file('picture');
        $picture_extension = $picture_file->extension();
        $picture_name = "Picture-"  . date('ymdhis') . "." .$picture_extension;
        $picture_file->move(public_path('image'), $picture_name);

        $validateData['picture'] = $picture_name;

        News::create($validateData);

        return redirect()->route('news.index')->with('success', 'data telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::find($id);

        $comments = Comment::where('id_news', $news->id)->paginate(5);

        $countComment = Comment::where('id_news', $news->id)->count();

        return view('pages.news.show', compact('news', 'comments', 'countComment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::find($id);

        return view('pages.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'content' => 'nullable',
            'picture' => 'nullable',
        ]);

        $news = News::find($id);

        if ($request->hasFile('picture')) {
            $picture_file = $request->file('picture');
            if ($picture_file->isValid()) {
                $picture_extension = $picture_file->extension();
                $picture_name = "Picture-" . date('ymdhis') . "." . $picture_extension;
                $picture_file->move(public_path('image'), $picture_name);

                // Hapus gambar lama jika berhasil mengunggah gambar baru
                File::delete(public_path('image') . '/' . $news->picture);

                $validateData['picture'] = $picture_name;
            } else {
                return redirect()->back()->withInput()->withErrors(['picture' => 'File gambar tidak valid.']);
            }
        }

        $news->update($validateData);

        return redirect()->route('news.index')->with('success', 'data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::find($id);
        $news->delete();

        return redirect()->route('news.index')->with('success', 'data telah dihapus');
    }
}