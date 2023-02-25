<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodePostal extends Model
{
    use HasFactory;

    protected $table = "lf_codes_postaux";
    protected $primaryKey = "id";
    protected $fillable = array("code_postal");
    public $timestamps = false;

    public function adresses()
    {
        return $this->hasMany(Adresse::class);
    }
}
