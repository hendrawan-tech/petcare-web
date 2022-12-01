<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'slug',
        'images',
        'description',
        'category_article_id',
    ];


    public function categoryArticle()
    {
        return $this->belongsTo(CategoryArticle::class);
    }
}
