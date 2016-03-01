<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Request;
//use Illuminate\Http\Request;
use App\Article;
use App\Tag;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    //
    public function index()
    {
        //$articles = Article::all();
        $articles = Article::latest()->get();
        //$articles = Post::all();
        return view('articles.index',compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show',compact('article'));
    }

    public function create()
    {
        $tags= Tag::lists('name','id');
        return view('articles.create',compact('tags'));
    }

    public function store(Requests\StoreArticleRequest $request)
    {
        $input = $request->all();
       // $input = Request::all();
        $input['introduction']=mb_substr($request->get('content'),0,5);
        $article= Article::create($input);
        $article->tags()->attach($request->input('tag_list'));
        return redirect('/');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        $tags = Tag::lists('name','id');
        //echo date('Y-m-d',strtotime($article->published_at));
        return view('articles.edit',compact('article','tags'));
    }

    public function update(Requests\StoreArticleRequest $request)
    {
        $article = Article::find($request->get('id'));
        $article->update($request->except('id'));
//        var_dump($request->get('tag_list'));
        $article->tags()->sync($request->get('tag_list'));
        return redirect('/');
    }


}
