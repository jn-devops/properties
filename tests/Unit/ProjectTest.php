<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Homeful\Properties\Data\ProjectData;
use Homeful\Properties\Models\Project;

uses(RefreshDatabase::class, WithFaker::class);

test('project has attributes', function () {
    $project = Project::factory()->create();
    if ($project instanceof Project) {
        expect($project->code)->toBeString();
        expect($project->name)->toBeString();
        expect($project->location)->toBeString();
        expect($project->address)->toBeString();
    }
});

test('project has data', function() {
    $project = Project::factory()->create();
    $data = ProjectData::fromModel($project);
    if ($project instanceof Project) {
        expect($data->code)->toBe($project->code);
        expect($data->name)->toBe($project->name);
        expect($data->location)->toBe($project->location);
        expect($data->address)->toBe($project->address);
    }
});
