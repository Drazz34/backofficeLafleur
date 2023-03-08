<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $table = "lf_commandes";
    protected $primaryKey = "id";
    protected $fillable = array("date_commande", "date_livraison_souhaitee", "quantite");
    public $timestamps = false;

    public function article()
    {
        return $this->belongsTo(Article::class, "article_id");
    }

    public function fraisLivraison()
    {
        return $this->belongsTo(FraisLivraison::class, "frais_livraison_id");
    }

    public function client()
    {
        return $this->belongsTo(Client::class, "client_id");
    }

    public function gainLoterie()
    {
        return $this->belongsTo(GainLoterie::class, "gain_loterie_id");
    }

    public function adresse()
    {
        return $this->belongsTo(Adresse::class, "adresse_livraison");
    }
}
