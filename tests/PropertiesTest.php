<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Homeful\Properties\Models\Property;
use Homeful\Products\Models\Product;

uses(RefreshDatabase::class, WithFaker::class);

it('has attributes', function () {
    $property = Property::factory()->create();
    if ($property instanceof Property) {
        expect($property->code)->toBeString();
        expect($property->sku)->toBeString();
    }
});

it('has a product', function () {
    $migration = include 'vendor/jn-devops/products/database/migrations/create_products_table.php.stub';
    $migration->up();
    $product = Product::factory()->create();
    $property = Property::factory()->create();

    if (($product instanceof Product) && ($property instanceof Property)) {
        expect($property->product)->toBeNull();
        $property->sku = $product->sku;
        $property->save();
        $property->refresh();
        expect($property->product->is($product))->toBeTrue();
    }
});
