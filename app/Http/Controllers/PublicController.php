<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Mail\ContactMail;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function home() {
        $LastArticles = Article::orderBy('created_at', 'desc')->where('is_accepted', true)->take(3)->get();
        $WorldArticles = Article::where('category_id', 1)->where('is_accepted', true)->orderBy('created_at', 'desc')->take(3)->get();
        $EconomyArticles = Article::where('category_id', 2)->where('is_accepted', true)->orderBy('created_at', 'desc')->take(3)->get();
        $CinemaArticles = Article::where('category_id', 4)->where('is_accepted', true)->orderBy('created_at', 'desc')->take(3)->get();
        return view('welcome', compact('LastArticles', 'WorldArticles', 'EconomyArticles', 'CinemaArticles'));
    }

    public function WorkWithUs(){
        return view('work.WorkWithUs');
    }

    public function sendRequest(Request $request){


        $adminEmail = 'admin@gmail.com';
        $request->validate([
            'roles' => 'required',
            'body' => 'required',
            'email' => 'required|email',
        ]);

        $user = Auth::user();
        $role = $request->roles;
        $body = $request->body;
        $email = $request->mail;
        $data = compact('role','body', 'email');
        Mail::to($adminEmail)->send(new ContactMail($data));

        switch ($role) {
            case 'Admin':
                $user->is_admin = Null;
                break;

            case 'Reviewer':
                $user->is_revisor = Null;
                break;

            case 'Scrittore':
                $user->is_writer = Null;
                break;
        }

        $user->update();

        return redirect()->back()->with('message', 'La tua richiesta è andata a buon fine, verrai ricontattato al piu presto');
    }

    public function search(Request $request){
        $searchText = $request->input('searchText');
        $articles = Article::search($searchText)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();

        return view('article.searchItems', compact('articles', 'searchText'));
    }
}
