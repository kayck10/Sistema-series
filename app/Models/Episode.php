<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $table = "episodes";
    protected $fillable = ['number', 'season_id'];
    protected $casts = ['watched' => 'boolean'];
    public $timestamps = false;

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
