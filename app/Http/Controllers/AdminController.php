<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
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

    public function editTags(Request $request, Tag $tag){
        $request->validate([
            'name' => 'required',
        ]);
        $tag->update([
            'name' => $request->name,
        ]);

        return redirect()->back();
    }
    public function deleteTags(Tag $tag){
        foreach ($tag->articles as $article) {
            $article->tags()->detach($tag);
        }
        $tag->delete();

        return redirect()->back();
    }
    public function editCats(Request $request, Category $category){
        $request->validate([
            'name' => 'required',
        ]);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->back();
    }

    public function createCat(Request $request){
        Category::create([
            'name' => $request->category,
            'icons' => 'fa-solid fa-circle-question'
        ]);
        return redirect()->back();
    }

    public function deleteCats(Category $category){
        foreach($category->articles as $article){
            $article->update(['category_id' => NULL]);
        }
        $category->delete();
        return redirect()->back();
    }
}
