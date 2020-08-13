<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    public function index()
    {
        $articles = Article::paginate(10);
        return view('articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store()
    {
        Article::create($this->validateArticle());

        return redirect(route('articles.index'));

    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Article $article)
    {

        $article->update($this->validateArticle());

        return redirect($article->path());
    }

    public function validateArticle(): array
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
    }
}
