<?php

use Homeful\Properties\Data\{ProjectData, PropertyData};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Homeful\Properties\Models\{Project, Property};
use Illuminate\Foundation\Testing\WithFaker;
use Homeful\Products\Data\ProductData;
use Homeful\Products\Models\Product;

uses(RefreshDatabase::class, WithFaker::class);

beforeEach(function () {
    $migration = include 'vendor/jn-devops/products/database/migrations/create_products_table.php.stub';
    $migration->up();
});

test('property has attributes', function () {
    $property = Property::factory()->create();
    if ($property instanceof Property) {
        expect($property->code)->toBeString();
        expect($property->name)->toBeString();
        expect($property->type)->toBeString();
        expect($property->cluster)->toBeInt();
        expect($property->phase)->toBeString();
        expect($property->block)->toBeString();
        expect($property->lot)->toBeString();
        expect($property->building)->toBeString();
        expect($property->floor_area)->toBeFloat();
        expect($property->lot_area)->toBeFloat();
        expect($property->unit_type)->toBeString();
        expect($property->unit_type_interior)->toBeString();
        expect($property->house_color)->toBeString();
        expect($property->roof_style)->toBeString();
        expect($property->end_unit)->toBeBool();
        expect($property->veranda)->toBeBool();
        expect($property->balcony)->toBeBool();
        expect($property->firewall)->toBeBool();
        expect($property->eaves)->toBeBool();
        expect($property->bedrooms)->toBeInt();
        expect($property->toilets_and_bathrooms)->toBeInt();
        expect($property->parking_slots)->toBeInt();
        expect($property->carports)->toBeInt();
        expect($property->project_code)->toBeString();
//        expect($property->project_location)->toBeString();
//        expect($property->project_address)->toBeString();
        expect($property->sku)->toBeString();
    }
});

test('property has a product', function () {
    $property = Property::factory()->forProduct()->create();
    if ($property instanceof Property) {
        expect($property->product)->toBeInstanceOf(Product::class);
        expect($property->sku)->toBe($property->product->sku);
    }
});

test('property has a project', function () {
    $property = Property::factory()->forProject()->create();
    if ($property instanceof Property) {
        expect($property->project)->toBeInstanceOf(Project::class);
        expect($property->project_code)->toBe($property->project->code);
    }
});

test('property has data', function() {
    $property = Property::factory()->forProduct()->forProject()->create();
    $data = PropertyData::fromModel($property);
    if ($property instanceof Property) {
        expect($data->code)->toBe($property->code);
        expect($data->name)->toBe($property->name);
        expect($data->type)->toBe($property->type);
        expect($data->cluster)->toBe($property->cluster);
        expect($data->phase)->toBe($property->phase);
        expect($data->block)->toBe($property->block);
        expect($data->lot)->toBe($property->lot);
        expect($data->building)->toBe($property->building);
        expect($data->floor_area)->toBe($property->floor_area);
        expect($data->lot_area)->toBe($property->lot_area);
        expect($data->unit_type)->toBe($property->unit_type);
        expect($data->unit_type_interior)->toBe($property->unit_type_interior);
        expect($data->house_color)->toBe($property->house_color);
        expect($data->roof_style)->toBe($property->roof_style);
        expect($data->end_unit)->toBe($property->end_unit);
        expect($data->veranda)->toBe($property->veranda);
        expect($data->balcony)->toBe($property->balcony);
        expect($data->firewall)->toBe($property->firewall);
        expect($data->eaves)->toBe($property->eaves);
        expect($data->bedrooms)->toBe($property->bedrooms);
        expect($data->toilets_and_bathrooms)->toBe($property->toilets_and_bathrooms);
        expect($data->parking_slots)->toBe($property->parking_slots);
        expect($data->carports)->toBe($property->carports);
        expect($data->project_code)->toBe($property->project_code);
//        expect($data->project_location)->toBe($property->project_location);
//        expect($data->project_address)->toBe($property->project_address);
        expect($data->sku)->toBe($property->sku);
        with(ProductData::fromModel($property->product), function (ProductData $product_data) use ($data) {
            expect($data->product->toArray())->toBe($product_data->toArray());
        });
        with(ProjectData::fromModel($property->project), function (ProjectData $project_data) use ($data) {
            expect($data->project->toArray())->toBe($project_data->toArray());
        });
    }
});
