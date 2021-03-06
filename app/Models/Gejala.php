<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'bobot' => 'decimal:1',

    ];
    public function basisPengetahuans()
    {
        return $this->hasMany(BasisPengetahuans::class)->with('penyakit');
    }
}
