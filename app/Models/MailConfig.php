<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MailConfig extends Model
{
    protected $table = 'mail_configs';

    public $timestamps = false;

    protected $hidden = ['smtp_pass'];

    protected $fillable = [
        'smtp_user',
        'smtp_pass',
        'smpt_host',
        'smtp_port',
        'is_secure'
    ];
}
