<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\FlareClient\FlareMiddleware\AddGlows;

class Series extends Model
{
    use HasFactory;
    protected $table = 'series';
    protected $fillable = ['nome', 'cover'];

    public function seasons()
    {
        return $this->hasMany(Season::class, 'series_id');
    }
}
