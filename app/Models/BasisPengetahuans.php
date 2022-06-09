<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasisPengetahuans extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'penyakit_id' => 'integer',
        'gejala_id' => 'integer',


    ];

    public function gejala()
    {
        return $this->belongsTo(Gejala::class);
    }
    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }
}
