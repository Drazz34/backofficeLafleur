<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = "lf_articles";
    protected $primaryKey = "id";
    protected $fillable = array('nom', 'prix_unitaire', 'quantite_dispo', 'date_inventaire', 'poids', 'taille', 'photo', 'alt');
    public $timestamps = false;

    public function couleur()
    {
        return $this->belongsTo(Couleur::class, "couleur_id");
    }

    public function unite()
    {
        return $this->belongsTo(Unite::class, "unite_id");
    }

    public function especeVegetale()
    {
        return $this->belongsTo(EspeceVegetale::class, "espece_vegetale_id");
    }

    public function categories()
    {
        return $this->belongsToMany(Categorie::class, 'lf_article_categorie');
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}

// with pour pull un article avec ses couleurs, à faire dans le controleur
// articleControlleur $articles = Article::with('couleurs')->get; peut être un tableau with(['couleurs', 'especes_vegetales'])...