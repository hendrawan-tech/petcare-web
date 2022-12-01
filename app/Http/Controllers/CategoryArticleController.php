<?php

namespace App\Http\Controllers;

use App\Models\CategoryArticle;
use Illuminate\Http\Request;

class CategoryArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryArticles = CategoryArticle::all();
        return view('categoryArticle.index', compact('categoryArticles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoryArticle.create');
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
            'name' => 'required|min:3',
        ]);

        $data['slug'] = strtolower(str_replace(' ', '-', $data['name']));

        CategoryArticle::create($data);
        return redirect('/dashboard/category-articles')->with('success', 'Kategori Artikel Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryArticle  $categoryArticle
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryArticle $category_article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryArticle  $categoryArticle
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryArticle $category_article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryArticle  $categoryArticle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryArticle $category_article)
    {
        // $data = $request->validate([
        //     'name' => 'required|min:3',
        // ]);

        // $categoryArticle->update($data);
        // return redirect('/dashboard/category-article')->with('success', 'Kategori Artikel Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryArticle  $categoryArticle
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryArticle $category_article)
    {
        $category_article->delete();
        return redirect('/dashboard/category-articles')->with('success', 'Kategori Artikel Diubah');
    }
}
