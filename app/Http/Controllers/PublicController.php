<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function home() {
        $LastArticles = Article::orderBy('created_at', 'desc')->where('is_accepted', true)->take(3)->get();
        return view('welcome', compact('LastArticles'));
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
}
