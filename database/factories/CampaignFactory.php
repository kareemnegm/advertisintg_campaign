<?php

namespace Database\Factories;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */


    protected $model = Campaign::class;

    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'from'=>$this->faker->date('Y-m-d'),
            'to'=>$this->faker->date('Y-m-d'),
            'total'=>$this->faker->floatval(),
            'daily_budget'=>$this->faker->floatval(),
            'campaign_images'=>$this->faker->image('public/storage/images',640,480, null, false),
        ];
    }
}
