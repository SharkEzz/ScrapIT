<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $hidden = ['scraper_id', 'updated_at'];

    protected $fillable = [
        'name',
        'description',
        'url',
        'price',
        'scraper_id'
    ];

    public function scraper()
    {
        return $this->belongsTo(Scraper::class, 'scraper_id');
    }
}
