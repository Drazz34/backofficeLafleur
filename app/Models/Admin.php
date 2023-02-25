<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = "lf_admins";
    protected $primaryKey = "id";
    protected $fillable = array("email", "mot_de_passe");
    public $timestamps = false;
}
