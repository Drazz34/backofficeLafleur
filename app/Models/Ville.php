<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $table = "lf_villes";
    protected $primaryKey = "id";
    protected $fillable = array('nom_ville', 'livrable');
    public $timestamps = false;

    public function adresses()
    {
        return $this->hasMany(Adresse::class);
    }
}
