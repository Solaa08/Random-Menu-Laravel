<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    use HasFactory;

    public static $type_recette = ["Entrée","Plat","Dessert"];

    protected $table = 'recette';

    protected $fillable = ['url', 'type', 'nom', 'user_id'];
}
