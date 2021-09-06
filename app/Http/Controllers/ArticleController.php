<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::all();
        return view('pages.articles',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('layoutsa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            "image"=>["required", "min:1", "max:100"],
            "name"=>["required", "min:1", "max:100"],
            "description"=>["required", "min:1", "max:100"],
            "date"=>["required", "min:1", "max:100"],
            "auteur"=>["required", "min:1", "max:100"],
        ]);

        $data = new Article;
        $data->image = $request->file('image')->hashName();
        $data->name = $request->name;
        $data->description = $request->description;
        $data->date = $request->date;
        $data->auteur = $request->auteur;
        $data->save();
        $request->file('image')->storePublicly("img","public");
        return redirect()->route('articles.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {

        return view('layoutsa.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('layoutsa.edit',compact('article'));

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
        request()->validate([
            "image"=>["required", "min:1", "max:10000"],
            "name"=>["required", "min:1", "max:100"],
            "description"=>["required", "min:1", "max:200"],
            "date"=>["required", "min:1", "max:100"],
            "auteur"=>["required", "min:1", "max:100"],
        ]);
        Storage::disk("public")->delete("img/" . $article->photo);
        $article->image = $request->file('image')->hashName();
        $article->image = $request->file('image')->hashName();
        $article->name = $request->name;
        $article->description = $request->description;
        $article->date = $request->date;
        $article->auteur = $request->auteur;
        $article->save();
        $request->file('image')->storePublicly("img","public");
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        
        Storage::disk("public")->delete("img/" . $article->image);
        $article->delete();
        return redirect()->route('articles.index');;
    }
}
