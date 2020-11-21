<?php

namespace Database\Seeders;

use App\Models\MailAlert;
use App\Models\MailConfig;
use App\Models\Product;
use App\Models\Scraper;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Scraper::create([
            'name' => 'Amazon FR & DE',
            'description' => 'Scraper pour Amazon FR et DE',
            'block_id' => 'ourprice_block'
        ])->save();
        Scraper::create([
            'name' => 'CDiscount',
            'description' => 'Scraper pour CDiscount',
            'block_id' => 'truc'
        ])->save();

        Product::factory(10)->create();

        MailConfig::create([
            'smtp_user' => 'test',
            'smtp_pass' => 'pass',
            'smtp_host' => 'host@host.com',
            'smtp_port' => 465,
            'is_secure' => true
        ])->save();

        MailAlert::factory(10)->create();
    }
}
