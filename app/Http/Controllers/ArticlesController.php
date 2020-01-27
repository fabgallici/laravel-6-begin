<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;
use App\User;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;          
        } else {
            $articles = Article::latest()->get();
        }      
        return view('articles.view', ['articles' => $articles]);
    }

    public function create()
    {
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {     
    //     $validateData = $request -> validate([
    //         'title' => 'required',
    //         'excerpt' => 'required',
    //         'body' => 'required'
    //     ]);

    //     $article = Article::make($validateData);
    //     $user3 = User::findOrFail(3);
    //     $article -> user() -> associate($user3);
    //     $article->save();

    //     return redirect(route('articles.index'));
    // }

    public function store() {
        // dd(request()->all());
        $this->validateArticle();
        $article = new Article(request(['title', 'excerpt', 'body']));  //senza tags
        $article->user_id = 6; //auth()->id()
        $article->save();
        $article->tags()->attach(request('tags'));
        // return redirect(route('articles.index'));
        return redirect($article->path());  //path() defined in Article Model
    }
    protected function validateArticle() {
		return request()->validate([
			'title' => 'required',
			'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'  //id exists on tags table
		]);
	}	

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
