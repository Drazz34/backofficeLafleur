<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $table = "lf_categories";
    protected $primaryKey = "id";
    protected $fillable = array('nom', 'photo', 'description', 'alt');
    public $timestamps = false;

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'lf_article_categorie');
    }
}
