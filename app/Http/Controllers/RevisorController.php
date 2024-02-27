<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function tables(){
        $ArticlesNull = Article::where('is_accepted', NULL)->get();
        $ArticlesTrue = Article::where('is_accepted', true)->get();
        $ArticlesFalse = Article::where('is_accepted', false)->get();

        return view('revisor.dashboard', compact('ArticlesNull', 'ArticlesTrue', 'ArticlesFalse'));
    }

    public function show(Article $article){
        return view('revisor.show', compact('article'));
    }
    public function setAccepted(Article $article){
        $article->is_accepted = true;
        $article->save();
        // dd($article);
        return redirect()->route('revisor.tables');
    }
    public function setDeclined(Article $article){
        $article->is_accepted = false;
        $article->save();
        return redirect()->route('revisor.tables');
    }

}
