<?php

namespace Homeful\Properties\Data;

use Homeful\Properties\Models\Project;
use Spatie\LaravelData\Data;

class ProjectData extends Data
{
    public function __construct(
        public string $code,
        public string $name,
        public string $location,
        public string $address,
    ) {}

    public static function fromModel(Project $project): ProjectData
    {
        return new self(
            code: $project->code,
            name: $project->name,
            location: $project->location,
            address: $project->address
        );
    }
}
