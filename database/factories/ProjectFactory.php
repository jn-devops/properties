<?php

namespace Homeful\Properties\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Homeful\Properties\Models\Project;
use Illuminate\Support\Carbon;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition()
    {
        return [
            'code' => $this->faker->word(),
            'name' => $this->faker->word(),
            'location' => $this->faker->city(),
            'address' => $this->faker->address(),
            'licenseNumber' => $this->faker->word(),
            'licenseDate' => Carbon::parse($this->faker->date()),
        ];
    }
}
