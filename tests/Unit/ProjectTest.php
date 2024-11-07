<?php

use Homeful\Property\Enums\{HousingType, MarketSegment};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Homeful\Properties\Data\ProjectData;
use Homeful\Properties\Models\Project;
use Illuminate\Support\Carbon;

uses(RefreshDatabase::class, WithFaker::class);

test('project has attributes', function () {
    $project = Project::factory()->create();
    if ($project instanceof Project) {
        expect($project->code)->toBeString();
        expect($project->name)->toBeString();
        expect($project->location)->toBeString();
        expect($project->address)->toBeString();
        expect($project->licenseNumber)->toBeString();
        expect($project->licenseDate)->toBeInstanceOf(Carbon::class);
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
        expect($data->type)->toBe($project->type->getName());
        expect($data->licenseNumber)->toBe($project->licenseNumber);
        expect($data->licenseDate)->toBe($project->licenseDate->format('Y-m-d'));
    }
});

test('some project attributes that are nullable', function () {
    $project = Project::factory()->create();
    if ($project instanceof Project) {
        $project->address = null;
        expect($project->address)->toBeNull();
        $data = ProjectData::fromModel($project);
        expect($data->address)->toBe('');
    }
});

test('project type', function () {
    $project = Project::factory()->create();
    if ($project instanceof Project) {
        expect(MarketSegment::default())->toBe(MarketSegment::SOCIALIZED);
        expect($project->type)->toBe(MarketSegment::default());
        expect($project->type)->toBe(MarketSegment::SOCIALIZED);
        $project->type = MarketSegment::ECONOMIC;
        $project->save();
        expect($project->type)->toBe(MarketSegment::ECONOMIC);
    }
});

test('project housing type', function () {
    $project = Project::factory()->create();
    if ($project instanceof Project) {
        expect($project->housingType)->toBe(HousingType::SINGLE_DETACHED);
        $project->housingType = HousingType::CONDOMINIUM;
        $project->save();
        expect($project->housingType)->toBe(HousingType::CONDOMINIUM);
    }
});
