<?php

namespace Homeful\Properties\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Homeful\Properties\Models\Property;

class PropertyFactory extends Factory
{
    protected $model = Property::class;

    public function definition()
    {
        return [
            'code' => $this->faker->word()
        ];
    }
}
