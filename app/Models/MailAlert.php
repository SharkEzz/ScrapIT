<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailAlert extends Model
{
    use HasFactory;

    protected $table = 'mail_alerts';
    public $timestamps = false;

    protected $fillable = ['product_id', 'price', 'mail_config_id', 'date'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function mailConfig()
    {
        return $this->belongsTo(MailConfig::class, 'mail_config_id');
    }
}
