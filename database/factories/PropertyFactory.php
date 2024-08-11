<?php

namespace Homeful\Properties\Database\Factories;

use Homeful\Properties\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    protected $model = Property::class;

    public function definition()
    {
        return [
            'code' => $this->faker->word(),
        ];
    }
}
