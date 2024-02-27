<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class WriterController extends Controller
{
    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        dd($request->file('img'));
        if ($request['category'] > 0) {
            $article = Article::create(
                [
                    'title' => $request['title'],
                    'subtitle' => $request['subtitle'],
                    'body' => $request['body'],
                    'img' => $request->has('img') ? $request->file('img')->store('public') : 'img/default.jpg',
                    'category_id' => $request['category'],
                    'user_id' => Auth::user()->id,
                ]
            );

            $tags = explode(', ', $request->tags);
            foreach ($tags as $tag) {
                $newTag = Tag::updateOrCreate(['name'=>$tag]);
                $article->tags()->attach($newTag);
            }

            return redirect()->route('home')->with('message', 'Articolo inserito con successo');
        }else{
            return redirect()->back()->with('message', 'Devi selezionare una categoria');
        }

    }

    public function index(){
        $personalArticle = Auth::user()->articles()->where('is_accepted', TRUE)->get();
        return view('writer/dashboard', compact('personalArticle'));
    }

    public function show(Article $article){
        if (Auth::user() == $article->user) {
            return view('writer/show', compact('article'));
        }
    }

    public function delete(Article $article){
        foreach ($article->tags as $tag) {
            $article->tags()->detach($tag);
        }
        if ($article->img != 'img/default.jpg') {
            Storage::delete($article->img);
        }
        $article->delete();
        return redirect()->route('writer.tables');
    }

    public function edit(Article $article){
        return view('writer/edit', compact('article'));
    }

    public function update(Article $article, Request $request){
            if ($article->img != $request->img) {
                Storage::delete($article->img);
            }
            $article->update(
                [
                    'title' => $request['title'],
                    'subtitle' => $request['subtitle'],
                    'body' => $request['body'],
                    'img' => $request->has('img') ? $request->file('img')->store('public') : $article->img,
                    'category_id' => $request['category'],
                    'user_id' => Auth::user()->id,
                ]
            );
            foreach ($article->tags as $key => $tag) {
                $newTags = explode(', ', $request->tags);
                if ($tag->name != $newTags[$key]) {
                    $newTag = $tag->update(['name'=>$newTags[$key]]);
                }
            }
            return redirect()->route('article.setNull', compact('article'));
    }

    public function setNull(Article $article){
        $article->is_accepted = null;
        $article->save();
        return redirect()->route('home');
    }
}
