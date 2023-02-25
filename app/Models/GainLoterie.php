<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GainLoterie extends Model
{
    use HasFactory;

    protected $table = "lf_gains_loterie";
    protected $primaryKey = "id";
    protected $fillable = array("lot", "quantite_totale");
    public $timestamps = false;

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}
