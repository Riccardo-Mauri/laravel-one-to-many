<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'is_started',
        'type_id',
    ];

     // Relazione con la tipologia
     public function type()
     {
         return $this->belongsTo(Type::class);
     }
}
