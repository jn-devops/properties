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
        public ?string $type,
        public ?string $licenseNumber,
        public ?string $licenseDate,
        public ?string $company_code,
        public ?float $appraised_lot_value,
        public ?string $address,
        public ?string $total_sold,
        public ?string $project_description,
    ) {}

    public static function fromModel(Project $project): ProjectData
    {
        return new self(
            code: $project->code,
            name: $project->name,
            location: $project->location,
            type: $project->type->getName(),
            licenseNumber: $project->licenseNumber,
            licenseDate: $project->licenseDate?->format('Y-m-d'),
            company_code: $project->company_code,
            appraised_lot_value: $project->appraised_lot_value,
            address: $project->address ?? '',
            total_sold: $project->total_sold ?? '',
            project_description: $project->project_description ?? '',
        );
    }
}
