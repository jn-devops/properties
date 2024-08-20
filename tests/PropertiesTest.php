<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Homeful\Properties\Data\PropertyData;
use Homeful\Properties\Models\Property;
use Homeful\Products\Data\ProductData;
use Homeful\Products\Models\Product;

uses(RefreshDatabase::class, WithFaker::class);

beforeEach(function () {
    $migration = include 'vendor/jn-devops/products/database/migrations/create_products_table.php.stub';
    $migration->up();
});

it('has attributes', function () {
    $property = Property::factory()->create();
    if ($property instanceof Property) {
        expect($property->code)->toBeString();
        expect($property->sku)->toBeString();
    }
});

it('has a product', function () {
    $property = Property::factory()->forProduct()->create();
    if ($property instanceof Property) {
        expect($property->product)->toBeInstanceOf(Product::class);
        expect($property->sku)->toBe($property->product->sku);
    }
});

it('has data', function() {
    $property = Property::factory()->forProduct()->create();
    $data = PropertyData::fromModel($property);
    if ($property instanceof Property) {
        expect($data->code)->toBe($property->code);
        expect($data->sku)->toBe($property->sku);
        with(ProductData::fromModel($property->product), function (ProductData $product_data) use ($data) {
            expect($data->product->toArray())->toBe($product_data->toArray());
        });
    }
});
