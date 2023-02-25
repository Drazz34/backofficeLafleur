<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;

    protected $table = "lf_adresses";
    protected $primaryKey = "id";
    protected $fillable = array("rue");
    public $timestamps = false;

    public function clients()
    {
        return $this->belongsToMany(Client::class, "lf_adresse_client");
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }

    public function ville()
    {
        return $this->belongsTo(Ville::class, "ville_id");
    }

    public function codePostal()
    {
        return $this->belongsTo(CodePostal::class, "code_postal_id");
    }
}
