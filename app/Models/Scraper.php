<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scraper extends Model
{
    use HasFactory;

    protected $hidden = ['updated_at'];

    protected $fillable = ['name', 'description', 'block_id'];

    public function products()
    {
        return $this->hasMany(Product::class, 'scraper_id');
    }
}
