<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jawaban extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'correct', 'pertanyaan_id'];

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }
}
