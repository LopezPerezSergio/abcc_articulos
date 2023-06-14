<?php

namespace App\Http\Controllers;

use App\Http\Requests\Articles\ArticleRequest;
use App\Http\Requests\Articles\StoreArticleRequest;
use App\Http\Requests\Articles\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::showArticles();

        return view('Articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();

        return view('Articles.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        //return $request;
        Article::addArticle(
            $request->sku,
            $request->article,
            $request->brand,
            $request->model,
            $request->family,
            Carbon::now()->toDateString(),
            $request->stock,
            $request->quantity,
            0,
            Carbon::now()->toDateString(),
        );

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function search( )
    {
        return view('Articles.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        
        $departments = Department::all();
        return view('Articles.edit', compact('departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, $sku)
    {
        $article = Article::showArticle($sku);
        $article = $article[0]; 

        Article::updateArticle(
            $request->sku,
            $request->article,
            $request->brand,
            $request->model,
            $request->family,
            $article->date_high,
            $request->stock,
            $request->quantity,
            $request->has('discontinued') ? 1 : 0,
            $request->has('discontinued') ? Carbon::now()->toDateString() : $article->date_low,
        );

        return redirect()->route('articles.index');
    }

    /**
     * Show the form for delete the specified resource.
     */
    public function delete()
    {
        return view('Articles.delete');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($sku)
    {
        Article::deleteArticle($sku);
        return redirect()->route('articles.index')->with('success', 'El artículo se ha eliminado exitosamente.');

    }
}
