<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'topic',
        'number_of_questions',
        'time',
        'required_score_to_pass'
    ];

    public function pertanyaans()
    {
        return $this->hasMany(Pertanyaan::class);
    }

    public function getPertanyaans()
    {
        return $this->pertanyaans()->take($this->number_of_questions)->get();
    }
}
