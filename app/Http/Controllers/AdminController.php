<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function tables(){
        $adminRequest = User::where('is_admin', NULL)->get();
        $writerRequest = User::where('is_writer', NULL)->get();
        $revisorRequest = User::where('is_admin', NULL)->get();

        return view('admin.dashboard',  compact('adminRequest', 'writerRequest', 'revisorRequest'));
    }

    public function setAdmin(User $user){
        $user->update([
            'is_admin' => true
        ]);
        return redirect()->route('admin.tables');
    }
    public function unsetAdmin(User $user){
        $user->update([
            'is_admin' => false
        ]);
        return redirect()->route('admin.tables');
    }
    public function setRevisor(User $user){
        $user->update([
            'is_revisor' => true
        ]);
        return redirect()->route('admin.tables');
    }
    public function unsetRevisor(User $user){
        $user->update([
            'is_revisor' => false
        ]);
        return redirect()->route('admin.tables');
    }
    public function setWriter(User $user){
        $user->update([
            'is_writer' => true
        ]);
        return redirect()->route('admin.tables');
    }
    public function unsetWriter(User $user){
        $user->update([
            'is_writer' => false
        ]);
        return redirect()->route('admin.tables');
    }
}
