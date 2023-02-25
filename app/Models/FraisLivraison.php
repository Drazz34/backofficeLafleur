<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FraisLivraison extends Model
{
    use HasFactory;

    protected $table = "lf_frais_livraison";
    protected $primaryKey = "id";
    protected $fillable = array("nom_tarif", "frais");
    public $timestamps = false;

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}
