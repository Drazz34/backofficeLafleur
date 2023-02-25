<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = "lf_clients";
    protected $primaryKey = "id";
    protected $fillable = array("email", "mot_de_passe", "nom", "prenom");
    public $timestamps = false;

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    public function adresses()
    {
        return $this->belongsToMany(Adresse::class, "lf_adresse_client");
    }
}
