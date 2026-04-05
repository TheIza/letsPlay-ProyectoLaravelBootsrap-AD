<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ensenyament;
use App\Models\Centre;


class Alumne extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'nom',
        'cognoms',
        'data_naixement',
        'ensenyament_id'
    ];

   public function centre()
{
    return $this->belongsTo(Centre::class);
}

public function ensenyament()
{
    return $this->belongsTo(Ensenyament::class);
}
    
}