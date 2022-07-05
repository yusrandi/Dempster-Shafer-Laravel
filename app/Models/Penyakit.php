<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function basisPengetahuans()
    {
        return $this->hasMany(BasisPengetahuans::class);
    }

    public function gejalas()
    {
        return $this->belongsToMany(Gejala::class, 'basis_pengetahuans', 'penyakit_id', 'gejala_id');
    }
}
