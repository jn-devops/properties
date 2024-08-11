<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Homeful\Properties\Models\Property;

uses(RefreshDatabase::class, WithFaker::class);

it('has attributes', function () {
    $property = Property::factory()->create();
    if ($property instanceof Property) {
        expect($property->code)->toBeString();
    }

});
