<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CategoryArticle;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryArticle::all();
        return view('article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'images' => 'required|file|between:0,2048|mimes:jpeg,jpg,png',
            'category_article_id' => 'required',
        ]);

        $file = $request->file('images');
        $fileName = $file->getClientOriginalName();
        $destinationPath = public_path() . '/upload';
        $file->move($destinationPath, $fileName);
        $data['images'] = $file->getClientOriginalName();

        $data['slug'] = strtolower(str_replace(' ', '-', $data['title']));

        Article::create($data);

        return redirect('/dashboard/articles')->with('success', 'Artikel Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = CategoryArticle::all();
        return view('article.edit', compact('categories', 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'images' => 'file|between:0,2048|mimes:jpeg,jpg,png',
            'category_article_id' => 'required',
        ]);

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/upload';
            $file->move($destinationPath, $fileName);
            $data['images'] = $file->getClientOriginalName();
        }

        $data['slug'] = strtolower(str_replace(' ', '-', $data['title']));

        $article->update($data);

        return redirect('/dashboard/articles')->with('success', 'Artikel Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('/dashboard/articles')->with('success', 'Artikel Dihapus');
    }
}
