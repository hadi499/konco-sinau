<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pertanyaan extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'game_id'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function jawabans()
    {
        return $this->hasMany(Jawaban::class);
    }

    public function getJawabans()
    {
        return $this->jawabans;
    }
}
