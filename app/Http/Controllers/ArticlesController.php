<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function show($id)
    {
        //show a single resource
        $article = Article::find($id);

        return view('articles.show', ['article' => $article]);
    }

    public function index()
    {
        // render a list
        $articles = Article::paginate(10);
        return view('articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        // shows a view to create a resource
        return view('articles.create');

    }

    public function store()
    {
        // persist a new resource

        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        $article = new Article();

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles');

    }

    public function edit($id)
    {
        //show a view to edit an existing resource
        $article = Article::find($id);
        return view('articles.edit', compact('article'));
    }

    public function update($id)
    {

        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
        // persist the edited resource
        $article = Article::find($id);

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles/'. $article->id);
    }
//
//    public function destroy()
//    {
//        // delete the resource
//    }
}
