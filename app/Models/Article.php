<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'subtitle',
        'body',
        'img',
        'user_id',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function textFormatter($x){
        $string = '';
        for ($i=0; $i < strlen($x); $i++) {
            if($i <= 19){
                $string .= $x[$i];
            }
        }
        return $string . ' ...';
    }

    public function toSearchbleArray(){
        return [
            'id'=> $this->id,
            'title'=> $this->title,
            'body'=> $this->body,
            'category'=> $this->category,
        ];
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
