<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspeceVegetale extends Model
{
    use HasFactory;

    protected $table = "lf_especes_vegetales";
    protected $primaryKey = "id";
    protected $fillable = array('nom');
    public $timestamps = false;

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
