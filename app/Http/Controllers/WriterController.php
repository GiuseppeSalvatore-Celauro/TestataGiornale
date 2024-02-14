<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WriterController extends Controller
{
    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
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
            return redirect()->back()->with('message', 'Devi scegliere una categoria');
        }

    }
}
