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
        public string $type,
        public string $licenseNumber,
        public string $licenseDate,
        public ?string $address,
    ) {}

    public static function fromModel(Project $project): ProjectData
    {
        return new self(
            code: $project->code,
            name: $project->name,
            location: $project->location,
            type: $project->type->getName(),
            licenseNumber: $project->licenseNumber,
            licenseDate: $project->licenseDate->format('Y-m-d'),
            address: $project->address ?? ''
        );
    }
}