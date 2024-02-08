<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    function home() {
        $LastArticles = Article::orderBy('created_at', 'desc')->take(3)->get();
        return view('welcome', compact('LastArticles'));
    }
}
