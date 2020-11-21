<?php

namespace Database\Factories;

use App\Models\MailAlert;
use Illuminate\Database\Eloquent\Factories\Factory;

class MailAlertFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MailAlert::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => random_int(1, 5),
            'price' => random_int(10, 50),
            'mail_config_id' => 1,
            'date' => new \DateTime()
        ];
    }
}
