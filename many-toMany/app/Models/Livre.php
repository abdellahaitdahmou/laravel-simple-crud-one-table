<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;
    protected $fillable = [
        "titre",
        "pages",
        "description",
        "image",
        "catégorie_id"
    ];

    public function catégorie()
    {
        return $this->belongsTo(Catégorie::class,'catégorie_id');
    }
}
